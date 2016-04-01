<script type="text/javascript">
    $(document).ready(function () {
        $("iframe").width(256);
        $("iframe").height(144);
    });
</script>

   <br />

<table>
	<?
	$j=0;
	$k=0;
	$video=mysql_query("select * from videos where id_character=".$idm);
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
<div class="vidtext">
<p3>
by: <a href="member_profile.php?idm=<? echo $vidmemid[$j]; ?>"> <?echo $vidmem[$j]; ?> </a><br />
on: <? echo $viddate[$j]; ?> 
</p3>
</div>
<br /><br />
</td>

<?

if ($j % 3 == 2) {
 // Multiple of 3
echo "</tr><tr>";

 } 
$j++;

 } ?>
</tr>
</table>

