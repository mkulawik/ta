<? 
@ob_start();
@session_start();
include("chksession.php");
include("db/dbcon.php");

$ppp=$_POST['Video_Code'];


if(is_numeric($_GET['idm'])){
$idm=$_GET['idm'];
$type=$_GET['type'];
if($type=="actor"){
$field="id_actor";
}
if($type=="character"){
$field="id_character";
}
if($type=="movie"){
$field="id_movie";
}


if (strpos($ppp,'<iframe') !== false) {

// true
mysql_query("insert into videos set id_member=".$_SESSION['idm'].",".$field."=".$idm.", video_code='".addslashes($_POST['Video_Code'])."', posted_date='".date("Y-m-d")."'");
$_SESSION['msg']="Your video has been uploaded.";

}
else{

$_SESSION['msg']="No valid Embed code found or field empty.";

}
}


//$inty =  strlen($ppp);
//$_SESSION['msg']=$inty;


header("location:upload_videos.php?idm=".$idm."&type=".$type);
?>

