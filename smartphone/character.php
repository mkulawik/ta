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

// *****  Give error page with invalid id ****
$max_id_q=mysql_query("select * from characters order by id desc limit 0,1");
$max_id_get=mysql_fetch_array($max_id_q);
$max_id=$max_id_get['id'];
$curr_idm=$_GET['idm'];

 if ($curr_idm > $max_id or $curr_idm < 1) {

Header("Location: invalid_character.php");
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
  <link href="smartphone/css/stylenotabl.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href="smartphone/css/slider.css" rel="stylesheet" type="text/css"  media="all" />
  <script type="text/javascript" src="smartphone/js/jquery.min.js"></script> 
  <script type="text/javascript" src="smartphone/js/jquery.easing.1.3.js"></script> 
  <script type="text/javascript" src="smartphone/js/camera.min.js"></script>
         <script type="text/javascript">
                           jQuery(function(){
                                jQuery('#camera_wrap_1').camera({
                                        pagination: false,
                                });
                        });
         </script>

<link rel="stylesheet" type="text/css" media="all" href="smartphone/css/pt.css" />

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

$char_actor=mysql_query("select * from actors where id=".$char['id_actor']);
$char_act=mysql_fetch_array($char_actor);

$char_movie=mysql_query("select * from movies where id=".$char['id_movie']);
$char_mov=mysql_fetch_array($char_movie);

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

<div class="wrap"><br>

<div class="breadcrumbs">Home > Character > <? echo $char['char_name'];?></div>
<div class="score" font="Arial" style="font-size:28px;width:100%;"><? echo $char['char_name'];?></div>
<div class="pic-char-left"><img src="characters/<? echo $char['image'];?>" />
<br> <br>

Portrayed by:<br> 
<div align="center">
<a href="profile.php?idm=<? echo $char_act['id'];?>"><? echo $char_act['f_name']."&nbsp;".$char_act['l_name'];?></a>
<br>
<a href="profile.php?idm=<? echo $char_act['id'];?>"><img src="actors/<? echo $char_act['image'];?>" width="30"></a>  
<br /><br />
</div>
in: <br /> 
<div align="center">
<a href="movie.php?idm=<? echo $char_mov['id'];?>">
<? echo $char_mov['movie_name'];?><br>
<img src="movies/<? echo $char_mov['image'];?>" width="30">
</a>
<br />
</div>

</div>  <!-- end 'pic-char left' -->

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
   else echo '<br /><span style="font-size:10px;">  (Not Yet Rated) </span>';?>

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

<li>

	<?
	
        $tflag=0;
        if(isset($_SESSION['idm'])){
  		$flag=mysql_query("select * from rating where id_member=".$_SESSION['idm']." and id_character=".$idm);
        	$tflag=mysql_num_rows($flag);
 	 }


 	if($tflag>0){?>
        	<a href="javascript:void();">Already Reviewed </a><img src = "web/images/flag.png">
        <? }else{?>

         <a <? if(isset($_SESSION['idm'])){?> href="write_review_character.php?idm=<? echo $idm;?>"  <?} else {?> href="log-in.php" <? }?> class="button">Rate me</a>
        <? }?>

</li>

</ul>

	</div>
    </section>

<!--    <div style="clear: both"></div>
-->
<! --  ******************************************  -->

<div class="clearF" style="height:25px;"></div>

<div class="camera_wrap" id="camera_wrap_1"></div> 

<div class="tabs-container">
 
<div class="tabs-div">
<div class="tab-active" id="tab1"><a href="javascript:void();" onclick="show_tab('1');" class="tab-link">Cast</a></div>
<div class="tab" id="tab2"><a href="javascript:void();" onclick="show_tab('2');" class="tab-link">Reviews</a></div>
<div class="tab" id="tab3"><a href="javascript:void();" onclick="show_tab('3');" class="tab-link">Photos</a></div>
<div class="tab" id="tab4"><a href="javascript:void();" onclick="show_tab('4');" class="tab-link">Videos</a></div>
<div class="tab" id="tab5"><a href="javascript:void();" onclick="show_tab('5');" class="tab-link">News</a></div>
<div class="tab" id="tab6"><a href="javascript:void();" onclick="show_tab('6');" class="tab-link">More</a></div>
 
<div class="clearF"></div>
</div>  <!-- end of "tabs-div" -->

<!-- ****************  CAST TAB ********************** -->
                                
<br><br>
<div class="tab-content" id="1" style="display:block;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width"48%" class="head02">ACTOR</td>
      <td width="45%" class="head02">CHARACTER</td>
      <td width="7%" class="head02">SCORE</td>
    </tr>
    <tr>
      <td colspan="3" height="10"></td>
    </tr>
    <?
	$characters=mysql_query("select * from characters where id_movie=".$char['id_movie']);

// ***** While Start **********

	while($char=mysql_fetch_array($characters)){
	$reviews=mysql_query("select * from rating where id_character=".$char['id']);
	
		$avg=0; 
		$net_avg=0; 
		if(mysql_num_rows($review)>0){
			$total_reviews=mysql_num_rows($reviews);
			while($r=mysql_fetch_array($reviews)){
        			$avg=$avg+(($r['acting']+$r['performance']+$r['characterization']+$r['screen_presence'])/4);
        			$t_act=$t_act+$r['acting'];
        			$t_perf=$t_perf+$r['performance'];
        			$t_char=$t_char+$r['characterization'];
        			$t_screen=$t_screen+$r['screen_presence'];
							     }
			$net_avg=$avg/$total_reviews;

				     }else 
				     { 
					$net_avg=0;
				     }


// *********   ALTERNATE COLOR  **************************************************************
//$color="1";
if ($color ==FALSE) {		echo "<tr>";  
				$color=TRUE;	
				   }
else {  	echo "<tr bgcolor='#C6D4DD'>";  //FFCC99 //DBDBFF
		$color=FALSE;
      } ?>

      <td class="head03"><? 
	  $actor=mysql_query("select * from actors where id=".$char['id_actor']);
	  $act=mysql_fetch_array($actor);
	  ?>
<!---  <a href="profile.php?idm=<? echo $act['id'];?>"><? echo $act['f_name']."&nbsp;".$act['l_name'];?></a></td> --->
   <a href="profile.php?idm=<? echo $act['id'];?>"><img src="actors/<? echo $act['image'];?>" width="30"></a>  <a href="profile.php?idm=<? echo $act['id'];?>"><? echo $act['f_name']."&nbsp;".$act['l_name'];?></a></td>
      <td class="head03"><a href="character.php?idm=<? echo $char['id'];?>"><? echo $char['char_name'];?></a></td>
      <td class="head03"><span class="<?=getRatingColor ($net_avg);?>"><? echo number_format($net_avg,'2','.','');?></span></td>
    </tr>
    <?
	}  // End While
// ***********************************
	?>
  </table>
</div>  

<!-- *************  REVIEWS TAB ****************************-->
<div class="tab-content" id="2" style="display:none;">

<div> <a href="character_reviews.php?idm=<?echo $idm; ?>" class="button">Read All Reviews</a></div>


<?  include ("character_reviews2_tab.php"); ?>
</div>
<!-- end of "tab-content" -->         

<!-- *************  PHOTOS TAB ****************************-->
<div class="tab-content" id="3" style="display:none;">

           <? if(isset($_SESSION['idm'])){?>
<div> <a href="upload_photos.php?idm=<?echo $idm; ?>&amp;type=character" class="button">Upload photos under this character</a></div>
          <?
          }
       else {
        ?> Login to upload photos <br /><br /> <?
        }

        include ("photos_tab_character.php");
          ?>

</div>
<!-- end of "tab-content" -->

<!-- *************  VIDEOS TAB ****************************-->
<div class="tab-content" id="4" style="display:none">
           <? if(isset($_SESSION['idm'])){?>
<div> <a href="upload_videos.php?idm=<?echo $idm; ?>&amp;type=character" class="button">Upload video under this character</a></div>
          <?
          }
       else {
        ?> Login to upload videos <br /><br /> <?
        }

        include ("videos_tab_character.php");
          ?>

</div>
<!-- end of "tab-content" -->

<!-- *************  News TAB ****************************-->
<div class="tab-content" id="5" style="display:none">
	<br /> Coming Soon.... <br />

</div> 
<!-- end of "tab-content" -->

<!-- *************  More  TAB ****************************-->
<div class="tab-content" id="6" style="display:none">
        <br /> Coming Soon.... <br />

</div> 
<!-- end of "tab-content" -->



</div><!-- end of "tabs-container" -->
</div><!-- end of "wrap" -->
</div>
		 <!---End-content---->

                 <div class="clear"> </div>
		 

        <!--- Copyright ------>

             <?php include("copyright.html");?>

	</body>
</html>


