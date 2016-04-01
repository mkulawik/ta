<? 
include("chksession.php");
?>
<?
include("db/dbcon.php");
include('db/db.php');
include('db/functions.php');
include('db/page.php');
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
<script src='start-rating/jquery.js' type="text/javascript"></script>
	<script src='start-rating/jquery.MetaData.js' type="text/javascript" language="javascript"></script>
 <script src='start-rating/jquery.rating.js' type="text/javascript" language="javascript"></script>
 <link href='start-rating/jquery.rating.css' type="text/css" rel="stylesheet"/>
 <!--// documentation resources //-->
 <!--<script src="http://code.jquery.com/jquery-migrate-1.1.1.js" type="text/javascript"></script>-->
 <link type="text/css" href="/@/js/jquery/ui/jquery.ui.css" rel="stylesheet" />
 <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js" type="text/javascript"></script>
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="smartphone/css/stylenotabl.css" rel="stylesheet" type="text/css" />
</head>

<body>

        <!-----START HEADER----->
 
        <?php include("header.php");
if(is_numeric($_GET['idm'])){
$idm=$_GET['idm'];
 
$cflag=0;
$chkflag=0;
 $cflag=mysql_query("select * from rating where id_member=".$_SESSION['idm']." and id_movie=".$idm);
        $chkflag=mysql_num_rows($cflag);
}
else
{
$idm=0;
exit;
}
 
if ($chkflag > 0)
{
header("location:movie.php?idm=".$idm);
}
 
else  {
if(is_numeric($_GET['idm'])){
$idm=$_GET['idm'];
}else{
$idm=0;
}
 
$actors=mysql_query("select * from movies where id=".$idm);
$actor=mysql_fetch_array($actors);
 
$_SESSION['comments']=addslashes($_POST['Comment']);
$_SESSION['plot']=addslashes($_POST['ddl_plot']);
$_SESSION['char']=addslashes($_POST['ddl_char']);
$_SESSION['acting']=addslashes($_POST['ddl_acting']);
$_SESSION['cinema']=addslashes($_POST['ddl_cinema']);
$_SESSION['sound']=addslashes($_POST['ddl_sound']);
$_SESSION['design']=addslashes($_POST['ddl_design']);
$_SESSION['execution']=addslashes($_POST['ddl_execution']);
$_SESSION['impact']=addslashes($_POST['ddl_impact']);
 
if($_POST['Submit']=="Publish"){
mysql_query("insert into rating set id_member=".$_SESSION['idm'].",id_actor=0, id_movie=".$idm.", id_character=0, plot=".$_POST['ddl_plot'].", characters=".$_POST['ddl_char'].", acting=".$_POST['ddl_acting'].", cinematography=".$_POST['ddl_cinema'].", soundtrack=".$_POST['ddl_sound'].",production_design=".$_POST['ddl_design'].", execution=".$_POST['ddl_execution'].", emotional_impact=".$_POST['ddl_impact'].",rating_date='".date("Y-m-d")."', review='".addslashes($_POST['Comment'])."'");
 
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

//*********** Add 1 flower per successful review, nofify user of it and redirect back to page  ************

$flowerplus = mysql_query("update members set flowers = flowers +1 where id=".$_SESSION['idm']);

if ($flowerplus){
echo "<script>
alert('Review posted! You have received 1 flower.');
location.href='movie_reviews.php?idm='+$idm;
</script>";

}
else {

echo "<script>
alert('Something might have went wrong. Please notify admin if you believe so.');
</script>";

}


exit;
}
 
} // **End Main IF
?>
 
 
<div class="cont-bg">
<div class="container-bdy">
 
<div class="bdyCont-center">
<span class="head01"><strong style="color:#00A0DE;"><? echo $actor['movie_name'];?></strong></span>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="4">
<form id="form1" name="form1" method="post" action="write_review_movie1.php?idm=<? echo $idm;?>">
  
  <tr>
   <td colspan="3" class="head02">Rating guideline: <br /><img src="smartphone/images/rating-sheet.jpg" /> </td>
    </tr>      
  
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="96%"><table width="300" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td width="82" class="head03">Plot/Story:</td>
        <td width="13" class="head03">&nbsp;</td>
        <td width="193" class="head03"><? echo $_POST['ddl_plot'];?></td>
                <input type="hidden" name="ddl_plot" id="ddl_plot" value="<? echo $_POST['ddl_plot']?>" />
      </tr>
      <tr>
        <td class="head03">Characters:</td>
        <td class="head03">&nbsp;</td>
        <td class="head03"><? echo $_POST['ddl_char'];?></td>
                <input type="hidden" name="ddl_char" id="ddl_char" value="<? echo $_POST['ddl_char']?>" />
      </tr>
      <tr>
        <td class="head03">Acting: </td>
        <td class="head03">&nbsp;</td>
        <td class="head03"><? echo $_POST['ddl_acting'];?></td>
                <input type="hidden" name="ddl_acting" id="ddl_acting" value="<? echo $_POST['ddl_acting']?>" />
      </tr>
      <tr>
        <td class="head03">Cinematography: </td>
        <td class="head03">&nbsp;</td>
        <td class="head03"><? echo $_POST['ddl_cinema'];?></td>
                <input type="hidden" name="ddl_cinema" id="ddl_cinema" value="<? echo $_POST['ddl_cinema']?>" />
      </tr>
      <tr>
        <td class="head03">Soundtrack: </td>
        <td class="head03">&nbsp;</td>
        <td class="head03"><? echo $_POST['ddl_sound'];?></td>
                <input type="hidden" name="ddl_sound" id="ddl_sound" value="<? echo $_POST['ddl_sound']?>" />
      </tr>
      <tr>
        <td class="head03">Production Design:</td>
        <td class="head03">&nbsp;</td>        
        <td class="head03"><? echo $_POST['ddl_design'];?></td>                
                        <input type="hidden" name="ddl_design" id="ddl_design" value="<? echo $_POST['ddl_design']?>" />
  </tr>
      <tr>
        <td class="head03">Execution: </td>
        <td class="head03">&nbsp;</td>
        <td class="head03"><? echo $_POST['ddl_execution'];?></td>
                <input type="hidden" name="ddl_execution" id="ddl_execution" value="<? echo $_POST['ddl_execution']?>" />
      </tr>
     <tr>
        <td class="head03">Emotional Impact: </td>
        <td class="head03">&nbsp;</td>
        <td class="head03"><? echo $_POST['ddl_impact'];?></td>
                <input type="hidden" name="ddl_impact" id="ddl_impact" value="<? echo $_POST['ddl_impact']?>" />
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><span class="head02">Comments/Review:</span></td>
    </tr>
  <tr>
    <td colspan="2" valign="top" class="txt01"><? echo $_POST['Comment'];?></td>
        <input type="hidden" name="Comment" id="Comment" value="<? echo $_POST['Comment']?>" />
    </tr>
  <tr>
   <td style="padding:10px" colspan="2">
<? if ( 
($_POST['ddl_plot'] > 0) && ($_POST['ddl_char'] > 0) && ($_POST['ddl_acting'] > 0) && ($_POST['ddl_cinema'] > 0) && ($_POST['ddl_sound'] > 0) && ($_POST['ddl_design'] > 0) && ($_POST['ddl_execution'] > 0) && ($_POST['ddl_impact'] > 0)
)
{
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
<!-- end of "bdyCont-left" -->
</div>  
<!-- end of "bdyCont-right" -->
<div class="clearF"></div>
</div>  <!-- end of "container-bdy" -->
 
</div>   <!-- end of "cont-bg" -->
 
 
 
<? include("footer.php");?>
 
</body>
</html>

