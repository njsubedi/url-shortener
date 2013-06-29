<?php
/*
  This file comes with Nj Subedi's GASC license. Make sure you are abiding by the licence rules!
	Licence URL: http://njs.com.np/license.html
	Github REPO: http://www.github.com/njsubedi/url-shortener
	
	Project: Simple URL Shortener - PHP and XML
	File: addurl.php
  Description:
    This fiel is never requested directly by the user.
    The .htaccess file will tell the server to serve this file when the user sends appropriate request.
    See the Readme file for more info.
    Directly requesting this file from the browser will create unexpected results.
*/

define('URL_SHORTENER', ' ');

require_once('url_shortener_setting.php');
 
    $url = trim($_SERVER['REQUEST_URI']);
    
        $c = explode( SLASH_EXPLODER , $url);
        $target = $c[1];
        $target = str_replace( TAG_PREPEND, '', $target);
		$target = preg_replace('/[^a-zA-Z0-9]/', '', $target);
		
        $xml = simplexml_load_file( DATA_FILE );
        if ( !$xml )
		{
            die( $config['error']['data_load']);
        }
		
        $tag = $xml->xpath('//'. $target); 
		
		if( !empty( $tag ) )
		{
			//TODO: Keep track of invalid request things!
                header("Location: " . urldecode($tag[0]));
                exit;
        }
		else
		{
			//TODO: Keep track of urls visited by users!
		   header("Location: addurl.php?invalid=$target&confirm=" . md5("$target is invalid."));
		   exit;
		}
?>
