<?
@session_start();
@ob_start();
include("db/dbcon.php");

$email = mysql_real_escape_string($_POST['Login_Email']);

$pass = mysql_real_escape_string($_POST['Login_Password']);

$sql="select * from members where email='".$email."' and pass='".$pass."' and status='Active'";
$rs=mysql_query($sql);


if(mysql_num_rows($rs)>0){

$row=mysql_fetch_array($rs);

$gftq="select * from members where id=".$row['id'];
$gft=mysql_query($gftq);

$_SESSION['idm']=$row['id'];


$_SESSION['mem_email']=$row['email'];

$_SESSION['mem_name']=$row['name'];


//mysql_query("update members set gift_timer=now() where id=".$row['id']);

$gftchk=mysql_fetch_array($gft);

$datetime1 = new DateTime('now');
$datetime2 = new DateTime($gftchk['gift_timer']);
$interval = $datetime2->diff($datetime1);

$giftcredit = $interval->format('%r%a days');

	if(isset($gftchk['gift_timer'])){


		 if ($giftcredit >= 14) { 

			mysql_query("update members set flowers = flowers +1 where id=".$_SESSION['idm']);
			echo "<script>
				alert('You get a free flower from us for logging in or after 2 weeks! Thank you!');
				</script>";
			mysql_query("update members set gift_timer=now() where id=".$row['id']);
                  }

	} else
        {

        mysql_query("update members set gift_timer=now() where id=".$row['id']);


	}

//header("location:index.php");

echo"<script>
location.href='index.php';
</script>";

}else{

$_SESSION['err']="Invalid Email/Password, Please try again.";

header("location:log-in.php");

}

?>
