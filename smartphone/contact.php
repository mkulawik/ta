<? 
@session_start();
@ob_start();
?>


<!--

FADVIEWS
URL: http://www.fadviews.com

-->
<!DOCTYPE HTML>
<html>
<head>
  <title>FADVIEWS - Film Actor Database Reviews | Contact </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  
  <meta name="keywords" content="movies reviews actors film theater tv actress filmography re-enactments" />
  <link href="smartphone/css/style.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="smartphone/js/jquery.min.js"></script> 


<script>
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

  </head>
  <body>
		 
	        <!--- HEADER ------>
		<?php include("header.php");?>


	<!---start-content---->
		 <div class="content">
		 	<!---start-contact---->
		 	<div class="contact">
		 		<div class="wrap">
				<div class="section group">				
				<div class="col span_1_of_3">
					<div class="contact_info">
			    	 	<h3>Find Us Here</h3>
			    	 		<div class="map">
      				
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d787.1528779870328!2d-122.24245100000003!3d37.89276700000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1410761976198" width="275" height="175" frameborder="0" style="border:0"></iframe>

						</div>
      			<div class="company_address">
				     	<h3>Information :</h3>
						    	<p>Northern California, USA</p>
<!--				   		<p>Phone:(000) 000 0000</p>
				   		<p>Fax: (000) 000 0000</p>
-->
				 	 	<p>Email: <span><a href="#">info(at)fadviews.com</span></a></p>
				   		<p>Follow on: <span><a href="https://www.facebook.com/people/Fad-Views/100007088836536">Facebook</a></span>, <span><a href="http://www.twitter.com/fadviews">Twitter</a></span>, <span><a href="https://www.youtube.com/channel/UCLPj5PLKynZ1IC23ZZQs_wg">YouTube</a></span></p>
				   </div>
				</div>				
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h3>Contact Us</h3>
<a name="1"> </a>
<div class="form-bottomTxt">NOTE: We are not in the business of giving out your email address and information.<br /> We can't wait to hear from you. Thank you!</div>
<form action="contact-send.php" name="form2" id="form2" enctype="multipart/form-data" method="post">
					    	<div>
						    	<span><label>NAME</label></span>
						    	<span><input name="contactName" type="text" class="textbox"  id="contactName" onfocus="empty('contactName');" value="<? if(isset($_SESSION['cName'])){echo $_SESSION['cName'];}else{echo "Name";}?>"/></span>
						    </div>
<div class="clearF"></div>

						    <div>
						    	<span><label>E-MAIL (Required)</label></span>
						    	<span><input name="contactEmail" type="text" class="textbox"  id="contactEmail"   onfocus="empty('contactEmail');" value="<? if(isset($_SESSION['cEmail'])){echo $_SESSION['cEmail'];}else{echo "E-Mail";}?>"/></span>
						    </div>
<div class="clearF"></div>

						    <div>
						     	<span><label>PHONE NUMBER(optional) and/or SUBJECT</label></span>
						    	<span><input name="contactPhone" type="text" class="textbox"  id="contactPhone" onfocus="empty('contactPhone');" value="<? if(isset($_SESSION['cPhone'])){echo $_SESSION['cPhone'];}else{echo "Mobile or Subject";}?>"/></span>
						    </div>
<div class="clearF"></div>
						    <div>
						    	<span><label>MESSAGE</label></span>
						    	<span><textarea name="contactMsg" id="contactMsg"   onfocus="empty('contactMsg');" value="<? if(isset($_SESSION['cMsg'])){echo $_SESSION['cMsg'];}else{echo "Message";}?>"/> </textarea></span>
						    </div>
<div class="clearF"></div>
						   <div>
						    <span><input name="Submit" type="submit" class="mybutton" onclick="MM_validateForm('contactEmail','','RisEmail','','R');return document.MM_returnValue"  value="Send"></span>

</div>
					    </form>
		</div>
	</div>
	</div>
</div>
</div>


<div class="clearF"></div>

		 <!---End-content---->
	
	        <!--- FOOTER ------>
                <?php include("footer.php");?>

	</body>
</html>

