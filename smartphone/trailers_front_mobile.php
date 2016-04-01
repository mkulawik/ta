<?

$k=0;
$j=0;
$vidtext = array();
$viddate = array();
$vidmovid = array();

?>
<!--
<script type="text/javascript">
    $(document).ready(function () {
        $("iframe").width(160);
        $("iframe").height(90);
    });
</script>
-->
	<?
	$video=mysql_query("select * from trailers order by id desc limit 4");
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
<br /> 
<? echo $myvid; ?> <br />
<p3>
<a href="movie.php?idm=<? echo $vidmovid[$j]; ?>"><? echo $vidtext[$j]; ?> </a>
</p3>
<br /><br />
<?

 //if ($j % 1 == 1) {
 // Multiple of 2: Align them nicely in rows of 2. ($j % 2 == 1)  Use ($j % 3 == 0 ) if rows of 3.

//echo "</tr><tr>";

 
$j++;

} ?>
