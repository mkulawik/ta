<?
@session_start();
?>

<!--
FADVIEWS
URL: http://www.fadviews.com

-->
<!DOCTYPE HTML>
<html>
<head>
  <title>FADVIEWS - Film Actor Database Reviews | Home </title>
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


<script src="smartphone/js/hammer.min.js"></script><!-- for swipe support on touch interfaces -->
<script src="smartphone/js/better-simple-slideshow.min.js"></script>

    <link rel="stylesheet" href="smartphone/css/simple-slideshow-styles.css"  />


 </head>
  <body>
   

	<!----Start-Header----->
		<? include ("header.php");?>

	       <!--start-image-slider---->
		 
<div class="wrap">	
<div align="center">
 
	<div class="bss-slides num1" tabindex="1" autofocus="autofocus" >

<figure>
		 <a href="/gallery.php">  <img src="smartphone/images/slider/slider1.jpg"  width="100%" /><figcaption>Welcome to Film Actor Database Reviews </figcaption></a>
	</figure>

	<figure>
		 <a href="/movie.php?idm=1520">  <img src="smartphone/images/slider/slider6.jpg"  width="100%" /><figcaption> Batman V Superman </figcaption></a>
	</figure>

        <figure>
                 <a href="/movie.php?idm=18108"> <img src="smartphone/images/slider/deadpool1_sm.jpg"  width="100%" /><figcaption> Deadpool </figcaption></a>
        </figure>

	<figure>
		 <a href="/movie.php?idm=18268"> <img src="smartphone/images/slider/slider7.jpg"  width="100%" /><figcaption> Jurassic World </figcaption></a>
	</figure>

	<figure>
		 <a href="/movie.php?idm=12071"> <img src="smartphone/images/slider/slider8.jpg"  width="100%" /><figcaption> Star Wars Episode VII </figcaption></a>
	</figure>

        <figure>
                 <a href="/movie.php?idm=18274"> <img src="smartphone/images/slider/slider2.jpg"  width="100%" /><figcaption> Minions </figcaption></a>
        </figure>

	<figure>
		 <a href="/movie.php?idm=18276"> <img src="smartphone/images/slider/mart2-sm.jpg"  width="100%" /><figcaption> The Martian </figcaption></a>
	</figure>

        <figure>
                 <a href="/movie.php?idm=2046"> <img src="smartphone/images/slider/slider9.jpg"  width="100%" /><figcaption> Spectre </figcaption></a>
        </figure>

	<figure>
		 <a href="/movie.php?idm=12071"> <img src="smartphone/images/slider/slider3.jpg"  width="100%" /><figcaption> Star Wars Episode VII </figcaption></a>
	</figure>

        </div>
    
<div class="clear"> </div>
        				       

		<!-- End-image-slider -->
			
<!--  Script for Slider : code from better-simple-slideshow by leemark , github.com -->		
<script>
var opts = {
    auto : {
        speed : 3500, 
        pauseOnHover : true
    },
    fullScreen : false, 
    swipe : true
};
makeBSS('.num1', opts);

</script>
<!-- End Script -->


	<!---start-content---->
		 <div class="content">
		 	<div class="top-grids">
		 		
			 		<div class="top-grid">
			 			<a href="#"><img src="smartphone/images/icon1.png" title="icon-name"></a>
			 			<h3>What is FADViews?</h3>
			 			<p>FADViews (or Film Actor Database Reviews) is redefining how <a href="gallery.php">film & actors are reviewed</a> and appreciated like never before. </p>
			 			<a name="1" class="button" href="#1">Read More</a>
			 		</div>
			 		<div class="top-grid">
			 			<a href="gallery.php"><img src="smartphone/images/icon2.png" title="icon-name"></a>
			 			<h3>What can you do here?</h3>
			 			<p>You can <a href="gallery.php">POST</a> your video reviews, re-enactments, monologues, musical arrangements and even more at this site. Search for movies, actors and characters then view, review or even rate their performance using our <a href="/rating_system.php">unique rating method.</a> </p>
					
			 			<a class="button" href="tour1.php">Read More</a>
			 		</div>
			 		<div class="clear"> </div>
		 		
		 	</div>

<div class="camera_wrap" id="camera_wrap_1"></div>


   <div class="top-grids">
                                                       
                                <div class="top-grid">

                                                <h3>Latest Reviews</h3>
                                                        <? include ("lmv.php"); ?>
                                                        <? include ("lact.php"); ?>
                                 			<? include ("lsh.php"); ?>                     
				  </div>

                                                        <div class="clear"> </div>


			
				<div class="top-grid">

                                               <h3>Up and coming movies</h3>
                                                                        <p>......................................................</p>
                                                     <div class="gallery">
						
                                                      <a href="movie.php?idm=18276"><img src="smartphone/images/slider2/mart3.jpg" alt=""><p>The Martian</p></a><br />
                                                       <a href="movie.php?idm=12632"><img src="smartphone/images/slider2/tg1.jpg" alt=""><p>Terminator Genisys</p></a><br />
                                                        <a href="movie.php?idm=18268"><img src="smartphone/images/slider2/jw3.jpg" alt=""><p>Jurassic World</p></a><br />
                                                         <a href="movie.php?idm=8076"><img src="smartphone/images/slider2/mmf2.jpg" alt=""><p>Mad Max Fury</p></a><br />
                                                          <a href="movie.php?idm=16856"><img src="smartphone/images/slider2/tl2.jpg" alt=""><p>Tomorrow Land</p></a><br />
                                                           <a href="movie.php?idm=12071"><img src="smartphone/images/slider2/sw7b.jpg" alt=""><p>Star Wars 7</p></a><br /> 
                                                              <div class="clear"> </div>

                                                                               
                                                     </div>
                                </div>
         
                                <div class="top-grid">

                                               <h3>Latest User Video Post</h3><br>
                                                        <? include ("latmpost.php"); ?>
                                </div>

<div class="top-grid">

                         <h3>Latest Trailers</h3> <br>

                   <? include ("trailers_front_mobile.php"); ?>
                </div>

 	</div> </div>
<div class="clear"> </div>        

</div> <!-end -center -->
</div> <!-end wrap -->

                 <!---End-content---->


		 <!---Footer---->
	<? include("footer.php"); ?>

	</body>
</html>
