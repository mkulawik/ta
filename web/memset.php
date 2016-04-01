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
<?
include("db/dbcon.php");
include('db/db.php');
include('db/functions.php');
include('db/page.php');	
?>



<html>
<head>
  <title>FADViews - Film Actor Database Reviews</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="web/css/stylenotabl.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>


 </head>
  <body>
	<!----start-header----->
   
	<? include ("header.php"); ?>

	<!----End-header----->
		 <!---start-content---->
<?
if(isset($_SESSION['idm']) && $_SESSION['idm'] == $_GET['idm']){

 if(is_numeric($_GET['idm'])){
$idm=$_GET['idm'];
}else{
$idm=0;
}
$member=mysql_query("select * from members where id=".$idm);
$mem=mysql_fetch_array($member);
$newDate = date("M d 'y", strtotime($mem['reg_date']));
?>


<div class="bdyCont-center">

<div class="container-bdy">
<div class="score" style="font-size:28px; color:#aa8036;"><? echo $mem['name'];?></div><br /><br />
<div class="profileImg-div">
<?
if(is_file("members/".$mem['image'])){
?>
<img src="members/<? echo $mem['image'];?>" width="111" />
<?
}else{
?>
<img src="members/noimage.jpg" width="55" />
<?
}
?>
</div>


  <div class="clearF" style="height:0px;"></div>

<div class="mem-profile">
<table cellspacing="10"> <tr><td>
<h2>Email: </h2></td><td><hc> <? echo $mem['email'];?> </hc></td></tr>
<tr><td>
<h2>Location: </h2></td><td> <hc> <? echo $mem['location'];?></hc></td></tr>
<tr><td>
<h2>Member since: </h2></td><td> <hc> <? echo $newDate;?></hc></td></tr>
<tr><td>
<h2>About me: </h2> </td><td><hc> <? echo $mem['about_me'];?></hc> </td></tr>
<tr><td>

<? 

if(isset($_SESSION['idm']) && $_SESSION['idm'] == $_GET['idm']){

$flower_count=mysql_query("select flowers from members where id=".$_SESSION['idm']);
$fl=mysql_fetch_array($flower_count);
$tot_flower=$fl['flowers'];

?>

<h2>Flowers earned: </h2> </td><td><hc> <? echo $tot_flower;?></hc> </td></tr>

<?
}
?>



</table>
</div>  <!-- end of "mem-profile" -->

<div class="mem-text">
<div class="clear"></div>
<br />
 	<a class="button1" href="memset2.php?idm=<? echo $idm; ?>"<.$idm>Change Settings</a>
</div>
<div class="clear"></div>



</div>

</div>   <!-- end of "cont-bg" -->
<!-- end of "bdyCont-right" -->
<div class="clearF"></div>
</div>  <!-- end of "container-bdy" -->
</div>

<?
}else{
$idm=0;
header("location:index.php");
}

?>







		 <!---End-content---->

		 
		 <!---start-footer---->

<div class="footer-outerDiv">
</div>  <!-- end of "footer-outerDiv" -->
<script language="javascript" type="text/javascript">
function empty(val){
document.getElementById(val).value="";
}
</script>

	<div class="clear"> </div>
		<!--- Copyright ---->	

       <? include ("copyright.html"); ?>

		 <!---End-footer---->
	</body>
</html>


