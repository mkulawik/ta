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
  <title>FADVIEWS - Film Actor Database Reviews | Register </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="web/css/stylenotabl.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
 </head>
  <body>
   
	<!-----START HEADER----->

	<?php include("header.php");?>

		 <!---start-content---->

<div class="cont-bg">
<div class="container-bdy">

<div class="bdyCont-center" style="padding-top:10px; margin:0 auto;">
<span class="head01"><br><br></br> <? if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
$_SESSION['msg']="";
} ?></span>

<!-- end of "bdyCont-left" -->
</div>  
<!-- end of "bdyCont-right" -->
<div class="clearF"></div>
</div>  <!-- end of "container-bdy" -->

</div>   <!-- end of "cont-bg" -->



<? include("footer.php");?>

</body>
</html>
