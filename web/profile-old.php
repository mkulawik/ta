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
  <link href="web/css/style.css" rel="stylesheet" type="text/css"  media="all" />
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
$actor=mysql_query("select * from actors where id=".$idm);
$act=mysql_fetch_array($actor);
//calculate overall rating for movie
$net_avg=0;
$avg=0;
$t_act=0;
$t_perf=0;
$t_char=0;
$t_screen=0;
$t_voice=0;
$review=mysql_query("select * from rating where id_actor=".$idm. " order by id desc");
if(mysql_num_rows($review)>0){
$total_reviews=mysql_num_rows($review);
while($r=mysql_fetch_array($review)){
	$avg=$avg+(($r['acting']+$r['performance']+$r['characterization']+$r['screen_presence']+$r['voice'])/5);
	$t_act=$t_act+$r['acting'];
	$t_perf=$t_perf+$r['performance'];
	$t_char=$t_char+$r['characterization'];
	$t_screen=$t_screen+$r['screen_presence'];
	$t_voice=$t_voice+$r['voice'];
}
$net_avg=$avg/$total_reviews;
}else{
$net_avg=0;
$total_reviews=1;
}

?>


<div class="bottom-grids">

<div class="wrap">
<div class="breadcrumbs">Home > Actors > <? echo $act['f_name']."&nbsp;".$act['l_name'];?></div>
<div class="score" font="Arial" style="font-size:28px;width:100%;"><? echo $act['f_name']."&nbsp;".$act['l_name'];?></div>
<div class="pic-rate-left" ><img src="actors/<? echo $act['image'];?>" /></div>

<!--  <div class="clearF" style="height:0px;"></div> -->

<div class="poster-rate-left" >
<span class="score" >Total Score:<span class="<?=getRatingColor ($net_avg);?>"> <? echo number_format($net_avg,2,'.','');?>
</span></span>
 
<? if ($net_avg >= 8) { echo '<img src="web/images/hot-temp-anim.gif">';} 
   else if ($net_avg >=5) { echo '<img src="web/images/warm.gif">';} 
   else if ($net_avg < 5 && $net_avg >0) { echo '<img src="web/images/cold.gif">';} 
   else echo '<span style="font-size:10px;">  (Not Yet Rated) </span>';?>
<br />
 
<span class="profile-txt">
 
<table style ="width:100%">
  <tr> 
  <?
        $tflag=0;
        if(isset($_SESSION['idm'])){
  $flag=mysql_query("select * from rating where id_member=".$_SESSION['idm']." and id_movie=".$idm);
        $tflag=mysql_num_rows($flag);
  }
  ?>
    <td style="font-size:12px;"><img src="web/images/<? if($tflag>0){echo "flag.png";}else{echo "write.gif";}?>" />
          <? if($tflag>0){?>
        <a href="javascript:void();">Already Reviewed</a>
        <? }else{?>

	 <a <? if(isset($_SESSION['idm'])){?> href="write_review_actor.php?idm=<? echo $idm;?>"  <?} else {?> href="log-in.php" <? }?>> Rate this actor</a>
        <? }?>
        </td>
  </tr>
 
<tr> <td>Acting:</td><td> <span class="<?=getRatingColor ($t_act/$total_reviews);?>"><? echo number_format($t_act/$total_reviews,2,'.','');?></span></td> </tr>
<tr> <td>Performance:</td><td> <span class="<?=getRatingColor ($t_perf/$total_reviews);?>"><? echo number_format($t_perf/$total_reviews,2,'.','');?></span></td> </tr>
<tr> <td>Voice:</td><td> <span class="<?=getRatingColor ($t_voice/$total_reviews);?>"><? echo number_format($t_voice/$total_reviews,2,'.','');?></span></td> </tr>

<tr> <td>Screen Presence:</td><td> <span class="<?=getRatingColor ($t_screen/$total_reviews);?>"><? echo number_format($t_screen/$total_reviews,2,'.','');?></span></td> </tr>
<tr> <td>Characterization:</td><td> <span class="<?=getRatingColor ($t_char/$total_reviews);?>"><? echo number_format($t_char/$total_reviews,2,'.','');?></span></td> </tr>

</table>
<br />
<tr> <td>Birthday:</strong></td><td> <span class="<?=getRatingColor ($t_plot/$total_reviews);?>"><? echo date_format($act['dob'],'%M %Y');?></span></td> </tr>
 
</div>  <!-- end of "profileText-div" -->
 
 
<div class="clearF" style="height:25px;"></div>



<div class="tabs-container">
 
<div class="tabs-div">
<div class="tab-active" id="tab1"><a href="javascript:void();" onclick="show_tab('1');" class="tab-link">Filmography</a></div>
<div class="tab" id="tab2"><a href="javascript:void();" onclick="show_tab('2');" class="tab-link">Reviews</a></div>
<div class="tab" id="tab3"><a href="javascript:void();" onclick="show_tab('3');" class="tab-link">Photos</a></div>
<div class="tab" id="tab4"><a href="javascript:void();" onclick="show_tab('4');" class="tab-link">Videos</a></div>
<div class="tab" id="tab5"><a href="javascript:void();" onclick="show_tab('5');" class="tab-link">News</a></div>
<div class="tab" id="tab6"><a href="javascript:void();" onclick="show_tab('6');" class="tab-link">More</a></div>
 
<div class="clearF"></div>
</div>  <!-- end of "tabs-div" -->

<!----------- FILMOGRAPHY TAB ------------------->
<br />
<div class="tab-content" id="1" style="display:block">
  <table width="700" border="0" cellspacing="0" cellpadding="3">
    <tr>
      <td width="249" class="head02">MOVIES</td>
      <td width="80" class="head02">MOVIE SCORE</td>
      <td width="200" class="head02">CHARACTER</td>
      <td width="80" class="head02">SCORE</td>		
      <td width="80" class="head02">YEAR</td>
    </tr>
	 <tr>
      <td colspan="3" height="10"></td>
      </tr>
	<?
$color=FALSE;
$characters=mysql_query("select *,characters.id as c_id from characters right outer join movies as m on m.id = id_movie where id_actor= ".$idm." order by year desc");
$tscore=0;

// While Start *************

	while($char=mysql_fetch_array($characters)){
		$reviews=mysql_query("select * from rating where id_character=".$char['c_id']);

                $avg=0; 
		$net_avg=0; 
		if(mysql_num_rows($review)>0){
			$total_reviews=mysql_num_rows($reviews);
			while($r=mysql_fetch_array($reviews)){
        			$avg=$avg+(($r['acting']+$r['performance']+$r['voice']+$r['characterization']+$r['screen_presence'])/5);
        			$t_act=$t_act+$r['acting'];
        			$t_perf=$t_perf+$r['performance'];
				$t_voice=$t_voice+$r['voice'];
        			$t_char=$t_char+$r['characterization'];
        			$t_screen=$t_screen+$r['screen_presence'];
							     }
			$net_avg=$avg/$total_reviews;

				     }else 
				     { 
					$net_avg=0;
				     }

//******* Movie rating total *****
$mov_avg=0;
$mov_net_avg=0;
$revs=mysql_query("select * from rating where id_movie=".$char['id_movie']. " order by id desc");
if(mysql_num_rows($revs)>0){
$total_revs=mysql_num_rows($revs);
while($r=mysql_fetch_array($revs)){
      $mov_avg=$mov_avg+(($r['plot']+$r['characters']+$r['acting']+$r['cinematography']+$r['soundtrack']+$r['production_design']+$r['execution']+$r['emotional_impact'])/8);
      $t_plot=$t_plot+$r['plot'];
      $t_char=$t_char+$r['characters'];
      $t_acting=$t_acting+$r['acting'];
      $t_cinema=$t_cinema+$r['cinematography'];
      $t_sound=$t_sound+$r['soundtrack'];
      $t_design=$t_design+$r['production_design'];
      $t_execution=$t_execution+$r['execution'];
      $t_impact=$t_impact+$r['emotional_impact'];
}
$mov_net_avg=$mov_avg/$total_revs;
}else{
$mov_net_avg=0;

}



	?>

<?
// *********   ALTERNATE COLOR  **************************************************************
//$color="1";
if ($color ==FALSE) {		echo "<tr>";  
				$color=TRUE;	
				   }
else {  	echo "<tr bgcolor='#C6D4DD'>";  //FFCC99 //DBDBFF
		$color=FALSE;
      } ?>

<td class="head03"><?
	  $movie=mysql_query("select * from movies where id=".$char['id_movie']);
	  $mov=mysql_fetch_array($movie);
	  ?>
	  <a href="movie.php?idm=<? echo $char['id_movie'];?>"><img src="movies/<? echo $mov['image'];?>" width="30"></a> <a href="movie.php?idm=<? echo $mov['id'];?>"><? echo $mov['movie_name'];?></a></td>
	<td class="head03"><span class="<?=getRatingColor ($mov_net_avg);?>"><? echo number_format($mov_net_avg,'2','.','');?></td>
	<td class="head03"><a href="character.php?idm=<? echo $char['c_id'];?>"><? echo $char['char_name'];?></a></td>
      	<td class="head03"><span class="<?=getRatingColor ($net_avg);?>"><? echo number_format($net_avg,'2','.','');?></td>
	<td class="head03"><?echo $mov['year'];?></a></td> 
	</tr>
	<?

	} //end while
// ******************************************************

	?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div> 
<!-- end of "tab-content" -->


<!--------- REVIEW TAB --------->
<br />
<div class="tab-content" id="2" style="display:none;">
	 
    <?
    $tscore=0;
    $review=mysql_query("select * from rating where id_actor=".$idm. " order by id desc");
   	
    if(mysql_num_rows($review)>0){
			$r=mysql_fetch_array($review);
			$member=mysql_query("select * from members where id=".$r['id_member']);
			$m=mysql_fetch_array($member);
    ?>
 	 
    <table width="80%" border="0" align="center" cellpadding="2" cellspacing="0">
 <tr>
        <td colspan="2" class="score02"><a href="actor_reviews.php?idm=<? echo $idm;?>">Read All Reviews</a> </td>
 </tr>
  <?

 $rating=mysql_query("select * from rating where id_actor=".$idm. " order by id desc");
  if(mysql_num_rows($rating)>0){
 
                $rate=mysql_fetch_array($rating);
		$character=mysql_query("select * from characters where id=".$rate['id_character']);
		$char=mysql_fetch_array($character);
		$movie=mysql_query("select * from movies where id=".$char['id_movie']);
		$mov=mysql_fetch_array($movie);
		$newDate = date("M d 'y", strtotime($rate['rating_date']));
		$tscore=($rate['acting']+$rate['performance']+$rate['voice']+$rate['characterization']+$rate['screen_presence'])/5;

   ?>


<td colspan="3" valign="top"><span class="score02">Rating: <span class="<?=getRatingColor ($tscore);?>"> <? echo number_format($tscore,2,'.','');?></span></span> </td>   
         <td width="246" rowspan="8"" valign="top" class="head03" style="font-size:12px;">
	
<table width="70%" border="0" cellpadding="2" cellspacing="0" bgcolor="#eae4db">
 
      <tr>
        <td colspan="2" class="head02"><a href="member_profile.php?idm=<? echo $m['id'];?>"><? echo $m['name'];?></a></td>
      </tr>
      <tr>
        <td width="60%" rowspan="3" align="center" valign="top"><a href="member_profile.php?idm=<? echo $m['id'];?>"><img src="members/<? echo $m['image'];?>" width="50" /></a></td>
        <td width="40%">Location: <? echo $m['location'];?></td>
      </tr>
      <tr>
        <td>Reviews Written:
          <?
                $review_written=mysql_query("select * from rating where id_member=".$m['id']);
                echo mysql_num_rows($review_written);
                ?></td>
      </tr>
      </table></td>


    <tr>
	    <td colspan="2"></td>
      <td width="400" rowspan="5" valign="top" class="head03" style="font-size:12px;">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                  <td width="76%" class="head03">Character: <span style="font-size:20px;"><? echo $char['char_name'];?></span></td>
          <tr>
            <td class="head03">Movie: <span style="font-size:14px; color:#000000;"><? echo $mov['movie_name'];?></span></td>
            </tr>
          <tr>
            <td class="head03">&nbsp;</td>
            </tr>
          <tr>
             <td width="24%" rowspan="3" class="head03"><img src="characters/<? echo $char['image'];?>" width="30" class="img-border" /></td>
          </tr>
         
        </table></td>
    </tr>
<tr> <td align="right" width="30%">Acting: &nbsp  </td> <td align="left" width="7%">  <span class="<?=getRatingColor ($rate['acting']);?>">  <? echo $r['acting'];?></span></td> </tr>
<tr> <td align="right" width="30%">Performance: &nbsp  </td> <td align="left" width="7%">  <span class="<?=getRatingColor ($rate['performance']);?>">  <? echo $r['performance'];?></span></td> </tr>
<tr> <td align="right" width="30%">Voice: &nbsp  </td> <td align="left" width="7%">  <span class="<?=getRatingColor ($rate['voice']);?>">  <? echo $r['voice'];?></span></td> </tr>
<tr> <td align="right" width="30%">Screen Presence: &nbsp </td> <td align="left" width="7%">  <span class="<?=getRatingColor ($rate['screen_presence']);?>">  <? echo $r['screen_presence'];?></span></td> </tr>
<tr> <td align="right" width="30%">Characterization: &nbsp </td> <td align="left" width="7%">  <span class="<?=getRatingColor ($rate['characterization']);?>"> <? echo $r['characterization'];?></span></td> </tr>
    
<td valign="top" class="head03">&nbsp;
 
 	<span  class="head03" align="left">Written: <? echo $newDate;?></span>
    </td> 
 <tr>
    <td colspan="4" align="left" class="txt01" style="font-size:16px;"><? echo ($r['review']);?></td>
    </tr>
  <tr>
    
        <?
        }
}
else
{      ?> 

<span width="383" class="head02">Not Yet Reviewed</span> <br />
<a href="write_review_actor.php?idm=<? echo $act['id'];?>"><? echo '<img src="web/images/write.gif">'?>Rate this Actor </a>
<?
}
?>
<!-- end of "bdyCont-left" -->
</table>
</div>
<div class="clearF"></div>

<!----- PHOTOS TAB ------------------------>
<br />
<div class="tab-content" id="3" style="display:none;">
  <table width="700" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="383" class="head02">Photo(s)</td>
      <td width="23" class="head02">&nbsp;</td>
      <td width="294" class="head02">
	  <? if(isset($_SESSION['idm'])){?>
	  <a href="upload_photos.php?idm=<? echo $idm;?>&amp;type=actor"><img src="images/write.png" /> Upload Photo(s) For This Actor </a>
	  <?
	  }
	  ?>
	  </td>
    </tr>
	 <tr>
      <td colspan="3" height="10"></td>
      </tr>
	  <tr>
      <td colspan="3">
	  <table cellpadding="0" cellspacing="0" width="100%"><tr>
	<?
	$count=0;
	$photos=mysql_query("select * from photos where id_actor=".$idm);
	while($ph=mysql_fetch_array($photos)){
		$newDate = date("M d 'y", strtotime($ph['posted_date']));
		$mmbers=mysql_query("select * from members where id=".$ph['id_member']);
	 	$mem=mysql_fetch_array($mmbers);
		if($count==3){
	?>
	</tr>
	  <tr>
        <td colspan="3">&nbsp;</td>
    </tr>
	<tr>
	<?
	}
	?>
  
      <td valign="top" class="head03" width="250"><a href="photos/<? echo $ph['image'];?>" target="_blank"><img src="photos/<? echo $ph['image'];?>" width="200" class="img-border" /></a><br />Uploaded on: <? echo $newDate;?><br />By  <a href="member_profile.php?idm=<? echo $mem['id'];?>"><? echo $mem['name'];?></a></td>
      
   
	<?
	$count+=1;
	}
	?>
	</tr></table></td></tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div> 
<!-- end of "tab-content" -->

<! --------- VIDEOS  TAB --------------->

<div class="tab-content" id="4" style="display:none">
 <table border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>Video(s)</td>
      <td>&nbsp;</td>
      <td><? if(isset($_SESSION['idm'])){?>
	  <a href="upload_videos.php?idm=<? echo $idm;?>&amp;type=actor"><img src="images/write.png" /> Upload Video(s) For This Actor </a>
	  <?
	  }
	  ?></td>
    </tr>
	 <tr>
      <td></td>
      </tr>
	  <tr>
      <td colspan="3">
	  <table cellpadding="0" cellspacing="0"><tr>
	<?
	$count=0;
	$video=mysql_query("select * from videos where id_actor=".$idm);
	while($vid=mysql_fetch_array($video)){
		$newDate = date("M d 'y", strtotime($vid['posted_date']));
		$mmbers=mysql_query("select * from members where id=".$vid['id_member']);
	 	$mem=mysql_fetch_array($mmbers);
		if($count==2){
	?>
	</tr>
	  <tr>
        <td colspan="3">&nbsp;</td>
    </tr>
	<tr>
	<?
	}
	?>
  
      <td><? echo stripslashes($vid['video_code']);?><br />Uploaded on: <? echo $newDate;?><br />By  <a href="member_profile.php?idm=<? echo $mem['id'];?>"><? echo $mem['name'];?></a></td>
      
   
	<?
	$count+=1;
	}
	?>
	</tr></table></td></tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div> 
<!-- end of "tab-content" -->

<!-------- NEWS TAB ----------------->
<div class="tab-content" id="5" style="display:none;">
  <table border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td >News</td>
      <td>&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
	 <tr>
      <td colspan="3" height="10"></td>
      </tr>
	
    <tr>
      <td class="head03">Coming Soon... </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div> 
<!-- end of "tab-content" -->

<!-------- MORE TAB ----------------->
<br />
<div class="tab-content" id="5" style="display:none;">
  <table  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td >More</td>
      <td >&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
	 <tr>
      <td></td>
      </tr>
	
    <tr>
      <td>Coming Soon... </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div> 
<!-- end of "tab-content" -->
<!-- end of "tabs-container" -->
</div><!-- end of "wrap" -->
</div>   	<!-- bottom grids -->
</div>




		 <!---End-content---->
<script language="javascript" type="text/javascript">
function empty(val){
document.getElementById(val).value="";
}
function show_tab(val){

		document.getElementById(val).style.display="block";
		document.getElementById('tab'+val).style.backgroundImage="url('images/tab-active.jpg')";
		
		for(i=1;i<=6;i++){
			if(val!=i){
				document.getElementById(i).style.display="none";
				document.getElementById('tab'+i).style.backgroundImage="none";
			}
		}
}
</script>
      <!--- Copyright ---->
	<?php include("copyright.html");?>
 
	</body>
</html>



