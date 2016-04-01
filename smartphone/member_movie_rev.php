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
  <link href="web/css/style.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href="web/css/slider.css" rel="stylesheet" type="text/css"  media="all" />
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
 
   <script src='web/js/jquery.js' type="text/javascript"></script>
        <script src='web/js/jquery.MetaData.js' type="text/javascript" language="javascript"></script>
   <script src='web/js/jquery.rating.js' type="text/javascript" language="javascript"></script>
   <link href='web/js/jquery.rating.css' type="text/css" rel="stylesheet"/>
   <!--// documentation resources //-->
   <!--<script src="http://code.jquery.com/jquery-migrate-1.1.1.js" type="text/javascript"></script>-->
   <link type="text/css" href="/@/js/jquery/ui/jquery.ui.css" rel="stylesheet" />
   <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js" type="text/javascript"></script>
 
 
 </head>


  <body>
	<!----Start-Header----->
		 
	<? include("header.php"); ?>

	<!--- End Header---->
	
<!---start-content---->

                 <?php 
if(is_numeric($_GET['idm'])){
$idm=$_GET['idm'];
}else{
$idm=0;
}
 
 
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
 

$review=mysql_query("select * from rating where id_member=".$idm. " && id_actor=0 order by id desc"); 
?>
 
<div class="bottom-grids">
 
<div class="wrap"><br>
 
 
<div class="clearF" style="height:25px;"></div>

<!-------- REVIEWS ----------------->		 
<br />
<span class="head02">Review(s) Found: (<? echo mysql_num_rows($review);?>)</span>
<br /><br />
<?
//results for movie reviews shows here

$tscore=0;

if(mysql_num_rows($review)>0){
$total_reviews=mysql_num_rows($review);

?>


<table width="100%" border="1" align="center" cellpadding="2" cellspacing="1">
  <?
 while($r=mysql_fetch_array($review)){
 	$member=mysql_query("select * from members where id=".$r['id_member']);
			$m=mysql_fetch_array($member);
			$tscore=($r['plot']+$r['characters']+$r['acting']+$r['cinematography']+$r['soundtrack']+$r['production_design']+$r['execution']+$r['emotional_impact'])/8;
                	$movie=mysql_query("select * from movies where id=".$r['id_movie']);
                	$mov=mysql_fetch_array($movie);  

?>

              <tr>
                  <td width="10%" class="head03">Movie: <span style="font-size:20px;"><? echo $mov['movie_name'];?></span></td>
	</td>  
        <tr>
            <td class="head03"><span style="font-size:14px; color:#000000;"><? echo $mov['year'];?></span></td>
            </tr>
          <tr>
            <td class="head03">&nbsp;</td>
            </tr>
          <tr>
             <td width="24%" rowspan="3" class="head03"><img src="movies/<? echo $mov['image'];?>" width="70" class="img-border" /></td>
          </tr>
  <tr>
<td colspan="3" valign="top"><span class="score02">User Rating: <span class="<?=getRatingColor ($tscore);?>"> <? echo number_format($tscore,2,'.','');?></span></span> </td>   
    <td width="300" rowspan="8" valign="right" class="head03" style="font-size:12px;">

    <table float="left" width="50%" border="0" cellpadding="12" cellspacing="10" bgcolor="#eae4db">
      <tr>
        <td colspan="2" class="head02">Member: <? echo $m['name'];?></td>
      </tr>
      <tr>
        <td width="60%" rowspan="3" align="center" valign="top"><img src="members/<? echo $m['image'];?>" width="70" /></td>
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

<tr> <td align="right" width="30%">Plot/Story: &nbsp  </td> <td align="left" width="7%">  <span class="<?=getRatingColor ($r['plot']);?>">  <? echo $r['plot'];?></span></td> </tr>
<tr> <td align="right" width="30%">Characters: &nbsp </td> <td align="left" width="7%">  <span class="<?=getRatingColor ($r['characters']);?>">  <? echo $r['characters'];?></span></td> </tr>
<tr> <td align="right" width="30%">Acting: &nbsp </td> <td align="left" width="7%">  <span class="<?=getRatingColor ($r['acting']);?>"> <? echo $r['acting'];?></span></td> </tr>
<tr> <td align="right" width="30%">Cinematography: &nbsp  </td> <td align="left" width="7%">  <span class="<?=getRatingColor ($r['cinematography']);?>"> <? echo $r['cinematography'];?></span></td> </tr>
<tr> <td align="right" width="30%">Soundtrack: &nbsp </td> <td align="left" width="7%">  <span class="<?=getRatingColor ($r['soundtrack']);?>"> <? echo $r['soundtrack'];?></span></td> </tr>
<tr> <td align="right" width="30%">Production Design: &nbsp  </td> <td align="left" width="7%">  <span class="<?=getRatingColor ($r['production_design']);?>">  <? echo $r['production_design'];?></span></td> </tr>
<tr> <td align="right" width="30%">Execution: &nbsp  </td> <td align="left" width="7%"> <span class="<?=getRatingColor ($r['execution']);?>"> <? echo $r['execution'];?></td> </tr>
<tr> <td align="right" width="30%">Emotional Impact: &nbsp </td> <td align="left" width="7%">  <span class="<?=getRatingColor ($r['emotional_impact']);?>"> <? echo $r['emotional_impact'];?></span></td> </tr>
<tr>


    <td valign="top" class="head03">&nbsp;</td>
  </tr>

  <tr>
    <td colspan="4" class="txt01" style="font-size:16px;"><? echo stripslashes($r['review']);?></td>
    </tr>
  <tr>
    <td height="10" colspan="4" align="center"><img src="smartphone/images/line.png" height="2" width="750" /></td>
 
	<?
	}
	?>
</table>
<? 
}
?>
<!-- end of "bdyCont-left" -->
</div>
<!-- end of "bdyCont-right" -->
<div class="clearF"></div>
</div>  <!-- end of "container-bdy" -->

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


