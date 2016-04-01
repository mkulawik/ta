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


<div class="bdyCont-center">

<div class="container-bdy">
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
<h2>Email: </h2></td><td><hc> <? echo $mem['email'];?> </hc></td></tr>
<tr><td>
<h2>Location: </h2></td><td> <hc> <? echo $mem['location'];?></hc></td></tr>
<tr><td>
<h2>Member since: </h2></td><td> <hc> <? echo $newDate;?></hc></td></tr>
<tr><td>
<h2>About me: </h2> </td><td><hc> <? echo $mem['about_me'];?></hc> </td></tr>
</table>
</div>  <!-- end of "mem-profile" -->
<div class="clearF" style="height:25px;"></div>

</div>  <!-- end of "container-bdy" -->

</div>   <!-- end of "cont-bg" -->
<!-- end of "bdyCont-right" -->
<div class="clearF"></div>
</div>  <!-- end of "container-bdy" -->

</div>   <!-- end of "cont-bg" -->


<!----------- Reviews------------------->
<br />
<div>
  <table width="700" border="0" cellspacing="0" cellpadding="3">
    <tr>
      <td width="249" class="head02">MOVIES</td>
    </tr>
	 <tr>
      <td colspan="2" height="10"></td>
      </tr>

	<?

echo $idm;
$color=FALSE;
$members=mysql_query("select * from rating where id_member=".$idm);
$total_reviews=mysql_num_rows($members);

// While Start *************

	while($mems=mysql_fetch_array($members)){
echo "TEST";	
	echo $mems;
		
// *********   ALTERNATE COLOR  **************************************************************

if ($color ==FALSE) {		echo "<tr>";  
				$color=TRUE;	
				   }
else {  	echo "<tr bgcolor='#C6D4DD'>";  //FFCC99 //DBDBFF
		$color=FALSE;
      } ?>

<td class="head03"><?
	  $movie=mysql_query("select * from movies where id=".$mems['id_movie']);
	  $mov=mysql_fetch_array($movie);
	  ?>
	  <a href="movie.php?idm=<? echo $mems['id_movie'];?>"><img src="movies/<? echo $mov['image'];?>" width="30"></a> <a href="movie.php?idm=<? echo $mov['id'];?>"><? echo $mov['movie_name'];?></a></td>
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


