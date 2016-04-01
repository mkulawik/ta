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
    if  ($number < 5)
        return 'cold';  // COLD = Low
    else if ($number >= 5 && $number < 8)
        return 'warm';  // WARM = Mid
    else if ($number >= 8 && $number <= 10)
        return 'hot';  // HOT  = High
}
?>


<html>
<head>
  <title>FADViews - Film Actor Database Reviews </title>
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

$rev=mysql_query("select * from rating where id_member=".$idm. " && id_movie=0 order by id desc"); 

?>


<div class="bottom-grids">
<div class="wrap"><br>

<!------------- REVIEWS------------------------->
 
<br />
<span class="head02">Review(s) Found: (<? echo mysql_num_rows($rev);?>)</span>
<br />


<? include("member_actor_reviews2.php");  ?>

 
</div><!-- end of "wrap" -->
</div>          <!-- bottom grids -->
 
</div>
 
 
 
                 <!---End-content---->
 
                     <div class="clear"> </div>
                                                     
                 <div class="clear"> </div>
                 
 
        <!--- Copyright ------>
 
             <?php include("copyright.html");?>
 
        </body>
</html>


