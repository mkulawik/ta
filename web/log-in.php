<?
@session_start();
@ob_start();
?>
<!--
FADVIEWS
URL: http://fadviews.com
-->

<!DOCTYPE html>
<html>


<head>

  <meta charset="UTF-8">

  <title>Fadviews - Login </title>

    <link rel="stylesheet" href="web/css/stylelogin.css" media="screen" type="text/css" />


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



  <!---  EMPTY Form value function --->
<script language="javascript" type="text/javascript">
function empty(val){
document.getElementById(val).value="";
}
</script>

</head>

<body>

  <div class="container">

  <div id="login-form">

   <h4><a href="/"><img src="web/images/fvminilogo.png"></a></h4>
    <h3>Login</h3>

    <fieldset>

<form action="auth.php" name="form2" id="form2" method="post" enctype="multipart/form-data">


 <input name="Login_Email" value="Email" type="email" id="Login_Email" onfocus="empty('Login_Email');" />

<input name="Login_Password" value="Password" type="password" id="Login_Password" onfocus="empty('Login_Password');" />

<input  onclick="MM_validateForm('Login_Email','','RisEmail','Login_Password','','R');return document.MM_returnValue" type="submit" class="button" value="Login"  />


        <footer class="clearfix">

          <p><a href="forgot_password.php"><span class="info">?</span>Forgot Password</a>



	 <span class="reggy">  <a href="sign_up.php">Sign-up / Register </a></span>
	 <span class="erry"> 
<?
if(isset($_SESSION['err'])){
echo $_SESSION['err'];
$_SESSION['err']="";
}
?>
	</span>
	</p> 
        </footer>
      </form>

    </fieldset>

  </div> <!-- end login-form -->

</div>

</body>


</html>
