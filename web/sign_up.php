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
<!-- ******- Number check is removed from my modified function below, also S is included for gender and Range text modified *************** -->
function MM_validateSignForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateSignForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
     if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- Please enter your correct year of birth.\n'; //must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; 
	else if (test.charAt(0) == 'S') errors += '- Gender is required.\n'; 
	}
  } if (errors) alert('The following field(s) required:\n'+errors);
  document.MM_returnValue = (errors == '');
}

</script>



</head>
  <body>
   
	<!-----START HEADER----->

	<?php include("header.php");?>

		 <!---start-content---->
		 <div class="content">


<div class="bdyCont-center">

<form action="register.php" name="form1" id="form1" enctype="multipart/form-data" method="post">
<!-- <div class="signup-head">Sign Up</div> -->
<div class="specials-heading"> <h3> Sign Up </h3></div>

<div class="form-bottomTxt">Fadviews is not in the business of giving out your information. <br /> Emails are primarily for password retrievals, security and important notifications. <br />
Gender & year of birth are intended only for statistical purposes and will not be displayed publicly, including your email address.</div>
<span style="color:#FF0000;font-family:'OpenSans'; font-size:13px font-weight:bold;">
<?

$j=0;
if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
$_SESSION['msg']="";

}
?>
&nbsp;</span>
<div class="form-fieldDiv">
Name <br />
<input name="Name" type="text" class="signup-txtfield-211" id="Name" value="<? if(isset($_SESSION['m_name'])){echo $_SESSION['m_name'];}else{echo "Name (Username)";}?>" onfocus="empty('Name');"/>
<div class="clearF"></div>
</div>
Email <br />
<div class="form-fieldDiv"><input name="Email" type="text" class="signup-txtfield-211" id="Email" onfocus="empty('Email');" value="<? if(isset($_SESSION['m_email'])){echo $_SESSION['m_email'];}else{echo "Email";}?>"/>
</div>
Password <br />
<div class="form-fieldDiv"><input name="Password" type="password" class="signup-txtfield-211" id="Password"   onfocus="empty('Password');" value="<? if(isset($_SESSION['m_pass'])){echo $_SESSION['m_pass'];}else{echo "Password";}?>"/>
</div>

<div class="form-fieldDiv"> Birth Year: :&nbsp; &nbsp;
 <td class="head03"><select name="membirth" id="membirth">
          <? for($i=2015;$i>=1915;$i--){?>
          <option value="<? echo $i; ?>" <? if(isset($_SESSION['yob']) and $_SESSION['yob']==$i){ echo "selected"; }?>><? echo $i;?></option>
          <?
                  }
                  ?>
        </select>
</div>
<div class="form-fieldDiv">
<input type="radio" name="Gender" id="Gender" value="female">Female
<input type="radio" name="Gender" id="Gender" value="male">Male
</div>
<br />
<div class="form-bottomTxt">All fields are required. Gender & Year cannot be readily changed after submitting.</div>
<br />
<span class="form-bottomTxt">By clicking SUBMIT, you agree to our Terms and that you <br> have read our <a href="/sign_up_policy.php">Data Use Policy</a>, including our <a href="sign_up_policy.php">Cookie Use</a>.</span>
<br />
<br />
<input name="Submit" type="submit" class="mybutton" onclick="MM_validateSignForm('Name','','R','Email','','RisEmail','Password','','R','membirth','','RinRange1920:2011','Gender','','S');return document.MM_returnValue" value="Submit" />

</form>
<br />
</div>  <!-- end of "bdyCont-center" -->

<div class="clearF"></div>

</div>  <!--- End Content -->
<? include ("footer.php"); ?>
