<?php

session_start();

if($_POST["captcha"]==$_SESSION["captcha_code"]){

// Step 1 - Enter your email address below.
$to = 'leslie.obour23@gmail.com';


// Step 2 - Enable if the server requires SMTP authentication. (true/false)
$enablePHPMailer = false;

// Enter your subject here!
    $subject ="Your Enquiry with EXPRESEO";
	
	
	
	if(!empty($_POST['email'])) {
		
		
		
	$name = strip_tags(trim($_POST["name"]));
	$lname = strip_tags(trim($_POST["lname"]));
    $email = strip_tags(trim($_POST["email"]));
	$phone = strip_tags(trim($_POST["phone"]));
    $website = strip_tags(trim($_POST["website"]));
  //  $interest = strip_tags(trim($_POST["interest"]));
	$comments = strip_tags(trim($_POST["comments"]));

	
	
	
	$finalname = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
	$finallname = htmlspecialchars($lname, ENT_QUOTES, 'UTF-8');
    $finalemail = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
	$finalphone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
    $finalwebsite = htmlspecialchars($website, ENT_QUOTES, 'UTF-8');
  //  $finalinterest = htmlspecialchars($interest, ENT_QUOTES, 'UTF-8');
	$finalcomments = htmlspecialchars($comments, ENT_QUOTES, 'UTF-8');

	
	$fields = array(
		0 => array(
			'text' => 'First Name',
			'val' => $_POST['name']
		),
		1 => array(
			'text' => 'Last Name',
			'val' => $_POST['lname']
		),
		2 => array(
			'text' => 'Email',
			'val' => $_POST['email']
		),
		3 => array(
			'text' => 'Phone',
			'val' => $_POST['phone']
		),
		4 => array(
			'text' => 'Website',
			'val' => $_POST['website']
		),
	    5 => array(
			'text' => 'Comments',
			'val' => $_POST['comments']
		)
		
	);

	$message = "";

	foreach($fields as $field) {
		$message .= $field['text'].": " . htmlspecialchars($field['val'], ENT_QUOTES) . "<br>\n";
	}
	
		
	$message = '
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>EMAIL TEMPLATE</title>
        <style type="text/css">

            /* ---------- RESET STYLES ---------- */

            body{margin:0; padding:0;}

            /* ---------- TEMPLATE STYLES ---------- */

            .bodyTable{
			    position:relative;
				display:block;
				padding:0 30px;
				margin:30px auto;
				height:auto !important; 
				max-width:600px;
                width:100%;	
                -webkit-box-sizing:border-box;
	               -moz-box-sizing:border-box; 
	                    box-sizing:border-box;				
            }

            /* ---------- BODY STYLES ---------- */

            .bodyContent{
			    position:relative;
				display:block;
                background-color:#fff;
                border:1px solid #ddd;
				padding:30px;
				margin:0;
				height:auto!important; 
				max-width:600px;
				width:100%;
				line-height:20px;
				word-wrap:break-word;
                -webkit-box-sizing:border-box;
	               -moz-box-sizing:border-box; 
	                    box-sizing:border-box;				
            }
			
			.bodyContent h1{
                color:#272e38;
                font-family:Helvetica;
                font-size:22px;
				font-style:normal;
				font-weight:normal;
				padding:0;
				margin:20px 0;
            }
			
            .bodyContent h6{
                color:#272e38;
                font-family:Helvetica;
                font-size:14px;
				font-style:normal;
				font-weight:normal;
				padding:0;
				margin:0 0 20px 0;
            }
			
			 .bodyContent h3{
                
               font-family:"Trebuchet MS", Arial, Helvetica;
               
            }
			
			  .bodyContent h4{
                color:#272e38;
               font-family:"Trebuchet MS", Arial, Helvetica;
                font-size:16px;
				font-style:normal;
				font-weight:normal;
				padding:0;
				margin:0 0 20px 0;
            }
			
            .bodyContent a:link, .bodyContent a:visited{
                /*@editable*/ color:#3597c2;
                /*@editable*/ font-family:Helvetica;
                /*@editable*/ font-size:14px;
                /*@editable*/ font-weight:normal;
                /*@editable*/ text-decoration:none;
            }
			
        </style>
    </head>
    <body>
        <div class="bodyTable">
			<div class="bodyContent">
                <h3 style="font-family: Tahoma, Helvetica;">Your Enquiry with EXPRESEO</h3>
				<h4 style="font-weight: normal; font-size:14px; font-family: Tahoma, Helvetica;"><strong>Fist Name:</strong> '.$finalname.'</h4> 
				<h4 style="font-weight: normal; font-size:14px; font-family: Tahoma, Helvetica;"><strong>Last Name:</strong> '.$finallname.'</h4> 
				<h4 style="font-weight: normal; font-size:14px; font-family: Tahoma, Helvetica;"><strong>Email:</strong> '.$finalemail.'</h4> 
				<h4 style="font-weight: normal; font-size:14px; font-family: Tahoma, Helvetica;"><strong>Phone:</strong> '.$finalphone.'</h4>
				<h4 style="font-weight: normal; font-size:14px; font-family: Tahoma, Helvetica;"><strong>Website:</strong> '.$finalwebsite.'</h4> 
				<h4 style="font-weight: normal; font-size:14px; font-family: Tahoma, Helvetica;"><strong>Comments:</strong> '.$finalcomments.'</h4>
			    <h5 style="font-weight: normal; font-family:Tahoma, Helvetica;">Website: www.expreseo.com | Phone: 908.547.0770</h5>

            </div>
        </div>
    </body>
</html>';



	
		
		$headers = '';
		$headers .= 'From: ' . $name . ' <' . $email . '>' . "\r\n";
		$headers .= "Reply-To: " .  $email . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		

		 if (mail($to, $subject, $message, $headers)) 
		
		      {
			 $showemailsent2 = 'mail-status2';
			 echo "<script type=\"text/javascript\">document.getElementById('".$showemailsent2."').style.display = 'block';</script>";
			
			 print "<p class='enquirysuccess'>Success! We have received your Enquiry.</p>";
			 $showcaptchastatus1 = 'contact_captchaError';
	         echo "<script type=\"text/javascript\">document.getElementById('".$showcaptchastatus1."').style.display = 'none';</script>";
             echo "<script type=\"text/javascript\">$(document).ready(function(){ $('#name').val(''); $('#lname').val(''); $('#email').val(''); $('#phone').val(''); $('#website').val(''); $('#comments').val(''); });</script>";
			 echo "<script>setTimeout(function() { $('#mail-status2').fadeOut('fast');}, 9000); // <-- time in milliseconds </script>";
		      } 
	         else {
			 print "<div class='alert alert-danger'><strong>Error!</strong> There was an error sending your message.</div>";
			 }
	
	      }
      
	 }
	   
  // else {
    //  $showcaptchastatus2 = 'contact_captchaError';
	  //echo "<script type=\"text/javascript\">document.getElementById('".$showcaptchastatus2."').style.display = 'block';</script>";
