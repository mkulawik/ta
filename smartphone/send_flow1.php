<? 
@session_start();
@ob_start();

include("db/dbcon.php");
include('db/db.php');
include('db/functions.php');

$idm = $_GET['idm'];
$spin = $_GET['spn'];
$secp = $_SESSION['secpin'];
$failed = 0;

$flower_count=mysql_query("select flowers from members where id=".$_SESSION['idm']);
$fl=mysql_fetch_array($flower_count);
$tot_flower=$fl['flowers'];
if ($tot_flower < 1) {
$tot_flower=0 ;
}
else
{
    if ($spin == $secp) {

	mysql_query("update members set flowers = flowers -1 where id=".$_SESSION['idm']);
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

function myfunc($actid,$flowercount,$failchk) {

if ($failchk){

  alert ("Error. Please contact the administrator.");
}
else
{
  if ($flowercount < 1){
     alert ("Sorry. You have no more flowers.");
   }
     else
   {
     $flowercount=$flowercount-1;
     alert ("Flower sent. Flowers left: "+$flowercount);
   }

}


window.location="profile.php?idm="+$actid;

}
    
  window.onload=myfunc(<?echo $idm;?>,<? echo $tot_flower; ?>,<? echo $failed; ?> );

</script>

<? 

$secpin=mt_rand(100,999);
$_SESSION['secpin']=$secpin;

?>

</body>
</html>




