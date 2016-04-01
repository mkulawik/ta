<? 
@session_start();
@ob_start();

include("db/dbcon.php");
include('db/db.php');
include('db/functions.php');

$idm = $_GET['idm'];
$spin = $_GET['spn'];
$secp = $_SESSION['secpin'];
$mid = $_SESSION['idm'];
$failed = 0;
$givegift=0;

$flower_count=mysql_query("select flowers from members where id=".$_SESSION['idm']);
$fl=mysql_fetch_array($flower_count);
$tot_flower=$fl['flowers'];

$gftq="select * from gifts where id_member=".$mid." && id_actor=".$idm." && teddy is not null order by id desc limit 0,1";
$gft=mysql_query($gftq);
$giftcheckcount=mysql_num_rows($gft);
$gftchk=mysql_fetch_array($gft);

$datetime1 = new DateTime('now');
$datetime2 = new DateTime($gftchk['gift_date']);
$interval = $datetime2->diff($datetime1);

$giftcredit = $interval->format('%r%a');


if ($tot_flower < 100) {
$tot_flower=0 ;
}
else
{
    if ($spin == $secp) {

	if ($giftcredit >= 3 || !($giftcheckcount) ) {
		mysql_query("update members set flowers = flowers -100 where id=".$_SESSION['idm']);

        	 mysql_query("insert into gifts (id_actor,id_member,teddy,gift_date) values ('$idm','$mid',1,now());");
		
		$givegift = TRUE;
	}
     }
      else
     {

     $failed = TRUE;
     }
}


?>

<html>
<body>


<script>

function myteddybear($actid,$flowercount,$failchk,$giftcheck) {

if ($failchk){

  alert ("Error. Please contact the administrator.");
}
else
{
  if ($flowercount < 100){
     alert ("Sorry. You don't have enough flowers for a teddybear.");
   }
     else
   {

	if ($giftcheck) {

		$flowercount=$flowercount-100;
     		alert ("Teddybear sent!  Flowers left: "+$flowercount);
	} else
	{
		alert("Sorry. You have to wait 3 days to send a teddybear to the same person.");
	}
   }

}


window.location="profile.php?idm="+$actid;

}
    
  window.onload=myteddybear(<?echo $idm;?>,<? echo $tot_flower; ?>,<? echo $failed; ?>,<? echo $givegift; ?> );

</script>

<? 

$secpin=mt_rand(100,999);
$_SESSION['secpin']=$secpin;

?>

</body>
</html>




