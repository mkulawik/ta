<?
include("db/dbcon.php");
include('db/db.php');
include('db/functions.php');
include('db/page.php');


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
$actfname = array();
$actlname = array();
$actid = array();
$actmem = array();
$actmemid = array();
$actmemimg =array();
$actdate = array();
$actscore =array();
$actimg =array();
$movyr = array();
$actchar = array();
$movname = array();

$review=mysql_query("select * from rating where performance is not null order by id desc limit 5");
while($r=mysql_fetch_array($review)){

$tscore=($r['acting']+$r['performance']+$r['screen_presence']+$r['characterization'])/4;
$member=mysql_query("select * from members where id=".$r['id_member']);
$mem=mysql_fetch_array($member);
$acts=mysql_query("select * from actors where id=".$r['id_actor']);
$act=mysql_fetch_array($acts);
$chars=mysql_query("select * from characters where id=".$r['id_character']);
$char=mysql_fetch_array($chars);
$movs=mysql_query("select * from movies where id=".$char['id_movie']);
$mov=mysql_fetch_array($movs);
                $actfname[$k]= $act['f_name'];
                $actlname[$k]= $act['l_name'];
                $actid[$k]= $act['id'];
                $actmem[$k]= $mem['name'];
                $actmemid[$k]= $mem['id'];
                $actmemimg[$k]=$mem['image'];
                $actdate[$k]= $r['rating_date'];
                $actscore[$k]= $tscore;
                $actimg[$k] = $act['image'];
                $movyr[$k] = $mov['year'];
		$actchar[$k]= $char['char_name'];	
		$movname[$k] = $mov['movie_name'];

		$k++;
}
?>

<div class="lmov-poster">
<div style="font-size:16px;width:100%;"><a href="profile.php?idm=<? echo $actid[$j];?>"><? echo $actfname[$j]."&nbsp;".$actlname[$j];?></a></div>
<div class="pic-rate-left" ><img src="actors/<? echo $actimg[$j];?>" width="80"/></div>
</div>
<?

$reviews=mysql_query("select * from rating where performance is not null order by id desc limit 1");
$r=mysql_fetch_array($reviews);
$tscore=($r['acting']+$r['performance']+$r['screen_presence']+$r['characterization'])/4;
?>

<div class="lact-cat">

User Rating: <<?=getRatingColor ($tscore);?>> <a style="font-weight:bold; font-size:16px;"><? echo number_format($tscore,2,'.','');?></a></<?=getRatingColor ($tscore);?>> <br /><br />

<table width="110">
<tr> <td align="left">Acting: &nbsp </td> <td align="right"> <<?=getRatingColor ($r['acting']);?>>  <? echo $r['acting'];?> </<?=getRatingColor ($r['acting']);?>></td></tr>
<tr> <td align="left">Performance: &nbsp </td> <td align="right"> <<?=getRatingColor ($r['performance']);?>>  <? echo $r['performance'];?></<?=getRatingColor ($r['performance']);?>></td> </tr>
<tr> <td align="left">Screen Presence: &nbsp </td> <td align="right"><<?=getRatingColor ($r['screen_presence']);?>> <? echo $r['screen_presence'];?></<?=getRatingColor ($r['screen_presence']);?>> </td> </tr>
<tr> <td align="left">Characterization: &nbsp </td> <td align="right"> <<?=getRatingColor ($r['characterization']);?>> <? echo $r['characterization'];?></<?=getRatingColor ($r['characterization']);?>></td> </tr>

<br />
<tr>
<td>
<span class="lmov-member">

<a href="member_profile.php?idm=<? echo $actmemid[$j];?>">Rated by: <? echo $actmem[$j];?></a>
<a href="member_profile.php?idm=<? echo $actmemid[$j];?>"><img src="members/<? echo $mem['image'];?>" width="30" /></a>
</span>
</td></tr>
</table>
</div>

<table>

<tr>
<?
for ($j=1; $j<5;$j++){
?>
<td>
<div class="lmov-txt">

<div style="font-size:14px;width:100%;"><a href="profile.php?idm=<? echo $actid[$j];?>"><? echo $actfname[$j]."&nbsp;".$actlname[$j];?></a></div>
<span style="font-size:11px;width:100%;">
as <? echo $actchar[$j];?> <br />
Title:  <? echo $movname[$j]; ?> &nbsp; (<? echo $movyr[$j]; ?>)
</span>
</div>
</td>
<? } ?>
</tr>

<tr>
<?
for ($j=1; $j<5;$j++){
?>
<td>
<div class="lmov-poster2">
<a style="font-size:12;" href="profile.php?idm=<? echo $actid[$j];?>"> <img src="actors/<? echo $actimg[$j];?>" width="70"/>
</div>

</td>
<? } ?>
</tr>

<tr>
<?
for ($j=1; $j<5;$j++){
?>
<td>
<div class="lmov-poster2">
<span style="font-size:12;">User Rating: <a style="font-weight:bold;"><<?=getRatingColor ($actscore[$j]);?>><?  echo $actscore[$j]; ?> </<?=getRatingColor ($actscore[$j]);?>></a>
</div>

</td>
<? } ?>
</tr>

<tr>
<?
for ($j=1; $j<5;$j++){
?>
<td>
<div class="lmov-member2">
<a href="member_profile.php?idm=<? echo $actmemid[$j];?>">Rated by: <? echo $actmem[$j];?></a>
</div>
</td>

<? } ?>
</tr>

<tr>
<?
for ($j=1; $j<5;$j++){
?>
<td>
<div class="lmov-member2">
<a href="member_profile.php?idm=<? echo $actmemid[$j];?>"><img src="members/<? echo $mem['image'];?>" width="30" /></a>
</div>
</td>

<? } ?>
</tr>

</table>
