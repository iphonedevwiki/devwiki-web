<?php

# This file was automatically generated by the MediaWiki installer.
# If you make manual changes, please keep track in case you need to
# recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# http://www.mediawiki.org/wiki/Manual:Configuration_settings

# If you customize your file layout, set $IP to the directory that contains
# the other MediaWiki files. It will be used as a base to locate files.
if( defined( 'MW_INSTALL_PATH' ) ) {
	$IP = MW_INSTALL_PATH;
} else {
	$IP = dirname ( __FILE__ );
}

$path = array( $IP, "$IP/includes", "$IP/languages" );
set_include_path( implode( PATH_SEPARATOR, $path ) . PATH_SEPARATOR . get_include_path() );

# If PHP's memory limit is very low, some operations may fail.
# ini_set( 'memory_limit', '20M' );

if ( $wgCommandLineMode ) {
	if ( isset( $_SERVER ) && array_key_exists( 'REQUEST_METHOD', $_SERVER ) ) {
		die( "This script must be run from the command line\n" );
	}
}
## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename         = "iPhone Development Wiki";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs please see:
## http://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath       = "";
$wgArticlePath = "/$1";
$wgScriptExtension  = ".php";

$wgAllowUserCss = true;


## UPO means: this is also a user preference option

$wgEnableEmail          =  true;
$wgEnableUserEmail      =  true;  #  UPO
$wgEnotifUserTalk       =  true;  #  UPO
$wgEnotifWatchlist      =  true;  #  UPO
$wgEmailAuthentication  =  true;

## Database settings
$wgDBtype     = "mysql";
$wgDBserver   = $_ENV['MYSQL_ENV_MYSQL_HOST'];
$wgDBname     = "iphonedevwiki";
$wgDBuser     = $_ENV['MYSQL_ENV_MYSQL_USER'];
$wgDBpassword = $_ENV['MYSQL_ENV_MYSQL_PASSWORD'];

# MySQL specific settings
$wgDBprefix        =  "y3k6_";
$wgDBTableOptions  =  "ENGINE=InnoDB,  DEFAULT  CHARSET=binary";
$wgDBmysql5        =  true;

## Shared memory settings
$wgMainCacheType = CACHE_ACCEL;
$wgMemCachedServers = array();

$wgServer = WebRequest::detectServer();

## Frontend Config
$wgSquidServersNoPurge = array('0.0.0.0/0');

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads              =  true;
$wgUseImageMagick             =  true;
$wgImageMagickConvertCommand  =  "/usr/bin/convert";
$wgFileExtensions[]           =  'svg';
#$wgStrictUploads             =  false;
$wgAllowTitlesInSVG           =  true;
$wgSVGConverter               =  'ImageMagick';

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "en_US.utf8";

## If you want to use image uploads under safe mode,
## create the directories images/archive, images/thumb and
## images/temp, and make them all writable. Then uncomment
## this, if it's not already uncommented:
# $wgHashedUploadDirectory = false;

## If you have the appropriate support software installed
## you can enable inline LaTeX equations:
$wgUseTeX           = false;

$wgLocalInterwiki   = strtolower( $wgSitename );

$wgLanguageCode = "en";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
# $wgEnableCreativeCommonsRdf = true;
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "";
$wgRightsText = "";
$wgRightsIcon = "";
# $wgRightsCode = ""; # Not yet used

$wgDiff3 = "/usr/bin/diff3";

# When you make changes to this configuration file, this will make
# sure that cached pages are cleared.
$wgCacheEpoch = max( $wgCacheEpoch, gmdate( 'YmdHis', @filemtime( __FILE__ ) ) );

## Random Logo
$logoNames[] = "iphone4w@2x.png";
$logoNames[] = "iphone5b@2x.png";
$logoNames[] = "ipod5r@2x.png";
$wgLogo = "{$wgScriptPath}/logos/".$logoNames[array_rand($logoNames)];
$wgLogos = [
	'1x' => "{$wgScriptPath}/logos/logo.png",
	'1.5x' => "{$wgScriptPath}/logos/logo@1.5x.png",
	'2x' => "{$wgScriptPath}/logos/logo@2x.png",
	'wordmark' =>  [
		'src' => "{$wgScriptPath}/logos/wordmark.png",	// 135px wide image of sitename text, limited support
		'width' => 268,
		'height' => 32, // 2em
   ],
];

wfLoadSkin( 'Vector' );

## Extensions
#require_once("$IP/extensions/ConfirmEdit/ConfirmEdit.php");
wfLoadExtensions(
	array(
		'ParserFunctions',
		'Loops',
		'Variables',
		'DynamicPageList3',
		'SyntaxHighlight_GeSHi',
		'CategoryTree',
		'Cite',
		'ConfirmEdit',
		'ConfirmEdit/QuestyCaptcha',
		'UserMerge',
		'TabberNeue',
		'OATHAuth',
		'Scribunto'
	)
);

wfLoadSkin( 'Citizen' );

# SyntaxHighlight
$wgPygmentizePath = '/usr/local/bin/pygmentize';

# ConfirmEdit
$wgCaptchaClass = 'QuestyCaptcha';
$wgCaptchaTriggers['edit']          = true;
$wgCaptchaTriggers['create']        = true;
$wgCaptchaTriggers['addurl']        = true;
$wgCaptchaTriggers['createaccount'] = true;
$wgDeprecationReleaseLimit = '1.0';

$wgCaptchaQuestions = array(
	array(
		'question' => 'What is the Objective-C directive for a selector literal?',
		'answer' => '@selector',
	),
	array(
		'question' => 'What is the class representing a mutable array in Cocoa?',
		'answer' => 'NSMutableArray',
	),
	array(
		'question' => 'What\'s the name of the application that provides the homescreen UI on iOS?',
		'answer' => 'SpringBoard',
	),
);

## User Permissions
$wgGroupPermissions['*']['edit']                =  false;  //  Edit  off  by  default.
$wgGroupPermissions['bureaucrat']['usermerge']  =  true;
$wgGroupPermissions['sysop']['deleterevision']  =  true;
// Fix the default captcha behaviour
$wgGroupPermissions['*'             ]['skipcaptcha'] = false;
$wgGroupPermissions['user'          ]['skipcaptcha'] = true;
$wgGroupPermissions['user'          ]['oathauth-enable'] = true;
$wgGroupPermissions['autoconfirmed' ]['skipcaptcha'] = true;
$wgGroupPermissions['bot'           ]['skipcaptcha'] = true; // registered bots
$wgGroupPermissions['sysop'         ]['skipcaptcha'] = true;
$wgGroupPermissions['emailconfirmed']['skipcaptcha'] = true;
$ceAllowConfirmedEmail = true;

$wgShowExceptionDetails = false;

$wgRCMaxAge = 1300 * 7 * 24 * 3600;
$wgResponsiveImages = 1;

$wgCitizenThemeColor = "#1c1c1c";
$wgCitizenManifestThemeColor = "#1c1c1c";
$wgCitizenManifestBackgroundColor = "#1c1c1c";

$wgMaxCredits = -1;

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'standard', 'nostalgia', 'cologneblue', 'monobook':
$wgDefaultSkin = 'Citizen';

$wgScribuntoDefaultEngine = 'luastandalone';

if ( file_exists("/var/www-shared/html/PrivateSettings.php") ) {
	require_once("/var/www-shared/html/PrivateSettings.php");
}
?>