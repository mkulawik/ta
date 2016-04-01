<? 
@session_start();
@ob_start();
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
<script type="text/JavaScript">
<!--
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
//-->
</script>



 </head>
  <body>
	<!----Header----->
	<? include ("header.php"); ?>

	       <!--start-image-slider---->
			    <div class="slider">
                           
					<div class="camera_wrap camera_azure_skin" id="camera_wrap_1">	
                                            
						<div data-src="web/images/slider1.jpg">  </div> 
						<div data-src="web/images/slider2.jpg">  </div>
						<div data-src="web/images/slider3.jpg">  </div>
						<div data-src="web/images/slider4.jpg">  </div>
					</div>
					<div class="clear"> </div>					       
			</div>					
         <!--End-image-slider---->
		 <!---start-content---->
		 <div class="content">
		 	<div class="top-grids">
		 		<div class="wrap">
			 		 <div class="top-grid">
                                                <a href="#"><img src="smartphone/images/icon1.png" title="icon-name"></a>
                                                <h3>What is FADViews?</h3>
                                                <p>FADViews (or Film Actor Database Reviews) is redefining how film & actors are reviewed and appreciated like never before. </p>
                                                <a class="button" href="about.php">Read More</a>
                                        </div>
                                        <div class="top-grid">
                                                <a href="#"><img src="smartphone/images/icon2.png" title="icon-name"></a>
                                                <h3>What can you do here?</h3>
                                                <p>You can search for movies, actors & characters and then view, review or even rate their performance using our 'well rounded' rating method. You can POST your video reviews, re-enactments, monologues, musical arrangements and even more at this site. </p>
                                                <a class="button" href="services.php">Read More</a>
                                        </div>
                                        <div class="top-grid last-topgrid">
                                                <a href="#"><img src="smartphone/images/icon3.png" title="icon-name"></a>
                                                <h3>Our Mission</h3>
                                                <p>With your content and input, this is your chance to be seen or heard like never before!  You can truly express your appreciation for movies and actors.  We're just starting out, so help us help you make this a wonderful experience.  We love movies and actors!   </p>
                                                <a class="button" href="contact.php">Read More</a>
                                        </div>
					<div class="clear"> </div>
		 		</div>
		 	</div>
                        <div class="mid-grid">
		 		<div class="wrap">
			 		<h1>Welcome to Film Actor Database Reviews or FADViews!</h1>
			 		<h2>We are a Film and Actor rating and review site.</h2>
			 		<p>We are also a film and actor appreciation and fan recognition site.</p>
			 		<a class="button1" href="#">Read More</a>
		 		</div>
		 	</div> 
                     
		 	<div class="bottom-grids">
							<div class="wrap">
								<div class="bottom-grid1">
									<h3>POPULAR INFO</h3>
									<span>consectetur adipisicing elit, sed do eiusmod tempor</span>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									<ul>
										<li><a href="#">Consectetur adipisicing elit</a></li>
										<li><a href="#">Sed do eiusmod tempor incididunt</a></li>
										<li><a href="#">Labore et dolore magna aliqua.</a></li>
										<li><a href="#">Sed do eiusmod tempor</a></li>
										<li><a href="#">Abore et dolore magna</a></li>
										<li><a href="#">Incididunt ut labore et dolore</a></li>
										<li><a href="#">Dolore magna aliqua</a></li>
										<li><a href="#">Adipisicing elit, sed do eiusmod</a></li>
									</ul>
									<a class="button" href="contact.html">Read More</a>
								</div>
								<div class="bottom-grid2 bottom-mid">
									<h3>Today Special</h3>
									<span>consectetur adipisicing elit, sed do eiusmod tempor</span>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									<div class="gallery">
										<ul>
												<li><a href="web/images/slider1.jpg"><img src="web/images/slider1.jpg" alt=""></a></li>
												<li><a href="web/images/slider2.jpg"><img src="web/images/slider2.jpg" alt=""></a></li>
												<li><a href="web/images/slider3.jpg"><img src="web/images/slider3.jpg" alt=""></a></li>
												<li><a href="web/images/slider4.jpg"><img src="web/images/slider4.jpg" alt=""></a></li>
												<li><a href="web/images/slider1.jpg"><img src="web/images/slider1.jpg" alt=""></a></li>
												<li><a href="web/images/slider2.jpg"><img src="web/images/slider2.jpg" alt=""></a></li>											
											<div class="clear"> </div>
										</ul>										
								 </div>
								 <a class="button" href="gallery.html">Read More</a>
							</div>
							<div class="bottom-grid1 bottom-last">
									<h3>Latest INFO</h3>
									<span>consectetur adipisicing elit, sed do eiusmod tempor</span>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									<a class="button" href="#">Read More</a>
								</div>
								<div class="clear"> </div>
							</div>
							<div class="clear"> </div>
	<!--end-wrap--->
	 </div>
		 </div>
		 <!---End-content---->
	
	<!--- FOOTER ------>
 		<?php include("footer.php");?>


	</body>
</html>


