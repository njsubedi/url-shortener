<?php
/*
  This file comes with Nj Subedi's GASC license. Make sure you are abiding by the licence rules!
	Licence URL: http://njs.com.np/license.html
	Github REPO: http://www.github.com/njsubedi/url-shortener

	Project: Simple URL Shortener - PHP and XML
	File: url_shortener_settings.php

*/

/*
You MUST modify this file for your servive to work as expected!	
Quickly get recaptcha public and private keys here:

	https://www.google.com/recaptcha/admin/create
*/

if( !defined('URL_SHORTENER'))
{
	echo "Sorry, the file contents cannot be displayed to you!')";
	exit;
}

define('SITE_BASE', 'http://njs.com.np/');
define('SLASH_EXPLODER', '/');
define('DATA_FILE', 'urls.xml');
define('TAG_PREPEND', '_');
define('RECAPTCHA_PRIVATE', 'REPLACE THIS WITH YOUR OWN PRIVATE KEY'); // CHANGE THIS!!!
define('RECAPTCHA_PUBLIC', '6Lf4fuMSAAAAAFt7Nqr54bgB7fsI_UDnIVULjus8');


$config =
	array (
		'page' => array(
			'title' => 'PHP URL Shortener - Nj Subedi',
			'heading' => 'URL Shortener',
			
			'instruction' => 'Add a tag and URL. Visit <em><b>'. SITE_BASE . TAG_PREPEND .'tag</b></em> to go to the URL.',
			
			'footnote' => array(
				'topic' => 'Privacy Policy',
				
				'text' => 
				'All the urls you entered will be stored in my database. I usually don\'t bother to see that huge list of URLS but it is accessible to me any time, and I may use the data for any purpose.',
			), 
			
			'footer' =>
			'Source Code: <a href="http://www.github.com/njsubedi/url-shortener/" title="Nj Subedi: URL Shorterer- Github"><img src="a/GitHub_Logo_small.png" alt="URL Shortener by Nj Subedi- GitHub" /></a>. Please report bugs and issues.'
		),
		
		'message' => array(
			'success' =>
				array(
					'pre' => 'Congrats! You can go to ',
					'post' => ' or share the link.',
				)
		),
		
		'form' => array(
			'url' => 'URL',
			
			'tag' => array(
				'label' => 'TAG',
				'intro' => 'Optional. (Try to keep it short.)',
			),
			
			'submit' => 'Shorten URL',
		),
		
		'error' => array(
			'data_load' => 'Oops! The data file could not be loaded! My fault. :(',
			
			'taken' =>
				array(
					'pre' => 'Sorry, the tag ',
					'post' => ' is already taken! See where it takes you!'
				),
			
			'recaptcha' => 'The recaptcha code you entered was incorrect.',
			
			'no_url' => 'You must have forgotten to enter the URL.',
			
			'not_found' =>
				array(
					'pre' => '<small>The tag ',
					'post' => '</small> does not point to any valid link. You want to add it.'
				)
		)
	)
;
