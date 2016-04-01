<?

$k=0;
$j=0;
$vidtext = array();
$viddate = array();
$vidmovid = array();

?>

<table align="center" cellpadding="10" cellspacing="30">
 
	<?
	$video=mysql_query("select * from trailers order by id desc limit 6");
	while($vid=mysql_fetch_array($video)){
		$newDate = date("M d 'y", strtotime($vid['posted_date']));
	

                $vidtext[$k]= $vid['movie_name'];
                $vidmovid[$k]= $vid['id_movie'];
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
<a href="movie.php?idm=<? echo $vidmovid[$j]; ?>"><? echo $vidtext[$j]; ?> </a>
</p3>
<br /><br />
</td>

<?

if ($j % 3 == 2) {
 // Multiple of 3: Align them nicely in rows of 3.  Use ($j % 2 == 0 ) if rows of 2.
echo "</tr><tr>";

 } 
$j++;

} ?>
</tr>
</table>
