<br />
	 
<table>
	<?
	$j=0;
	$k=0;
	$photos=mysql_query("select * from photos where id_actor=".$idm);
	while($ph=mysql_fetch_array($photos)){
		$newDate = date("M d 'y", strtotime($ph['posted_date']));
		$mmbers=mysql_query("select * from members where id=".$ph['id_member']);
	 	$mem=mysql_fetch_array($mmbers);



                $vidtext[$k]= $mpost['movie_name'];
                $vidid[$k]= $ph['id_movie'];
                $vidmem[$k]= $mem['name'];
                $vidmemid[$k]= $mem['id'];
                $viddate[$k]= $ph['posted_date'];

		$k++;
	

	?>
  
<td>
<br /> 
<div width="150"><a href="photos/<? echo $ph['image'];?>" target="_blank">
              <img src="photos/<? echo $ph['image'];?>" width="150" border="none" class="img-border" /></a>
</div>
<div class="vidtext">
<p3>
by: <a href="member_profile.php?idm=<? echo $vidmemid[$j]; ?>"> <?echo $vidmem[$j]; ?> </a><br />
on: <? echo $viddate[$j]; ?> 
</p3>
</div>
<br /><br />
</td>

<?

if ($j % 4 == 3) {
 // Multiple of 4
echo "</tr><tr>";

 } 
$j++;

 } ?>
</tr>
</table>
  

 
