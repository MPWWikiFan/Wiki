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
$wgUseImageResize = true;
$wgGenerateThumbnailOnParse = true;
$wgShowArchiveThumbnails = true;
$wgThumbLimits = [120, 150, 180, 200, 250, 300];
