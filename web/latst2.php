<?
include("db/dbcon.php");
include('db/db.php');
include('db/functions.php');
include('db/page.php');	


$tscore=0;
$review=mysql_query("select * from rating where plot is not null order by rating_date desc limit 1");
$r=mysql_fetch_array($review);
$tscore=($r['plot']+$r['characters']+$r['acting']+$r['cinematography']+$r['soundtrack']+$r['production_design']+$r['execution']+$r['emotional_impact'])/8;
$member=mysql_query("select * from members where id=".$r['id_member']);
$m=mysql_fetch_array($member);
$movies=mysql_query("select * from movies where id=".$r['id_movie']);
$mov=mysql_fetch_array($movies);

// ---*******    COLOR TEMPERATURE RATING SYSTEM ************ /
function getRatingColor($number)
{
    if  ($number > 0 && $number < 5)
        return 'cold';  // COLD = Low
    else if ($number >= 5 && $number < 8)
        return 'warm';  // WARM = Mid
    else if ($number >= 8 && $number <= 10)
        return 'hot';  // HOT  = High
}
?>

<span> test </span>
