<?
@session_start();
@ob_start();
unset($_SESSION['idm']);
unset($_SESSION['mem_name']);

$_SESSION = array();
session_destroy();
header("location:index.php");


?>
