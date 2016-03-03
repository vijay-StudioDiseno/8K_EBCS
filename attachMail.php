<?php
if(isset($_POST['email'])) {
//$to = "careers@altechstar.com";
//$fromEmail = "careers@altechstar.com"; 

$to = "varun@studiodiseno.com";
$fromEmail = "varun@studiodiseno.com"; 
$subject = "Career Form - Altech star";

function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');      
    }
 $email_message = "career application details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

 

$tmpName = $_FILES['attachment']['tmp_name']; 
$fileType = $_FILES['attachment']['type']; 
$fileName = $_FILES['attachment']['name']; 

	//Sanitize input data using PHP filter_var().
	$user_Name        = filter_var($_POST["first_name"], FILTER_SANITIZE_STRING);
	$user_Email       = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
	$user_Phone       = filter_var($_POST["telephone"], FILTER_SANITIZE_STRING);
	$user_Message     = filter_var($_POST["comments"], FILTER_SANITIZE_STRING);

$headers = 'From: '.$fromEmail."\r\n".
'Reply-To: '.$fromEmail."\r\n" .
'X-Mailer: PHP/' . phpversion();
if (file($tmpName)) { 
 
  $file = fopen($tmpName,"rb");
  $data = fread($file,filesize($tmpName));
  fclose($file);
  
  $randomVal = md5(time());
  $mimeBoundary = "==Multipart_Boundary_x{$randomVal}x";
  $headers .= "\nMIME-Version: 1.0\n";
  $headers .= "Content-Type: multipart/mixed;\n" ;
  $headers .= " boundary=\"{$mimeBoundary}\"";
  $message = "This is a multi-part message in MIME format.\n\n" . "--{$mimeBoundary}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n";
  $message . "\n\n"; 
	 $first_name = $_POST['first_name']; // required
   $last_name = $_POST['last_name']; // required
   $email_from = $_POST['email']; // required
   $telephone = $_POST['telephone']; // required
   $comments = $_POST['comments']; // required  
 	$message .= "First Name : ".clean_string($first_name)."\n \n";
    $message .= "Last Name : ".clean_string($last_name)."\n \n";
	$message .= "Telephone: ".clean_string($telephone)."\n \n";
	$message .= "Email : ".clean_string($email_from)."\n \n";
    $message .= "COMMENTS : ".clean_string($comments)."\n \n"; 
	
	$data = chunk_split(base64_encode($data)); 
	$message .= "--{$mimeBoundary}\n" . "Content-Type: {$fileType};\n" . " name=\"{$fileName}\"\n" . "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n" . "--{$mimeBoundary}--\n"; 
} 

$flgchk = mail ("$to", "$subject", "$message", "$headers"); 
//@mail($email_to, $email_subject, $message, $headers); 

if($flgchk){
	//echo "A email has been sent to: $to";
}else{
	echo "Error in Email sending";
}

//proceed with PHP email.
	$headers2 = 'From: '.$to_Email.'' . "\r\n" .
	'Reply-To: '.$to_Email.'' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();
	$sentMail = @mail($user_Email, $subject, 'Hi '.$first_name .','."\n"."\n".' Thank you for your application and your interest in our company. Your message is very important to us, we will return your request as soon as we can ...', $headers2);

?>
<!-- include your own success html here -->
Thank you for contacting us. We will be in touch with you very soon.
<p><a href="http://www.altechstar.com/">Back to the site</a></p>
<?php } ?>