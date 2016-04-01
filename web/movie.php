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
$max_id_q=mysql_query("select * from movies order by id desc limit 0,1");
$max_id_get=mysql_fetch_array($max_id_q);
$max_id=$max_id_get['id'];
$curr_idm=$_GET['idm'];

 if ($curr_idm > $max_id or $curr_idm < 1) {

Header("Location: invalid_movie.php");
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
<div class="score" style="font-size:28px;width:100%;"><? echo $mov['movie_name'];?> &nbsp; <span style="font-size:20" >(<? echo $mov['year']; ?>)</span></div>


<img src="movies/<? echo $mov['image'];?>" width="300px" style="margin-bottom:20px" />

<! --  ******************************************  -->
  

<section class="third lift plan-tier">

     <div class="lmov2-cat">
	<h4>Total Score</h4>
      <h5><span class="plan-price">

 <span class="<?=getRatingColor ($net_avg);?>" style="font-size: 30px;"> <? echo number_format($net_avg,2,'.','');?></span>

<? if ($net_avg >= 8) { echo '<img src="smartphone/images/hot-temp-anim.gif" width="7%">';}
   else if ($net_avg >=5) { echo '<img src="smartphone/images/warm.gif" width="7%">';}
   else if ($net_avg < 5 && $net_avg >0) { echo '<img src="web/images/cold.gif" width="7%">';}
   else echo '<br /><span style="font-size:10px;">  (Not Yet Rated) </span>';?>



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

        <a <? if(isset($_SESSION['idm'])){?> href="write_review_movie.php?idm=<? echo $idm;?>"  <?} else {?> href="log-in.php" <? }?> class="button">Rate me</a>
        <? }?>

</li>

</ul>

	</div>

    </section>

</div>
    <div style="clear: both"></div>
.................

<! --  ******************************************  -->


</div>  <!-- end of "profileText-div" -->

<div class="camera_wrap camera_azure_skin" id="camera_wrap_1"></div>
 
<div class="clearF"></div>
<div class="wrap">

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
<div class="tab-sep"></div>
<br /><br />

<!-- *************  CAST TAB ****************************-->

<div class="tab-content"  id="1" style="display:block;">	
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
    </tr>
  </table>
  <div class="clearF"></div>
</div> <!-- end of "tab-content" -->


<!-- ************  REVIEW TAB *************************** -->
<div class="tab-content" id="2" style="display:none;">

<div> <a href="movie_reviews.php?idm=<?echo $idm; ?>" class="button">Read All Reviews</a></div>

	<? include("movie_reviews2_tab.php"); ?>

</div>
<!-- ****************  PHOTO TAB **************************** -->
<div class="tab-content" id="3" style="display:none;">

           <? if(isset($_SESSION['idm'])){?>
<div> <a href="upload_photos.php?idm=<?echo $idm; ?>&amp;type=movie" class="button">Upload Photo for this Movie</a></div>
          <?
          }
       else {
        ?> Login to upload videos <br /><br /> <?
        }

        include ("photos_tab_movie.php");
          ?>


</div> <!-- end of "tab-content" -->


<!-- *************  VIDEO TAB ****************************-->
<div class="tab-content" id="4" style="display:none">
	   <? if(isset($_SESSION['idm'])){?>
<div> <a href="upload_videos.php?idm=<?echo $idm; ?>&amp;type=movie" class="button">Upload Video for this Movie</a></div>
          <?
          }
       else {
        ?> Login to upload videos <br /><br /> <?
        } 
        
	include ("videos_tab_movie.php");
	  ?>
	
      
</div> 
<!-- end of "tab-content" -->

<!-- ************  NEWS TAB *************************** -->
<div class="tab-content" id="5" style="display:none;">
Coming soon...<br /><br /> <br />

</div> 
<!-- end of "tab-content" -->


<!-- ************  MORE TAB *************************** -->
<div class="tab-content" id="6" style="display:none;">
Coming soon...<br /><br /> <br />
</div>  <!-- end of "tab-content" -->

</div>
<!-- end of "tabs-container" -->

</div>  <!-- end wrap for tab content -->
<div class="clearF"></div>

</div>  <!-- end of "container-bdy" -->



		 <!---End-content---->

		 
		 <!---start-footer---->

<div class="footer-outerDiv">
</div>  <!-- end of "footer-outerDiv" -->

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

