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


// ****** Calculate Age ******
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
$gid=$_GET['gid'];

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
<div class="pic-rate-left" ><img src="actors/<? echo $act['image'];?>" /> 
<br /><br />
<span class="birth-age"> <b>Date of Birth:</b> <br ><h0> <? echo date("F j, Y", strtotime($act['dob'])); ?> </h0>
&nbsp;<b>Age:&nbsp; </b> <h0> <?  echo getAge_3($act['dob']); ?></h0>
<? echo $gid; ?>
</span>

</div>
          <div class="clear"> </div>
<br />

<!--  ************  LIST OF GIFTS ******************************  -->

<hr>
<br />
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="20%" class="head02">GIFT</td>
      <td width="40%" class="head02">MEMBER</td>
      <td width="40%" class="head02">DATE</td>
    </tr>
         <tr>
      <td colspan="3" height="10"></td>
      </tr>
<?
$mygifts=mysql_query("select * from gifts where id_actor=".$idm." order by gift_date desc");
if(mysql_num_rows($mygifts)>0){

while($g=mysql_fetch_array($mygifts)){


// *********   ALTERNATE COLOR  **************************************************************
if ($color ==FALSE) {           echo "<tr>";
                                $color=TRUE;
                                   }
else {          echo "<tr bgcolor='#C6D4DD'>";  //FFCC99 //DBDBFF
                $color=FALSE;
      } ?>

          <td class="head03">

<?
  if (isset($g['flower']))  echo '<img src="smartphone/images/flower.png" width="12"> ';
  if (isset($g['bouquet'])) echo '<img src="smartphone/images/bouquet.png" width="20"> ';
  if (isset($g['teddy']))   echo '<img src="smartphone/images/teddy.png" width="20"> ';
?>

</td>

<td class="head03"><?
          $member=mysql_query("select * from members where id=".$g['id_member']);
          $memb=mysql_fetch_array($member);
          ?>


<a href="member_profile.php?idm=<? echo $g['id_member'];?>"><img src="members/<? echo $memb['image'];?>" width="30"></a> <a href="member_profile.php?idm=<? echo $memb['id'];?>"><? echo $memb['name'] ?></a></td>

</td>

        <td class="head03"><?echo $g['gift_date'];?></td>
        </tr>
<?      
        } // ***** end while
        ?>
        
<?      
}
?>
  </table>
</div> <!-- end of "tab-content" -->

</div>
</div>


		 <!---End-content---->

                     <div class="clear"> </div>

		 

        <!--- Copyright ------>

             <?php include("copyright.html");?>

	</body>
</html>





