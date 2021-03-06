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



<html>
<head>
  <title>FADViews - Film Actor Database Reviews</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="web/css/stylenotabl.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
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


 </head>
  <body>
	<!----start-header----->
   
	<? include ("header.php"); ?>
	<!----End-header----->
		 <!---start-content---->
<? if(is_numeric($_GET['idm'])){
$idm=$_GET['idm'];
}else{
$idm=0;
}
$member=mysql_query("select * from members where id=".$idm);
$mem=mysql_fetch_array($member);
$newDate = date("M d 'y", strtotime($mem['reg_date']));
?>


<div class="bottom-grids">
 
<div class="wrap"><br>

<div class="score" style="font-size:28px; color:#aa8036;"><? echo $mem['name'];?></div><br /><br />
<div class="profileImg-div">
<?
if(is_file("members/".$mem['image'])){
?>
<img src="members/<? echo $mem['image'];?>" width="100" />
<?
}else{
?>
<img src="members/noimage.jpg" width="350" />
<?
}
?>
</div>

<div class="mem-profile">
<table cellspacing="10"> <tr><td>
<h2>Location: </h2></td><td> <hc> <? echo $mem['location'];?></hc></td></tr>
<tr><td>
<h2>Member since: </h2></td><td> <hc> <? echo $newDate;?></hc></td></tr>
<tr><td>
<h2>About me: </h2> </td><td><hc> <? echo $mem['about_me'];?></hc> </td></tr>
</table>
</div>  <!-- end of "mem-profile" -->
<div class="clearF" style="height:25px;"></div>

<div class="clearF" style="height:25px;"></div>



<div class="tabs-container">
 
<div class="tabs-div">
<div class="tab-active" id="tab1"><a href="javascript:void();" onclick="show_tab('1');" class="tab-link">Movies Reviewed</a></div>
<div class="tab" id="tab2"><a href="javascript:void();" onclick="show_tab('2');" class="tab-link">Actors Reviewed</a></div>
<div class="tab" id="tab3"><a href="javascript:void();" onclick="show_tab('3');" class="tab-link">My Photos</a></div>
<div class="tab" id="tab4"><a href="javascript:void();" onclick="show_tab('4');" class="tab-link">My Videos</a></div>
<div class="tab" id="tab5"><a href="javascript:void();" onclick="show_tab('5');" class="tab-link">My Picks</a></div>
<div class="tab" id="tab6"><a href="javascript:void();" onclick="show_tab('6');" class="tab-link">My News/Blogs</a></div>
 
<div class="clearF"></div>
</div>  <!-- end of "tabs-div" -->

<div class="tab-sep"></div>
<br><br>

<!----------- Movie TAB ------------------->
<div class="tab-content"  id="1" style="display:block;">	
  <table width="500" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="250" class="head02">MOVIES</td>
      <td width="150" class="head02">USER SCORE</td>
      <td width="100" class="head02">YEAR</td>
    </tr>
	 <tr>
      <td colspan="3" height="10"></td>
      </tr>
<?
$color=FALSE;
$tscore=0;
$review=mysql_query("select * from rating where id_member=".$idm."&& id_actor = 0 order by id");
if(mysql_num_rows($review)>0){
$total_reviews=mysql_num_rows($review);

?>
  <?
 while($r=mysql_fetch_array($review)){
 	$member=mysql_query("select * from members where id=".$idm);
			$m=mysql_fetch_array($member);
			$tscore=($r['plot']+$r['characters']+$r['acting']+$r['cinematography']+$r['soundtrack']+$r['production_design']+$r['execution']+$r['emotional_impact'])/8;
	
?>

<?
// *********   ALTERNATE COLOR  **************************************************************
if ($color ==FALSE) {		echo "<tr>";  
				$color=TRUE;	
				   }
else {  	echo "<tr bgcolor='#C6D4DD'>";  //FFCC99 //DBDBFF
		$color=FALSE;
      } ?>

<td class="head03"><?
	  $movie=mysql_query("select * from movies where id=".$r['id_movie']);
	  $mov=mysql_fetch_array($movie);
	  ?>
	  

<a href="movie.php?idm=<? echo $r['id_movie'];?>"><img src="movies/<? echo $mov['image'];?>" width="30"></a> <a href="movie.php?idm=<? echo $mov['id'];?>"><? echo $mov['movie_name'];?></a></td>
	  <td class="head03"><a href="member_movie_rev.php?idm=<?echo $idm ?>"><<? echo getRatingColor ($tscore);?>> <? echo $tscore; ?></<? echo getRatingColor ($tscore);?>> </a></td>
	<td class="head03"><?echo $mov['year'];?></a></td> 
	</tr>
<?
	} // ***** end while
	?>

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

<!--------- REVIEW TAB --------->
<div class="tab-content" id="2" style="display:none;">
<table width="500" border="0" cellspacing="0" cellpadding="3">
      
  <tr>
      <td width="200" class="head02">ACTOR</td>
      <td width="100" class="head02">CHARACTER</td>	
      <td width="100" class="head02">USER SCORE</td>		
    </tr>
	 <tr>
      <td colspan="3" height="10"></td>
      </tr>
<?
$color=FALSE;
$tscore=0;
$review=mysql_query("select * from rating where id_member=".$idm."&& id_movie= 0 order by id");
if(mysql_num_rows($review)>0){
$total_reviews=mysql_num_rows($review);

 while($r=mysql_fetch_array($review)){
 	$member=mysql_query("select * from members where id=".$idm);
			$m=mysql_fetch_array($member);
			$tscore=($r['acting']+$r['performance']+$r['voice']+$r['characterization']+$r['screen_presence'])/5;
	
?>

<?
// *********   ALTERNATE COLOR  **************************************************************
if ($color ==FALSE) {		echo "<tr>";  
				$color=TRUE;	
				   }
else {  	echo "<tr bgcolor='#C6D4DD'>";  //FFCC99 //DBDBFF
		$color=FALSE;
      } ?>

<td class="head03"><?
	  $charact=mysql_query("select * from characters where id=".$r['id_character']);
	  $char=mysql_fetch_array($charact);
	  $actor=mysql_query("select * from actors where id=".$char['id_actor']);
	  $act=mysql_fetch_array($actor);
	  ?>
	  

<a href="profile.php?idm=<? echo $r['id_actor'];?>"><img src="actors/<? echo $act['image'];?>" width="30"></a> <a href="profile.php?idm=<? echo $act['id'];?>"><? echo $act['f_name']. "&nbsp;". $act['l_name']; ?></a></td>
	
	<td class="head03"><a href="character.php?idm=<?echo $char['id']; ?>"><?echo $char['char_name'];?></a></td>
	<td class="head03"><a href="member_actor_rev.php?idm=<?echo $idm ?>"><<? echo getRatingColor ($tscore);?>> <? echo $tscore; ?></<? echo getRatingColor ($tscore);?>> </a></td>
	</tr>
<?
	} // ***** end while


	?>

<? 
}
?>
</table>
</div>

<!----- PHOTOS TAB ------------------------>
<div class="tab-content" id="3" style="display:none;">
photos
</div> 
<!-- end of "tab-content" -->

<! --------- VIDEOS  TAB --------------->

<div class="tab-content" id="4" style="display:none">
videos
</div> 
<!-- end of "tab-content" -->

<!-------- NEWS TAB ----------------->
<div class="tab-content" id="5" style="display:none;">
coming soon...
</div> 
<!-- end of "tab-content" -->

<!-------- MORE TAB ----------------->

<div class="tab-content" id="6" style="display:none;">
coming soon...
</div>  <!-- end of "tab-content" -->


</div>  <!-- end of "tabs-container" -->

</div> <!-- end "wrap" -->
</div>   	<!-- end of "bottom grids" -->


		 <!---End-content---->

	<div class="clear"> </div>
        
  
		<!--- Copyright ---->	

       <? include ("copyright.html"); ?>

		 <!---End-footer---->
	</body>
</html>

