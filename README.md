url-shortener
=============
Licensed under the GASC License (http://njs.com.np/license.html) by Nj Subedi.
The license applies to all the files under this repository.


Simple URL Shortening using PHP and XML with Re-captcha verification.
Online Demo:
      http://njs.com.np/addurl.php


This is a simple implementation of URL Shortener service in PHP without using databases. It is a weekend project, so doesn't have many features but it surely can help you understand the algorithms of url shortening.


Here's how it works:

Considering that we need to set up a website, where, if the user requests:

      http://url-shortener-site/_tag

we will redirect the user to a URL indentified by _tag. The symbol (here underscore) can be set up to be different. In this case, the .htaccess file checks if the requests start with _ or not, and if it does, the "url.php" script gets executed, which finds the requested url, grabs the tag after the underscore, then checks to see if the tag already exists in the records. If the tag exists, the user is redirected to the URL saved for the tag, else redirects the user to "addurl.php" so that user will come to know that the tag doesn't exist and can be created.


Users can add their own Tag and URL combination directly at "addurl.php".


Here's how to use the code:

1. Git clone or download and extract all the files and keep them on your server root.
2. Open the "url_shortener_setting.php" file and change the following variable definitions:

    - SITE_BASE
        Must change! Your website or server address with the trailing slash. eg: 'http://yoursite.com/'
        
    - SLASH_EXPLODER
        Must change if you kept the files under a folder.
        Replace it with the path to the folder. eg: '/path/to/your/service/'
        IMPORTANT NOTICE: You should change the .htaccess file to serve the file from this location,
          eg. You will have to change the line           
            RewriteRule /?(^[_])+ /url.php [QSA,L]        
          to           
            RewriteRule /?(^[_])+ /path/to/your/service/url.php [QSA,L]       
        Refer to online resources abou how to configure .htaccess
        
    - DATA_FILE
        No need to change unless you want to rename the XML file used to store the URlS to something else
        
    - TAG_PREPEND
        No need to change unless you want the " _tag " system with something else like " -tag "
        IMPORTANT: You must change the Regex in the .htaccess file
          eg. YOu'll have to change the line 
            RewriteRule /?(^[_])+ /url.php [QSA,L]
          to
            RewriteRule /?(^[-])+ /url.php [QSA,L]   for supporting site-root/-tag 
    
    - RECAPTCHA_PRIVATE and
    - RECAPTCHA_PUBLIC 
      You must change the values of these two to implement ReCaptcha.
      You may want to comment out the code in "addurl.php" that checks the ReCaptcha Verification (NOT RECOMMENDED)
      
      NOTE:Quickly get recaptcha public and private keys here:
            https://www.google.com/recaptcha/admin/create
    
    
  -------------------------------------------
  
  The project is set up to support Localization or Language style modification.
  All the text that are displayed to the user in the web page are stored in a $config Array.
  Modify the values there to change how the site is presented to the users!
  
  
  After successful completion request the "addurl.php" from you browser.
  
  Regards,
  Nj Subedi
        










