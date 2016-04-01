<? 
@session_start();
@ob_start();
include("chksession.php");
?>


<!--

FADVIEWS
URL: http://fadviews.com

-->
<!DOCTYPE HTML>
<?
include("db/dbcon.php");
include('db/db.php');
include('db/functions.php');
include('db/page.php');	
?>



<html>
<head>
  <title>FADViews - Film Actor Database Reviews</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="web/css/stylenotabl.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

 </head>
  <body>
	<!----start-header----->
   
	<? include ("header.php"); ?>

	<!----End-header----->
		 <!---start-content---->
<?
if(isset($_SESSION['idm']) && $_SESSION['idm'] == $_GET['idm']){

$idm=$_GET['idm'];

$member=mysql_query("select * from members where id=".$idm);
$mem=mysql_fetch_array($member);
$newDate = date("M d 'y", strtotime($mem['reg_date']));

echo $_POST[emailaddress];

?>


<div class="bdyCont-center">

<div class="container-bdy">
<div class="score" style="font-size:28px; color:#aa8036;"><? echo $mem['name'];?></div><br /><br />
<div class="profileImg-div">
<?
if(is_file("members/".$mem['image'])){
?>
<img src="members/<? echo $mem['image'];?>" width="111" />
<?
}else{
?>
<img src="members/noimage.jpg" width="55" />
<?
}
?>
</div>

  <div class="clearF" style="height:0px;"></div>

<div class="mem-profile">
<table cellspacing="10"> <tr><td>
<h2>Email: </h2></td><td><hc> <? echo $mem['email'];?> </hc></td></tr>
<tr><td>
<h2>Location: </h2></td><td> <hc> <? echo $mem['location'];?></hc></td></tr>
<tr><td>
<h2>Member since: </h2></td><td> <hc> <? echo $newDate;?></hc></td></tr>
<tr><td>
<h2>About me: </h2> </td><td><hc> <? echo $mem['about_me'];?></hc> </td></tr>
</table>
</div>  <!-- end of "mem-profile" -->


<div class="clear"></div>

----------------------------<br>
<div class="mem-text">
<h2>Fill in form(s) to change data.</h2><br>
(Leave the fields BLANK to NOT change)<br>

<form method="post" action="memset_update.php?idm=<? echo $_SESSION['idm'];?>" name="form" id="form">

<table cellpadding="15" cellspacing="10"> 
 <tr><td>Profile Name: &nbsp;</td><td>
  <input type="text" name="membername" size="30">
</td>
<td> <span style="color:orange"> <? if(isset($_SESSION['msgAErr'])){echo $_SESSION['msgAErr']; $_SESSION['msgAErr']="";} ?></span>
     <span style="color:green"> <? if(isset($_SESSION['msgA'])){echo $_SESSION['msgA']; $_SESSION['msgA']="";} ?></span> </td>
</tr>
 <tr><td>Location: &nbsp;</td><td>
 <input type="text" name="location" size="30">
</td>
<td> <span style="color:green"><? if(isset($_SESSION['msgB'])){echo $_SESSION['msgB']; $_SESSION['msgB']="";} ?></span> </td>
</tr>
 <tr><td>About me: &nbsp;</td><td>
<input type="text" name="aboutme" size="30">
</td>
<td> <span style="color:green"><? if(isset($_SESSION['msgC'])){echo $_SESSION['msgC']; $_SESSION['msgC']="";} ?></span> </td>
</tr>
<tr><td>Email Address:</td><td>
<input type="text" name="emailaddress" id="emailaddress" size="30">
</td>
<td> <span style="color:green"><? if(isset($_SESSION['msgD'])){echo $_SESSION['msgD']; $_SESSION['msgD']="";} ?> </span>
<span style="color:orange"><? if(isset($_SESSION['msgDErr'])){echo $_SESSION['msgDErr']; $_SESSION['msgDErr']="";} ?> </span></td>	
</tr>
 <tr><td>Password: &nbsp;</td><td>
<input type="password" name="fvpassword" size="30">
</td>
<td> <span style="color:green"><? if(isset($_SESSION['msgE'])){echo $_SESSION['msgE']; $_SESSION['msgE']="";} ?> </span></td>
</tr>

 <tr><td>Enter Verification Number on the right: &nbsp;</td><td>
<input type="int" name="verifynum" size="10">

</td><td><span style="color:red; font-weight:bold;"> <? $veripin=mt_rand(100,999); echo $veripin; ?></span></td></tr>
</table>

<? $_SESSION['vpin']=$veripin; /* Pass verification pin */ ?>

<span style="color:red">
<?
    if(isset($_SESSION['msg2'])){
        echo $_SESSION['msg2'];
        $_SESSION['msg2']="";
?><br /><?        
}


    ?>
</span>

<align="right">

<input  type="submit" class="button1" value="Update !"  />

</span>
</form>
</div>
<div class="mid-grid"><div class="wrap">

<!-------- FORM to Change Profile Picture ------------->
<span class="head01">Upload Member Photo </span>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="1">

<form action="memset_photo.php?idm=<? echo $idm;?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <tr>

 <tr>
    <td colspan="2" valign="top" class="head03"><? 
        if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        $_SESSION['msg']="";
        }
        ?></td>

	
  </tr>
  <tr>
    <td colspan="2" valign="top"><input name="file" type="file" class="head02" /></td>
    </tr>
  <tr>
    <td colspan="2"><input class="button1" name="Submit" type="submit" class="button_lime" value="Upload" /></td>

</form>
</table>

</div>

</div>   <!-- end of "cont-bg" -->
<!-- end of "bdyCont-right" -->
<div class="clearF"></div>
</div>  <!-- end of "container-bdy" -->
</div>
		 <!---End-content---->

		 
		 <!---start-footer---->

<div class="footer-outerDiv">
</div>  <!-- end of "footer-outerDiv" -->
<script language="javascript" type="text/javascript">
function empty(val){
document.getElementById(val).value="";
}
</script>

<?
}else{
$idm=0;
header("location:index.php");
}

?>


	<div class="clear"> </div>
		<!--- Copyright ---->	

       <? include ("copyright.html"); ?>
</div>

		 <!---End-footer---->
	</body>
</html>


