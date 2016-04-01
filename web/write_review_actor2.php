<? 
@ob_start();
include("chksession.php");
include("db/dbcon.php");
if(is_numeric($_GET['idm'])){
$idm=$_GET['idm'];

mysql_query("insert into rating set id_member=".$_SESSION['idm'].",id_actor=".$idm.", id_movie=0, id_character=".$_POST['ddl_charID'].", performance=".$_POST['ddl_plot'].", orignality=".$_POST['ddl_story'].", likeability=".$_POST['ddl_char'].", voice_usage=".$_POST['ddl_actor'].", rating_date='".date("Y-m-d")."', review='".addslashes($_POST['Comment'])."'");
}
header("location:actor_reviews.php?idm=".$idm);
?>

