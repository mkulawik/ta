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
<?php include("header.php");?>
<div class="content">


<div class="bdyCont-center">
<form action="bdregister.php" name="form1" id="form1" enctype="multipart/form-data" method="post">
<div class="signup-age">Send an Age Game BirthDay card from FADViews.</div>
<div class="form-bottomTxt">We are not in the business of giving out your information or any email address. Please read our <a href="/sign_up_policy.php">Data Use Policy</a> if you are still unsure. <br />
</div>


<span style="color:#990000;font-family:'OpenSans'; font-size:12px;">
<?
if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
$_SESSION['msg']="";
}
?>
&nbsp;</span>
<div class="form-fieldDiv">Age: 
<input name="Age" type="text" class="signup-txtfield-211" id="Age" value="<? if(isset($_SESSION['m_age'])){echo $_SESSION['m_age'];}else{echo "Age of recipient";}?>" onfocus="empty('Age');"/>
<div class="clearF"></div>
</div>
 
<div class="form-fieldDiv">Email: <br />
<span class="form-bottomTxt">(Use comma , between emails to send to more than one)</span>
<input name="Mail"  type="text" class="signup-txtfield-211" id="Mail" value="<? if(isset($_SESSION['m_mail'])){echo $_SESSION['m_mail'];}else{echo "Email address of recipient";}?>" onfocus="empty('Mail');"/>

<div class="clearF"></div>

</div>
<div class="form-fieldDiv">From:
 <input name="Frm" type="text" class="signup-txtfield-211" id="Frm"   onfocus="empty('Frm');" value="<? if(isset($_SESSION['m_frm'])){echo $_SESSION['m_frm'];}else{echo "From";}?>"/>
</div>
<input name="Submit" type="submit" class="mybutton" onclick="MM_validateForm('Age','','RisNan','Mail','','RisEmail','Frm','','R');return document.MM_returnValue" class="button" value="Send" />
</form>

<div class="clearF"></div>
</div>  <!-- end of "bdyCont-left" -->
 
</div>   <!-- end of "container" -->



<? include("footer.php");?>

</body>
</html>
