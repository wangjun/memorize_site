<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class analyse extends CI_Controller
{
    var $todo_lists = 'todo_lists';
    var $uid = 0;

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('todo_model');

        session_start();
        if (isset($_SESSION['uid'])) {
            $this->uid = $_SESSION['uid'];
        }

        header("Access-Control-Allow-Origin: *");
    }

    public function index()
    {
        //取项目总耗时
        $projects = array(
            array('code' => 'xs', 'name' => '协顺'),
            array('code' => 'car', 'name' => 'Car2Share'),
            array('code' => 'hk', 'name' => '环科'),
            array('code' => 'sb', 'name' => '选最好'),
            array('code' => 'ax', 'name' => '安信专题'),
            array('code' => 'td', 'name' => 'GTD'),
            array('code' => 'wx', 'name' => '移动互联网'),
            array('code' => 'zz', 'name' => '种子'),
            array('code' => 'iOS', 'name' => 'iOS开发')
        );

        foreach ($projects as &$p) {
            $p['total_hours'] = number_format($this->todo_model->get_project_total_hour($p['code']), 2);
            $p['day_hours'] = $this->todo_model->get_project_day_hours($p['code']);
        }

        //取当月每日记录图表数据
        $job_type = array('其它', '家庭', '学习', '工作', '睡觉', '跑步', 'GRE', '交通');

        //计算图表月份的起始时段
        $month = $this->input->get('month', true);

        if (!$month) {
            $month = date('Y-m', time());
        }

        $month_start = $month . '-01 00:00:00';
        $now = strtotime($month_start);

        $m = date('m', $now);
        if ($m == 12) {
            $month_end = date('Y-m-d H:i:s', strtotime((date('Y', $now) + 1) . '-01-01') - 1);
        } else {
            $month_end = date('Y-m-d H:i:s', strtotime(date('Y-', $now) . ($m + 1) . '-01') - 1);
        }

        $md = array();
        foreach ($job_type as $job_type_id => $job_type_name) {
            $rows = $this->todo_model->get_month_chart_data($job_type_id, $month_start, $month_end);

            $month_data = array();

            foreach ($rows as $item) {
                array_push($month_data, $item);
            }

            array_push($md, array(
                'name' => $job_type_name,
                'pointInterval' => 3600 * 1000 * 24, //1天
                'pointStart' => 1, //'Date.UTC(2014, 10, 1, 0, 0)',  //UTC(年，月，日，时，分)
                'data' => $month_data
            ));
        }

        //print_a($md);

        $month_json_data = json_encode($md); //'[' . implode(',', $month_data) . ']';

        $data = array(
            'title' => 'todo分析',
            'user_name' => $_SESSION['user_name'],
            'projects' => $projects,
            'month' => $month,
            'month_chart_data' => $month_json_data,
            'css' => array(),
            'js' => array(
                '/js/analyse.js'
            )
        );

        $this->load->view('todo/analyse', $data);
    }

    public function week_view()
    {
        $data = array(
            'title' => 'Analyse week view',
            'user_name' => $_SESSION['user_name'],
            'css' => array(),
            'js' => array(
                '/js/analyse_week_view.js'
            )
        );

        $this->load->view('todo/analyse_week_view', $data);
    }

    public function work_week_report()
    {
        $data = array(
            'title' => 'Report of Work in Week',
            'user_name' => $_SESSION['user_name'],
            'css' => array(),
            'js' => array(
                '/js/todo/work_week_report.js'
            )
        );

        $this->load->view('todo/work_week_report', $data);
    }

    public function get_week_time_by_project()
    {
        $week_date = $this->input->post('week_date', true);
        $week_range = $this->f->get_time_range_of_week($week_date);

        $sql = "SELECT LEFT(job_name, POSITION(':' IN job_name) - 1) AS code, SUM(time_long) AS total "
            . ", IF(POSITION(':' IN job_name) > 0 , 1, 0) as is_code "
            . "FROM todo_lists "
            . "WHERE user_id = $this->uid AND job_type_id = 3 AND (start_time >= $week_range->start AND start_time <= $week_range->end) "
            . "GROUP BY code ORDER BY is_code DESC, total DESC";

        $query = $this->db->query($sql);

        $data = $query->result();

        echo json_encode($data);
    }


    public function send_report_mail()
    {
        $day = date('Y-m-d', time());
        $project_code = $this->input->get('project_code', true);

        $data = array(
            'title' => 'Report of Work in Week',
            'user_name' => $_SESSION['user_name'],
            'day_report' => $this->get_day_report($day, $project_code),
            'css' => array(),
            'js' => array(
                '/js/todo/day_report.js'
            )
        );

        $this->load->view('todo/day_report', $data);
    }

    public function send_report_mail_api()
    {
        $day = $this->input->post('day', true);
        $project_code = $this->input->post('code', true);

        echo json_encode(array(
            'success' => true,
            'report' => $this->get_day_report($day, $project_code)
        ));
    }

    private function get_day_report($day, $project_code)
    {
        $all_jobs_of_week = $this->todo_lib->get_all_jobs_of_week($day, false, $project_code, $this->uid);

        //把任务按日期分组
        $list = $this->todo_lib->gather_jobs_by_day($all_jobs_of_week);

        //把工作把周一到周日顺序排列
        $ol = array();
        for ($i = 1; $i < 7; $i++) {
            $ol[$i]['jobs'] = $list[$i];
        }

        $ol[0]['jobs'] = $list[0]; //周日是0，加在最后

        //给每天加上日期
        $time_range = $this->f->get_time_range_of_week($day);
        $start = $time_range->start;

        foreach ($ol as &$day) {
            $day['date'] = date('Y-m-d', $start);
            $start += 3600 * 24;
        }

        $data = array(
            'days' => $ol,
            'css' => array(),
            'js' => array()
        );


        return $this->load->view('todo/report_mail', $data, true);

    }


    public function send_day_report_mail()
    {
        $day = date('Y-m-d', time());

        $content = $this->get_day_report($day, 'car');

        $subject = '尊仕和工作简报';

        $this->f->send_mail('tom@zenho.co.uk', $subject, $content);
    }

    public function get_work_week_report_jobs_by_code()
    {
        $code = $this->input->post('code', true);

        $week_date = $this->input->post('week_date', true);
        $week_range = $this->f->get_time_range_of_week($week_date);

        $sql = "SELECT SUBSTRING(job_name, POSITION(':' IN job_name) + " . ($code === '' ? 1 : 2) . ") AS name FROM todo_lists "
            . "WHERE user_id = $this->uid AND job_type_id = 3 AND (start_time >= $week_range->start AND start_time <= $week_range->end) ";

        if ($code === '') {
            $sql .= "AND job_name NOT LIKE '%:%'";
        } else {
            $sql .= "AND job_name LIKE '$code%'";
        }

        $sql .= ' ORDER BY start_time ASC';

        //echo $sql; exit;

        $query = $this->db->query($sql);

        $data = $query->result();

        echo json_encode($data);
    }

    public function getPieDataOfTaskType()
    {
        $week_date = $this->input->post('week_date', true);
        $i_day = $this->input->post('i_day', true);
        $work_type = 3;

        //找出$i_day对应的日期时间，开始和结束
        $week_range = $this->f->get_time_range_of_week($week_date);

        if ($i_day == 'week') {
            $start = $week_range->start;
            $end = $week_range->end;
        } else {
            $i_day_array = explode('_', $i_day);
            $i = $i_day_array[1];

            $start = $week_range->start + ($i - 1) * 3600 * 24;
            $end = $start + 3600 * 24 - 1;
        }


        $sql = "SELECT task_type_id, SUM(time_long) AS time_long FROM $this->todo_lists "
            . " WHERE user_id = $this->uid AND job_type_id = 3 AND (start_time >= $start AND start_time <= $end)"
            . " GROUP BY task_type_id ORDER BY task_type_id";

        //echo $sql;

        $query = $this->db->query($sql);

        $data = $query->result();

        echo json_encode($data);
    }


    public function get_project_day_hours()
    {
        $code = $this->input->post('code', true);
        $data = $this->todo_model->get_project_day_hours($code);

        echo json_encode(array(
            'success' => true,
            'data' => $data
        ));
    }

    public function export_project_task_list()
    {
        $code = $this->input->get('code', true);

        $sql = "SELECT * FROM $this->todo_lists "
            . "WHERE user_id = $this->uid AND job_name LIKE '$code%' ORDER BY start_time ASC";

        $query = $this->db->query($sql);
        $data = $query->result();

        $str = "日期,任务,耗时（分钟）\n";
        $str = iconv('utf-8', 'gb2312', $str);

        foreach ($data as $row) {
            $name = iconv('utf-8', 'gb2312', $row->job_name); //中文转码
            $date = date('Y-m-d', $row->start_time);
            $str .= $date . "," . $name . "," . $row->time_long / 60 . "\n"; //用引文逗号分开
        }

        $filename = 'project_' . $code . '_' . date('Ymd') . '.csv'; //设置文件名

        header("Content-type:text/csv");
        header("Content-Disposition:attachment;filename=" . $filename);
        header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
        header('Expires:0');
        header('Pragma:public');

        echo $str;
    }
}

/* End of file */
