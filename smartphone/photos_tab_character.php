<br />
<table>
	<?
	$k=0;
	$photos=mysql_query("select * from photos where id_character=".$idm);
	while($ph=mysql_fetch_array($photos)){
		$newDate = date("M d 'y", strtotime($ph['posted_date']));
		$mmbers=mysql_query("select * from members where id=".$ph['id_member']);
	 	$mem=mysql_fetch_array($mmbers);
  
                $photoid[$k]= $ph['id_movie'];
                $photomem[$k]= $mem['name'];
                $photomemid[$k]= $mem['id'];
                $photodate[$k]= $ph['posted_date'];



?>

<td>
<br />
<div width="150"><a href="photos/<? echo $ph['image'];?>" target="_blank">
              <img src="photos/<? echo $ph['image'];?>" width="150" border="none" class="img-border" /></a>
</div>
<div class="vidtext">
<p3>
by: <a href="member_profile.php?idm=<? echo $photomemid[$k]; ?>"> <?echo $photomem[$k]; ?> </a><br />
on: <? echo $photodate[$k]; ?>
</p3>
</div>
<br /><br />
</td>

<?

if ($k % 4 == 3) {
 // Multiple of 4
echo "</tr><tr>";

 } 
$k++;

 } ?>
</tr>
</table>

