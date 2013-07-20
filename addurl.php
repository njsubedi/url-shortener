<?php
/*
	This file comes with Nj Subedi's GASC license. Make sure you are abiding by the licence rules!
	Licence URL: http://njs.com.np/license.html
	
	Project: Simple URL Shortener - PHP and XML
	File: addurl.php
*/

define('URL_SHORTENER', ' ');

require_once('url_shortener_setting.php');

if( isset( $_POST['add']) ){

	require_once('recaptchalib.php');
	$resp = recaptcha_check_answer ( RECAPTCHA_PRIVATE ,
									$_SERVER["REMOTE_ADDR"],
									$_POST["recaptcha_challenge_field"],
									$_POST["recaptcha_response_field"]);

	if (!$resp->is_valid)
	{
		// What happens when the CAPTCHA was entered incorrectly
		$errmsg = $config['error']['recaptcha'];
	}
	else
	{
		$u = ( isset($_POST['url']) && trim($_POST['url']) ) ? $_POST['url'] : NULL;
    
		if( $u )
		{				
			if( substr($u, 0, 7) == 'http://' || substr($u, 0, 8) == 'https://' || substr($u, 0, 6) == 'ftp://' )
			{
				//TODO something useful;
			}else{
				$u = 'http://' . $u ;
			}
			if( isset($_POST['tag']) && trim($_POST['tag']) )
			{
				$t = preg_replace('/[^a-zA-Z0-9]/', '', $_POST['tag']);
			}else{
				$t = 'u'.substr(md5($u . time()), 5, 7);
			}           
			
			$xml = simplexml_load_file( DATA_FILE );
			if ( !$xml ){
				die( $config['error']['data_load']);
			}
			
			$tag = $xml->xpath('//'. $t); 
			
			if( !empty( $tag ) )
			{
				$errmsg = $config['error']['taken']['pre'] . $t . $config['error']['taken']['post'] ;
				$errmsg .= '<a style="text-decoration:none;" href="' . SITE_BASE . TAG_PREPEND .$t.'" target="_blank">';
				$errmsg .= SITE_BASE . TAG_PREPEND .$t.'</a>';
			}
			
			if( !isset($errmsg) ) {
				$xml->addChild($t, urlencode($u));
				$xml->asXML( DATA_FILE );
				$success = $config['message']['success']['pre'];
				
				$success .= '<a style="text-decoration:none;" href="' . SITE_BASE . TAG_PREPEND . $t .'" target="_blank"> ';
				$success .= SITE_BASE . TAG_PREPEND. $t .'</a>.';
				
				$success .= $config['message']['success']['post'];
				
				$success .= '<br /><input type="text" value="' . SITE_BASE . TAG_PREPEND . $t .'" onClick="this.select();" />';
					
				unset( $u );
			}
			
		}
		else{
			$errmsg = $config['error']['no_url'];
		}		
		
	}
}

?><!DOCTYPE html>
<head><title><?php echo $config['page']['title']; ?></title>

<style type="text/css">
	.box { overflow:hidden; clear: both;  padding: 10px; text-align: center; display: block}
	.errorbox { background: #FCC; border: 1px solid #C00; } 
	.successbox { background: #CFC; border: 1px solid #0C0; } 
	.infobox { background: #FFC; border: 1px solid #CC0; } 
</style>
<script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'clean'
 };
 </script>
</head>
<body>
    <div style="width: 60%; padding: 10px; margin: auto; background: #F5F5F5; line-height: 1.5em; clear: both;">
        <h2><?php echo $config['page']['heading']; ?></h2>
        <p>
            <?php echo $config['page']['instruction']; ?>
        <p>
        
        <?php if( isset($errmsg) && $errmsg ){ ?>
            <div class="box errorbox">
                <?php echo $errmsg; ?>
            </div>
        <?php } ?>
        
        <?php if( isset($success) && $success ){ ?>
            <div class="box successbox">
                <?php echo $success; ?>
            </div>
        <?php } ?>
		
        <?php if( isset($_GET['invalid']) && isset($_GET['confirm'])  ){
			if( $_GET['confirm'] == md5( $_GET['invalid'] . ' is invalid.') ) {
				$new = $_GET['invalid'];
			?>
            <div style="box infobox">
                <?php 
                    echo $config['error']['not_found']['pre'];
					echo SITE_BASE . TAG_PREPEND . htmlentities($new);
					echo $config['error']['not_found']['post'];
                ?> 
            </div>
        <?php }
		}
		?>
		
        <form action="addurl.php" method="post">
            <p>
                <b><?php 
					echo $config['form']['tag']['label'];
				?> </b><input type="text" <?php
					if(isset($new)) echo "value=\"".urldecode($new)."\"";
				?> name="tag" size="10" maxlength="20" /> <small><?php
					echo $config['form']['tag']['intro'];
				?></small> <br /><br />
				
                <b><?php echo $config['form']['url']; ?> </b><input type="url" <?php if(isset($u)) echo "value=\"".urldecode($u)."\""; ?> name="url" size="50"/> <br /><br />
				<script type="text/javascript" src="http://www.google.com/recaptcha/api/challenge?k=<?php echo RECAPTCHA_PUBLIC; ?>">
				</script>
				<noscript>
				   <iframe src="http://www.google.com/recaptcha/api/noscript?k=<?php echo RECAPTCHA_PUBLIC; ?>"
					   height="300" width="500" frameborder="0"></iframe><br>
				   <textarea name="recaptcha_challenge_field" rows="3" cols="40">
				   </textarea>
				   <input type="hidden" name="recaptcha_response_field"
					   value="manual_challenge">
				</noscript>

                <br /><input type="submit" name="add" value="<?php echo $config['form']['submit']; ?>" />
            </p>
        </form>
		<p>
			<small>
				<b><?php echo $config['page']['footnote']['topic']; ?>: </b>
				<?php echo $config['page']['footnote']['text']; ?>
			</small>
		</p>
    </div>
    <div style="width: 60%; padding: 10px; margin: auto; background: #E5E5E5; line-height: 1.5em; clear: both;">
		<small>
			<?php echo $config['page']['footer']; ?>
		</small>
	</div>
</body>
