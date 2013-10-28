<?php
/*
*	Parser Hook for MediaWiki Legend Tag
*	by Michael Kaufmann (Michael McCouman jr.)
*	2012(c) Copyright
*/

if (!defined('MEDIAWIKI')) die();

$wgExtensionCredits['specialpage'][] = array(
	'name' => 'LegendTag',
	'author' => array( 'Michael McCouman jr.' ),
	'description' => 'Erzeugt den Tag <nowiki><legend></nowiki> und macht ihn in der MediaWiki-Software anwendbar',
	'version' => '1.0',
);
 
$wgHooks['ParserFirstCallInit'][] = 'eflegendSetup';
 
function eflegendSetup( &$parser ) {
	$parser->setHook( 'legend', 'eflegendRender' );
       return true;
}
function eflegendRender( $text, $args, $parser, $frame ) {
	$output = $parser->recursiveTagParse( $text, $frame );
	return '<legend>' 
	. $output . '</legend>';
}
