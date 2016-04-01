<?php
@session_start();
@ob_start();
include("db/dbcon.php");
if(is_numeric($_GET['idm'])){
$idm=$_GET['idm'];
mysql_query("update members set status='Active' where id=".$idm);
$_SESSION['msg']="Congratulations!<br><br> Your account has been activated. You may now login with your new account.";
$_SESSION['msg2']="You have also been awarded 5 <a href='flowers.php'>flowers</a> to give away";
header("location:thanks.php");
}else{
$idm=0;
$_SESSION['msg']="Sorry, System is unable to find related data.";
header("location:thanks.php");
}
?>

