<?php

// Set email variables
$email_to = 'deiratany.1@osu.edu';
$email_subject = 'OAS Website Form submission';

// Set required fields
$required_fields = array('fullname','email','comment');

// set error messages
$error_messages = array(
	'fullname' => 'Please enter a Name to proceed.',
	'email' => 'Please enter a valid Email Address to continue.',
	'comment' => 'Please enter your Message to continue.'
);

// Set form status
$form_complete = FALSE;

// configure validation array
$validation = array();

// check form submittal
if(!empty($_POST)) {
	// Sanitise POST array
	foreach($_POST as $key => $value) $_POST[$key] = remove_email_injection(trim($value));
	
	// Loop into required fields and make sure they match our needs
	foreach($required_fields as $field) {		
		// the field has been submitted?
		if(!array_key_exists($field, $_POST)) array_push($validation, $field);
		
		// check there is information in the field?
		if($_POST[$field] == '') array_push($validation, $field);
		
		// validate the email address supplied
		if($field == 'email') if(!validate_email_address($_POST[$field])) array_push($validation, $field);
	}
	
	// basic validation result
	if(count($validation) == 0) {
		// Prepare our content string
		$email_content = 'New Website Comment: ' . "\n\n";
		
		// simple email content
		foreach($_POST as $key => $value) {
			if($key != 'submit') $email_content .= $key . ': ' . $value . "\n";
		}
		
		// if validation passed ok then send the email
		mail($email_to, $email_subject, $email_content);
		
		// Update form switch
		$form_complete = TRUE;
	}
}

function validate_email_address($email = FALSE) {
	return (preg_match('/^[^@\s]+@([-a-z0-9]+\.)+[a-z]{2,}$/i', $email))? TRUE : FALSE;
}

function remove_email_injection($field = FALSE) {
   return (str_ireplace(array("\r", "\n", "%0a", "%0d", "Content-Type:", "bcc:","to:","cc:"), '', $field));
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="OAS Contact_Us page">
    <meta name="author" content="Feras Deiratany">
    
	<!-- form js--->
 	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/mootools/1.3.0/mootools-yui-compressed.js"></script>
    <script type="text/javascript" src="js/validation.js"></script>
    <script type="text/javascript">
		var nameError = 'Please enter a Name to proceed.';
		var emailError = 'Please enter a valid Email Address to continue.';
		var commentError = 'Please enter your Message to continue.';
	</script>
	
	<script src="http://use.edgefonts.net/source-sans-pro:n6:default;alex-brush:n4:default;sansita-one:n4:default.js" type="text/javascript"></script>


	
	
    <title>Contact Us</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<!-- contactform style sheet -->
	<link href="css/contactForm.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    body {
      padding-bottom: 40px;
      color: #5A5A5A;
	  background-image:url(img/logo.png);
    }
	</style>
  </head>
  <body onload="MM_preloadImages('img/png/x.png')">
  <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">OAS at OSU</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="gallery.html">Gallery</a></li>
            <li><a href="events.html">Events</a></li>
            <li class="active"><a href="Contact_Us.php">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="https://www.facebook.com/OASatOSU" target="_blank" title= "Facebook"><img src="img/png/16-facebook.png" ></a></li>
            <li><a href="https://www.twitter.com/OASatOSU" target="_blank" title= "Twitter"><img src="img/png/16-twitter.png" ></a></li>
            <li><a href="https://www.instagram.com/OASatOSU" target="_blank" title= "Instagram"><img src="img/png/16-instagram.png" ></a></li>
            <li><a href="Contact_Us.php" title= "Mailing list"><img src="img/png/16-email.png" ></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav><!--/.end of navbar-->
        
        <!-- grid layout-->	
      <div class="row">
      <div class="col-md-12"><br><br><br><br><br><br></div>
      </div>
      
      
      <div class="row">
        <div class="col-md-2"></div><!--./left side margin-->
        <!--main body area-->
        <div class="col-md-8 col-xs-12">
        
          <!--form -->
          <div id= "formWrap">
          <h2>We Appriciate your Feedback</h2>
          <div class="well">
        <p>Please feel free to contact us with any questions or concerns.<br />
If you would like to be added to our mailing list, just fill out the following form with your name and email and type "add to mailing list" in the message section.<br />
If you have ideas for events, send us a message below or email any of the board members <a href="about.html#board">directly</a><br />
</p>
      </div>
            <div id="form">
                <form action="Contact_Us.php" method="post" id="comments_form">
                <div class="row">
                <div class="label1">Your Name</div>
                <div class="input">
                <input type="text" id="fullname" class="detail" name="fullname" value="" /></div>
                <div class="context">e.g. John Smith</div>
                </div> 
                
                <div class="row">
                <div class="label1">Your Email Address</div>
                <div class="input">
                <input type="text" id="email" class="detail" name="email" value="" /></div>
                <div class="context">We will not share your email with anyone</div>
                </div> 
                
                <div class="row">
                <div class="label1">Your Message</div>
                <div class="input2">
                <textarea id="comment" name="comment" class="mess"></textarea>        </div> 
                </div>
                
                <div class="submit">
                <input type="submit" id="submit" value="Send Message" />
                </div>
                </form>
                
                    
            </div>
          </div><!--./ form-->
		</div><!--./main body area-->
    <div class="col-md-2"></div> <!-- ./right side margin-->
  </div><!--./row-->

	<hr class="featurette-divider">
	<div class="footer">
      <div class="container">
      	<p class="pull-right"><a href="#">Back to top</a></p>
        <p><strong>Copyright © 2014 OAS at OSU. All rights reserved &middot;</strong></p>
      </div>
    </div>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 
   </body>
</html>