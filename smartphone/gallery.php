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
 <link href="smartphone/css/stylenotabl.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="smartphone/js/jquery.min.js"></script>
  <script type="text/javascript" src="smartphone/js/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="smartphone/js/camera.min.js"></script>
 
</head>
	<body>
	<!----start-header----->
		<?include ("header.php"); ?> 

		<!---start-content---->
						

<div class="mid-grid-tour">
		                         <h1>Latest Actors Reviewed by Users:</h1>

</div> 
 
         <div class="bottom-grids">

		<div class="wrap">
 					<? include("lact2.php"); ?> 
		</div>
	</div>

<div class="mid-grid-tour">
<a name="2"> </a>
 				 <h1>Latest Video Posts</h1>     
 
</div>
 
         <div class="bottom-grids">
 
                <div class="wrap" align="middle">

				  <? include ("latmpost2.php"); ?>

		</div>	
	</div>


<div class="mid-grid-tour"> 
                                        <h1>Latest Photos posted</h1>
 
</div>
 
         <div class="bottom-grids">
		 
		<div class="wrap">
				 <? include ("gallpics.php"); ?>
		</div>
	</div>  
		

<div class="mid-grid-tour"> 
                                        <h1>Latest Movie review</h1>
 
</div>
 
         <div class="bottom-grids">
		
		 <div class="wrap"> 

				<? include ("lmv2.php"); ?>
        	</div> 
	</div>

<div class="mid-grid-tour">
                                        <h1>Latest Show review</h1>

</div>

         <div class="bottom-grids">

                 <div class="wrap">

                                <? include ("lsh2.php"); ?>
                </div>
        </div>




<div class="mid-grid-tour"> 
<!--                           <h1>Latest Music posts </h1>
    -->  
</div>

 	 <div class="bottom-grids">
	 	
		<div class="wrap">
                        	
				<? // include ("lmusic.php"); ?>
         	</div>
		
   	</div>

<div class="mid-grid-tour">
       
</div>

<div class="clearF"></div>
  <div class="bottom-grids">
         <div class="wrap">
....
         </div>

   </div>




<div class="clearF"></div> 
<!-- end of "bdyCont-left" -->
<!-- end of "bdyCont-right" -->
<div class="clearF"></div>
		 <!---Copyright ---->


			<? include ("copyright.html"); ?>
	</body>
</html>

