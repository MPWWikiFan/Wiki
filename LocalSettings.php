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
$wgAutoConfirmAge = 86400*7; // Accounts will be considered "autoconfirmed" after existing for 1 week...
$wgAutoConfirmCount = 25; // ...and having made 25 total edits
$wgAutopromoteOnceLogInRC = false;
$wgBlockCIDRLimit = [
	'IPv4' => 16,
	'IPv6' => 19,
];
$wgBlockDisablesLogin = false;
$wgDeleteRevisionsLimit = 5000;
$wgEnableMultiBlocks = false;

// Group Permissions. This is the core of what controls the user-facing aspects of site functionality!

$wgGroupPermissions => [
	'*' => [
		'createaccount' => true, // All users can create new accounts on the website
		'read' => true, // All users can read the site. Don't disable this or else things will break!
		'edit' => true, // All users can edit pages on the site (unless they are protected). The foundation of the wiki concept!
		'createpage' => true, // For some reason the software requires separate permissions to create pages and to edit them... not sure why.
		'createtalk' => true, // Create and edit discussion pages
		'viewmyprivateinfo' => true, // These next three settings allow all users to configure their own personal preferences, although in reality this only applies for registered users.
		'editmyprivateinfo' => true,
		'editmyoptions' => true,
	],
	'user' => [
		'move' => false, // By default the software allows any registered user to move (rename) a page. But this can cause disruption if abused, so better to restrict it to a more specific group.
		'move-subpages' => false,
		'move-rootuserpages' => false,
		'move-categorypages' => false,
		'movefile' => false,
		'upload' => false, // The software also allows any registered user to upload files by default, but restricting to autoconfirmed (see below) is safer and prevents spam.
		'reupload' => false,
		'reupload-shared' => false,
		'minoredit' => true, // All registered users can mark changes as a "minor edit"
		'editmyusercss' => true, // Registered accounts can have their own CSS, JS, and JSON stylesheets to customize the interface for themseleves
		'editmyuserjson' => true,
		'editmyuserjs' => true,
		'editmyuserjsredirect' => true,
		'sendemail' => true, // All registered accounts can use the internal user-to-user email system
		'applychangetags' => false, // For some unknown reason the software doesn't consider the application of tags (identifiers/filters) to edits to be an administrative action, but it really is.
		'changetags' => false,
		'editcontentmodel' => false, // Same goes for changing content models of pages
		'viewmywatchlist' => true, // All registered users can have a "watchlist" of pages that they want to be notified about when changes are made to them.
		'editmywatchlist' => true,
	],
	'autoconfirmed' => [
		'autoconfirmed' => true, // Once an account has existed for one week and has made 25 edits, they can bypass some of the anti-spam rate limits...
		'editsemiprotected' => true, // ...As well as edit pages that are "semi-protected"...
		'move' => true, ... // And move pages and upload files
		'upload' => true,
	],
	'bot' => [
		'bot' => true, // This group can be assigned to usernames that are associated with automated scripts used for maintenance purposes to prevent flooding of changelogs, among other things
		'autoconfirmed' => true,
		'editsemiprotected' => true,
		'nominornewtalk' => true,
		'autopatrol' => true,
		'suppressredirect' => true,
		'apihighlimits' => true,
	],
	'sysop' => [
		'block' => true, // Sysops, shorthand for System Operators and generally referred to as Administrators, can block certain users from editing pages if they do so disruptively
		'unblockself' => true, // But admins can also unblock their own accounts if another admin blocks them inappropriately
		'delete' => true, // Admins can also delete pages from public view (but they're not actually truly "deleted" from the database)
		'bigdelete' => false, // Deleting pages with large histories can overwhelm and crash the servers, so it should be handled with care and limited to a higher group
		'deletedhistory' => true, // Deleting a page only hides it from the general public; admins can still view the deleted text and revision history of said pages
		'deletedtext' => true,
		'undelete' => true, // They can also undelete, or restore into public viewing, a previously deleted page
		'editinterface' => false, // By default admins can manage the site-wide stylesheets. But this can be dangerous in the hands of a compromised admin account, so the latest software versions restrict this to a higher group
		'editsitejson' => false,
		'edituserjson' => false,
		'import' => true, // Admins can import pages from other sites running the MediaWiki software, in the form of an XML dump
		'importupload' => true,
		'move-subpages' => true, // Admins have access to some advanced features involving page renames (moves)
		'move-rootuserpages' => true,
		'move-categorypages' => true,
		'movefile' => true,
		'suppressredirect' => true,
		'patrol' => true, // Admins can "patrol", or review, edits made by other users, and all edits made by admins are automatically patrolled by the software
		'autopatrol' => true,
		'protect' => true, // Admins can also protect specific pages from being edited, either by all non-admins, or only from non-autoconfirmed accounts
		'editprotected' => true, // This permission allows admin accounts to edit pages even if they are protected
		'rollback' => true, // "Rollback" reverts all consecutive changes by a specific user to a given page in one click
		'reupload' => true, // Just like page moves, admins also have access to advanced features with uploading files
		'reupload-shared' => true,
		'unwatchedpages' => true, // This is a database report that shows pages which nobody has on their watchlist. It doesn't serve much purpose currently, but was useful in earlier versions of the software
		'ipblock-exempt' => true,
		'blockemail' => true, // In addition to blocking users from editing, admins can also disable the internal email feature for specific users
		'markbotedits' => true, // These are some highly technical permissions that are used internally and only rarely affect the user-facing experience
		'apihighlimits' => true,
		'browsearchive' => true,
		'noratelimit' => true,
		'mergehistory' => false, // While the software allows admins to physically merge the history of two pages by default, this is a typically restricted to a higher group
		'applychangetags' => true,
		'changetags' => true,
		'managechangetags' => true,
		'deletechangetags' => true,
	],
	'bureaucrat' => [
		'userrights' => false, // Bureaucrats are "super admins" of sorts. They can perform many restricted tasks that "regular" admins cannot. However, many installations do not allow bureaucrats to have full access to permissions, despite the software granting them this access by default
		'mergehistory' => true,
		'bigdelete' => true,
		'editcontentmodel' => true,
		'editinterface' => true,
		'editsitecss' => true,
		'editsitejson' => true,
		'editsitejs' => true,
		'editusercss' => true,
		'edituserjson' => true,
		'edituserjs' => true,
		'renameuser' => false, // By default bureaucrats can rename user accounts, but this is typically restricted to a higher group on most installations
	],
	'steward' => [
		'userrights' => true, // Stewards are typically the highest ranking group. They have full access to permissions and access to every part of the interface across the entire site
		'renameuser' => true,
		'siteadmin' => true,
		'hideuser' => true, // Stewards can supress (hide) information and user accounts from all users, including admins, when required
		'suppressrevision' => true,
		'viewsuppressed' => true,
		'suppressionlog' => true,
	],
	'interface-admin' => [],
	'suppress' => [],
];
