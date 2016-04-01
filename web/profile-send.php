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

// ***** Calculate Age *****

function getAge_3($date) {
    return intval(substr(date('Ymd') - date('Ymd', strtotime($date)), 0, -4));
}

// *****  Give error page with invalid id ****
$max_id_q=mysql_query("select * from actors order by id desc limit 0,1");
$max_id_get=mysql_fetch_array($max_id_q);
$max_id=$max_id_get['id'];
$curr_idm=$_GET['idm'];

 if ($curr_idm > $max_id or $curr_idm < 1) {

Header("Location: invalid_actor.php");
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
$t_voice=0;
$t_screen=0;
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

 <div class="clearF" style="height:0px;"></div>

<img src="actors/<? echo $act['image'];?>" width="250px"/>


<!--  ******************************************  -->

    <section class="third lift plan-tier">
      <div class="lmov2-cat">
	<h4>Total Score</h4>
<h5>      <span class="plan-price">

<span class="<?=getRatingColor ($net_avg);?>" style="font-size: 28px;"> <? echo number_format($net_avg,2,'.','');?>
</span> 
<? if ($net_avg >= 8) { echo '<img src="smartphone/images/hot-temp-anim.gif" width="7%">';}
   else if ($net_avg >=5) { echo '<img src="smartphone/images/warm.gif" width="7%">';}
   else if ($net_avg < 5 && $net_avg >0) { echo '<img src="web/images/cold.gif" width="7%">';}
   else echo '<br /><span style="font-size:10px;">  (Not Yet Rated) </span>';?>

	 </span> </h5>

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

<!-- <img src="web/images/<? if($tflag>0){echo "flag.png";}else{echo "write.gif";}?>" />
-->        
	<?
	
        $tflag=0;
        if(isset($_SESSION['idm'])){
  		$flag=mysql_query("select * from rating where id_member=".$_SESSION['idm']." and id_movie=".$idm);
        	$tflag=mysql_num_rows($flag);
 	 }


 	if($tflag>0){?>
        	<a href="javascript:void();">Already Reviewed </a><img src = "web/images/flag.png">
        <? }else{?>

         <a <? if(isset($_SESSION['idm'])){?> href="write_review_actor.php?idm=<? echo $idm;?>"  <?} else {?> href="log-in.php" <? }?> class="button">Rate me</a>
        <? }?>

</li>
</ul>

	</div>
    </section>

    <div style="clear: both"></div>

 <br /> 

<! --..................-->

<span class="birth-age"> <b>Date of Birth:</b> <h0> <? echo date("F j, Y", strtotime($act['dob'])); ?> </h0>
<br /> <b>Age:&nbsp; </b> <h0> <?  echo getAge_3($act['dob']); ?></h0>
<br />
</span>
<!--  ******************************************  -->

<!-- **********  FLOWER TEST ***************** -->
<script>


function sendgift($giftype,$profilename,$idm,$secpin){

var con;

switch($giftype){

case 0:
     con = confirm('Send a flower to ' + $profilename + '?');
if (con == true) {
     window.location= "send_flower.php?idm="+$idm+"&gid="+$giftype+"&spn="+$secpin;
}
     break;

case 1:
     con =     confirm('Send a bouquet to ' + $profilename + '? Ten (10) flowers will be deducted.');
if (con == true) {
     window.location= "send_bouquet.php?idm="+$idm+"&gid="+$giftype+"&spn="+$secpin;
}
     break;

case 2:
     con =    confirm('Send a teddybear to ' + $profilename + '? One Hundred (100) flowers will be deducted.');
if (con == true) {
     window.location= "send_teddybear.php?idm="+$idm+"&gid="+$giftype+"&spn="+$secpin;
}
     break;

case 3:
     con =   confirm('Send a gem to ' + $profilename + '? One Thousand (1,000) flowers will be deducted.');
if (con == true) {
     window.location= "send_gem.php?idm="+$idm+"&gid="+$giftype;
}
     break;

default:



}

}




</script>
<?
        $flower=0;
	$tot_flow=0;
	$tot_flow2=0;
	$tot_bouq=0;
	$tot_bouq2=0;
	$tot_tedd=0;
	$tot_tedd2=0;
	$tot_gem=0;
	$tot_gem2=0;

                $flower=mysql_query("select * from gifts where id_member=".$_SESSION['idm']." and id_actor=".$idm);
                $tflower=mysql_num_rows($flower);

	$tot_flow=mysql_query("select * from gifts where id_actor=".$idm." and flower is not null");
	$tot_flow2=mysql_num_rows($tot_flow);

	$tot_bouq=mysql_query("select * from gifts where id_actor=".$idm." and bouquet is not null");
        $tot_bouq2=mysql_num_rows($tot_bouq);

        $tot_tedd=mysql_query("select * from gifts where id_actor=".$idm." and teddy is not null");
        $tot_tedd2=mysql_num_rows($tot_tedd);

        $tot_gem=mysql_query("select * from gifts where id_actor=".$idm." and gemstone is not null");
        $tot_gem2=mysql_num_rows($tot_gem);        

	?>
	<br />
	<img src="smartphone/images/flower.png" width="15"> <? echo $tot_flow2; ?> </br>
        <img src="smartphone/images/bouquet.png" width="15"> <? echo $tot_bouq2; ?>&nbsp; <img width="15%"> </br>
	<img src="smartphone/images/teddy.png" width="20"> <? echo $tot_tedd2; ?> </br>

	<?

     //   if($tflower>0){?>
 <!--               <a href="javascript:void();">Flower given</a>
   -->     
   <?// }else{

?>


          <span
<? if(isset($_SESSION['idm'])){

$secpin=mt_rand(1000,9999);

$_SESSION['secpin']=$secpin;


?>
 onclick="$a = sendgift(0,' <? echo $act['f_name']."&nbsp;".$act['l_name'];?>',<? echo $idm ?>,<? echo $secpin ?>)" 
<?} else {?>
onclick="location.href='log-in.php';"
<?} ?>

class="button">Send Flower</span>

          <span 

<? if(isset($_SESSION['idm'])){
?>
onclick="$a = sendgift(1,' <? echo $act['f_name']."&nbsp;".$act['l_name'];?>',<? echo $idm ?>,<? echo $secpin ?>)" 
<?} else {?>
onclick="location.href='log-in.php';"
<?} ?>

class="button">Send Bouquet</span>


          <span 
<? if(isset($_SESSION['idm'])){
?>
onclick="$a = sendgift(2,' <? echo $act['f_name']."&nbsp;".$act['l_name'];?>',<? echo $idm ?>,<? echo $secpin ?>)"

<?} else {?>
onclick="location.href='log-in.php';"
<?} ?>

class="button">Send Teddybear</span>


        <?
/*
echo $a; 
if (isset($a)){

echo $a;
}

}
*/
?>


</div>
<!-- **********  Flower test - END *************-->


</div>  <!-- end of "profileText-div" -->
<!-- <div class="camera_wrap camera_azure_skin" id="camera_wrap_1"></div> 
 
<!-- <div class="clearF" style="height:5px;"></div>
-->
<div class="wrap">

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

<!-- ****************  FILMOGRAPHY TAB ***************************  -->
<br />
<div class="tab-content" id="1" style="display:block">
  
	<? include ("filmography_tab_actor.php"); ?>

</div> 
<!-- end of "tab-content" -->
 

<!-- ***********  REVIEWS TAB ****************************-->

<div class="tab-content" id="2" style="display:none;">
<div> <a href="actor_reviews.php?idm=<?echo $idm; ?>" class="button">Read All Reviews</a></div> <br />

<? include("actor_reviews2_tab.php"); ?>
         

</div> <!-- end of "tab-content" -->



<!-- *************  PHOTO TAB ****************************-->

<div class="tab-content" id="3" style="display:none;">
           <? if(isset($_SESSION['idm'])){?>
<div> <a href="upload_photos.php?idm=<?echo $idm; ?>&amp;type=actor" class="button">Upload photo under this actor</a></div>
          <?
          }
       else {
        ?> Login to upload videos <br /><br /> <?
        }

        include ("photos_tab_actor.php");
          ?>


</div> <!-- end of "tab-content" -->

<!-- *************  VIDEO TAB ****************************-->
<div class="tab-content" id="4" style="display:none">
           <? if(isset($_SESSION['idm'])){?>
<div> <a href="upload_videos.php?idm=<?echo $idm; ?>&amp;type=actor" class="button">Upload video under this actor</a></div>
          <?
          }
       else {
        ?> Login to upload videos <br /><br /> <?
        }

        include ("videos_tab_actor.php");
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
<!-- end of "tabs-container" -->
</div><!-- end of "wrap" -->
</div>   	<!-- bottom grids -->

</div>
</div>


		 <!---End-content---->

                     <div class="clear"> </div>

		 

        <!--- Copyright ------>

             <?php include("copyright.html");?>

	</body>
</html>



