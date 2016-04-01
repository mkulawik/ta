<?

$k=0;
$j=0;
$vidtext = array();
$viddate = array();
$vidmovid = array();

?>

<script type="text/javascript">
    $(document).ready(function () {
        $("iframe").width(160);
        $("iframe").height(90);
    });
</script>
<table>

	<?
	$video=mysql_query("select * from trailers limit 6");
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
<? echo $vidtext[$j]; ?> 
</p3>
<br /><br />
</td>

<?

if ($j % 2 == 1) {
 // Multiple of 2: Align them nicely in rows of 2.  Use ($j % 3 == 0 ) if rows of 3.
echo "</tr><tr>";

 } 
$j++;

} ?>
</tr>
</table>
