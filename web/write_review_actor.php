<? 
@session_start();
@ob_start();
include("chksession.php");
?>
<!--
FADVIEWS
URL: http://fadviews.com
-->
<!DOCTYPE HTML>
<html>
<head>
  <title>FADVIEWS - Film Actor Database Reviews | Rating </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="web/css/style.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
 </head>
 
<?
include("db/dbcon.php");
include('db/db.php');
include('db/functions.php');
include('db/page.php');
?>
 
  <body>
   
        <!-----START HEADER----->
 
        <?php include("header.php");

if(is_numeric($_GET['idm'])){
$idm=$_GET['idm'];
}else{
$idm=0;
}
$actors=mysql_query("select * from actors where id=".$idm);
$actor=mysql_fetch_array($actors);

?>


<div class="cont-bg">
<div class="container-bdy">

<div class="bdyCont-center">
<table width="100%" border="0" cellspacing="0" cellpadding="4">
<tr>
<span class="head01">You are rating: <a href="profile.php?idm=<? echo $actor['id'];?>"> <strong style="color:#00A0DE;"><? echo $actor['f_name']."&nbsp;".$actor['l_name'];?></strong> </a></span><br /><br />
<td width="15%" rowspan="5" valign="top"><a href="profile.php?idm=<? echo $actor['id'];?>"><img src="actors/<? echo $actor['image'];?>" width="70"  /></td>
<td>
<div> &nbsp;  </div>
<form id="form1" name="form1" method="post" action="write_review_actor1.php?idm=<? echo $idm;?>"> 
</td>
</tr>
<tr> </div> </tr>
<tr>    
<td colspan="2" valign="middle" class="head02">An actor's score is calculated by the characters they've played. <br />Please select a character: <br />
<br />
</td>
</tr>
</table>


<div class="clearF"></div>

<div class="wrap">

<div class="tabs-container">
 
<div class="tabs-div">
<div class="tab-active" id="tab1"><a href="javascript:void();" onclick="show_tab('1');" class="tab-link">Movies</a></div>
<div class="tab" id="tab2"><a href="javascript:void();" onclick="show_tab('2');" class="tab-link">Shows</a></div>
 
<div class="clearF"></div>
</div>  <!-- end of "tabs-div" -->
<br />


<!-------  MOVIE LIST Tab--------------->

<div class="tab-content" id="1" style="display:block">

<table width="700" border="0" cellspacing="0" cellpadding="3">
    <tr>
      <td width="249" class="head02">MOVIES</td>
      <td width="142" class="head02">RATING</td>
      <td width="259" class="head02">CHARACTER</td>
      <td width="130" class="head02">YEAR</td>
    </tr>
	 <tr>
      <td colspan="3" height="10"></td>
     </tr>
	<?
$color=FALSE;
//	$characters=mysql_query("select * from characters where id_actor=".$idm);
$characters=mysql_query("select *,characters.id as c_id from characters right outer join movies as m on m.id = id_movie where id_actor= ".$idm." order by year desc");
// $characters=mysql_query("select a.* characters, b.movie_name, b.details, b.image, b.year, b.metric movies from characters a join movies b on a.id_movie=b.id where a.id_actor= ".$idm." order by year desc");


// While Start *************

	while($char=mysql_fetch_array($characters)){
		$reviews=mysql_query("select * from rating where id_character=".$char['c_id']);
		$r=mysql_fetch_array($reviews);
		$tscore=($r['acting']+$r['performance']+$r['characterization']+$r['screen_presence'])/4;
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
	  <a href="movie.php?idm=<? echo $mov['id'];?>"><? echo $mov['movie_name'];?></a></td>
      <td class="head03"><? echo number_format($tscore,'2','.','');?></td>
      <td class="head03"><a href="write_review_character.php?idm=<? echo $char['c_id'];?>"><? echo $char['char_name'];?></a></td>
      <td class="head03"><?echo $mov['year'];?></a></td> 
	</tr>
	<?
	} //end while  *******
	?>
</table>
</div>
</div>

<!-------  SHOWS LIST Tab--------------->

<div class="tab-content" id="2" style="display:block">
<div> &nbsp;  </div>  
<table width="700" border="0" cellspacing="0" cellpadding="3">
    <tr>
      <td width="249" class="head02">SHOW</td>
      <td width="142" class="head02">RATING</td>
      <td width="259" class="head02">CHARACTER</td>
      <td width="130" class="head02">YEAR</td>
    </tr>
	 <tr>
      <td colspan="3" height="10"></td>
     </tr>
	<?
$color=FALSE;
//	$characters=mysql_query("select * from characters where id_actor=".$idm);
$characters=mysql_query("select *,characters.id as c_id from characters right outer join shows as m on m.id = id_shows where id_actor= ".$idm." order by year desc");


// While Start *************

	while($char=mysql_fetch_array($characters)){
		$reviews=mysql_query("select * from rating where id_character=".$char['c_id']);
		$r=mysql_fetch_array($reviews);
		$tscore=($r['acting']+$r['performance']+$r['characterization']+$r['screen_presence'])/4;
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
	  $movie=mysql_query("select * from shows where id=".$char['id_shows']);
	  $mov=mysql_fetch_array($movie);
	 ?>
	  <a href="shows.php?idm=<? echo $mov['id'];?>"><? echo $mov['show_name'];?></a></td>
      <td class="head03"><? echo number_format($tscore,'2','.','');?></td>
      <td class="head03"><a href="write_review_character.php?idm=<? echo $char['c_id'];?>"><? echo $char['char_name'];?></a></td>
      <td class="head03"><?echo $mov['year'];?></a></td> 
	</tr>
	<?
	} //end while  ****
	?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div> 
</div>
<!-- end of "tab-content" -->

</div>
<div class="clearF"></div>
</div>  <!-- end of "container-bdy" -->

</div>   <!-- end of "cont-bg" -->



<? include("copyright.html");?>

</body>
</html>
