<? 
@session_start();
@ob_start();
include("chksession.php");
?>
<!--
FADVIEWS
URL: http://fadviews.com
-->
<!DOCTYPE HTML>
<html>
<head>
  <title>FADVIEWS - Film Actor Database Reviews | Rating </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="web/css/stylenotabl.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
 </head>
 
<?
include("db/dbcon.php");
include('db/db.php');
include('db/functions.php');
include('db/page.php');
?>
 
  <body>
   
        <!-----START HEADER----->
 
        <?php include("header.php");
if(is_numeric($_GET['idm'])){
$idm=$_GET['idm'];

$cflag=0;
$chkflag=0;
 $cflag=mysql_query("select * from rating where id_member=".$_SESSION['idm']." and id_character=".$idm);
	$chkflag=mysql_num_rows($cflag);
}
else
{
$idm=0;
exit;
}

//***************
if ($chkflag > 0) //*** Main IF Check to stop repeat voting  *********
{
header("location:character.php?idm=".$idm);
}
else{
if(is_numeric($_GET['idm'])){
$idm=$_GET['idm'];
}else{
$idm=0;
}
$_SESSION['comments']=addslashes($_POST['Comment']);
$_SESSION['act']=addslashes($_POST['ddl_act']);
$_SESSION['perf']=addslashes($_POST['ddl_perf']);
$_SESSION['voice']=addslashes($_POST['ddl_voice']);
$_SESSION['screen']=addslashes($_POST['ddl_screen']);
$_SESSION['char']=addslashes($_POST['ddl_char']);

$actors=mysql_query("select * from characters where id=".$idm);
$actor=mysql_fetch_array($actors);
$idactor=$actor['id_actor'];

if($_POST['Submit']=="Publish"){
mysql_query("insert into rating set id_member=".$_SESSION['idm'].",id_actor=".$idactor.", id_movie=0, id_character=".$idm.", acting=".$_POST['ddl_act'].", performance=".$_POST['ddl_perf'].", characterization=".$_POST['ddl_char'].", voice=".$_POST['ddl_voice'].",screen_presence=".$_POST['ddl_screen'].", rating_date='".date("Y-m-d")."', review='".addslashes($_POST['Comment'])."'");
if(isset($_SESSION['comments'])){
$_SESSION['comments']="";
$_SESSION['act']="";
$_SESSION['perf']="";
$_SESSION['voice']="";
$_SESSION['char']="";
$_SESSION['screen']="";
}

//*********** Add 1 flower per successful review, nofify user of it and redirect back to page  ************

$flowerplus = mysql_query("update members set flowers = flowers +1 where id=".$_SESSION['idm']);

if ($flowerplus){
echo "<script>
alert('Review posted! You have received 1 flower.');
location.href='character.php?idm='+$idm;;
</script>";

}
else {

echo "<script>
alert('Something might have went wrong. Please notify admin if you believe so.');
</script>";
}

//header("location:character_reviews.php?idm=".$idm);
exit;
}

}  //** End Main IF
 
?>
 
<div class="cont-bg">
<div class="container-bdy">

<div class="bdyCont-center">
<span class="head01"><strong style="color:#00A0DE;"><? echo $actor['char_name'];?></strong></span>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="4">
<form id="form1" name="form1" method="post" action="write_review_character1.php?idm=<? echo $idm;?>">
  
  <tr>
     <td colspan="3" class="head02">Rating guideline: <br /><img src="web/images/rating-sheet.jpg" /> </td>   
    </tr>
  <tr>
<!--    <td width="4%">&nbsp;</td>  -->
    <td width="96%">
	<table width="55%" border="0" cellspacing="5" cellpadding="5">
      <tr>
        <td width="82" class="head03">Acting:</td>
        <td width="13" class="head03">&nbsp;</td>
        <td width="193" class="head03"><? echo $_POST['ddl_act'];?></td>
		<input type="hidden" name="ddl_act" id="ddl_act" value="<? echo $_POST['ddl_act']?>" />
      </tr>
      <tr>
        <td class="head03">Performance:</td>
        <td class="head03">&nbsp;</td>
        <td class="head03"><? echo $_POST['ddl_perf'];?></td>
		<input type="hidden" name="ddl_perf" id="ddl_perf" value="<? echo $_POST['ddl_perf']?>" />
      </tr>

      <tr>
        <td class="head03">Voice:</td>
        <td class="head03">&nbsp;</td>
        <td class="head03"><? echo $_POST['ddl_voice'];?></td>
                <input type="hidden" name="ddl_voice" id="ddl_screen" value="<? echo $_POST['ddl_voice']?>" />
      </tr>

      <tr>
        <td class="head03">Screen Presence:</td>
        <td class="head03">&nbsp;</td>
        <td class="head03"><? echo $_POST['ddl_screen'];?></td>
                <input type="hidden" name="ddl_screen" id="ddl_screen" value="<? echo $_POST['ddl_screen']?>" />
      </tr>

      <tr>
        <td class="head03">Characterization:</td>
        <td class="head03">&nbsp;</td>
        <td class="head03"><? echo $_POST['ddl_char'];?></td>
		<input type="hidden" name="ddl_char" id="ddl_char" value="<? echo $_POST['ddl_char']?>" />
      </tr>
  <tr>
</table>
        <table width="90%" border="0" cellspacing="3" cellpadding="3">
    <td colspan="5"><span class="head02">Comments/Review:</span></td>
    </tr>
  <tr>
    <td colspan="500" valign="top" class="txt01"><? echo $_POST['Comment'];?></td>
	<input type="hidden" name="Comment" id="Comment" value="<? echo $_POST['Comment']?>" />
    </tr>
  <tr><td></tr></td>
    <td colspan="3">
<? if ( ($_POST['ddl_act'] > 0) && ($_POST['ddl_perf'] > 0) && ($_POST['ddl_voice'] > 0) && ($_POST['ddl_screen'] > 0) && ($_POST['ddl_char'] > 0) ) {
 ?> <input name="Submit" type="submit" class="button_lime" value="Publish" />
<?
}
else
{
?>
	<div class="head03" style="color:red; font-weight:bold;">Please Edit your rating. One or more of the category scores are blank.</div>
<?
 }
?>
      <input name="Submit2" type="button" class="button_lime" value="Edit" onclick="javascript:window.history.go(-1);" /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   </form>

</table>
</table>
<!-- end of "bdyCont-left" -->
</div>  
<!-- end of "bdyCont-right" -->
<div class="clearF"></div>
</div>  <!-- end of "container-bdy" -->
</div>
</div>   <!-- end of "cont-bg" --> 
<? include("copyright.html");?>
 
</body>
</html>


