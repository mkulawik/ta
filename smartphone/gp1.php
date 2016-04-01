<?

$k=0;
$j=0;
$phototext = array();
$photoid = array();
$photomem = array();
$photomemid = array();
$photodate = array();

?>
	<table cellpadding="10" cellspacing="10" > <tr>
	<?
	$photo=mysql_query("select * from photos where image <>'' order by id desc limit 5");
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

<td ><a href="/photos/<? echo ($pics['image']); ?>"><img src="/photos/<? echo ($pics['image']);?>" width="120"> </a>
</td>
<? 
	}	
	?>
</tr>

<tr>

<?

	while ( $j < 5 ) {

/*
<td><span class="lmov-title">Posted under:<br> <a href="movie.php?idm=<? echo $photoid[$j];?>"> <? echo $phototext[$j]; ?></a> <br>
by: <a href="member_profile.php?idm=<? echo $photomemid[$j]; ?>"> <?echo $photomem[$j]; ?> </a><br>
<? echo $photodate[$j]; ?>
</span>
</td>
*/ 

?>

<span class="vidtext">
<p3>
Posted under:<br /> <b1> <a href="movie.php?idm=<? echo $photoid[$j];?>"> <? echo $phototext[$j]; ?></a>
<a href="profile.php?idm=<? echo $photoactid[$j];?>"> <? echo $acttext[$j]; ?></a>
<a href="character.php?idm=<? echo $photocharid[$j];?>"> <? echo $chartext[$j]; ?></a>
</b1><br />
by: <b1><a href="member_profile.php?idm=<? echo $photomemid[$j]; ?>"> <?echo $photomem[$j]; ?> </a> </b1><br />
<? echo $photodate[$j]; ?>
</p3><br /><br />
</span>
<?

$j++;

}

?>

</tr>
</table>

