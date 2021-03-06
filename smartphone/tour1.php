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
  <title>FADVIEWS - Film Actor Database Reviews </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="smartphone/css/style.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
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

   <script src='smartphone/js/jquery.js' type="text/javascript"></script>

  <link rel="stylesheet" type="text/css" media="all" href="smartphone/css/pt.css" />

 </head>
  <body>
   <!----Header----->    <?php include("header.php");?>


		 <!---start-content---->
		 
<div class="mid-grid-tour">
<h1> 5 step tour </h1> </div>

<div class="bottom-grids-tour">
</div>

<div class="mid-grid-tour">
<div class="wrap">
<h1>
See the reason behind the final number.</h1>
<h2>
One number just doesn't work without some kind of metric and reasoning behind it. 
<br />
Choose and rate a show based on the 8 categories of what really makes or breaks a movie.<br> (aka <a href="rating_system.php#1">The 8mm of Film,</a> by Fadviews.).
</h2> 
<a class="button1" href="tour2.php">NEXT 1/5</a>
</div></div>


<div class="bottom-grids">
 
<div class="wrap"><br>
<div class="breadcrumbs">Home > Movies > Big Top Raider Drive</div>
<div class="score" font="Arial" style="font-size:28px;width:100%;">Big Top Raider Drive</div>
<div class="clearF" style="height:0px;"></div>

<div class="poster-rate-left">
<img src="movies/big_top_raider_drive.jpg" width="150px" />
<br />
<br />
<br />
</div>
<! --  ******************************************  -->
  

<section class="third lift plan-tier">

     <div class="lmov2-cat">
	<h4>Total Score</h4>
      <h5><span class="plan-price">

 <span class="<?=getRatingColor (7.07);?>" style="font-size: 25px;"> 7.07</span>

    <img src="smartphone/images/warm.gif" width="7%">

	</span></h5>

      <ul>

<li><strong>Plot/Story</strong> <br>
<span class="hot"> 9.95</span>
</li>

<li><strong>Characters</strong><br>
<span class="cold"> 3.50</span>  
</li>

<li><strong>Acting</strong> <br>
<span class="warm"> 5.87</span>
</li>

<li><strong>Cinematography</strong><br> 
<span class="cold"> 4.99</span>
</li>

<li><strong>Production Design</strong><br>
<span class="hot"> 10.00</span>
</li>

<li><strong>Soundtrack</strong><br>
<span class="warm"> 7.78</span>
</li>

<li><strong>Execution</strong> <br> 
<span class="warm"> 6.49</span>
</li>

<li><strong>Emotional Impact</strong><br> 
<span class="hot"> 8.11</span>
</li>

</ul>
	</div>

    </section>
    <div style="clear: both"></div>
<br />
</div>

<! --  ******************************************  -->


</div>  <!-- end of "profileText-div" -->
 
<div class="clearF" style="height:25px;"></div>
 

 
 
                 <!---End-content---->
 
                     <div class="clear"> </div>
                                                     
                 <div class="clear"> </div>
                 
 
        <!--- Copyright ------>
 
             <?php include("copyright.html");?>
 
        </body>


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

</html>
