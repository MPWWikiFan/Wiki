<?php

use MediaWiki\Actions\ActionEntryPoint;
use MediaWiki\Context\RequestContext;
use MediaWiki\EntryPointEnvironment;
use MediaWiki\MediaWikiServices;

define( 'MW_ENTRY_POINT', 'index' );

// Bail on old versions of PHP, or if composer has not been run yet to install
// dependencies. Using dirname( __FILE__ ) here because __DIR__ is PHP5.3+.
// phpcs:ignore MediaWiki.Usage.DirUsage.FunctionFound
require_once dirname( __FILE__ ) . '/includes/PHPVersionCheck.php';
wfEntryPointCheck( 'html', dirname( $_SERVER['SCRIPT_NAME'] ) );

require __DIR__ . '/includes/WebStart.php';

// Create the entry point object and call run() to handle the request.
( new ActionEntryPoint(
	RequestContext::getMain(),
	new EntryPointEnvironment(),
	// TODO: Maybe create a light-weight services container here instead.
	MediaWikiServices::getInstance()
) )->run();
