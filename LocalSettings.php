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

// Cookie settings

$wgCookieSetOnAutoblock = false; // Let's not do this due to potential for extreme collateral damage
$wgCookieSetOnIpBlock = false; // Same as above

// Setup for the on-wiki internal search feature

$wgAdvancedSearchHighlighting = true;
$wgEnableSearchContributorsByIP = true;
$wgNamespacesToBeSearchedDefault = [
	NS_MAIN => true,
];

// User accounts and authentication

$wgAutoCreateTempUser = false;
$wgInvalidUsernameCharacters = '@:>=';
$wgMaxNameChars = 255;
$wgMaxSigChars = 255;
$wgReservedUsernames = [
	'MediaWiki default', 
	'Conversion script', 
	'Maintenance script', 
	'Template namespace initialisation script', 
	'ScriptImporter', 
	'Delete page script', 
	'Move page script', 
	'Command line script', 
	'Unknown user', 
	'msg:double-redirect-fixer',
	'msg:usermessage-editor', 
	'msg:proxyblocker', 
	'msg:sorbs', 
	'msg:spambot_username',
	'msg:autochange-username', 
];
use MediaWiki\Password\PasswordPolicyChecks;
$wgPasswordPolicy = [
	'policies' => [
		'bureaucrat' => [
			'MinimalPasswordLength' => 10,
			'MinimumPasswordLengthToLogin' => 1,
		],
		'sysop' => [
			'MinimalPasswordLength' => 10,
			'MinimumPasswordLengthToLogin' => 1,
		],
		'interface-admin' => [	// 1.32+
			'MinimalPasswordLength' => 10,
			'MinimumPasswordLengthToLogin' => 1,
		],
		'bot' => [
			'MinimalPasswordLength' => 10,
			'MinimumPasswordLengthToLogin' => 1,
		],
		'default' => [
			'MinimalPasswordLength' => [ 'value' => 8, 'suggestChangeOnLogin' => true ],
			'PasswordCannotBeSubstringInUsername' => [
				'value' => true,
				'suggestChangeOnLogin' => true
			],
			'PasswordCannotMatchDefaults' => [ 'value' => true, 'suggestChangeOnLogin' => true ],
			'MaximalPasswordLength' => [ 'value' => 4096, 'suggestChangeOnLogin' => true ],
			'PasswordNotInCommonList' => [ 'value' => true, 'suggestChangeOnLogin' => true ],
		],
	],
	'checks' => [
		'MinimalPasswordLength' => [ PasswordPolicyChecks::class, 'checkMinimalPasswordLength' ],
		'MinimumPasswordLengthToLogin' => [ PasswordPolicyChecks::class, 'checkMinimumPasswordLengthToLogin' ],
		'PasswordCannotBeSubstringInUsername' => [ PasswordPolicyChecks::class, 'checkPasswordCannotBeSubstringInUsername' ],
		'PasswordCannotMatchDefaults' => [ PasswordPolicyChecks::class, 'checkPasswordCannotMatchDefaults' ],
		'MaximalPasswordLength' => [ PasswordPolicyChecks::class, 'checkMaximalPasswordLength' ],
		'PasswordNotInCommonList' => [ PasswordPolicyChecks::class, 'checkPasswordNotInCommonList' ],
	],
];
$wgPasswordDefault = 'pbkdf2';
$wgPasswordConfig = [
	'A' => [
		'class' => MWOldPassword::class,
	],
	'B' => [
		'class' => MWSaltedPassword::class,
	],
	'pbkdf2-legacyA' => [
		'class' => LayeredParameterizedPassword::class,
		'types' => [
			'A',
			'pbkdf2',
		],
	],
	'pbkdf2-legacyB' => [
		'class' => LayeredParameterizedPassword::class,
		'types' => [
			'B',
			'pbkdf2',
		],
	],
	'bcrypt' => [
		'class' => BcryptPassword::class,
		'cost' => 9,
	],
	'pbkdf2' => [
		'class' => Pbkdf2PasswordUsingOpenSSL::class,
		'algo' => 'sha512',
		'cost' => '30000',
		'length' => '64',
	],
	'argon2' => [	// 1.33+
		'class' => Argon2Password::class,
		'algo' => 'auto',
	],
];
$wgAllowSecuritySensitiveOperationIfCannotReauthenticate = false;
$wgPasswordResetRoutes = [
	'username' => true,
	'email' => true,
];
$wgSessionProviders = [
	\MediaWiki\Session\CookieSessionProvider::class => [
		'class' => \MediaWiki\Session\CookieSessionProvider::class,
		'args' => [ [
			'priority' => 30,
		] ],
	],
	\MediaWiki\Session\BotPasswordSessionProvider::class => [
		'class' => \MediaWiki\Session\BotPasswordSessionProvider::class,
		'args' => [ [
			'priority' => 75,
		] ],
		'services' => [
			'GrantsInfo'
		],
	],
];
$wgUserRegistrationProviders = [
	LocalUserRegistrationProvider::TYPE => [
		'class' => LocalUserRegistrationProvider::class,
		'services' => [
			'UserFactory',
			'ConnectionProvider',
		]
	]
];
$wgChangeCredentialsBlacklist = [
	TemporaryPasswordAuthenticationRequest::class,
];

// Access control and administration configuration

$wgAutoblockExpiry = 86400;
$wgBlockAllowsUTEdit = true;
$wgDeleteRevisionsBatchSize = 1000;
$wgEmailConfirmToEdit = false;
$wgEnableDnsBlacklist = false;
$wgPasswordAttemptThrottle = [
	[ 'count' => 5, 'seconds' => 300 ],
	[ 'count' => 150, 'seconds' => 60 * 60 * 48 ],
];
$wgRateLimits = [
	'edit' => [
		'ip' => [ 8, 60 ],
		'newbie' => [ 8, 60 ],
		'user' => [ 90, 60 ],
	],
	'move' => [
		'newbie' => [ 2, 120 ],
		'user' => [ 8, 60 ],
	],
	'upload' => [
		'ip' => [ 8, 60 ],
		'newbie' => [ 8, 60 ],
	],
	'rollback' => [
		'user' => [ 10, 60 ],
		'newbie' => [ 5, 120 ]
	],
	'mailpassword' => [
		'ip' => [ 5, 3600 ],
	],
	'sendemail' => [
		'ip' => [ 5, 86400 ],
		'newbie' => [ 5, 86400 ],
		'user' => [ 20, 86400 ],
	],
	'changeemail' => [
		'ip-all' => [ 10, 3600 ],
		'user' => [ 4, 86400 ]
	],
	'confirmemail' => [
		'ip-all' => [ 10, 3600 ],
		'user' => [ 4, 86400 ]
	],
	'purge' => [
		'ip' => [ 30, 60 ],
		'user' => [ 30, 60 ],
	],
	'linkpurge' => [
		'ip' => [ 30, 60 ],
		'user' => [ 30, 60 ],
	],
	'renderfile' => [
		'ip' => [ 700, 30 ],
		'user' => [ 700, 30 ],
	],
	'renderfile-nonstandard' => [
		'ip' => [ 70, 30 ],
		'user' => [ 70, 30 ],
	],
	'stashedit' => [
		'ip' => [ 30, 60 ],
		'newbie' => [ 30, 60 ],
	],
	'stashbasehtml' => [
		'ip' => [ 5, 60 ],
		'newbie' => [ 5, 60 ],
	],
	'changetags' => [
		'ip' => [ 8, 60 ],
		'newbie' => [ 8, 60 ],
	],
	'editcontentmodel' => [
		'newbie' => [ 2, 120 ],
		'user' => [ 8, 60 ],
	],
];
$wgAccountCreationThrottle = 0;
$wgApplyIpBlocksToXff = false; // Let's never do this due to the risk of collateral damage
$wgAutoConfirmAge = 86400*7;
$wgAutoConfirmCount = 25;
$wgAutopromoteOnceLogInRC = false;
$wgBlockCIDRLimit = [
	'IPv4' => 16,
	'IPv6' => 19,
];
$wgBlockDisablesLogin = false;
$wgDeleteRevisionsLimit = 5000;
$wgEnableMultiBlocks = false;
