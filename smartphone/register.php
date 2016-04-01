<?
@session_start();
@ob_start();
include("db/dbcon.php");


$_SESSION['m_name'] = mysql_real_escape_string($_POST['Name']);
$_SESSION['m_email'] = mysql_real_escape_string($_POST['Email']);
$_SESSION['m_pass'] = mysql_real_escape_string($_POST['Password']);
$_SESSION['m_yob'] = mysql_real_escape_string($_POST['membirth']);
$_SESSION['m_gender'] = mysql_real_escape_string($_POST['Gender']);


$email = mysql_real_escape_string($_POST['Email']);
$usename = mysql_real_escape_string($_POST['Name']);
$m_date=date("Y-m-d");				
				
				$sql="select * from members where email='".$email."'";
				
				$rs=mysql_query($sql);
				
				if(mysql_num_rows($rs)>0){
				
					$_SESSION['msg']="Email is already in use. Please try other one.";
					header("location:sign_up.php");
					exit;
				}	

                                $sql2="select * from members where name='".$usename."'";
					
                                $rs2=mysql_query($sql2);

                                if(mysql_num_rows($rs2)>0){

                                        $_SESSION['msg']="Username is already in use. Please try other one.";
					header("location:sign_up.php");
					exit;
				}	
				


// ******** Add user to database				
				
			$sqladd="insert into members (name,email,pass,image,reg_date,yob,sex,status,flowers) values ('".$_SESSION['m_name']."','".$_SESSION['m_email']."','".$_SESSION['m_pass']."','noimage.jpg','".$m_date."','".$_SESSION['m_yob']."','".$_SESSION['m_gender']."','Inactive',5)";
				

			$au = mysql_query($sqladd);				


				include("email_template.php");
				$_SESSION['idmember']=mysql_insert_id();


				$toemail = $email;
				
				// The subject
			
				$subject = "Email verification!";
				
				$a_msg = "Thank you for your registration with FADViews. We look forward to serving your needs on this site. Please select the link below to confirm your registration. <br><br>
	<a href='".$url."registration_confirm.php?idm=".$_SESSION['idmember']."'>http://www.fadviews.com/register</a><br><br>";
			
				// The message
				
				$message = str_replace('[Message]',$a_msg,$email_template);
				//echo $message;
			
				$headers  = 'MIME-Version: 1.0' . "\r\n";
			
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
				$headers .= 'From: FADViews<donotreplyplease@fadviews.com>' . "\r\n";
			
				mail($toemail, $subject, $message, $headers);
				
			$_SESSION['m_name'] = "";
			$_SESSION['m_email'] = "";
			$_SESSION['m_pass'] = "";
		
			$_SESSION['msg']="Thank You!<br> We have sent you verification email with a link to activate your account.<br><br>Please check your inbox/spam.";
			header("location:thanks.php");
			

?>

