<?
@session_start();
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
<? 
// *******    COLOR TEMPERATURE RATING SYSTEM ************ /
function getRatingColor($number)
{
    if  ($number > 0 && $number < 5)
        return 'cold';  // COLD = Low
    else if ($number >= 5 && $number < 8)
        return 'warm';  // WARM = Mid 
    else if ($number >= 8 && $number <= 10)
        return 'hot';  // HOT  = High
}
?>
 
<!DOCTYPE HTML>
<html>
<head>
  <title>FADVIEWS - Film Actor Database Reviews </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <meta name="keywords" content="movies reviews actors film theater tv actress filmography re-enactments" />
  <link href="web/css/stylenotabl.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href="smartphone/css/slider.css" rel="stylesheet" type="text/css"  media="all" />
  <script type="text/javascript" src="web/js/jquery.min.js"></script> 
  <script type="text/javascript" src="web/js/jquery.easing.1.3.js"></script> 
  <script type="text/javascript" src="web/js/camera.min.js"></script>
       <script type="text/javascript">
                           jQuery(function(){
                                jQuery('#camera_wrap_1').camera({
                                        pagination: false,
                                });
                        });
         </script>

<link rel="stylesheet" type="text/css" media="all" href="web/css/pt.css" />

 </head>
  <body>
               
	        <!--- HEADER ------>
		<?php include("header.php");?>



		<!-- Start Content -->

<div class="mid-grid-tour">
<div class="wrap">
<h1>We don't believe in bad actors</h1>
<h2>
Rate actors in a more balanced approach using our categories ( a.k.a <a href="rating_system.php#2">The Take 5 of Acting.</a>)<br /> An actor's overall score is based on each character they've played.<br>

</h2> 
<a class="button1" href="tour3.php">NEXT 2/5</a>
</div></div>


<div class="bottom-grids">

<div class="wrap">
<div class="breadcrumbs">Home > Actors > Tom Jolatts</div>
<div class="score" font="Arial" style="font-size:28px;width:100%;">Tom Jolatts</div>

 <div class="clearF" style="height:0px;"></div>

<img src="actors/tom_jolatts.jpg" width="250px"/>


<!--  ******************************************  -->

    <section class="third lift plan-tier">
      <div class="lmov2-cat">
	<h4>Total Score</h4>
<h5>      <span class="plan-price">

<span class="<?=getRatingColor (8.10);?>" style="font-size: 25px;"> 8.10
</span> 
	<img src="web/images/hot-temp-anim.gif" width="7%">

	 </span> </h5>

 <ul>
<li><strong>Acting</strong> <br>
<span class="warm">
7.89
</span>
</li>

<li><strong>Performance</strong><br>
<span class="hot">
9.85
</span>
</li>

<li><strong>Voice</strong> <br>
<span class="cold">
4.99
</span>
</li>

<li><strong>Screen Presence</strong><br> 
<span class="warm">
7.88
</span>
</li>

<li><strong>Characterization</strong><br>
<span class="hot">
9.91
</span>
</li>

</ul>

</div>
</section>

</div>
</div>
	<div class="clear"> </div>
		<!--- Copyright ---->	

	<div class="copy-right">
		<div class="top-to-page">
						<a href="#top" class="scroll"> </a>
						<div class="clear"> </div>
					</div>
		<p>COPYRIGHT &copy; 2014, <a href="http://fadviews.com/"> FADVIEWS</a></p>   

</div>		 <!---End-footer---->
	</body>
</html>


