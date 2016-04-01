<? 
@session_start(); 
@ob_start();
if(empty($_SESSION['idm'])){
$_SESSION['err']="Session Expired, Please login again.";
header("location:index.php");
}
?>