<?php
/*
  This file comes with Nj Subedi's GASC license. Make sure you are abiding by the licence rules!
	Licence URL: http://njs.com.np/license.html
	Github REPO: http://www.github.com/njsubedi/url-shortener

	Project: Simple वेव ठेगाना छोट्याउने सेवा - PHP and XML
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
define('RECAPTCHA_PUBLIC', 'REPLACE THIS WITH YOUR OWN PUBLIC KEY');


$config =
	array (
		'page' => array(
			'title' => 'PHP वेव ठेगाना छोट्याउने सेवा - Nj Subedi',
			'heading' => 'वेव ठेगाना छोट्याउने सेवा',
			
			'instruction' => 'Add a tag and URL. Visit <em><b>'. SITE_BASE . TAG_PREPEND .'tag</b></em> to go to the URL.',
			
			'footnote' => array(
				'topic' => 'Privacy Policy',
				
				'text' => 
				'All the urls you entered will be stored in my database. I usually don\'t bother to see that huge list of URLS but it is accessible to me any time, and I may use the data for any purpose.',
			), 
			
			'footer' =>
			'Source Code: <a href="http://www.github.com/njsubedi/url-shortener/" title="Nj Subedi: URL Shorterer- Github"><img src="a/GitHub_Logo_small.png" alt="वेव ठेगाना छोट्याउने सेवा by Nj Subedi- GitHub" /></a>. Please report bugs and issues.'
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


$config_ne =
	array (
		'page' => array(
			'title' => 'PHP वेव ठेगाना छोट्याउने सेवा - एन् जे सुबेदी',
			'heading' => 'वेव ठेगाना छोट्याउने सेवा',
			
			'instruction' => 'ट्याग हाल्नुहोस् र <em><b>'. SITE_BASE . TAG_PREPEND .'tag</b></em> मा जानुहोस् ।',
			
			'footnote' => array(
				'topic' => 'गोपनीयता नीति',
				
				'text' => 
				'कृपया सावधान हुनुहोला । यस फर्मबाट पठाइएका हरेक वेव ठेगानाहरू मैले हेर्न मिल्ने गरि राखिने छन् । साथै, ती सबैमा मेरो पूर्ण अधिकार हुनेछ ।',
			), 
			
			'footer' =>
			'यस सेवाको सम्पुर्ण स्रोत कोड (HTML, PHP तथा XML) <a href="http://www.github.com/njsubedi/url-shortener/" title="PHP वेव ठेगाना छोट्याउने सेवा - एन् जे सुबेदी - गीटहब"><img src="a/GitHub_Logo_small.png" alt="एन् जे सुबेदीले बनाउनु भएको वेव ठेगाना छोट्याउने सेवा" /></a> मा उपलब्ध छ । कृपया सुझाव तथा समस्याहरू औँल्यानुहोला । '
		),
		
		'message' => array(
			'success' =>
				array(
					'pre' => 'बधाई छ, तपाईँ अब ',
					'post' => ' मा जान वा यस ठेगानालाई सेयर गर्न सक्नुहुनेछ ।',
				)
		),
		
		'form' => array(
			'url' => 'लामो ठेगाना',
			
			'tag' => array(
				'label' => 'ट्याग',
				'intro' => 'बैकल्पिक (कृपया सम्झन सकिने गरि छोटो राख्नुहोस्) ',
			),
			
			'submit' => 'छोट्याउनुहोस्',
		),
		
		'error' => array(
			'data_load' => 'मेरो केही गल्तिले गर्दा जरुरी फाईल लोड गर्न सकिएन । कृपया पु:न प्रयास गर्नुहोस् । :(',
			
			'taken' =>
				array(
					'pre' => 'माफ गर्नुहोला, ',
					'post' => ' ट्याग पहिल्यै प्रयोग भै\'सकेको छ ! एक पटक हेर्नुहोस् !'
				),
			
			'recaptcha' => 'स्क्रिनमा देखाईएको कोड र तपाईँले अघि हाल्नुभएको कोड मिलेन । कृपया पु:न प्रयास गर्नुहोस् ।',
			
			'no_url' => 'कतै तपाईँले वेव ठेगाना दिन त बिर्सिनुभएन ?',
			
			'not_found' =>
				array(
					'pre' => '<small>तपाईले खोज्नुभएको ट्याग ',
					'post' => '</small> उपलब्ध छैन । तपाईँ आँफै यो ट्याग हालेर वेव ठेगाना छोट्याउन सक्नुहुनेछ ।'
				)
		)
	)
;
