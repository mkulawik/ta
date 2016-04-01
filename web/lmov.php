<?
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

$k=0;
$j=0;
$movtext = array();
$movid = array();
$movmem = array();
$movmemid = array();
$movmemimg =array();
$movdate = array();
$movscore =array();
$movimg =array();
$movyr = array();


$review=mysql_query("select * from rating where plot is not null order by id desc limit 2");
while($r=mysql_fetch_array($review)){

$tscore=($r['plot']+$r['characters']+$r['acting']+$r['cinematography']+$r['soundtrack']+$r['production_design']+$r['execution']+$r['emotional_impact'])/8;
$member=mysql_query("select * from members where id=".$r['id_member']);
$mem=mysql_fetch_array($member);
$movies=mysql_query("select * from movies where id=".$r['id_movie']);
$mov=mysql_fetch_array($movies);

                $movtext[$k]= $mov['movie_name'];
                $movid[$k]= $mov['id'];
                $movmem[$k]= $mem['name'];
                $movmemid[$k]= $mem['id'];
                $movmemimg[$k]=$mem['image'];
		$movdate[$k]= $r['rating_date'];
		$movscore[$k]= $tscore;
		$movimg[$k] = $mov['image'];
		$movyr[$k] = $mov['year'];
		
		$k++;

}
?>
<a href="movie.php?idm=<? echo $movid[$j];?>" font="Arial" style="font-size:18px;"><? echo $movtext[$j];?> </a>


<table>
<tr>
<td> <span font="Arial" style="font-size:14px; padding-left:.3cm;">(<?echo $movyr[$j];?>)</span></td>
</tr>
</table>

<div class="lmov-poster">
<a href="movie.php?idm=<? echo $movid[$j];?>"> <img src="movies/<? echo $movimg[$j];?>" width="70"/></a></span>
<br />
<div class="lmov-member">
<a href="member_profile.php?idm=<? echo $movmemid[$j];?>">Rated by: <? echo $movmem[$j];?></a>
<a href="member_profile.php?idm=<? echo $movmemid[$j];?>"><img src="members/<? echo $mem['image'];?>" width="30" /></a>

</div>
</div>
<?

$reviews=mysql_query("select * from rating where plot is not null order by id desc limit 1");
$r=mysql_fetch_array($reviews);
$tscore=($r['plot']+$r['characters']+$r['acting']+$r['cinematography']+$r['soundtrack']+$r['production_design']+$r['execution']+$r['emotional_impact'])/8;
?>

<div class="lmov-cat">

User Rating: <<?=getRatingColor ($tscore);?>> <a style="font-weight:bold; font-size:16px;"><? echo number_format($tscore,2,'.','');?></a></<?=getRatingColor ($tscore);?>> <br /><br />

<table width="125">
<tr> <td align="left">Plot/Story: &nbsp </td> <td align="right"> <<?=getRatingColor ($r['plot']);?>>  <? echo $r['plot'];?> </<?=getRatingColor ($r['plot']);?>></td></tr>
<tr> <td align="left">Characters: &nbsp </td> <td align="right"> <<?=getRatingColor ($r['characters']);?>>  <? echo $r['characters'];?></<?=getRatingColor ($r['characters']);?>></td> </tr>
<tr> <td align="left">Acting: &nbsp </td> <td align="right"><<?=getRatingColor ($r['acting']);?>> <? echo $r['acting'];?></<?=getRatingColor ($r['acting']);?>> </td> </tr>
<tr> <td align="left">Cinematography: &nbsp </td> <td align="right"> <<?=getRatingColor ($r['cinematography']);?>> <? echo $r['cinematography'];?></<?=getRatingColor ($r['cinematography']);?>></td> </tr>
<tr> <td align="left">Production Design: &nbsp </td> <td align="right"> <<?=getRatingColor ($r['production_design']);?>>  <? echo $r['production_design'];?></<?=getRatingColor ($r['production_design']);?>></td> </tr>
<tr> <td align="left">Soundtrack: &nbsp </td> <td align="right"><<?=getRatingColor ($r['soundtrack']);?>> <? echo $r['soundtrack'];?></<?=getRatingColor ($r['soundtrack']);?>></td> </tr>
<tr> <td align="left">Execution: &nbsp </td> <td align="right"> <<?=getRatingColor ($r['execution']);?>> <? echo $r['execution'];?></<?=getRatingColor ($r['execution']);?>></td> </tr>
<tr> <td align="left">Emotional Impact: &nbsp </td> <td align="right"><<?=getRatingColor ($r['emotional_impact']);?>> <? echo $r['emotional_impact'];?><<?=getRatingColor ($r['emotional_impact']);?>></td> </tr>

</table>
</div>

