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

<link rel="stylesheet" type="text/css" media="all" href="web/css/pt.css" />

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
//calcualte overall rating for movie
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
<div class="clearF" style="height:0px;"></div>


<div class="poster-rate-left">
<img src="movies/<? echo $mov['image'];?>" />
<br>
<br>
<br>
</div>

<! --  ******************************************  -->

<div class="poster-rate-left">
  <section class="third lift plan-tier">

     <div class="lmov2-cat">
	<h4>Total Score</h4>
      <h5><span class="plan-price">

 <span class="<?=getRatingColor ($net_avg);?>" style="font-size: 25px;"> <? echo number_format($net_avg,2,'.','');?></span>

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

</ul>

	</div>

    </section>
</div>
    <div style="clear: both"></div>




<! --  ******************************************  -->


</div>  <!-- end of "profileText-div" -->
 
<div class="clearF" style="height:25px;"></div>
 

<div class="tabs-container">

<div class="tabs-div">
<div class="tab-active" id="tab1"><a href="javascript:void();" onclick="show_tab('1');" class="tab-link">Movie Cast</a></div>
<div class="tab" id="tab2"><a href="javascript:void();" onclick="show_tab('2');" class="tab-link">Reviews</a></div>
<div class="tab" id="tab3"><a href="javascript:void();" onclick="show_tab('3');" class="tab-link">Photos</a></div>
<div class="tab" id="tab4"><a href="javascript:void();" onclick="show_tab('4');" class="tab-link">Videos</a></div>
<div class="tab" id="tab5"><a href="javascript:void();" onclick="show_tab('5');" class="tab-link">News</a></div>
<div class="tab" id="tab6"><a href="javascript:void();" onclick="show_tab('6');" class="tab-link">More</a></div>

<div class="clearF"></div>
</div>  <!-- end of "tabs-div" -->
<div class="tab-sep"></div>
<br><br>

<!----------------- CAST TAB --------------->

<div class="tab-content" id="1" style="display:block;">
  <table width="600" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="250" class="head02">ACTORS</td>
      <td width="250" class="head02">CHARACTER</td>
      <td width="100" class="head02">SCORE</td>
    </tr>
    <tr>
      <td colspan="3" height="10"></td>
    </tr>
    <?
        $color=FALSE;
        $characters=mysql_query("select * from characters where id_movie=".$idm);
// ***** While start ****************
        while($char=mysql_fetch_array($characters)){
        $reviews=mysql_query("select * from rating where id_character=".$char['id']);
 
                $avg=0; 
                $net_avg=0; 
                if(mysql_num_rows($reviews)>0){
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
 
//******** ALTERNATE ROW COLOR
if ($color == FALSE) { echo "<tr>"; 
                        $color=TRUE; 
                }    
else { echo " <tr bgcolor='C2E0FF'>";
         $color=FALSE;
} 
 
//**********************
?>
 
      <td class="head03">
 
 
 
 
<? 
          $actor=mysql_query("select * from actors where id=".$char['id_actor']);
          $act=mysql_fetch_array($actor);
          ?>
   <a href="profile.php?idm=<? echo $act['id'];?>"><img src="actors/<? echo $act['image'];?>" width="30"></a>  <a href="profile.php?idm=<? echo $act['id'];?>"><? echo $act['f_name']."&nbsp;".$act['l_name'];?></a></td>
      <td class="head03"><a href="character.php?idm=<? echo $char['id'];?>"><? echo $char['char_name'];?></a></td>
      <td class="head03"><span class="<?=getRatingColor ($net_avg);?>"><? echo number_format($net_avg,'2','.','');?></span></td>
        </tr>
    <?
        }
        ?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <div class="clearF"></div>
</div> <!-- end of "tab-content" -->


<!-- ************  REVIEW TAB *************************** -->
<div class="tab-content" id="2" style="display:none;">
 <table width="980" border="0" cellspacing="0" cellpadding="2">
<?
$tscore=0;
$review=mysql_query("select * from rating where id_movie=".$idm. " order by id desc");
if(mysql_num_rows($review)>0){

                        $r=mysql_fetch_array($review);
                        $member=mysql_query("select * from members where id=".$r['id_member']);
                        $m=mysql_fetch_array($member);
 			$total_reviews=mysql_num_rows($review);
 
?>
<table width="80%" border="0" align="center" cellpadding="2" cellspacing="0">
 
<td colspan="2" class="head03"><a href="movie_reviews.php?idm=<? echo $idm;?>">Read All Reviews</a> </td>
<td><tr></tr></td>
  <?

  $rating=mysql_query("select * from rating where id_movie=".$idm. " order by id desc");
  if(mysql_num_rows($rating)>0){
 
        		$rate=mysql_fetch_array($rating);
                        $newDate = date("M d 'y", strtotime($rate['rating_date']));
                        $tscore=($r['plot']+$r['characters']+$r['acting']+$r['cinematography']+$r['soundtrack']+$r['production_design']+$r['execution']+$r['emotional_impact'])/8;
  ?>
<tr>
<td colspan="3" valign="top"><span class="score02">User Rating: <span class="<?=getRatingColor ($tscore);?>"> <? echo number_format($tscore,2,'.','');?></span></span> </td>   
         <td width="246" rowspan="8"" valign="top" class="head03" style="font-size:12px;">
	
<table width="40%" border="0" cellpadding="2" cellspacing="0" bgcolor="#eae4db">
 
      <tr>
        <td colspan="2" class="head02">Member: <? echo $m['name'];?></td>
      </tr>
      <tr>
        <td width="60%" rowspan="3" align="center" valign="top"><img src="members/<? echo $m['image'];?>" width="50" /></td>
        <td width="40%">Location: <? echo $m['location'];?></td>
      </tr>
      <tr>
        <td>Reviews Written:
          <?
                $review_written=mysql_query("select * from rating where id_member=".$m['id']);
                echo mysql_num_rows($review_written);
                ?></td>
      </tr>
      <tr>
        <td><input name="Submit2" type="submit" class="button_lime" value="View Profile" onclick="window.location='member_profile.php?idm=<? echo $m['id'];?>'" /></td>
      </tr>
      </table></td>
</tr>
</tr>
 
<tr> <td align="right" width="30%">Plot/Story: &nbsp  </td> <td align="left" width="7%">  <span class="<?=getRatingColor ($r['plot']);?>">  <? echo $r['plot'];?></span></td> </tr>
<tr> <td align="right" width="30%">Characters: &nbsp </td> <td align="left" width="7%">  <span class="<?=getRatingColor ($r['characters']);?>">  <? echo $r['characters'];?></span></td> </tr>
<tr> <td align="right" width="30%">Acting: &nbsp </td> <td align="left" width="7%">  <span class="<?=getRatingColor ($r['acting']);?>"> <? echo $r['acting'];?></span></td> </tr>
<tr> <td align="right" width="30%">Cinematography: &nbsp  </td> <td align="left" width="7%">  <span class="<?=getRatingColor ($r['cinematography']);?>"> <? echo $r['cinematography'];?></span></td> </tr>
<tr> <td align="right" width="30%">Production Design: &nbsp  </td> <td align="left" width="7%">  <span class="<?=getRatingColor ($r['plot']);?>">  <? echo $r['production_design'];?></span></td> </tr>
<tr> <td align="right" width="30%">Soundtrack: &nbsp </td> <td align="left" width="7%">  <span class="<?=getRatingColor ($r['soundtrack']);?>"> <? echo $r['soundtrack'];?></span></td> </tr>
<tr> <td align="right" width="30%">Execution: &nbsp  </td> <td align="left" width="7%"> <span class="<?=getRatingColor ($r['execution']);?>"> <? echo $r['execution'];?></td> </tr>
<tr> <td align="right" width="30%">Emotional Impact: &nbsp </td> <td align="left" width="7%">  <span class="<?=getRatingColor ($r['emotional_impact']);?>"> <? echo $r['emotional_impact'];?></span></td> </tr>
<tr>
  
<tr>
    <td valign="top" class="head03">&nbsp;</td>
  </tr>
 
  <tr>
    <td colspan="4" class="txt01" style="font-size:16px;"><? echo stripslashes($r['review']);?></td>
    </tr>
  <tr>
    <td height="10" colspan="4" align="center"><img src="smartphone/images/line.png" height="1" width="750" /></td>
 
        <?
        }
}
else
{      ?> 

<span width="383" class="head02">Not Yet Reviewed</span> <br />



<a <? if(isset($_SESSION['idm'])){?> href="write_review_movie.php?idm=<? echo $idm;?>"  <?} else {?> href="log-in.php" <? }?>> Rate this movie</a>

<?
}
?>
<!-- end of "bdyCont-left" -->
</table>
</div>
<div class="clearF"></div>


<!-- ****************  PHOTO TAB **************************** -->
<div class="tab-content" id="3" style="display:none;">
  <table width="700" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="383" class="head02">Photo(s)</td>
      <td width="23" class="head02">&nbsp;</td>
      <td width="294" class="head02">
	  <? if(isset($_SESSION['idm'])){?>
	  <a href="upload_photos.php?idm=<? echo $idm;?>&amp;type=movie"><img src="smartphone/images/write.gif" /> Upload Photo(s) For This Movie </a>
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
	$photos=mysql_query("select * from photos where id_movie=".$idm);
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
  
      <td valign="top" class="head03" width="250"><a href="photos/<? echo $ph['image'];?>" target="_blank"><img src="photos/<? echo $ph['image'];?>" width="200" border="none" class="img-border" /></a><br />Uploaded on: <? echo $newDate;?><br />By  <a href="member_profile.php?idm=<? echo $mem['id'];?>"><? echo $mem['name'];?></a></td>
      
   
	<?
	$count+=1;

	}
	?>
	</tr></table></td></tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div> 
<!-- end of "tab-content" -->

<!-- *************  VIDEO TAB ****************************-->
<div class="tab-content" id="4" style="display:none">
 <table width="700" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="384" class="head02">Video(s)</td>
      <td width="15" class="head02">&nbsp;</td>
      <td width="301" class="head02">  <? if(isset($_SESSION['idm'])){?>
	  <a href="upload_videos.php?idm=<? echo $idm;?>&amp;type=movie"><img src="smartphone/images/write.gif" /> Upload Video(s) For This Movie </a>
	  <?
	  }
	  ?></td>
    </tr>
	 <tr>
      <td colspan="3" height="10"></td>
      </tr>
	  <tr>
      <td colspan="3">
	  <table cellpadding="0" cellspacing="0" width="100%"><tr>
	<?
	$count=0;
	$video=mysql_query("select * from videos where id_movie=".$idm);
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
  
      <td valign="top" class="head03" width="250"><? echo stripslashes($vid['video_code']);?><br />Uploaded on: <? echo $newDate;?><br />By  <a href="member_profile.php?idm=<? echo $mem['id'];?>"><? echo $mem['name'];?></a></td>
      
   
	<?
	$count+=1;
	}
	?>
	</tr></table></td></tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div> 
<!-- end of "tab-content" -->

<!--//************** NEWS TAB *************************** -->
<div class="tab-content" id="5" style="display:none">
  <table width="700" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="249" class="head02">News</td>
      <td width="142" class="head02">&nbsp;</td>
      <td width="259" class="head02">&nbsp;</td>
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

<!--***************** MORE TAB ******************-->
<div class="tab-content" id="6" style="display:none">
  <table width="700" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="249" class="head02">More</td>
      <td width="142" class="head02">&nbsp;</td>
      <td width="259" class="head02">&nbsp;</td>
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
</div>
<!-- end of "tabs-container" -->

<div class="clearF"></div>

</div>  <!-- end of "container-bdy" -->



		 <!---End-content---->

		 
		 <!---start-footer---->

<div class="footer-outerDiv">
</div>  <!-- end of "footer-outerDiv" -->
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


