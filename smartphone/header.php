<!--------------  Get name of current page ---------------------------->
<!----------------------.. to make header.php dynamic active page ----->
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
                                        <a href="/"><img src="smartphone/images/fvlogobeta-sm.png" title="logo" /></a>
                                </div>
<!---------Login Check ------------------------->
<div>
<?
if(isset($_SESSION['idm'])){
?>
<div class="head02" style="text-align:right;">Welcome <a href="member_profile.php?idm=<? echo $_SESSION['idm'];?>"> <? echo $_SESSION['mem_name'];?> </a> <a href="memset.php?idm=<? echo $_SESSION['idm'];?>">&nbsp; <img src="web/images/fvgear.jpg" width="20px"></a>&nbsp;&nbsp; <a href="logout.php">Logout</a>&nbsp;&nbsp;</div>
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

<div class="login-text"> <a href="log-in.php" />Login </a> &nbsp <a href="sign_up.php" />Sign Up. &nbsp; &nbsp;</a></div>
                                
<?
}
?>

</div>

<!----------- Social Network Icon Links ----------->

				<div class="social-icons">
                                        <ul>
                                                <li><a href="https://www.facebook.com/people/Fad-Views/100007088836536"><img src="smartphone/images/facebook.png" title="facebook" /></a></li>
                                                <li><a href="http://www.twitter.com/fadviews"><img src="smartphone/images/twitter.png" title="twitter" /></a></li>
                                                <li><a href="https://plus.google.com/u/0/116007243252681082524"><img src="smartphone/images/google.png" title="google pluse" /></a></li>
                                                <li><a href="https://www.youtube.com/channel/UCLPj5PLKynZ1IC23ZZQs_wg"><img src="smartphone/images/youtube.png" title="youtube" /></a></li>
 
                                        </ul>
                                </div>
                                <div class="clear"> </div>
                        </div>

<!--------- Login End ---------->
                        <!---start-top-nav---->
                        <div class="top-nav">
                  <nav class="nav">             
                    <a href="#" id="w3-menu-trigger"> </a>
                          <ul class="nav-list">
                                <li class="nav-item"><a <? if ($ispage == 'index.php') {echo ("class='active'");}?> href="/">Home</a></li>
                                <li class="nav-item"><a <? if ($ispage == 'about.php') {echo ("class='active'");}?> href="about.php">About Us</a></li>
                                <li class="nav-item"><a <? if ($ispage == 'tour1.php') {echo ("class='active'");}?> href="tour1.php">Tour</a></li>
                                <li class="nav-item"><a <? if ($ispage == 'gallery.php') {echo ("class='active'");}?>  href="gallery.php">Gallery</a></li>
                                <li class="nav-item"><a <? if ($ispage == 'contact.php') {echo ("class='active'");}?>  href="contact.php">Contact</a></li>
			       	<li class="nav-item"><a <? if ($ispage == 'faq.php') {echo ("class='active'");}?>   href="faq.php">FAQ</a></li>
                         </ul>
                     </nav>
                     <div class="top-nav-right">
                                                 <form id="form1" name="form1" method="post" action="res.php">
                                                <input name="Search" type="text" id="Search" value="Search Actor or Movie" onfocus="empty('Search');" /><input type="submit" value="" />
                                        </form>
                                </div>
                  <div class="clear"> </div>
                     <script src="smartphone/js/responsive.menu.js"></script>
                  </div>
                <!---End-top-nav---->
                       </div>
   
</div>    <!----End-header----->
       

	 <!---  EMPTY Form value function --->
<script language="javascript" type="text/javascript">
function empty(val){
document.getElementById(val).value="";
}
function show_tab(val){

		document.getElementById(val).style.display="block";
		document.getElementById('tab'+val).style.backgroundImage="url('smartphone/images/tab-active.jpg')";
		
		for(i=1;i<=6;i++){
			if(val!=i){
				document.getElementById(i).style.display="none";
				document.getElementById('tab'+i).style.backgroundImage="none";
			}
		}
}
</script>
