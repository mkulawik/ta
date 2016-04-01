<?


$k=0;
$j=0;
$phototext = array();
$photoid = array();
$photomem = array();
$photomemid = array();
$photodate = array();

?>
<table cellpadding="10" border="0" max-width="50%" height="auto" width="auto"> <tr>
	<?
	$photo=mysql_query("select * from photos where image <>'' order by id desc limit 10");
	while($pics=mysql_fetch_array($photo)){
		$newDate = date("M d 'y", strtotime($pics['posted_date']));
		$mmbers=mysql_query("select * from members where id=".$pics['id_member']);
	 	$mem=mysql_fetch_array($mmbers);
	
		$moviepost=mysql_query("select * from movies where id=".$pics['id_movie']);
		$mpost=mysql_fetch_array($moviepost);

                $phototext[$k]= $mpost['movie_name'];
                $photoid[$k]= $pics['id_movie'];
                $photomem[$k]= $mem['name'];
                $photomemid[$k]= $mem['id'];
                $photodate[$k]= $pics['posted_date'];

		$k++;

?>

<td align="center" valign="center"><a href="photos/<? echo ($pics['image']); ?>"><img src="photos/<? echo ($pics['image']);?>" width="150"> </a>
</td>
<? 
	}	
	?>
</tr>

<tr>

<?

	while ( $j < 10 ) {

?>

<td width="300">Posted under:<br> <a href="movie.php?idm=<? echo $photoid[$j];?>"> <? echo $phototext[$j]; ?></a> <br>
by: <a href="member_profile.php?idm=<? echo $photomemid[$j]; ?>"> <?echo $photomem[$j]; ?> </a><br>
<? echo $photodate[$j]; ?>

</td>

<?

$j++;

}

?>

</tr>
</table>


<table cellpadding="10" border="0" max-width="140">
<tr>
<img src="photos/myimage.jpg" width="100"> 
</tr> </table>
