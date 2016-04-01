<? 
@ob_start();
@session_start();
include("chksession.php");
include("db/dbcon.php");

$ppp=$_POST['Video_Code'];
$pppp=$_POST['Movie_Code'];
$ppppp=$_POST['MID_Code'];


mysql_query("insert into trailers set id_movie=".$_POST['MID_Code'].",".$field."=".$idm.", movie_name="$_POST['Movie_Code']", video_code='".addslashes($_POST['Video_Code'])."', posted_date='".date("Y-m-d")."'");

$_SESSION['msg']="Trailer has been uploaded.";
}

$inty =  strlen($ppp);
$_SESSION['msg']=$inty;


header("location:uptr1.php?idm=".$idm."&type=".$type);
?>

