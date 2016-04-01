<? 
@ob_start();
include("chksession.php");
include("db/dbcon.php");
if(is_numeric($_GET['idm'])){
$idm=$_GET['idm'];

if(isset($_SESSION['comments'])){
$_SESSION['comments']="";
$_SESSION['plot']="";
$_SESSION['char']="";
$_SESSION['acting']="";
$_SESSION['cinema']="";
$_SESSION['sound']="";
$_SESSION['design']="";
$_SESSION['execution']="";
$_SESSION['impact']="";
}

mysql_query("insert into rating set id_member=".$_SESSION['idm'].",id_actor=0, id_movie=".$idm.", id_character=0, plot=".$_POST['ddl_plot'].", characters=".$_POST['ddl_char'].", acting=".$_POST['ddl_actor'].", cinematography=".$_POST['ddl_cinema'].", soundtrack=".$_POST['ddl_sound'].", production_design=".$_POST['ddl_design'].", execution=".$_POST['ddl_execution'].", emotional_impact=".$_POST['ddl_impact'].",rating_date='".date("Y-m-d")."', review='".addslashes($_POST['Comment'])."'");
}
header("location:movie_reviews.php?idm=".$idm);
?>

