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

<!DOCTYPE HTML>
<html>
<head>

  <title>FADVIEWS - Film Actor Database Reviews </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <meta name="keywords" content="movies reviews actors film theater tv actress filmography re-enactments" />
  <link href="smartphone/css/style.css" rel="stylesheet" type="text/css"  media="all" />
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
 </head>
  <body>
	       

        <!--- HEADER ------>
		<?php include("header.php");?>

		<!--START  CONTENT ---->
		 
<?
if(isset($_POST['Search'])){
$search=$_POST['Search'];
$_SESSION['search']=$search;
}else if(isset($_SESSION['search'])){
$search=$_SESSION['search'];
}else{
$search="";
}
 
$total=0;
 
$search = mysql_real_escape_string($search);
 
$csql="select * from characters where char_name like '%".$search."%'";
$chars=fun_setPage($csql,$_SERVER['PHP_SELF'],TOTAL_RECORDS);
 
//$msql="select * from movies where movie_name like '%".$search."%' or description like '%".$search."%'";  // and metric=1";
//$msql="select * from movies where match(movie_name) against ('".$search."' in BOOLEAN MODE)";
 
// get keywords into an array using explode
$keywords = explode(" ", $search);
 
//build bulk of mysql query
$msql = "select * from movies where movie_name like '%{$keywords[0]}%'";
 
//loop through keywords and build rest of query joining new clauses onto main query
for ($i = 1; $i < count($keywords); $i++) {
$msql .= " AND movie_name like '%{$keywords[$i]}%'";
 
}

// shows: build bulk of mysql query
$ssql = "select * from shows where show_name like '%{$keywords[0]}%'";
 
//shows: loop through keywords and build rest of query joining new clauses onto main query
for ($i = 1; $i < count($keywords); $i++) {
$ssql .= " AND show_name like '%{$keywords[$i]}%'";
      
}
 
 
$shows=fun_setPage($ssql,$_SERVER['PHP_SELF'],TOTAL_RECORDS); 
$movies=fun_setPage($msql,$_SERVER['PHP_SELF'],TOTAL_RECORDS);
 
$asql="select * from actors where f_name like '".$search."%' or l_name like '".$search."%' or concat_ws(' ',f_name,l_name) like '".$search."'"; 
$actors=fun_setPage($asql,$_SERVER['PHP_SELF'],TOTAL_RECORDS);
 
 
$total+=mysql_num_rows($actors);
$total+=mysql_num_rows($movies);
$total+=mysql_num_rows($shows);
$total+=mysql_num_rows($chars);
 
?>
                        <div class="bottom-grids">
                                                        <div class="wrap">
                                                                <div class="bottom-grid1"> <? echo "You searched: ".$search;?>
                                                                        <h3>Search Result(s) </h3>
 
<br />
<span> Can't find it? Quickly notify us and we'll add it in! </span> <br /><a class="button1" href="contact.php#1">NOTIFY US!</a>
<br /><br />
<span>Result(s) Found: (<? echo $total;?>)</span>
<br />                                                                </div>
 
<?
//  ***********  results for ACTORS shows here
if(mysql_num_rows($actors)>0){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
<?
while($act=mysql_fetch_array($actors)){
?>
<tr>
<td width="15%" rowspan="5" valign="top"><a href="profile.php?idm=<? echo $act['id'];?>"><img src="actors/<? echo $act['image'];?>" width="70"  /></td>
<!-- <td width="1%">&nbsp;</td> -->
<td width="84%" valign="top"><a href="profile.php?idm=<? echo $act['id'];?>"><? echo $act['f_name']."&nbsp;".$act['l_name'];
 
   echo ("<br>ID: ");
   echo $act['id'];
   echo ("<br> ");  ?>
 <tr>
    <td></td>
    </tr>
<tr>
      
  <tr>
    <td></td>
    </tr>
<tr>
    <td colspan="3" align="center"><img src="smartphone/images/line.png" height="1" width="680" /></td>
    </tr>
        <?
        }
        ?>
</table>
<?
}
 
//  ******************   results for MOVIES shows here
if(mysql_num_rows($movies)>0){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <?
  while($mov=mysql_fetch_array($movies)){
  ?>
  <tr>
    <td width="15%" rowspan="5" valign="top"><a href="movie.php?idm=<? echo $mov['id'];?>"> <img src="movies/<? echo $mov['image'];?>" width="70"  /></td>
 <!--   <td width="1%">&nbsp;</td> -->
    <td width="84%" valign="top" ><a href="movie.php?idm=<? echo $mov['id'];?>"> <? echo $mov['movie_name'];?> (<? echo $mov['year'];?>)
<?
   echo ("<br> Movie ID: ");
   echo $mov['id'];
   echo ("<br> ");  ?></td>
 
  </tr>
  <tr>
    <td></td>
    <td rowspan="3" valign="top"><? echo substr($mov['details'],0,100);?>
</td>
</tr>
 
  <tr>
    <td></td>
    </tr>
<tr>
 
  <tr>
    <td></td>
    </tr>
  
<tr>
	  <td colspan="3" align="center"><hr /></td>
    </tr>
        <?
        }
        ?>
</table>
<?
}

//  ******************   results for SHOWS shows here
if(mysql_num_rows($shows)>0){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <?
  while($sho=mysql_fetch_array($shows)){
  ?>
  <tr>
    <td width="15%" rowspan="5" valign="top"><a href="shows.php?idm=<? echo $sho['id'];?>"> <img src="shows/<? echo $sho['image'];?>" width="70"  /></td>
 <!--   <td width="1%">&nbsp;</td> -->
    <td width="84%" valign="top" ><a href="shows.php?idm=<? echo $sho['id'];?>"> <? echo $sho['show_name'];?> (<? echo $sho['year'];?>)
<?
   echo ("<br> Show ID: ");
   echo $sho['id'];
   echo ("<br> ");  ?></td>

  </tr>
  <tr>
    <td></td>
    <td rowspan="3" valign="top"><? echo substr($sho['details'],0,100);?>
</td>
</tr>

  <tr>
    <td></td>
    </tr>
<tr>

  <tr>
    <td></td>
    </tr>

<tr>

  <td colspan="3" align="center"><hr /></td>

</tr>
   </tr>
        <?
        }
        ?>
</table>
<?
}
?>
                      



<?
// ****************** results for CHARACTERS shows here
if(mysql_num_rows($chars)>0){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <?
  while($char=mysql_fetch_array($chars)){
  ?>
  <tr>
    <td width="15%" rowspan="5" valign="top"><a href="character.php?idm=<? echo $char['id'];?>"> <img src="characters/<? echo $char['image'];?>" width="70"  /></td>
  <?//  <td width="1%">&nbsp;</td>?>
    <td width="84%" valign="top" ><a href="character.php?idm=<? echo $char['id'];?>"> <? echo $char['char_name'];?> 
 
</td>
</tr>
<tr> 
<?  // ************* Insert Movies under Characters
 $movi=mysql_query("select * from movies where id=".$char['id_movie']);
        $mo=mysql_fetch_array($movi);
       ?>
<td width="84%" valign="top" >
        <? echo $mo['movie_name'];
?>
</td>
</tr>
 
  <tr>
    <td></td>
    </tr>
 
<tr>    
<td></td>
    <td rowspan="3" valign="top" ><? echo substr($char['details'],0,100);?></td>
  </tr>
 
 
  <tr>
    <td></td>
    </tr>
  
<tr>

  <td colspan="3" align="center"><hr /></td>

</tr>
        <?
        }
        ?>
</table>
<?
}
?>
 
 
 
<!-- end of "wrap" -->
</div>
 
<? include_once('pager.php'); ?>
</div>  <!-- end of "bottom-grids" -->
 
   <!-- end of "cont-bg" -->
                 
                 <!---End-content---->

	        <!--- FOOTER ------>
                <?php include("footer.php");?>

        </body>
</html>

