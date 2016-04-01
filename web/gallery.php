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
  <title>FADVIEWS - Film Actor Database Reviews | About </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <meta name="keywords" content="movies reviews actors film theater tv actress filmography re-enactments" />
  <link href="web/css/stylenotabl.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href="web/css/slider.css" rel="stylesheet" type="text/css"  media="all" />
  <script type="text/javascript" src="web/js/jquery.min.js"></script>
  <script type="text/javascript" src="web/js/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="web/js/camera.min.js"></script>
 
<link rel="stylesheet" type="text/css" media="all" href="web/css/pt.css" />

</head>
	<body>
	<!----start-header----->
		<?include ("header.php"); ?> 

		<!---start-content---->


<div class="mid-grid-tour">
		                         <h3>Latest Actors Reviewed by Users:</h3>
		</div> 
 
         <div class="bottom-grids">
	<div class="wrap">
	
		<? include("lact2.php"); ?> 
	</div>
			</div>
<a name="2"> </a>

<div class="mid-grid-tour">

<a name="2"> </a>
 				 <h3>Latest Video Posts</h3>     
                </div>

         <div class="bottom-grids">
 
                                                        <div class="wrap">

				  <? include ("gallmovs.php"); ?>

	</div>						</div>


<div class="mid-grid-tour"> 
                                        <h3>Latest Photos posted</h3>
 
                </div>
 
         <div class="bottom-grids">
		 <div class="wrap">
				 <? include ("gallpics.php"); ?>
		</div>
	</div>  
		

<div class="mid-grid-tour"> 
                                        <h3>Latest Movie review</h3>
 
                </div>
 
         <div class="bottom-grids">
		 <div class="wrap"> 

				<? include ("lmv2.php"); ?>
        	</div> 
	</div>

<div class="mid-grid-tour">
                                        <h3>Latest Show review</h3>

                </div>

         <div class="bottom-grids">
                 <div class="wrap">

                                <? include ("lsh2.php"); ?>
                </div>
        </div>
 
<div class="mid-grid-tour"> 
<!--                           <h3>Latest Music posts </h3>
-->    
  </div>

  <div class="bottom-grids">
	 <div class="wrap">
	
                        	<? // include ("lmusic.php"); ?>
         </div>
		
   </div>




<div class="clearF"></div> 
<!-- end of "bdyCont-left" -->
</div>  
<!-- end of "bdyCont-right" -->
<div class="clearF"></div>
</div>  <!-- end of "container-bdy" -->
 
		 <!---Copyright ---->


			<? include ("copyright.html"); ?>
	</body>
</html>
