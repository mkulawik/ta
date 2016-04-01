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
  <title>FADVIEWS - Film Actor Database Reviews | Register </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="web/css/stylenotabl.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
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
<?php include("header.php");?>


<div class="cont-bg">
<div class="container-bdy">

<div class="bdyCont-center" style="padding-top:30px; margin-bottom:1.3em;">
<span class="q1">
<b><a href="character.php?idm=3348">Phil:<a></b>
Your password is bologna1? <br />

<b><a href="character.php?idm=32138"> Mr. Chow: </a></b>
Well, it used to be just bologna, but now they make you add numbers.<br />
</span>
<span class="q2">
<a href="movie.php?idm=14147"> - Hangover II </a>
</span><br /><br />



<span class="q3">Please enter your email here:</span>
<form id="form1" name="form1" method="post" action="forgot2.php">
				
					 <? if(isset($_SESSION['msg'])){
					echo '<p style="color:#990000;font-family:OpenSans; font-size:12px;">'.$_SESSION['msg'].'</p>';
					$_SESSION['msg']="";
					}?></p>
					
						
							<input name="Email" type="text" class="signup-txtfield-211" id="Email">
						
							<br /><br />
				       
				          <input name="Submit" type="submit"  class="button" onclick="MM_validateForm('Email','','RisEmail');return document.MM_returnValue" value="Send Password" />
						
      </form>

<!-- end of "bdyCont-left" -->
</div>  
<!-- end of "bdyCont-right" -->
<div class="clearF"></div>
</div>  <!-- end of "container-bdy" -->

</div>   <!-- end of "cont-bg" -->



<? include("footer.php");?>

</body>
</html>
