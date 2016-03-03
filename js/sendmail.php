<?php
ob_start();
   require("class.phpmailer.php");
    $name=$_POST['name'];//echo "<hr>";
	 $email=$_POST['email'];
	 $jobcode=$_POST['jobcode'];
	 $note1=$_POST['note1'];
	$target_path = "uploads/";

	$target_path = $target_path . basename( $_FILES['file']['name']); 
		
	$filepath=move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
				
	echo $target_path;//echo "<hr>";
	//echo $file=$_POST['file'];exit;
	
	$mail = new PHPMailer();
	
		
	$mail->From="careers@altechstar.com";
	$mail->FromName="$name";
	$mail->Sender="careers@altechstar.com";
	//$mail->AddReplyTo("noreply@samba.com", "smtp.gmail.com");
	
	$mail->AddAddress("careers@altechstar.com"); //$admin_mailId
	//$mail->AddCC("roopac.php@gmail.com");
	$mail->Subject = "Job Application";
	
	 //attach files/invoice-user-1234.pdf, and rename it to invoice.pdf
	$mail->AddAttachment("$target_path", "$target_path"); 
	
	$mail->IsHTML(true);
	$mail->Body = "<table><tr><td>Name:</td><td>$name</td></tr><tr><td>Email</td><td>$email</td></tr><tr><td>Job Code</td><td>$jobcode</td></tr><tr><td>Note</td><td>$note1</td></tr></table>";
	$mail->AltBody="A new subscription request has been received. Center: \n";
	
	if(!$mail->Send())
	{
	   echo "Error sending: " . $mail->ErrorInfo;
	}
	else
	{
	   header('location:thanks.html');
	}
//ob_clean();
?>