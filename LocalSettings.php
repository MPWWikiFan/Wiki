<?php

//If MediaWiki is not defined, terminate the code to prevent unauthorized access. Then, invoke the config registry to retreive specific settings. Finally, define the name of the website.

if ( !defined( 'MEDIAWIKI' ) ) {
	echo "This file is part of MediaWiki and is not a valid entry point\n";
	die( 1 );
}
$wgConfigRegistry = [
	'main' => 'GlobalVarConfig::newInstance',
];
$wgSitename = 'MyWiki';
