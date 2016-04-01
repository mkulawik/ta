
<br />	 
	<?
	$count=0;
	$photos=mysql_query("select * from photos where id_movie=".$idm);
	while($ph=mysql_fetch_array($photos)){
		$newDate = date("M d 'y", strtotime($ph['posted_date']));
		$mmbers=mysql_query("select * from members where id=".$ph['id_member']);
	 	$mem=mysql_fetch_array($mmbers);
		if($count==3){

	}
	?>
  
      <div class="head03" width="250"><a href="photos/<? echo $ph['image'];?>" target="_blank">
              <img src="photos/<? echo $ph['image'];?>" width="200" border="none" class="img-border" /></a>
          <br />Uploaded on: <? echo $newDate;?><br />By  <a href="member_profile.php?idm=<? echo $mem['id'];?>">
              <? echo $mem['name'];?></a></div>
      
   
	<?
	$count+=1;

	}
	?>
