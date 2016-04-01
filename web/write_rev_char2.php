<? 
@ob_start();
include("chksession.php");
include("db/dbcon.php");
if(is_numeric($_GET['idm'])){
$idm=$_GET['idm'];

//get ID actor
$actors=mysql_query("select * from characters where id=".$idm);
$act=mysql_fetch_array($actors);
$idactor=$act['id_actor'];
//

if(isset($_SESSION['comments'])){
$_SESSION['comments']="";
$_SESSION['act']="";
$_SESSION['perf']="";
$_SESSION['char']="";
$_SESSION['screen']="";
}

  $flag=mysql_query("select * from rating where id_member=".$_SESSION['idm']." and id_movie=".$idm);
        $tflag=mysql_num_rows($flag);

if $tflag > 0 
{
//header("location:character.php?idm=".$idm);
echo $tflag;
echo "greater that 0";
}
else
{
// mysql_query("insert into rating set id_member=".$_SESSION['idm'].",id_actor=".$idactor.", id_movie=0, id_character=".$idm.", acting=".$_POST['ddl_plot'].", performance=".$_POST['ddl_story'].", characterization=".$_POST['ddl_char'].", screen_presence=".$_POST['ddl_actor'].", rating_date='".date("Y-m-d")."', review='".addslashes($_POST['Comment'])."'");
//header("location:character_reviews.php?idm=".$idm);


echo $tflag;
echo "else";
}

}
?>

