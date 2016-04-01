<?
/*
include("db/dbcon.php");
include('db/db.php');
include('db/functions.php');
include('db/page.php');
*/


$k=0;
$j=0;
$phototext = array();
$photoid = array();
$photomem = array();
$photomemid = array();
$photodate = array();

?>

<script type="text/javascript">
    $(document).ready(function () {
        $("iframe").width(160);
        $("iframe").height(90);
    });
</script>
<table>

	<?
	$video=mysql_query("select * from videos where id_movie=".$idm);
	while($vid=mysql_fetch_array($video)){
		$newDate = date("M d 'y", strtotime($vid['posted_date']));
		$mmbers=mysql_query("select * from members where id=".$vid['id_member']);
	 	$mem=mysql_fetch_array($mmbers);
	
		$moviepost=mysql_query("select * from movies where id=".$vid['id_movie']);
		$mpost=mysql_fetch_array($moviepost);

                $vidtext[$k]= $mpost['movie_name'];
                $vidid[$k]= $vid['id_movie'];
                $vidmem[$k]= $mem['name'];
                $vidmemid[$k]= $mem['id'];
                $viddate[$k]= $vid['posted_date'];

		$k++;

// Remove extra text from Vimeo embed
$vid=stripslashes($vid['video_code']);

$myvid = preg_replace('#(<p.*?>).*?(</p>)#', '$1$2', $vid);

?>
<td>
<br /> 
<? echo $myvid; ?> <br />
<p3>
by: <a href="member_profile.php?idm=<? echo $vidmemid[$j]; ?>"> <?echo $vidmem[$j]; ?> </a><br />
<? echo $viddate[$j]; ?> 
</p3>
<br /><br />
</td>

<?

if ($j % 2 == 1) {
 // Multiple of 2
echo "</tr><tr>";

 } 
$j++;

} ?>
</tr>
</table>
