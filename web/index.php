<? 
@session_start();
@ob_start();
include("db/dbcon.php");
include('db/db.php');
include('db/functions.php');

?>
<!--
FADVIEWS
URL: http://fadviews.com
-->
<!DOCTYPE HTML>
<html>
<head>
<title>FADVIEWS - Film Actor Database Reviews | Home </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="web/css/stylenotabl.css" rel="stylesheet" type="text/css"  media="all" />
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

<script type="text/JavaScript">

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following field(s) required:\n'+errors);
  document.MM_returnValue = (errors == '');
}

</script>

<script src="web/js/hammer.min.js"></script><!-- for swipe support on touch interfaces -->
<script src="web/js/better-simple-slideshow.min.js"></script>

    <link rel="stylesheet" href="web/css/simple-slideshow-styles.css"  />

 </head>
  <body>
	<!----Header----->
	<? include ("header.php"); ?>

	       <!--start-image-slider    Code from better-simple-slideshow by leemark github.com -->
         
<div class="wrap">	
<div align="center">
	<div class="bss-slides num1" tabindex="1" autofocus="autofocus" >

	<figure>
		 <a href="/gallery.php">  <img src="web/images/slider/slider1.jpg"  width="100%" /><figcaption>Welcome to Film Actor Database Reviews </figcaption></a>
	</figure>

	<figure>
		 <a href="/movie.php?idm=1520">  <img src="web/images/slider/slider6.jpg"  width="100%" /><figcaption> Batman V Superman </figcaption></a>
	</figure>

        <figure>
                 <a href="/movie.php?idm=18108"> <img src="web/images/slider/deadpool1.jpg"  width="100%" /><figcaption> Deadpool </figcaption></a>
        </figure>

	<figure>
		 <a href="/movie.php?idm=18268"> <img src="web/images/slider/slider7.jpg"  width="100%" /><figcaption> Jurassic World </figcaption></a>
	</figure>

	<figure>
		 <a href="/movie.php?idm=12071"> <img src="web/images/slider/slider8.jpg"  width="100%" /><figcaption> Star Wars Episode VII </figcaption></a>
	</figure>

        <figure>
                 <a href="/movie.php?idm=18274"> <img src="web/images/slider/slider2.jpg"  width="100%" /><figcaption> Minions </figcaption></a>
        </figure>

	<figure>
		 <a href="/movie.php?idm=18276"> <img src="web/images/slider/mart2.jpg"  width="100%" /><figcaption> The Martian </figcaption></a>
	</figure>

        <figure>
                 <a href="/movie.php?idm=2046"> <img src="web/images/slider/slider9.jpg"  width="100%" /><figcaption> Spectre </figcaption></a>
        </figure>

	<figure>
		 <a href="/movie.php?idm=12071"> <img src="web/images/slider/slider3.jpg"  width="100%" /><figcaption> Star Wars Episode VII </figcaption></a>
	</figure>

        </div>
</div>		
</div>		       
		<!-- End-image-slider -->
			
<!--  Script for Slider : code from better-simple-slideshow by leemark , github.com-->			
<script>
var opts = {
    auto : {
        speed : 3500, 
        pauseOnHover : true
    },
    fullScreen : false, 
<!--    swipe : true   -->
};
makeBSS('.num1', opts);

</script>
<!-- End Script -->

<div class="camera_wrap camera_azure_skin" id="camera_wrap_1"></div>

<div class="clear"> </div>

			 <!---start-content---->

<div class="wrap">
		 <div class="content">
		 	<div class="top-grids">
		 		<div class="wrap">
			 		 <div class="top-grid">
                                                <a href="#"><img src="smartphone/images/icon1.png" title="icon-name"></a>
                                                <h3>What is FADViews?</h3>
                                                <p>FADViews (or Film Actor Database Reviews) is redefining how <a href="gallery.php">film & actors are reviewed</a> and appreciated like never before. </p>
                                                <a class="button" href="tour1.php">Read More</a>
                                        </div>
                                        <div class="top-grid">
                                                <a href="#"><img src="smartphone/images/icon2.png" title="icon-name"></a>
                                                <h3>What can you do here?</h3>
                                                <p>You can <a href="/gallery.php#2">POST</a> your video reviews, re-enactments, monologues, musical arrangements and even more at this site. Search for movies, actors and characters then view, review or even rate their performance using our <a href="/rating_system.php">unique rating method.</a> </p>
						<a class="button" href="tour1.php">Read More</a>
                                        </div>
                                        <div class="top-grid last-topgrid">
                                                <a href="#"><img src="smartphone/images/icon3.png" title="icon-name"></a>
                                                <h3>Our Mission</h3>
                                                <p>With your content and input, this is your chance to be seen or heard like never before!  You can truly express your appreciation for movies and actors.  We're just starting out, so help us help you make this a wonderful experience.  We love movies, shows and actors!   </p>
                                                <a class="button" href="contact.php">Read More</a>
                                        </div>
					<div class="clear"> </div>
		 		</div>
		 	</div>
                  
</div>
 
         <div class="bottom-grids">

		         <h3>Latest User Reviews</h3>
	 </div>


	<div style="width: 100%; display: table;">
    		<div style="display: table-row">
        		<div style="width: 40%; display: table-cell;"> <? include ("lact.php"); ?> </div>
        		<div style="width: 58%; display: table-cell;"> <? include ("lmv.php"); ?>  </div>
        	</div>
	</div>

	<div style="width: 100%; display: table;">
        	<div style="display: table-row">
	        	<div style="display: table-cell;"> <? include ("lsh.php"); ?> </div>
		</div>
	</div>

		 	<div class="bottom-grids">
							<div class="wrap">
								<div class="bottom-grid1">
									<h3>Latest Videos</h3>
									<span> User posted videos </span>
									<p> </p>
									   <? include ("latmpost.php"); ?>
									
									<a class="button" href="gallery.php">See More</a>
								</div>
								<div class="bottom-grid2 bottom-mid">
                                                                        <h3>Up and coming movies</h3>
                                                                        <span>A few screenshots of up and coming movies we're waiting to see.</span>
								<p> </p>
								<div class="gallery">
									<ul>	

									<li><a href="web/images/slider2/mart3.jpg"><img src="web/images/slider2/mart3.jpg" alt="web/images/slider2/mart3.jpg"></a><p type="text" onclick="location.href='movie.php?idm=18276'"><img src="web/images/fadview-button.gif" height="17"> The Martian </p></li>
									<li><a href="web/images/slider2/tg1.jpg"><img src="web/images/slider2/tg1.jpg" alt=""></a><p type="text" onclick="location.href='movie.php?idm=12632'"><img src="web/images/fadview-button.gif" height="17"> Terminator Genisys</p></li> 
									<li><a href="web/images/slider2/slider3.jpg"><img src="web/images/slider2/slider3.jpg" alt=""></a><p type="text" onclick="location.href='movie.php?idm=18268'"><img src="web/images/fadview-button.gif" height="17"> Jurassic World</p></li>
									<li><a href="web/images/slider2/slider4.jpg"><img src="web/images/slider2/slider4.jpg" alt=""></a><p type="text" onclick="location.href='movie.php?idm=8076'"><img src="web/images/fadview-button.gif" height="17"> Mad Max Fury</p></li>
									<li><a href="web/images/slider2/slider5.jpg"><img src="web/images/slider2/slider5.jpg" alt=""></a><p type="text" onclick="location.href='movie.php?idm=16856'"><img src="web/images/fadview-button.gif" height="17"> Tomorrowland</p></li>
									<li><a href="web/images/slider2/slider6.jpg"><img src="web/images/slider2/slider6.jpg" alt=""></a><p type="text" onclick="location.href='movie.php?idm=12071'"><img src="web/images/fadview-button.gif" height="17"> Star Wars 7</p></li>
		



								<div class="clear"> </div>
										</ul>				
								 </div>
								 <a class="button" href="gallery.php">See More</a>
							<div class="clear"> </div>
                        </div>  

  <div class="clear"> </div> 
<hr />

<div class="bottom-grids">

                         <h3>Latest Trailers</h3>
         </div>

        <div style="width: 100%; display: table;">
                <div style="display: table-row">
                        <div display: table-cell;"> <? include ("trailers_front.php"); ?> </div>
                </div>
        </div>

	</div>  <!--end-wrap---> 
  
                        </div>	<!-- end Bottom grids -->
		 
</div> <!-- end top wrap -->

		<!---End-content---->
	
	<!--- FOOTER ------>
 		<?php include("footer.php");?>
	</body>
</html> 
