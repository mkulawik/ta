
<? 
@ob_start();
@session_start();
include("chksession.php");
include("db/dbcon.php");

$mveri = $_POST[verifynum];

if(isset($_SESSION['idm']) && $_SESSION['idm'] == $_GET['idm']){

if ($mveri == $_SESSION['vpin']) {

$idm=$_GET['idm'];

$mname = $_POST[membername];
$mlocation = $_POST[location];
$maboutme = $_POST[aboutme];
$memail = $_POST[emailaddress];
$mpassword = $_POST[fvpassword];

if (!empty($mname)) {

mysql_query("update members set name='".$mname."' where id=".$idm);


$_SESSION['msgA']="Updated! ";

}

if (!empty($mlocation)) {

mysql_query("update members set location='".$mlocation."' where id=".$idm);

$_SESSION['msgB']="Updated! ";
}

if (!empty($maboutme)) {


//$maboutme=str_replace("'", "\'",$maboutme);
//$maboutme=str_replace('"', '\"',$maboutme);
mysql_query("update members set about_me='".addslashes($maboutme)."' where id=".$idm);

$_SESSION['msgC']="Updated! ";
}

if (!empty($memail)) {

   $emailchk = test_input($memail);
   if (!filter_var($emailchk, FILTER_VALIDATE_EMAIL)) {
   $_SESSION['msgDErr']="*Warning*";
   $_SESSION['msg2']="Invalid email address so it was not updated.";
							}
  else 
	{

mysql_query("update members set email='".$memail."' where id=".$idm);

$_SESSION['msgD']="Updated! ";
        }

}

if (!empty($mpassword)) {
mysql_query("update members set pass='".$mpassword."' where id=".$idm);

	$_SESSION['msgE']="Updated! ";

}
if ( empty($mpassword) && empty($memail) && empty($mlocation) && empty($mname) && empty($aboutme) ){

$_SESSION['msg2']="Fields were blank. Nothing updated.";

}

}  // End IF Verification Pin 
else{ 

$_SESSION['msg2']="Verification pin denied or did not pass. Please enter new pin to update values.";

}

header("location:memset2.php?idm=".$idm);

} // end IF Session Check

else{

$idm=0;
header("location:index.php");

}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


?>

