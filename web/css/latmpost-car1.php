  <link href="web/css/style.css" rel="stylesheet" type="text/css"  media="all" />


	<meta name="viewport" content="width=device-width" />

	<link rel="stylesheet" href="web/css/demo.css" />
	<link rel="stylesheet" href="web/css/jquery.carousel.css" />

<script type="text/javascript">
    $(document).ready(function () {
        $("iframe").width(210);
        $("iframe").height(180);
    });
</script>

<div class="carousel" id="carousel-11-a">
	<div class="carousel-frame">
		<ul class="carousel-slider">

	<?
	$video=mysql_query("select * from videos where video_code <>'' order by id desc limit 8");
	while($vid=mysql_fetch_array($video)){
		$newDate = date("M d 'y", strtotime($vid['posted_date']));
		$mmbers=mysql_query("select * from members where id=".$vid['id_member']);
	 	$mem=mysql_fetch_array($mmbers);
	
		$moviepost=mysql_query("select * from movies where id=".$vid['id_movie']);
		$mpost=mysql_fetch_array($moviepost);

?>

<li class="carousel-slide">

<a width="100" href="movie.php?idm=<? echo $mpost['id'];?>"><?echo $mpost['movie_name'];?></a> <br />
<? echo stripslashes($vid['video_code']);?><br />
Uploaded on: <? echo $newDate;?><br />
By  <a href="member_profile.php?idm=<? echo $mem['id'];?>"><? echo $mem['name'];?></a>
</li>

 
<? 
	}	
	?>

</ul>
	</div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="web/js/jquery.carousel.js"></script>

<script>

$('#carousel-11-a').carousel({

	animation: {
		step: 4 
	},
		touch: {
		
		enabled: true,
        thresholds: {
            speed: 0.4, // multiplied by width of slider per second
            distance: 0.3 // multiplied by width of slider
        }
		
		},

		layout: {
		
		fixedHeight: false,
		visibleSlides: 4,
		gutter: 3,

	},
	
	elements: {
		counter: false,
		handles: false,
		prevNext: true
		},
		
	behavior: {
		circular: true
		}
	
});
</script>






