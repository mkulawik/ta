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
   
<!--  Make it fit the mobile / smartphone --------------->
<meta name="viewport" content="width=device-width, initial-scale=1">
 <!-------------------------------------------- --------->
   <title>Fadviews - Login </title>

    <link rel="stylesheet" href="smartphone/css/stylelogin.css" media="screen" type="text/css" /> 


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

   <h4><a href="/"><img src="smartphone/images/fvminilogo.png"></a></h4>
    <h3>Login</h3>

    <fieldset>

<form action="auth.php" name="form2" id="form2" method="post" enctype="multipart/form-data">


 <input name="Login_Email" value="Email" type="email" id="Login_Email" onfocus="empty('Login_Email');" />

<input name="Login_Password" value="Password" type="password" id="Login_Password" onfocus="empty('Login_Password');" />

        <input type="submit" value="Login">

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
