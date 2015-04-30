<?php
/**
 * This is the default English localisation file containing language specific
 * information excluding interface strings, which are stored in JSON files.
 *
 * Please see https://www.mediawiki.org/wiki/Localisation for more information.
 * To improve a translation please visit https://translatewiki.net
 */

/**
 * Fallback language, used for all unspecified messages and behavior. This
 * is English by default, for all files other than this one.
 *
 * Do NOT set this to false in any other message file! Leave the line out to
 * accept the default fallback to "en".
 */
$fallback = false;

/**
 * Is the language written right-to-left?
 */
$rtl = false;

/**
 * Should all nouns (not just proper ones) be capitalized?
 * Enabling this property will add the capitalize-all-nouns class to the <body> tag
 */
$capitalizeAllNouns = false;

/**
 * Optional array mapping ASCII digits 0-9 to local digits.
 */
$digitTransformTable = null;

/**
 * Transform table for decimal point '.' and thousands separator ','
 */
$separatorTransformTable = null;

/**
 * Extra user preferences, which will be shown in Special:Preferences as
 * checkboxes. Extra settings in derived languages will automatically be
 * appended to the array of the fallback languages.
 */
$extraUserToggles = array();

/**
 * URLs do not specify their encoding. UTF-8 is used by default, but if the
 * URL is not a valid UTF-8 sequence, we have to try to guess what the real
 * encoding is. The encoding used in this case is defined below, and must be
 * supported by iconv().
 */
$fallback8bitEncoding = 'windows-1252';

/**
 * To allow "foo[[bar]]" to extend the link over the whole word "foobar"
 */
$linkPrefixExtension = false;

/**
 * Namespace names. NS_PROJECT is always set to $wgMetaNamespace after the
 * settings are loaded, it will be ignored even if you specify it here.
 *
 * NS_PROJECT_TALK will be set to $wgMetaNamespaceTalk if that variable is
 * set, otherwise the string specified here will be used. The string may
 * contain "$1", which will be replaced by the name of NS_PROJECT. It may
 * also contain a grammatical transformation, e.g.
 *
 *     NS_PROJECT_TALK => 'Keskustelu_{{grammar:elative|$1}}'
 *
 * Only one grammatical transform may be specified in the string. For
 * performance reasons, this transformation is done locally by the language
 * module rather than by the full wikitext parser. As a result, no other
 * parser features are available.
 */
$namespaceNames = array(
	NS_MEDIA            => 'Media',
	NS_SPECIAL          => 'Special',
	NS_MAIN             => '',
	NS_TALK             => 'Talk',
	NS_USER             => 'User',
	NS_USER_TALK        => 'User_talk',
	# NS_PROJECT set by $wgMetaNamespace
	NS_PROJECT_TALK     => '$1_talk',
	NS_FILE             => 'File',
	NS_FILE_TALK        => 'File_talk',
	NS_MEDIAWIKI        => 'MediaWiki',
	NS_MEDIAWIKI_TALK   => 'MediaWiki_talk',
	NS_TEMPLATE         => 'Template',
	NS_TEMPLATE_TALK    => 'Template_talk',
	NS_HELP             => 'Help',
	NS_HELP_TALK        => 'Help_talk',
	NS_CATEGORY         => 'Category',
	NS_CATEGORY_TALK    => 'Category_talk',
);

/**
 * Array of namespace aliases, mapping from name to NS_xxx index
 */
$namespaceAliases = array();

/**
 * Array of gender specific. namespace aliases.
 * Mapping NS_xxx to array of GENDERKEY to alias.
 * Example:
 * @code
 * $namespaceGenderAliases = array(
 * 	NS_USER => array( 'male' => 'Male_user', 'female' => 'Female_user' ),
 * );
 * @endcode
 */
$namespaceGenderAliases = array();

/**
 * A list of date format preference keys, which can be selected in user
 * preferences. New preference keys can be added, provided they are supported
 * by the language class's timeanddate(). Only the 5 keys listed below are
 * supported by the wikitext converter (parser/DateFormatter.php).
 *
 * The special key "default" is an alias for either dmy or mdy depending on
 * $wgAmericanDates
 */
$datePreferences = array(
	'default',
	'mdy',
	'dmy',
	'ymd',
	'ISO 8601',
);

/**
 * The date format to use for generated dates in the user interface.
 * This may be one of the above date preferences, or the special value
 * "dmy or mdy", which uses mdy if $wgAmericanDates is true, and dmy
 * if $wgAmericanDates is false.
 */
$defaultDateFormat = 'dmy or mdy';

/**
 * Associative array mapping old numeric date formats, which may still be
 * stored in user preferences, to the new string formats.
 */
$datePreferenceMigrationMap = array(
	'default',
	'mdy',
	'dmy',
	'ymd'
);

/**
 * These are formats for dates generated by MediaWiki (as opposed to the wikitext
 * DateFormatter). Documentation for the format string can be found in
 * Language.php, search for sprintfDate.
 *
 * This array is automatically inherited by all subclasses. Individual keys can be
 * overridden.
 */
$dateFormats = array(
	'mdy time' => 'H:i',
	'mdy date' => 'F j, Y',
	'mdy monthonly' => 'F Y',
	'mdy both' => 'H:i, F j, Y',
	'mdy pretty' => 'F j',

	'dmy time' => 'H:i',
	'dmy date' => 'j F Y',
	'dmy monthonly' => 'F Y',
	'dmy both' => 'H:i, j F Y',
	'dmy pretty' => 'j F',

	'ymd time' => 'H:i',
	'ymd date' => 'Y F j',
	'ymd monthonly' => 'Y F',
	'ymd both' => 'H:i, Y F j',
	'ymd pretty' => 'F j',

	'ISO 8601 time' => 'xnH:xni:xns',
	'ISO 8601 date' => 'xnY-xnm-xnd',
	'ISO 8601 monthonly' => 'xnY-xnm',
	'ISO 8601 both' => 'xnY-xnm-xnd"T"xnH:xni:xns',
	'ISO 8601 pretty' => 'xnm-xnd'
);

/**
 * Default list of book sources
 */
$bookstoreList = array(
	'AddALL' => 'http://www.addall.com/New/Partner.cgi?query=$1&type=ISBN',
	'Barnes & Noble' => 'http://search.barnesandnoble.com/bookSearch/isbnInquiry.asp?isbn=$1',
	'Amazon.com' => 'http://www.amazon.com/gp/search/?field-isbn=$1'
);

/**
 * Magic words
 * Customizable syntax for wikitext and elsewhere.
 *
 * IDs must be valid identifiers, they cannot contain hyphens.
 * CASE is 0 to match all case variants, 1 for case-sensitive
 *
 * Note to translators:
 *   Please include the English words as synonyms.  This allows people
 *   from other wikis to contribute more easily.
 *
 * This array can be modified at runtime with the LanguageGetMagic hook
 */
$magicWords = array(
#   ID                               CASE  SYNONYMS
	'redirect'                => array( 0, '#REDIRECT' ),
	'notoc'                   => array( 0, '__NOTOC__' ),
	'nogallery'               => array( 0, '__NOGALLERY__' ),
	'forcetoc'                => array( 0, '__FORCETOC__' ),
	'toc'                     => array( 0, '__TOC__' ),
	'noeditsection'           => array( 0, '__NOEDITSECTION__' ),
	'!'                       => array( 1, '!' ),
	'currentmonth'            => array( 1, 'CURRENTMONTH', 'CURRENTMONTH2' ),
	'currentmonth1'           => array( 1, 'CURRENTMONTH1' ),
	'currentmonthname'        => array( 1, 'CURRENTMONTHNAME' ),
	'currentmonthnamegen'     => array( 1, 'CURRENTMONTHNAMEGEN' ),
	'currentmonthabbrev'      => array( 1, 'CURRENTMONTHABBREV' ),
	'currentday'              => array( 1, 'CURRENTDAY' ),
	'currentday2'             => array( 1, 'CURRENTDAY2' ),
	'currentdayname'          => array( 1, 'CURRENTDAYNAME' ),
	'currentyear'             => array( 1, 'CURRENTYEAR' ),
	'currenttime'             => array( 1, 'CURRENTTIME' ),
	'currenthour'             => array( 1, 'CURRENTHOUR' ),
	'localmonth'              => array( 1, 'LOCALMONTH', 'LOCALMONTH2' ),
	'localmonth1'             => array( 1, 'LOCALMONTH1' ),
	'localmonthname'          => array( 1, 'LOCALMONTHNAME' ),
	'localmonthnamegen'       => array( 1, 'LOCALMONTHNAMEGEN' ),
	'localmonthabbrev'        => array( 1, 'LOCALMONTHABBREV' ),
	'localday'                => array( 1, 'LOCALDAY' ),
	'localday2'               => array( 1, 'LOCALDAY2' ),
	'localdayname'            => array( 1, 'LOCALDAYNAME' ),
	'localyear'               => array( 1, 'LOCALYEAR' ),
	'localtime'               => array( 1, 'LOCALTIME' ),
	'localhour'               => array( 1, 'LOCALHOUR' ),
	'numberofpages'           => array( 1, 'NUMBEROFPAGES' ),
	'numberofarticles'        => array( 1, 'NUMBEROFARTICLES' ),
	'numberoffiles'           => array( 1, 'NUMBEROFFILES' ),
	'numberofusers'           => array( 1, 'NUMBEROFUSERS' ),
	'numberofactiveusers'     => array( 1, 'NUMBEROFACTIVEUSERS' ),
	'numberofedits'           => array( 1, 'NUMBEROFEDITS' ),
	'numberofviews'           => array( 1, 'NUMBEROFVIEWS' ),
	'pagename'                => array( 1, 'PAGENAME' ),
	'pagenamee'               => array( 1, 'PAGENAMEE' ),
	'namespace'               => array( 1, 'NAMESPACE' ),
	'namespacee'              => array( 1, 'NAMESPACEE' ),
	'namespacenumber'         => array( 1, 'NAMESPACENUMBER' ),
	'talkspace'               => array( 1, 'TALKSPACE' ),
	'talkspacee'              => array( 1, 'TALKSPACEE' ),
	'subjectspace'            => array( 1, 'SUBJECTSPACE', 'ARTICLESPACE' ),
	'subjectspacee'           => array( 1, 'SUBJECTSPACEE', 'ARTICLESPACEE' ),
	'fullpagename'            => array( 1, 'FULLPAGENAME' ),
	'fullpagenamee'           => array( 1, 'FULLPAGENAMEE' ),
	'subpagename'             => array( 1, 'SUBPAGENAME' ),
	'subpagenamee'            => array( 1, 'SUBPAGENAMEE' ),
	'rootpagename'            => array( 1, 'ROOTPAGENAME' ),
	'rootpagenamee'           => array( 1, 'ROOTPAGENAMEE' ),
	'basepagename'            => array( 1, 'BASEPAGENAME' ),
	'basepagenamee'           => array( 1, 'BASEPAGENAMEE' ),
	'talkpagename'            => array( 1, 'TALKPAGENAME' ),
	'talkpagenamee'           => array( 1, 'TALKPAGENAMEE' ),
	'subjectpagename'         => array( 1, 'SUBJECTPAGENAME', 'ARTICLEPAGENAME' ),
	'subjectpagenamee'        => array( 1, 'SUBJECTPAGENAMEE', 'ARTICLEPAGENAMEE' ),
	'msg'                     => array( 0, 'MSG:' ),
	'subst'                   => array( 0, 'SUBST:' ),
	'safesubst'               => array( 0, 'SAFESUBST:' ),
	'msgnw'                   => array( 0, 'MSGNW:' ),
	'img_thumbnail'           => array( 1, 'thumbnail', 'thumb' ),
	'img_manualthumb'         => array( 1, 'thumbnail=$1', 'thumb=$1' ),
	'img_right'               => array( 1, 'right' ),
	'img_left'                => array( 1, 'left' ),
	'img_none'                => array( 1, 'none' ),
	'img_width'               => array( 1, '$1px' ),
	'img_center'              => array( 1, 'center', 'centre' ),
	'img_framed'              => array( 1, 'framed', 'enframed', 'frame' ),
	'img_frameless'           => array( 1, 'frameless' ),
	'img_lang'                => array( 1, 'lang=$1' ),
	'img_page'                => array( 1, 'page=$1', 'page $1' ),
	'img_upright'             => array( 1, 'upright', 'upright=$1', 'upright $1' ),
	'img_border'              => array( 1, 'border' ),
	'img_baseline'            => array( 1, 'baseline' ),
	'img_sub'                 => array( 1, 'sub' ),
	'img_super'               => array( 1, 'super', 'sup' ),
	'img_top'                 => array( 1, 'top' ),
	'img_text_top'            => array( 1, 'text-top' ),
	'img_middle'              => array( 1, 'middle' ),
	'img_bottom'              => array( 1, 'bottom' ),
	'img_text_bottom'         => array( 1, 'text-bottom' ),
	'img_link'                => array( 1, 'link=$1' ),
	'img_alt'                 => array( 1, 'alt=$1' ),
	'img_class'               => array( 1, 'class=$1' ),
	'int'                     => array( 0, 'INT:' ),
	'sitename'                => array( 1, 'SITENAME' ),
	'ns'                      => array( 0, 'NS:' ),
	'nse'                     => array( 0, 'NSE:' ),
	'localurl'                => array( 0, 'LOCALURL:' ),
	'localurle'               => array( 0, 'LOCALURLE:' ),
	'articlepath'             => array( 0, 'ARTICLEPATH' ),
	'pageid'                  => array( 0, 'PAGEID' ),
	'server'                  => array( 0, 'SERVER' ),
	'servername'              => array( 0, 'SERVERNAME' ),
	'scriptpath'              => array( 0, 'SCRIPTPATH' ),
	'stylepath'               => array( 0, 'STYLEPATH' ),
	'grammar'                 => array( 0, 'GRAMMAR:' ),
	'gender'                  => array( 0, 'GENDER:' ),
	'notitleconvert'          => array( 0, '__NOTITLECONVERT__', '__NOTC__' ),
	'nocontentconvert'        => array( 0, '__NOCONTENTCONVERT__', '__NOCC__' ),
	'currentweek'             => array( 1, 'CURRENTWEEK' ),
	'currentdow'              => array( 1, 'CURRENTDOW' ),
	'localweek'               => array( 1, 'LOCALWEEK' ),
	'localdow'                => array( 1, 'LOCALDOW' ),
	'revisionid'              => array( 1, 'REVISIONID' ),
	'revisionday'             => array( 1, 'REVISIONDAY' ),
	'revisionday2'            => array( 1, 'REVISIONDAY2' ),
	'revisionmonth'           => array( 1, 'REVISIONMONTH' ),
	'revisionmonth1'          => array( 1, 'REVISIONMONTH1' ),
	'revisionyear'            => array( 1, 'REVISIONYEAR' ),
	'revisiontimestamp'       => array( 1, 'REVISIONTIMESTAMP' ),
	'revisionuser'            => array( 1, 'REVISIONUSER' ),
	'revisionsize'            => array( 1, 'REVISIONSIZE' ),
	'plural'                  => array( 0, 'PLURAL:' ),
	'fullurl'                 => array( 0, 'FULLURL:' ),
	'fullurle'                => array( 0, 'FULLURLE:' ),
	'canonicalurl'            => array( 0, 'CANONICALURL:' ),
	'canonicalurle'           => array( 0, 'CANONICALURLE:' ),
	'lcfirst'                 => array( 0, 'LCFIRST:' ),
	'ucfirst'                 => array( 0, 'UCFIRST:' ),
	'lc'                      => array( 0, 'LC:' ),
	'uc'                      => array( 0, 'UC:' ),
	'raw'                     => array( 0, 'RAW:' ),
	'displaytitle'            => array( 1, 'DISPLAYTITLE' ),
	'rawsuffix'               => array( 1, 'R' ),
	'nocommafysuffix'         => array( 0, 'NOSEP' ),
	'newsectionlink'          => array( 1, '__NEWSECTIONLINK__' ),
	'nonewsectionlink'        => array( 1, '__NONEWSECTIONLINK__' ),
	'currentversion'          => array( 1, 'CURRENTVERSION' ),
	'urlencode'               => array( 0, 'URLENCODE:' ),
	'anchorencode'            => array( 0, 'ANCHORENCODE' ),
	'currenttimestamp'        => array( 1, 'CURRENTTIMESTAMP' ),
	'localtimestamp'          => array( 1, 'LOCALTIMESTAMP' ),
	'directionmark'           => array( 1, 'DIRECTIONMARK', 'DIRMARK' ),
	'language'                => array( 0, '#LANGUAGE:' ),
	'contentlanguage'         => array( 1, 'CONTENTLANGUAGE', 'CONTENTLANG' ),
	'pagesinnamespace'        => array( 1, 'PAGESINNAMESPACE:', 'PAGESINNS:' ),
	'numberofadmins'          => array( 1, 'NUMBEROFADMINS' ),
	'formatnum'               => array( 0, 'FORMATNUM' ),
	'padleft'                 => array( 0, 'PADLEFT' ),
	'padright'                => array( 0, 'PADRIGHT' ),
	'special'                 => array( 0, 'special' ),
	'speciale'                => array( 0, 'speciale' ),
	'defaultsort'             => array( 1, 'DEFAULTSORT:', 'DEFAULTSORTKEY:', 'DEFAULTCATEGORYSORT:' ),
	'filepath'                => array( 0, 'FILEPATH:' ),
	'tag'                     => array( 0, 'tag' ),
	'hiddencat'               => array( 1, '__HIDDENCAT__' ),
	'pagesincategory'         => array( 1, 'PAGESINCATEGORY', 'PAGESINCAT' ),
	'pagesize'                => array( 1, 'PAGESIZE' ),
	'index'                   => array( 1, '__INDEX__' ),
	'noindex'                 => array( 1, '__NOINDEX__' ),
	'numberingroup'           => array( 1, 'NUMBERINGROUP', 'NUMINGROUP' ),
	'staticredirect'          => array( 1, '__STATICREDIRECT__' ),
	'protectionlevel'         => array( 1, 'PROTECTIONLEVEL' ),
	'cascadingsources'        => array( 1, 'CASCADINGSOURCES' ),
	'formatdate'              => array( 0, 'formatdate', 'dateformat' ),
	'url_path'                => array( 0, 'PATH' ),
	'url_wiki'                => array( 0, 'WIKI' ),
	'url_query'               => array( 0, 'QUERY' ),
	'defaultsort_noerror'     => array( 0, 'noerror' ),
	'defaultsort_noreplace'   => array( 0, 'noreplace' ),
	'displaytitle_noerror'    => array( 0, 'noerror' ),
	'displaytitle_noreplace'  => array( 0, 'noreplace' ),
	'pagesincategory_all'     => array( 0, 'all' ),
	'pagesincategory_pages'   => array( 0, 'pages' ),
	'pagesincategory_subcats' => array( 0, 'subcats' ),
	'pagesincategory_files'   => array( 0, 'files' ),
);

/**
 * Alternate names of special pages. All names are case-insensitive. The first
 * listed alias will be used as the default. Aliases from the fallback
 * localisation (usually English) will be included by default.
 *
 * This array may be altered at runtime using the LanguageGetSpecialPageAliases
 * hook.
 */
$specialPageAliases = array(
	'Activeusers'               => array( 'ActiveUsers' ),
	'Allmessages'               => array( 'AllMessages' ),
	'AllMyUploads'              => array( 'AllMyUploads', 'AllMyFiles' ),
	'Allpages'                  => array( 'AllPages' ),
	'Ancientpages'              => array( 'AncientPages' ),
	'Badtitle'                  => array( 'Badtitle' ),
	'Blankpage'                 => array( 'BlankPage' ),
	'Block'                     => array( 'Block', 'BlockIP', 'BlockUser' ),
	'Booksources'               => array( 'BookSources' ),
	'BrokenRedirects'           => array( 'BrokenRedirects' ),
	'Categories'                => array( 'Categories' ),
	'ChangeEmail'               => array( 'ChangeEmail' ),
	'ChangePassword'            => array( 'ChangePassword', 'ResetPass', 'ResetPassword' ),
	'ComparePages'              => array( 'ComparePages' ),
	'Confirmemail'              => array( 'ConfirmEmail' ),
	'Contributions'             => array( 'Contributions', 'Contribs' ),
	'CreateAccount'             => array( 'CreateAccount' ),
	'Deadendpages'              => array( 'DeadendPages' ),
	'DeletedContributions'      => array( 'DeletedContributions' ),
	'Diff'                      => array( 'Diff' ),
	'DoubleRedirects'           => array( 'DoubleRedirects' ),
	'EditWatchlist'             => array( 'EditWatchlist' ),
	'Emailuser'                 => array( 'EmailUser', 'Email' ),
	'ExpandTemplates'           => array( 'ExpandTemplates' ),
	'Export'                    => array( 'Export' ),
	'Fewestrevisions'           => array( 'FewestRevisions' ),
	'FileDuplicateSearch'       => array( 'FileDuplicateSearch' ),
	'Filepath'                  => array( 'FilePath' ),
	'Import'                    => array( 'Import' ),
	'Invalidateemail'           => array( 'InvalidateEmail' ),
	'JavaScriptTest'            => array( 'JavaScriptTest' ),
	'BlockList'                 => array( 'BlockList', 'ListBlocks', 'IPBlockList' ),
	'LinkSearch'                => array( 'LinkSearch' ),
	'Listadmins'                => array( 'ListAdmins' ),
	'Listbots'                  => array( 'ListBots' ),
	'Listfiles'                 => array( 'ListFiles', 'FileList', 'ImageList' ),
	'Listgrouprights'           => array( 'ListGroupRights', 'UserGroupRights' ),
	'Listredirects'             => array( 'ListRedirects' ),
	'ListDuplicatedFiles'       => array( 'ListDuplicatedFiles', 'ListFileDuplicates' ),
	'Listusers'                 => array( 'ListUsers', 'UserList' ),
	'Lockdb'                    => array( 'LockDB' ),
	'Log'                       => array( 'Log', 'Logs' ),
	'Lonelypages'               => array( 'LonelyPages', 'OrphanedPages' ),
	'Longpages'                 => array( 'LongPages' ),
	'MediaStatistics'           => array( 'MediaStatistics' ),
	'MergeHistory'              => array( 'MergeHistory' ),
	'MIMEsearch'                => array( 'MIMESearch' ),
	'Mostcategories'            => array( 'MostCategories' ),
	'Mostimages'                => array( 'MostLinkedFiles', 'MostFiles', 'MostImages' ),
	'Mostinterwikis'            => array( 'MostInterwikis' ),
	'Mostlinked'                => array( 'MostLinkedPages', 'MostLinked' ),
	'Mostlinkedcategories'      => array( 'MostLinkedCategories', 'MostUsedCategories' ),
	'Mostlinkedtemplates'       => array( 'MostTranscludedPages', 'MostLinkedTemplates', 'MostUsedTemplates' ),
	'Mostrevisions'             => array( 'MostRevisions' ),
	'Movepage'                  => array( 'MovePage' ),
	'Mycontributions'           => array( 'MyContributions' ),
	'MyLanguage'                => array( 'MyLanguage' ),
	'Mypage'                    => array( 'MyPage' ),
	'Mytalk'                    => array( 'MyTalk' ),
	'Myuploads'                 => array( 'MyUploads', 'MyFiles' ),
	'Newimages'                 => array( 'NewFiles', 'NewImages' ),
	'Newpages'                  => array( 'NewPages' ),
	'PagesWithProp'             => array( 'PagesWithProp', 'Pageswithprop', 'PagesByProp', 'Pagesbyprop' ),
	'PageLanguage'              => array( 'PageLanguage' ),
	'PasswordReset'             => array( 'PasswordReset' ),
	'PermanentLink'             => array( 'PermanentLink', 'PermaLink' ),
	'Popularpages'              => array( 'PopularPages' ),
	'Preferences'               => array( 'Preferences' ),
	'Prefixindex'               => array( 'PrefixIndex' ),
	'Protectedpages'            => array( 'ProtectedPages' ),
	'Protectedtitles'           => array( 'ProtectedTitles' ),
	'Randompage'                => array( 'Random', 'RandomPage' ),
	'RandomInCategory'          => array( 'RandomInCategory' ),
	'Randomredirect'            => array( 'RandomRedirect' ),
	'Recentchanges'             => array( 'RecentChanges' ),
	'Recentchangeslinked'       => array( 'RecentChangesLinked', 'RelatedChanges' ),
	'Redirect'                  => array( 'Redirect' ),
	'ResetTokens'               => array( 'ResetTokens' ),
	'Revisiondelete'            => array( 'RevisionDelete' ),
	'RunJobs'                   => array( 'RunJobs' ),
	'Search'                    => array( 'Search' ),
	'Shortpages'                => array( 'ShortPages' ),
	'Specialpages'              => array( 'SpecialPages' ),
	'Statistics'                => array( 'Statistics' ),
	'Tags'                      => array( 'Tags' ),
	'TrackingCategories'        => array( 'TrackingCategories' ),
	'Unblock'                   => array( 'Unblock' ),
	'Uncategorizedcategories'   => array( 'UncategorizedCategories' ),
	'Uncategorizedimages'       => array( 'UncategorizedFiles', 'UncategorizedImages' ),
	'Uncategorizedpages'        => array( 'UncategorizedPages' ),
	'Uncategorizedtemplates'    => array( 'UncategorizedTemplates' ),
	'Undelete'                  => array( 'Undelete' ),
	'Unlockdb'                  => array( 'UnlockDB' ),
	'Unusedcategories'          => array( 'UnusedCategories' ),
	'Unusedimages'              => array( 'UnusedFiles', 'UnusedImages' ),
	'Unusedtemplates'           => array( 'UnusedTemplates' ),
	'Unwatchedpages'            => array( 'UnwatchedPages' ),
	'Upload'                    => array( 'Upload' ),
	'UploadStash'               => array( 'UploadStash' ),
	'Userlogin'                 => array( 'UserLogin', 'Login' ),
	'Userlogout'                => array( 'UserLogout', 'Logout' ),
	'Userrights'                => array( 'UserRights', 'MakeSysop', 'MakeBot' ),
	'Version'                   => array( 'Version' ),
	'Wantedcategories'          => array( 'WantedCategories' ),
	'Wantedfiles'               => array( 'WantedFiles' ),
	'Wantedpages'               => array( 'WantedPages', 'BrokenLinks' ),
	'Wantedtemplates'           => array( 'WantedTemplates' ),
	'Watchlist'                 => array( 'Watchlist' ),
	'Whatlinkshere'             => array( 'WhatLinksHere' ),
	'Withoutinterwiki'          => array( 'WithoutInterwiki' ),
);

/**
 * Regular expression matching the "link trail", e.g. "ed" in [[Toast]]ed, as
 * the first group, and the remainder of the string as the second group.
 */
$linkTrail = '/^([a-z]+)(.*)$/sD';

/**
 * Regular expression charset matching the "link prefix", e.g. "foo" in
 * foo[[bar]]. UTF-8 characters may be used.
 */
$linkPrefixCharset = 'a-zA-Z\\x{80}-\\x{10ffff}';

/**
 * List of filenames for some ui images that can be overridden per language
 * basis if needed.
 */
$imageFiles = array(
	'button-bold'     => 'en/button_bold.png',
	'button-italic'   => 'en/button_italic.png',
	'button-link'     => 'en/button_link.png',
	'button-extlink'  => 'en/button_extlink.png',
	'button-headline' => 'en/button_headline.png',
	'button-image'    => 'en/button_image.png',
	'button-media'    => 'en/button_media.png',
	'button-nowiki'   => 'en/button_nowiki.png',
	'button-sig'      => 'en/button_sig.png',
	'button-hr'       => 'en/button_hr.png',
);

/**
 * A list of messages to preload for each request.
 * Here we add messages that are needed for a typical anonymous parser cache hit.
 */
$preloadedMessages = array(
	'aboutpage',
	'aboutsite',
	'accesskey-ca-edit',
	'accesskey-ca-history',
	'accesskey-ca-nstab-main',
	'accesskey-ca-talk',
	'accesskey-ca-view',
	'accesskey-n-currentevents',
	'accesskey-n-help',
	'accesskey-n-mainpage-description',
	'accesskey-n-portal',
	'accesskey-n-randompage',
	'accesskey-n-recentchanges',
	'accesskey-p-logo',
	'accesskey-pt-login',
	'accesskey-search',
	'accesskey-search-fulltext',
	'accesskey-search-go',
	'accesskey-t-permalink',
	'accesskey-t-recentchangeslinked',
	'accesskey-t-specialpages',
	'accesskey-t-whatlinkshere',
	'actions',
	'anonnotice',
	'currentevents',
	'currentevents-url',
	'disclaimerpage',
	'disclaimers',
	'edit',
	'editsection',
	'editsectionhint',
	'help',
	'helppage',
	'interlanguage-link-title',
	'jumpto',
	'jumptonavigation',
	'jumptosearch',
	'lastmodifiedat',
	'mainpage',
	'mainpage-description',
	'mainpage-nstab',
	'namespaces',
	'navigation',
	'nav-login-createaccount',
	'nstab-main',
	'nstab-talk',
	'opensearch-desc',
	'pagecategories',
	'pagecategorieslink',
	'pagetitle',
	'pagetitle-view-mainpage',
	'permalink',
	'personaltools',
	'portal',
	'portal-url',
	'printableversion',
	'privacy',
	'privacypage',
	'randompage',
	'randompage-url',
	'recentchanges',
	'recentchangeslinked-toolbox',
	'recentchanges-url',
	'retrievedfrom',
	'search',
	'searcharticle',
	'searchbutton',
	'sidebar',
	'navigation-heading',
	'site-atom-feed',
	'sitenotice',
	'specialpages',
	'tagline',
	'talk',
	'toolbox',
	'tooltip-ca-edit',
	'tooltip-ca-history',
	'tooltip-ca-nstab-main',
	'tooltip-ca-talk',
	'tooltip-ca-view',
	'tooltip-n-currentevents',
	'tooltip-n-help',
	'tooltip-n-mainpage-description',
	'tooltip-n-portal',
	'tooltip-n-randompage',
	'tooltip-n-recentchanges',
	'tooltip-p-logo',
	'tooltip-p-navigation',
	'tooltip-p-tb',
	'tooltip-pt-login',
	'tooltip-search',
	'tooltip-search-fulltext',
	'tooltip-search-go',
	'tooltip-t-permalink',
	'tooltip-t-recentchangeslinked',
	'tooltip-t-specialpages',
	'tooltip-t-whatlinkshere',
	'variants',
	'vector-view-edit',
	'vector-view-history',
	'vector-view-view',
	'viewcount',
	'views',
	'whatlinkshere',
);
