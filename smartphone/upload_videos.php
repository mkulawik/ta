<? 
include("chksession.php");
?>

<?
include("db/dbcon.php");
include('db/db.php');
include('db/functions.php');
include('db/page.php');
?>

<!DOCTYPE HTML>
<html>
<head>
  <title>FADVIEWS - Film Actor Database Reviews </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="smartphone/css/style.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
 </head>

</head>

<body>

<!-- START Header --> 

<?php include("header.php");

if(is_numeric($_GET['idm'])){
$idm=$_GET['idm'];
$type=$_GET['type'];
}else{
$idm=0;
$type=$_GET['type'];
}
if($type=='actor'){
$name=mysql_query("select * from actors where id=".$idm);
$n=mysql_fetch_array($name);
$print_name=$n['f_name']." ".$n['l_name'];
$gototype='profile.php?idm=';
}
if($type=='character'){
$name=mysql_query("select * from characters where id=".$idm);
$n=mysql_fetch_array($name);
$print_name=$n['char_name'];
$gototype='character.php?idm=';
}
if($type=='movie'){
$name=mysql_query("select * from movies where id=".$idm);
$n=mysql_fetch_array($name);
$print_name=$n['movie_name'];
$gototype='movie.php?idm=';
}
?>

<div class="cont-bg">
<div class="container-bdy">
<? include("search_box.php");?>
<div class="bdyCont-center">
<span class="head01"> Upload Video for <strong style="color:#00A0DE;"><a href="<?echo $gototype,$idm?>"> <? echo $print_name; ?></strong></span>
</a><br />
<font size="1.2">
We currently accept embeded videos only. <br />
To learn how to embed Youtube videos, click  <a href="/howto_embed.php"> HERE.</a> <br /> Typically, you just need to click the *Share* link under the video and select *Embed* link.<br />  Copy the code which usually has an &lt;iframe&gt; tag and paste it below <br /><br />
</font>

<table width="100%" border="0" cellspacing="0" cellpadding="4">
<form action="upload_videos2.php?idm=<? echo $idm;?>&type=<? echo $type;?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  
  <tr>
    <td colspan="2" valign="top" class="head03"><font color="orange"><? 
	if(isset($_SESSION['msg'])){
	echo $_SESSION['msg'];
	$_SESSION['msg']="";
	}
	?></font></td>
  </tr>
  <tr>
    <td colspan="2" valign="top" class="head03">Video Embed Code: </td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><textarea name="Video_Code" cols="35" rows="5" class="head03" id="Video_Code" style=" padding:5px;border:solid 1px #999999;"></textarea></td>
  </tr>			
<tr></tr>
  <tr>
    <td colspan="2"><input name="Submit" type="submit" class="button_lime" value="Submit" /></td>
    </tr>
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="96%">&nbsp;</td>
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
