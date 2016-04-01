<?
/*
include("db/dbcon.php");
include('db/db.php');
include('db/functions.php');
include('db/page.php');	
*/


$k=0;
$j=0;
$vidtext = array();
$vidid = array();
$vidmem = array();
$vidmemid = array();
$viddate = array();

?>

<script type="text/javascript">
    $(document).ready(function () {
        $("iframe").width(180);
        $("iframe").height(130);
    });
</script>
	  <table  cellpadding="10" cellspacing="10"><tr>
	<?
	$video=mysql_query("select * from videos where video_code <>'' order by id desc limit 5");
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

?>

      <td><a width="100" height="60"><? echo stripslashes($vid['video_code']);?></a>
</td>
<? 
	}	
	?>
</tr>

<tr>

<?

	while ( $j < 5) {

?>
<td><span class="lmov-title">Posted under:<br> <a href="movie.php?idm=<? echo $vidid[$j];?>"> <? echo $vidtext[$j]; ?></a> <br>
by: <a href="member_profile.php?idm=<? echo $vidmemid[$j]; ?>"> <?echo $vidmem[$j]; ?> </a><br>
<? echo $viddate[$j]; ?>
</span>
</td>
<?

$j++;

}

?>

</tr>
</table>

