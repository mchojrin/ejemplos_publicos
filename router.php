<?php

$regEx = '/^\/game\/([0-9]+)\/([_0-9a-zA-Z]+)(\/)?/';

preg_match( $regEx, $_SERVER['REQUEST_URI'], $matches );

error_log( 'RU: '.$_SERVER['REQUEST_URI'].', RE: '.$regEx );

if ( !empty( $matches) ) {
	
	$_GET = [
		'gameId' => $matches[1],
		'playerName' => $matches[2],
	];

	error_log( 'Matches: '.str_replace(PHP_EOL, '', print_r($matches, TRUE) ) );
	require 'index.php';
} else {
	http_response_code(404);
}
