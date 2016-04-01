<? 
@session_start();
@ob_start();
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
  <link href="smartphone/css/stylenotabl.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>

<body>
<?php include("header.php");?>


<div class="cont-bg">
<div class="container-bdy">

<div class="bdyCont-center" style="padding-top:15px; margin:0 auto;">

<br />
actor id: &nbsp;
<?  echo $_GET['idm']; ?>
<br />
sending: &nbsp;
<? echo $_GET['gid']; ?>




<!-- end of "bdyCont-left" -->
</div>  
<!-- end of "bdyCont-right" -->
<div class="clearF"></div>
</div>  <!-- end of "container-bdy" -->

</div>   <!-- end of "cont-bg" -->


<? include("copyright.html");?>

</body>
</html>
