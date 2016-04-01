<?
@session_start();
@ob_start();
include("db/dbcon.php");


$_SESSION['m_age'] = mysql_real_escape_string($_POST['Age']);
$_SESSION['m_mail'] = mysql_real_escape_string($_POST['Mail']);
$_SESSION['m_frm'] = mysql_real_escape_string($_POST['Frm']);


$email = mysql_real_escape_string($_POST['Mail']);
$age = mysql_real_escape_string($_POST['Age']);
$from = mysql_real_escape_string($_POST['Frm']);
?>
<?  //   ======================================= START DB Query ==================================================
 
// <div class="cont-bg">
// <div class="container-bdy">
?>
<?
 
$order = "select * from actors as x inner join characters as y inner join movies as z on x.id=y.id_actor and y.id_movie=z.id and x.metric=1 where z.year-year(x.dob)='$age' order by year desc";
 
 $results = mysql_query($order);
 
while ($res=mysql_fetch_array($results)){
 
 
$intro = "The following actors were age ".$age." when they made the following movies: <br>";
$aname = $res['f_name']." ".$res['l_name']."";
$mname = "&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;".$res['movie_name']."&nbsp;";
$myear = "(".$res['year'].")";
$amy = $amy."<br>".$aname.$mname." ".$myear."";
 
 
 
   } //end while
 
 
  ?>
 
<?  //   ======================================= END  DB Query =================================================== ?>


<?
$m_date=date("Y-m-d");				
				
				
				include("bdayemail_temp.php");
				include("bdimages.php");
				$_SESSION['idmember']=mysql_insert_id();



				$toemail = $email;
				
				// The subject
			
				$subject = "Happy Birthday from Fadviews via ".$from."";
		
                                // The images
                                $bd_images = $bday_images;
		
				$a_msg = "Thank you for using Fadviews. Please, tell your friends about us and please visit us soon!  We can't wait to see your actor & movie reviews as well as your video and photo uploads!   <br><br>
	<a href='".$url."'>http://www.fadviews.com</a><br><br>";
			

				// The message
			        $message = $bd_images.$intro.$amy;	
				$message .= str_replace('[Message]',$a_msg,$bdemail_template);


				//echo $message;
			
				$headers  = 'MIME-Version: 1.0' . "\r\n";
			
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
				$headers .= 'From:  Fadviews Team<donotreplyplease@fadviews.com>' . "\r\n";
			
			$_SESSION['m_to'] = "";
			$_SESSION['m_email'] = "";
			$_SESSION['m_from'] = "";
		
			$_SESSION['msg']="Thank You! We have sent the email greeting.<br><br>Have them check their inbox/spam.";
			header("location:thx.php");
			
//*************   Add email, age and date to DB ********//

			mysql_query("insert into bdgame (age,bdemail,bdfrom,bd_sent_date) values ('$age','$email','$from',now());");			



?>
<?                           mail($toemail, $subject, $message, $headers);

?>

