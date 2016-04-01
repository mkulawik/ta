<script type="text/javascript">
    $(document).ready(function () {
        $("iframe").width(256);
        $("iframe").height(144);
    });
</script>
<?
/*
include("db/dbcon.php");
include('db/db.php');
include('db/functions.php');
include('db/page.php');
*/


$k=0;
$j=0;
$phototext = array();
$photoid = array();
$photomem = array();
$photomemid = array();
$photodate = array();

?>



	<?
	$video=mysql_query("select * from videos where video_code <>'' order by id desc limit 2");
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

// Remove extra text from Vimeo embed
$vid=stripslashes($vid['video_code']);

$myvid = preg_replace('#(<p.*?>).*?(</p>)#', '$1$2', $vid);

//$myvid=$vid;

?>

<? if ($j>0) echo ("<hr />"); ?>
<div class="vidtext">
<? echo $myvid; ?> <br>
<p3>Posted under: <b1><a href="movie.php?idm=<? echo $vidid[$j];?>"> <? echo $vidtext[$j]; ?></a>
<a href="profile.php?idm=<? echo $vidactid[$j];?>"> <? echo $acttext[$j]; ?></a>
<a href="character.php?idm=<? echo $vidcharid[$j];?>"> <? echo $chartext[$j]; ?></a>
</b1> <br />
by: <b1><a href="member_profile.php?idm=<? echo $vidmemid[$j]; ?>"> <?echo $vidmem[$j]; ?> </a></b1><br />
<? echo $viddate[$j]; ?>
</p3>
</div>

<?

$j++;

 } ?>

