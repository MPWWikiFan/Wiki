<?php

// If MediaWiki is not defined, terminate the code to prevent unauthorized access.
// Then, invoke the config registry to retreive specific settings. 
// Finally, define the name of the server, basic database information, and the name of the website

if ( !defined( 'MEDIAWIKI' ) ) {
	echo "This file is part of MediaWiki and is not a valid entry point\n";
	die( 1 );
}
$wgConfigRegistry = [
	'main' => 'GlobalVarConfig::newInstance',
];
$wgServer = false; // Since there is no server attached to this code, this value is 'false' by default and the following DB settings are the just the defaults
$wgCanonicalServer = false;
$wgDBname = 'my_wiki';
$wgDBserver = 'localhost';
$wgDBtype = 'mysql';
$wgDBservers = false;
$wgDBTableOptions = 'ENGINE=InnoDB, DEFAULT CHARSET=binary';
$wgSitename = 'Matthews_Wiki'; // The user-facing website name as it will appear in search results etc.

// File uploads configuration

$wgEnableUploads = true; 
$wgAllowCopyUploads = true; 
$wgCopyUploadsFromSpecialUpload = true;
$wgFileExtensions = [ 'png', 'gif', 'jpg', 'jpeg', 'webp', ]; 
$wgCheckFileExtensions = true; 
$wgStrictFileExtensions = true; 
$wgProhibitedFileExtensions = [
	'html', 'htm', 'js', 'jsb', 'mhtml', 'mht', 'xhtml', 'xht',
	'php', 'phtml', 'php3', 'php4', 'php5', 'phps', 'phar', 'shtml', 'jhtml', 'pl', 'py', 'cgi',
	'exe', 'scr', 'dll', 'msi', 'vbs', 'bat', 'com', 'pif', 'cmd', 'vxd', 'cpl', 'xml',
];
$wgMaxUploadSize = 1000000000;
$wgUploadMaintenance = false;
$wgTrustedMediaFormats = [
	MEDIATYPE_BITMAP,
	MEDIATYPE_AUDIO, 
	MEDIATYPE_VIDEO, 
	"image/svg+xml", 
	"application/pdf", 
];
$wgUseImageResize = true;
$wgGenerateThumbnailOnParse = true;
$wgShowArchiveThumbnails = true;
$wgThumbLimits = [120, 150, 180, 200, 250, 300];

// Email settings

$wgEnableEmail = true;
$wgAllowHTMLEmail = true;
$wgEmailAuthentication = true;
$wgEnableSpecialMute = true;
$wgEnableUserEmailMuteList = true;
$wgNewPasswordExpiry = 3600 * 24 * 7;
$wgPasswordExpirationDays = 90;
$wgPasswordReminderResendTime = 24;
$wgUserEmailConfirmationTokenExpiry = 7 * 24 * 60 * 60;
$wgUserEmailUseReplyTo = true;
$wgEnotifUserTalk = true;

// Page titles, redirects, and namespaces

$wgDisableHardRedirects = false;
$wgFixDoubleRedirects = true;
$wgInvalidRedirectTargets = [ 'Filepath', 'Mypage', 'Mytalk', 'Redirect', 'Mylog' ];
$wgContentNamespaces = [ NS_MAIN ];
$wgMetaNamespace = 'Project';
$wgMetaNamespaceTalk = 'Project_talk';
$wgNamespacesWithSubpages = [
	NS_TALK => true,
	NS_USER => true,
	NS_USER_TALK => true,
	NS_PROJECT => true,
	NS_PROJECT_TALK => true,
	NS_FILE_TALK => true,
	NS_MEDIAWIKI => true,
	NS_MEDIAWIKI_TALK => true,
	NS_TEMPLATE => true,
	NS_TEMPLATE_TALK => true,
	NS_HELP => true,
	NS_HELP_TALK => true,
	NS_CATEGORY_TALK => true
];

// Parser

$wgAllowDisplayTitle = true;
$wgAllowExternalImages = false;
$wgEnableImageWhitelist = true;
$wgCleanSignatures = true;
$wgEnableMagicLinks = [
	'ISBN' => false,
	'PMID' => false,
	'RFC' => false,
];
$wgEnableScaryTranscluding = false;
$wgParserEnableUserLanguage = true;
$wgUrlProtocols = [
	'bitcoin:', 'ftp://', 'ftps://', 'geo:', 'git://', 'gopher://', 'http://',
	'https://', 'irc://', 'ircs://', 'magnet:', 'mailto:', 'matrix:', 'mms://',
	'news:', 'nntp://', 'redis://', 'sftp://', 'sip:', 'sips:', 'sms:',
	'ssh://', 'svn://', 'tel:', 'telnet://', 'urn:', 'worldwind://', 'xmpp:',
	'//',
];
$wgRawHtml = false;
