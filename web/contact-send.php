<?
@session_start();
@ob_start();
include("db/dbcon.php");
?>

<title>FADViews</title>
<link href="web/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">
</script>
</head>

<?
 
$_SESSION['cName'] = mysql_real_escape_string($_POST['contactName']);
$_SESSION['cEmail'] = mysql_real_escape_string($_POST['contactEmail']);
$_SESSION['cPhone'] = mysql_real_escape_string($_POST['conctactPhone']);
$_SESSION['cMsg'] = $_POST['contactMsg'];
 

$name = mysql_real_escape_string($_POST['contactName']);
$mail = mysql_real_escape_string($_POST['contactEmail']);
$phone = mysql_real_escape_string($_POST['contactPhone']);
//$msg = mysql_real_escape_string($_POST['contactMsg']);
$msg = $_POST['contactMsg'];

$headers  = 'MIME-Version: 1.0' . "\r\n";
			
$headers .=  'Content-type: text/plain; charset=UTF-8' . "\r\n";
			
$m1= '<';
$m2= '>';
$headers .= "From: ".$name. "<".$mail."> \r\n";


$fvmail="info@fadviews.com";

$namephone=$name." Mobile: ".$phone;

?>


<body>
<?php include("header.php");?>

<div class="cont-bg">
<div class="container-bdy">

<div class="bdyCont-center" style="padding-top:40px; margin:0 auto;">
<span class="head01">

<? // ****** SEND EMAIL        *****/


	mail($fvmail, $namephone, $msg, $headers);


$notice="Thank you for your email.  Have a nice day! ";
echo $notice;
?>

<!-- end of "bdyCont-left" -->
</div>  
<!-- end of "bdyCont-right" -->
<div class="clearF"></div>
</div>  <!-- end of "container-bdy" -->

</div>   <!-- end of "cont-bg" -->



<? include("footer.php");?>

</body>
</html>
