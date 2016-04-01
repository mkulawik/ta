<!--------------  Get name of current page ---------------------------->
<!----------------------.. to make header.php dynamic active page ----->
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<?php
function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}
$ispage = curPageName();
?> 
<!-------------------------------------------------------------------->

<div class="header">
	     <div class="wrap">
			<div class="top-header">
				<div class="logo">
					<a href="/"><img src="web/images/fvlogobeta.png" title="logo" /></a>

				</div>

<!--------------   LOGIN ------------------------------------------------>
<div>
<?
if(isset($_SESSION['idm'])){
?>
<div class="head02" style="text-align:right;">Welcome <a href="member_profile.php?idm=<? echo $_SESSION['idm'];?>"> <? echo $_SESSION['mem_name'];?></a><a href="memset.php?idm=<? echo $_SESSION['idm'];?>">  <img src="web/images/fvgear.jpg" width="15px"></a> <a href="logout.php">Logout</a></div>
<?
}else{
?>
<span style="color:#990000;font-family:'OpenSans'; font-size:12px;">
&nbsp;&nbsp;&nbsp;<?
if(isset($_SESSION['err'])){
echo $_SESSION['err'];
$_SESSION['err']="";
}
?>
</span>
<form action="auth.php" name="form2" id="form2" method="post" enctype="multipart/form-data">
<div class="login-field">
<span>Email</span>
<input name="Login_Email" type="text" class="search-txtfield" id="Login_Email" />
</div>  <!-- end of "search-cont" -->
 
<div class="login-field">
&nbsp;
<span>Password</span>

<input name="Login_Password" type="password" class="search-txtfield" id="Login_Password" />
</div>

<!-- end of "search-cont" -->
 
<div class="login-button">
<input  onclick="MM_validateForm('Login_Email','','RisEmail','Login_Password','','R');return document.MM_returnValue" type="submit" class="button" value="Login"  />
<a href="forgot_password.php">Forgot Password?</a>
&nbsp;
<a href="sign_up.php">Sign Up!</a>
</div>

<!-- end of "search-cont" -->

<!--  <spanstyle="font-size:11px;"><a href="forgot_password.php">Forgot Password?</a></span>
--->

</form>

<?
}
?>

</div>

<!-------- Social Network Icon Links -------------->

         <div class="social-icons">
                                        <ul>
                                                <li><a href="https://www.facebook.com/people/Fad-Views/100007088836536"><img src="smartphone/images/facebook.png" title="facebook" /></a></li>
                                                <li><a href="http://www.twitter.com/fadviews"><img src="smartphone/images/twitter.png" title="twitter" /></a></li>
                                                <li><a href="https://plus.google.com/u/0/116007243252681082524"><img src="smartphone/images/google.png" title="google pluse" /></a></li>
                                                <li><a href="https://www.youtube.com/channel/UCLPj5PLKynZ1IC23ZZQs_wg"><img src="smartphone/images/youtube.png" title="youtube" /></a></li>
                                        </ul>

                                </div>
<!----- End Social Network links ---->

				<div class="clear"> </div>  
			</div>
<!-------------  LOGIN END --------------------------------------------->

		<!---start-top-nav---->

			<div class="top-nav">
				<div class="top-nav-left">
					<ul>

         				 <li <? if ($ispage == 'index.php') {echo ("class='active'");}?> ><a href="/index.php">Home</a></li>
                                         <li <? if ($ispage == 'about.php') {echo ("class='active'");}?> ><a href="about.php">About</a></li>
                                         <li <? if ($ispage == 'tour1.php') {echo ("class='active'");}?> ><a href="tour1.php">Tour</a></li>
                                         <li <? if ($ispage == 'gallery.php') {echo ("class='active'");}?> ><a href="gallery.php">Gallery</a></li>
                                         <li <? if ($ispage == 'contact.php') {echo ("class='active'");}?>><a href="contact.php">Contact</a></li>
					 <li <? if ($ispage == 'faq.php') {echo ("class='active'");}?>><a href="faq.php">FAQ</a></li>

						<div class="clear"> </div>
					</ul>
				</div>
				<div class="top-nav-right">
					<form id="form1" name="form1" method="post" action="res.php">
						<input name="Search" size="50" type="text" id="Search" value="Search Actor or Movie" onfocus="empty('Search');" /> <input type="submit" value="" />
					</form>
				</div>
				<div class="clear"> </div>
			</div>
			<!---End-top-nav---->
		</div>
	</div>
        <!---  EMPTY Form value function --->
<script language="javascript" type="text/javascript">
function empty(val){
document.getElementById(val).value="";
}
function show_tab(val){

		document.getElementById(val).style.display="block";
		document.getElementById('tab'+val).style.backgroundImage="url('web/images/tab-active.jpg')";
		
		for(i=1;i<=6;i++){
			if(val!=i){
				document.getElementById(i).style.display="none";
				document.getElementById('tab'+i).style.backgroundImage="none";
			}
		}
}
</script>
