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
  <link href="web/css/slider.css" rel="stylesheet" type="text/css"  media="all" />
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


		<!--START  CONTENT ----> 

		 <?php 
if(is_numeric($_GET['idm'])){
$idm=$_GET['idm'];
}else{
$idm=0;
}
$character=mysql_query("select * from characters where id=".$idm);
$char=mysql_fetch_array($character);

//calculate overall rating for movie
$net_avg=0;
$avg=0;
$t_act=0;
$t_perf=0;
$t_char=0;
$t_screen=0;
$t_voice=0;
$review=mysql_query("select * from rating where id_character=".$idm. " order by id desc");
if(mysql_num_rows($review)>0){
$total_reviews=mysql_num_rows($review);
while($r=mysql_fetch_array($review)){
	$avg=$avg+(($r['acting']+$r['performance']+$r['voice']+$r['characterization']+$r['screen_presence'])/5);
	$t_act=$t_act+$r['acting'];
	$t_perf=$t_perf+$r['performance'];
	$t_voice=$t_voice+$r['voice'];
	$t_char=$t_char+$r['characterization'];
	$t_screen=$t_screen+$r['screen_presence'];
}
$net_avg=$avg/$total_reviews;
}else{
$net_avg=0;
$total_reviews=1;
}
?>

<div class="bottom-grids">

<div class="wrap">

<div class="breadcrumbs">Home > Character > <? echo $char['char_name'];?></div>
<div class="score" font="Arial" style="font-size:28px;width:100%;"><? echo $char['char_name'];?></div>
 <div class="clearF" style="height:0px;"></div>

<img src="characters/<? echo $char['image'];?>" width="250px" />


<! --  ******************************************  -->


    <section class="third lift plan-tier">
      <div class="lmov2-cat">
	<h4>Total Score</h4>
<h5>      <span class="plan-price">

<span class="<?=getRatingColor ($net_avg);?>" style="font-size: 25px;"> <? echo number_format($net_avg,2,'.','');?>
</span> 
<? if ($net_avg >= 8) { echo '<img src="smartphone/images/hot-temp-anim.gif" width="7%">';}
   else if ($net_avg >=5) { echo '<img src="smartphone/images/warm.gif" width="7%">';}
   else if ($net_avg < 5 && $net_avg >0) { echo '<img src="web/images/cold.gif" width="7%">';}
   else echo '<span style="font-size:10px;">  (Not Yet Rated) </span>';?>

	 </span> </h5>

  <?
        $tflag=0;
        if(isset($_SESSION['idm'])){
  $flag=mysql_query("select * from rating where id_member=".$_SESSION['idm']." and id_character=".$idm);
        $tflag=mysql_num_rows($flag);
  }
  ?>

      <ul>
<li><strong>Acting</strong> <br>
<span class="<?=getRatingColor ($t_act/$total_reviews);?>"><? echo number_format($t_act/$total_reviews,2,'.','');?></span>
</li>

<li><strong>Performance</strong><br>
<span class="<?=getRatingColor ($t_perf/$total_reviews);?>"><? echo number_format($t_perf/$total_reviews,2,'.','');?></span>
</li>

<li><strong>Voice</strong> <br>
<span class="<?=getRatingColor ($t_voice/$total_reviews);?>"><? echo number_format($t_voice/$total_reviews,2,'.','');?></span>
</li>

<li><strong>Screen Presence</strong><br> 
<span class="<?=getRatingColor ($t_screen/$total_reviews);?>"><? echo number_format($t_screen/$total_reviews,2,'.','');?></span>
</li>

<li><strong>Characterization</strong><br>
<span class="<?=getRatingColor ($t_char/$total_reviews);?>"><? echo number_format($t_char/$total_reviews,2,'.','');?></span>
</li>

</ul>

	</div>
    </section>

    <div style="clear: both"></div>

<! --  ******************************************  -->

<!------------- REVIEWS------------------------->
<br />
<hr />
<? include("character_reviews2.php");  ?>

 </div>
</div> 
		 

        <!--- Copyright ------>

             <?php include("copyright.html");?>

	</body>
</html>


