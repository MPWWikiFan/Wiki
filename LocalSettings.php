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
$wgBlockCIDRLimit = [
	'IPv4' => 16,
	'IPv6' => 19,
];
$wgBlockDisablesLogin = false;
$wgDeleteRevisionsLimit = 5000;
$wgEnableMultiBlocks = false;
$wgCookieSetOnAutoblock = false; // Let's not do this due to potential for extreme collateral damage
$wgCookieSetOnIpBlock = false; // Same as above
$wgRestrictionTypes = [ 'create', 'edit', 'move', 'upload' ];
$wgRestrictionLevels = [ '', 'autoconfirmed', 'sysop' ];
$wgNamespaceProtection = [];
$wgCascadingRestrictionLevels = [ 'sysop', ];
$wgSemiprotectedRestrictionLevels ['autoconfirmed'];

// The following settings define and enable autopromotion, which is what controls the functionality of the "autoconfirmed" user group below

$wgAutopromote = [
	'autoconfirmed' => [ '&',
		[ APCOND_EDITCOUNT, null],
		[ APCOND_AGE, null ],
	],
];
$wgAutopromoteOnce = [
	'onEdit' => [],
];
$wgAutoConfirmAge = 86400*7; // Accounts will be considered "autoconfirmed" after existing for 1 week...
$wgAutoConfirmCount = 25; // ...and having made 25 total edits
$wgAutopromoteOnceLogInRC = false;

// Group Permissions. This is the core of what controls the user-facing aspects of site functionality!

$wgGroupPermissions => [
	'*' => [
		'createaccount' => true, // All users can create new accounts on the website
		'read' => true, // All users can read the site. Don't disable this or else things will break!
		'edit' => true, // All users can edit pages on the site (unless they are protected). The foundation of the wiki concept!
		'createpage' => true,
		'createtalk' => true,
		'viewmyprivateinfo' => true,
		'editmyprivateinfo' => true,
		'editmyoptions' => true,
	],
	'user' => [
		'move' => false,
		'move-subpages' => false,
		'move-rootuserpages' => false,
		'move-categorypages' => false,
		'movefile' => false,
		'upload' => false,
		'reupload' => false,
		'reupload-shared' => false,
		'minoredit' => true,
		'editmyusercss' => true,
		'editmyuserjson' => true,
		'editmyuserjs' => true,
		'editmyuserjsredirect' => true,
		'sendemail' => true,
		'applychangetags' => false,
		'changetags' => false,
		'editcontentmodel' => false,
		'viewmywatchlist' => true,
		'editmywatchlist' => true,
	],
	'autoconfirmed' => [
		'autoconfirmed' => true, // Once an account has existed for one week and has made 25 edits, they can bypass some of the anti-spam rate limits...
		'editsemiprotected' => true, // ...As well as edit pages that are "semi-protected"...
		'move' => true,  // ...And move pages and upload files
		'upload' => true,
	],
	'bot' => [
		'bot' => true, // This group can be assigned to usernames that are associated with automated scripts used for maintenance purposes
		'autoconfirmed' => true,
		'editsemiprotected' => true,
		'nominornewtalk' => true,
		'autopatrol' => true,
		'suppressredirect' => true,
		'apihighlimits' => true,
	],
	'sysop' => [
		'block' => true, // Sysops, shorthand for System Operators and generally referred to as Administrators, can block certain users from editing pages if they do so disruptively
		'unblockself' => true,
		'delete' => true, // Admins can also delete pages from public view (but they're not actually truly "deleted" from the database)
		'bigdelete' => false,
		'deletedhistory' => true, // Deleting a page only hides it from the general public; admins can still view the deleted text and revision history of said pages
		'deletedtext' => true,
		'undelete' => true,
		'editinterface' => false,
		'editsitejson' => false,
		'edituserjson' => false,
		'import' => true, // Admins can import pages from other sites running the MediaWiki software, in the form of an XML dump
		'importupload' => true,
		'move-subpages' => true, // Admins have access to some advanced features involving page renames (moves)
		'move-rootuserpages' => true,
		'move-categorypages' => true,
		'movefile' => true,
		'suppressredirect' => true,
		'patrol' => true,
		'autopatrol' => true,
		'protect' => true, // Admins can also protect specific pages from being edited, either by all non-admins, or only from non-autoconfirmed accounts
		'editprotected' => true,
		'rollback' => true, // "Rollback" reverts all consecutive changes by a specific user to a given page in one click
		'reupload' => true, // Just like page moves, admins also have access to advanced features with uploading files
		'reupload-shared' => true,
		'unwatchedpages' => true,
		'ipblock-exempt' => true,
		'blockemail' => true,
		'markbotedits' => true,
		'apihighlimits' => true,
		'browsearchive' => true,
		'noratelimit' => true,
		'mergehistory' => false,
		'applychangetags' => true,
		'changetags' => true,
		'managechangetags' => true,
		'deletechangetags' => true,
	],
	'bureaucrat' => [
		'userrights' => false, // Bureaucrats are "super admins" of sorts. They can perform a few tasks that admins cannot, and are responsible for adding/removing admin status
		'renameuser' => false,
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

	// The following groups are used for "unbundling", where a specific set of administrative permissions can be granted to users who are not full administrators.

	'confirmed' => [
		'autoconfirmed' => true,
		'editsemiprotected' => true,
		'move' => true,
		'upload' => true,
	],
	'patroller' => [
		'autopatrol' => true,
		'patrol' => true,
	],
	'uploader' => [
		'reupload' => true,
		'reupload-shared' => true,
	],
	'page-mover' => [
		'move-subpages' => true,
		'move-rootuserpages' => true,
		'move-categorypages' => true,
		'movefile' => true,
		'suppressredirect' => true,
	],
	'rollbacker' => [
		'rollback' => true,
	],
	'importer' => [
		'import' => true,
		'importupload' => true,
	],
	'flooder' => [
		'bot' => true,
	],
];

// Admins can add or remove any of the unbundled groups. Bureaucrats can add or remove admins and bot accounts. Only stewards can add/remove bureaucrats
// The "flooder" flag allows users to mark their own accounts as bots to avoid flooding recent changes or watchlists when performing a batch task (such as importing content from elsewhere)
// Any user can remove themseleves (but only themselves) from any group they happen to be in

$wgAddGroups['sysop'] = ['confirmed', 'patroller', 'uploader', 'page-mover', 'rollbacker', 'importer', 'flooder'];
$wgAddGroups['bureaucrat'] = ['sysop', 'bot'];
$wgRemoveGroups['sysop'] = ['confirmed', 'patroller', 'uploader', 'page-mover', 'rollbacker', 'importer', 'flooder'];
$wgRemoveGroups['bureaucrat'] = ['sysop', 'bot'];
$wgGroupsAddtoSelf['importer'] = ['flooder'];
$wgGroupsRemoveFromSelf = [ '*' => true ];
$wgImplicitGroups = [ '*', 'user', 'autoconfirmed' ]; // These groups cannot be managed by admins and so are hidden from the configuration pages

// This block of code prevents common spam patterns (generally stuff involving pornography, phishing scams, or other fake clickbait things) from being saved to the site

$wgSpamRegex = ["/".                        
                "s-e-x|zoofilia|sexyongpin|grusskarte|geburtstagskarten|".
                "(animal|cam|chat|dog|hardcore|lesbian|live|online|voyeur)sex|sex(cam|chat)|adult(chat|live)|".
                "adult(porn|video|web.)|(hardcore|teen|xxx)porn|".
                "live(girl|nude|video)|camgirl|".
                "spycam|casino-online|online-casino|kontaktlinsen|cheapest-phone|".
                "laser-eye|eye-laser|fuelcellmarket|lasikclinic|cragrats|parishilton|".
                "paris-(hilton|tape)|2large|fuel(ing)?-dispenser|huojia|".
                "jinxinghj|telemati[ck]sone|a-mortgage|diamondabrasives|".
                "reuterbrook|sex-(with|plugin|zone)|lazy-stars|eblja|liuhecai|".
                "buy-viagra|-cialis|-levitra|boy-and-girl-kissing|".
                "dirare\.com|".
                "overflow\s*:\s*auto|".
                "height\s*:\s*[0-4]px|".
                "==<center>\[|".
                "\<\s*a\s*href|".
                "display\s*:\s*none".
                "/i"];

// MediaWiki maintains a set of logs that document various technical actions taken on the site. This array defines the default types of logging

$wgLogTypes = [
	'',
	'block',
	'protect',
	'rights',
	'delete',
	'upload',
	'move',
	'import',
	'interwiki',
	'patrol',
	'merge',
	'suppress',
	'tag',
	'managetags',
	'contentmodel',
	'renameuser',
];
$wgPageCreationLog = false; // Newer versions of the software have added a separate log for page creations, which is rather unnecessary and just creates clutter

// Miscellaneous settings

$wgEnableEditRecovery = true;
$wgEnableProtectionIndicators = true;
$wgPingback = true;
$wgShowLogoutConfirmation = true;
