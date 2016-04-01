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

<ul class="slider1">

	<?
	$video=mysql_query("select * from videos where video_code <>'' order by id desc limit 6");
	while($vid=mysql_fetch_array($video)){
		$newDate = date("M d 'y", strtotime($vid['posted_date']));
		$mmbers=mysql_query("select * from members where id=".$vid['id_member']);
	 	$mem=mysql_fetch_array($mmbers);
	
		$moviepost=mysql_query("select * from movies where id=".$vid['id_movie']);
		$mpost=mysql_fetch_array($moviepost);

		$actpost=mysql_query("select * from actors where id=".$vid['id_actor']);
		$apost=mysql_fetch_array($actpost);

		$charpost=mysql_query("select * from characters where id=".$vid['id_character']);
		$cpost=mysql_fetch_array($charpost);

                $vidtext[$k]= $mpost['movie_name'];
                $vidid[$k]= $vid['id_movie'];
                $vidmem[$k]= $mem['name'];
                $vidmemid[$k]= $mem['id'];
                $viddate[$k]= $vid['posted_date'];
		$vidactid[$k]= $vid['id_actor'];
		$vidcharid[$k]= $vid['id_character'];
		$acttext[$k]= $apost['f_name']." ".$apost['l_name'];
		$chartext[$k]= $cpost['char_name'];

		$k++;

?>


<li>
<?
$vid=stripslashes($vid['video_code']);

$myvid = preg_replace('#(<p.*?>).*?(</p>)#', '$1$2', $vid);


//$myvid=$vid;

?>
<!--
<div class="viddy"> <? echo $myvid; ?> </div><br />
<span class="lmov-title">Posted under:<a href="movie.php?idm=<? echo $vidid[$j];?>"> <? echo $vidtext[$j]; ?></a><br />
by: <a href="member_profile.php?idm=<? echo $vidmemid[$j]; ?>"> <?echo $vidmem[$j]; ?> </a><br />
<? echo $viddate[$j]; ?><br /><br />
</span>
-->


<div class="vidtext">
<? echo $myvid; ?> <br>
<p3>Posted under: <b1><a href="movie.php?idm=<? echo $vidid[$j];?>"> <? echo $vidtext[$j]; ?></a>
<a href="profile.php?idm=<? echo $vidactid[$j];?>"> <? echo $acttext[$j]; ?></a>
<a href="character.php?idm=<? echo $vidcharid[$j];?>"> <? echo $chartext[$j]; ?></a>
</b1> <br />
by: <b1><a href="member_profile.php?idm=<? echo $vidmemid[$j]; ?>"> <?echo $vidmem[$j]; ?> </a></b1><br />
<? echo $viddate[$j]; ?> 
</p3><br /><br />
</div>

</li>

<?

$j++;

 } ?>
</ul>


<script>

$(document).ready(function(){
  $('.slider1').bxSlider({
    slideWidth: 250,
    maxSlides: 3,
    slideMargin: 5
  });
});

</script>
