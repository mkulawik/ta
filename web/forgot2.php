<?
@session_start();
@ob_start();
include("db/dbcon.php");

$email = mysql_real_escape_string($_POST['Email']);

$sql="select * from members where email='".$email."' and status='Active'";

$rs=mysql_query($sql);

if(mysql_num_rows($rs)>0){

$row=mysql_fetch_array($rs);
include("email_template.php");

	$toemail = $email;

	// The subject

	$subject = "Your Password at www.fadviews.com";

		$a_msg = "<strong>Please find your login details below:</strong> <br><br>
				Email : ".$row['email']."<br>Password : ".$row['pass']."<br><br>";
			
				// The message
				
				$message = str_replace('[Message]',$a_msg,$email_template);
				//echo $message;
			
				$headers  = 'MIME-Version: 1.0' . "\r\n";
			
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
				$headers .= 'From:  FADViews <donotreplyplease@fadviews.com>' . "\r\n";
			
				mail($toemail, $subject, $message,$headers);



$_SESSION['msg']="We have sent an email to you with your current password. Please check your inbox.";

header("location:thanks.php");

}else{

$_SESSION['msg']="We're sorry, your email isn't registered with us.";

header("location:forgot_password.php");

}

?>
