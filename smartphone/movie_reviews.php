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



<html>
<head>
  <title>FADViews - Film Actor Database Reviews | Home </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="smartphone/css/stylenotabl.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href="smartphone/css/slider.css" rel="stylesheet" type="text/css"  media="all" />
  <script type="text/javascript" src="web/js/jquery.min.js"></script> 
  <script type="text/javascript" src="web/js/jquery.easing.1.3.js"></script> 
  <script type="text/javascript" src="web/js/camera.min.js"></script>
  <script type="text/javascript" src="web/js/jquery.lightbox.js"></script> 
  <link rel="stylesheet" type="text/css" href="web/css/lightbox.css" media="screen" />
          <script type="text/javascript">
                  $(function() {
                        $('.gallery a').lightBox();
                  });
          </script>
         <script type="text/javascript">
                           jQuery(function(){
                                jQuery('#camera_wrap_1').camera({
                                        pagination: false,
                                });
                        });
         </script>
 
   <script src='smartphone/js/jquery.js' type="text/javascript"></script>
        <script src='smartphone/js/jquery.MetaData.js' type="text/javascript" language="javascript"></script>
   <!--// documentation resources //-->
   <!--<script src="http://code.jquery.com/jquery-migrate-1.1.1.js" type="text/javascript"></script>-->
   <link type="text/css" href="/@/js/jquery/ui/jquery.ui.css" rel="stylesheet" />
   <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js" type="text/javascript"></script>
 
<link rel="stylesheet" type="text/css" media="all" href="smartphone/css/pt.css" />
 
 </head>
  <body>
        <!----start-header----->
   
	<? include ("header.php"); ?>
	<!----End-header----->

		 <!---START-Content---->
		 
		 <?php 
if(is_numeric($_GET['idm'])){
$idm=$_GET['idm'];
}else{
$idm=0;
}




$movies=mysql_query("select * from movies where id=".$idm);
$mov=mysql_fetch_array($movies);
//calculate overall rating for movie
$net_avg=0;
$avg=0;
$t_plot=0;
$t_char=0;
$t_acting=0;
$t_cinema=0;
$t_sound=0;
$t_design=0;
$t_execution=0;
$t_impact=0;


$review=mysql_query("select * from rating where id_movie=".$idm. " order by id desc");
if(mysql_num_rows($review)>0){
$total_reviews=mysql_num_rows($review);
while($r=mysql_fetch_array($review)){
	$avg=$avg+(($r['plot']+$r['characters']+$r['acting']+$r['cinematography']+$r['soundtrack']+$r['production_design']+$r['execution']+$r['emotional_impact'])/8);
	$t_plot=$t_plot+$r['plot'];
	$t_char=$t_char+$r['characters'];
	$t_acting=$t_acting+$r['acting'];
	$t_cinema=$t_cinema+$r['cinematography'];
	$t_sound=$t_sound+$r['soundtrack'];
	$t_design=$t_design+$r['production_design'];
	$t_execution=$t_execution+$r['execution'];
	$t_impact=$t_impact+$r['emotional_impact'];
}
$net_avg=$avg/$total_reviews;
}else{
$net_avg=0;
$total_reviews=1;
}
?>

<div class="bottom-grids">
 
<div class="wrap"><br>
<div class="breadcrumbs">Home > Movies > <? echo $mov['movie_name'];?></div>
<div class="score" font="Arial" style="font-size:28px;width:100%;"><? echo $mov['movie_name'];?></div>
<br />
<div class="clearF" style="height:0px;"></div>






<div class="poster-rate-left"> 
	<img src="movies/<? echo $mov['image'];?>" width="150px" />
<br /><br /><br />
</div>

<! --  ******************************************  -->
  

<section class="third lift plan-tier">

     <div class="lmov2-cat">
	<h4>Total Score</h4>
      <h5><span class="plan-price">

 <span class="<?=getRatingColor ($net_avg);?>" style="font-size: 25px;"> <? echo number_format($net_avg,2,'.','');?></span>

<? if ($net_avg >= 8) { echo '<img src="smartphone/images/hot-temp-anim.gif" width="7%">';}
   else if ($net_avg >=5) { echo '<img src="smartphone/images/warm.gif" width="7%">';}
   else if ($net_avg < 5 && $net_avg >0) { echo '<img src="smartphone/images/cold.gif" width="7%">';}
   else echo '<br /><span style="font-size:10px;">  (Not Yet Rated) </span>';
?>

	</span></h5>

      <ul>

<li><strong>Plot/Story</strong> <br>
<span class="<?=getRatingColor ($t_plot/$total_reviews);?>"> <? echo number_format($t_plot/$total_reviews,2,'.','');?> </span>
</li>

<li><strong>Characters</strong><br>
<span class="<?=getRatingColor ($t_char/$total_reviews);?>">  <? echo number_format($t_char/$total_reviews,2,'.','');?> </span>         
</li>

<li><strong>Acting</strong> <br>
<span class="<?=getRatingColor ($t_acting/$total_reviews)?>"> <? echo number_format($t_acting/$total_reviews,2,'.','');?> </span> 
</li>

<li><strong>Cinematography</strong><br> 
<span class="<?=getRatingColor ($t_cinema/$total_reviews);?>">  <? echo number_format($t_cinema/$total_reviews,2,'.','');?></span>
</li>

<li><strong>Production Design</strong><br>
<span class="<?=getRatingColor ($t_design/$total_reviews);?>">  <? echo number_format($t_design/$total_reviews,2,'.','');?></span>  
</li>

<li><strong>Soundtrack</strong><br>
<span class="<?=getRatingColor ($t_sound/$total_reviews);?>">  <? echo number_format($t_sound/$total_reviews,2,'.','');?></span>
</li>

<li><strong>Execution</strong> <br> 
<span class="<?=getRatingColor ($t_execution/$total_reviews);?>">  <? echo number_format($t_execution/$total_reviews,2,'.','');?></span> 
</li>

<li><strong>Emotional Impact</strong><br> 
<span class="<?=getRatingColor ($t_impact/$total_reviews);?>"> <? echo number_format($t_impact/$total_reviews,2,'.','');?></span>
</li>

<li>
	<? 
        $tflag=0;
        if(isset($_SESSION['idm'])){
  		$flag=mysql_query("select * from rating where id_member=".$_SESSION['idm']." and id_movie=".$idm);
        	$tflag=mysql_num_rows($flag);
  	}	

         
	if($tflag>0){?>
        <a href="javascript:void();"> Already Reviewed </a><img src = "web/images/flag.png">
        <? }else{?>

        <font size="2"><a <? if(isset($_SESSION['idm'])){?> href="write_review_movie.php?idm=<? echo $idm;?>"  <?} else {?> href="log-in.php" <? }?> class="button">Rate me</a></font>        <? }?>

</li>

</ul>

	</div>

    </section>
</div>
    <div style="clear: both"></div>
<br />
.................
</div>

<hr />  
<div class="wrap">
		 
<br />

<div class="user-rev-marg">
<span class="head02">Review(s) Found: (<? echo mysql_num_rows($review);?>)</span>
<br /><br />
<?

//results for movie reviews shows here
	include ("movie_reviews2.php");

?>
</div>

<!-- end of "bdyCont-left" -->
</div>
<!-- end of "bdyCont-right" -->
<div class="clearF"></div>
</div>  <!-- end of "container-bdy" -->

</div>
</div>   <!-- end of "cont-bg" -->







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


