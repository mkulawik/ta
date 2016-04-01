  <script type="text/javascript" src="web/js/jquery.bxslider.js"></script>
  <script type="text/javascript" src="web/js/jquery.bxslider.min.js"></script>


  <script type="text/javascript" src="web/js/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="web/js/jquery.fitvids.js"></script>
        
        <link rel="stylesheet" type="text/css" media="all" href="web/css/jquery.bxslider.css" />

<?

$k=0;
$j=0;
$phototext = array();
$photoid = array();
$photomem = array();
$photomemid = array();
$photodate = array();

?>

<ul class="slider2">
	<?

	$j=0;
	$k=0;
	$photo=mysql_query("select * from photos where image <>'' order by id desc limit 10");
	while($pics=mysql_fetch_array($photo)){
		$newDate = date("M d 'y", strtotime($pics['posted_date']));
		$mmbers=mysql_query("select * from members where id=".$pics['id_member']);
	 	$mem=mysql_fetch_array($mmbers);
	
		$moviepost=mysql_query("select * from movies where id=".$pics['id_movie']);
		$mpost=mysql_fetch_array($moviepost);

		$actpost=mysql_query("select * from actors where id=".$pics['id_actor']);
		$apost=mysql_fetch_array($actpost);

		$charpost=mysql_query("select * from characters where id=".$pics['id_character']);
		$cpost=mysql_fetch_array($charpost);

                $phototext[$k]= $mpost['movie_name'];
                $photoid[$k]= $pics['id_movie'];
                $photomem[$k]= $mem['name'];
                $photomemid[$k]= $mem['id'];
                $photodate[$k]= $pics['posted_date'];

		$photoactid[$k]= $pics['id_actor'];
		$photocharid[$k]= $pics['id_character'];
		$acttext[$k]= $apost['f_name']." ".$apost['l_name'];
		$chartext[$k]= $cpost['char_name'];

		$k++;

?>
<!--
  <li> <a href="/photos/<? echo ($pics['image']); ?>"><img src="/photos/<? echo ($pics['image']);?>" height="100" > </a><br>
<span class="lmov-title">Posted under:<br> <a href="movie.php?idm=<? echo $photoid[$j];?>"> <? echo $phototext[$j]; ?></a> <br>
by: <a href="member_profile.php?idm=<? echo $photomemid[$j]; ?>"> <?echo $photomem[$j]; ?> </a><br>
<? echo $photodate[$j]; ?>
</span> 
-->

  <li> <a href="/photos/<? echo ($pics['image']); ?>"><img src="/photos/<? echo ($pics['image']);?>" height="100" > </a><br>
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

</li>

<?

$j++;

 } ?>
</ul>


<script>

$(document).ready(function(){
  $('.slider2').bxSlider({
    slideWidth: 150,
    maxSlides: 5,
    slideMargin: 5
  });
});

</script>

