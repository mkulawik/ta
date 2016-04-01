<? 
@ob_start();
@session_start();
include("chksession.php");
include("db/dbcon.php");

$ppp=$_POST['Video_Code'];
$pppp=$_POST['Movie_Code'];
$ppppp=$_POST['MID_Code'];



mysql_query("insert into trailers set id_movie='$ppppp', movie_name='$pppp', video_code='".addslashes($_POST['Video_Code'])."', posted_date='".date("Y-m-d")."'");


$_SESSION['msg']="Trailer has been uploaded.";


header("location:uptr1.php");
?>

