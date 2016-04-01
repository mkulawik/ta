<? 
@session_start();
@ob_start();
?>
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
  <title>FADVIEWS - Film Actor Database Reviews </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="smartphone/css/style.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>

<body>
<?php include("header.php");?>
<div class="content">


<div class="bdyCont-center">

<?

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
 
 
<div class="bdyCont-center">
<span class="head01">Upload Photo for <strong style="color:#00A0DE;"><a href="<?echo $gototype,$idm?>"> <? echo $print_name; ?></strong></span>
</a><br />
<table width="100%" border="0" cellspacing="0" cellpadding="4">
<form action="upload_photos2.php?idm=<? echo $idm;?>&type=<? echo $type;?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  
  <tr>
    <td colspan="2" valign="top" class="head03" style="color:green"><? 
        if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        $_SESSION['msg']="";
        }
        ?></td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><input name="file" type="file" class="head02" /></td>
    </tr>
<tr><td><hr /></td></tr>
  <tr>
    <td colspan="2"><input name="Submit" type="submit" class="button_lime" value="Upload" /></td>
    </tr>
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="96%">&nbsp;</td>
  </tr>
   </form>
</table>

<div class="clearF"></div>
</div>  <!-- end of "bdyCont-left" -->
 
</div>   <!-- end of "container" -->


<? include("copyright.html");?>

</body>
</html>
