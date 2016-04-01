
<?
/*
include("db/dbcon.php");
include('db/db.php');
include('db/functions.php');
include('db/page.php');	
*/

$review=mysql_query("select * from rating where plot is not null order by id desc limit 1");
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
<a href="movie.php?idm=<? echo $mov['id'];?>" font="Arial" style="font-size:18px;"><? echo $mov['movie_name'];?> </a>
<table>
<tr>
<td> <span font="Arial" style="font-size:14px; padding-left:.3cm;">(<?echo $mov['year'];?>)</span></td>
</tr>
<tr>
<td><span><a href="movie.php?idm=<? echo $mov['id'];?>"> <img src="movies/<? echo $mov['image'];?>" width="70"/></a></span>

<td><span class="score02">User Rating: <span class="<?=getRatingColor ($tscore);?>"> <? echo number_format($tscore,2,'.','');?></span></span></td>
</td></tr>

<td rowspan="9" valign="top" class="head02" style="font-size:12px;">

<table width="40%" border="0" cellpadding="2" cellspacing="0" bgcolor="#eae4db">

      <tr>
        <td colspan="2" class="head02"><a href="member_profile.php?idm=<? echo $mem['id'];?>">Member: <? echo $m['name'];?></a></td>
      </tr>
      <tr>
        <td width="60%" rowspan="3" align="center" valign="top"><a href="member_profile.php?idm=<? echo $m['id'];?>"><img src="members/<? echo $m['image'];?>" width="50" /></a></td>
      </tr>
      </table></td>
</tr>
</tr>

<tr> <td align="left" width="60%">Plot/Story: &nbsp  </td> <td align="left" width="7%">  <span class="<?=getRatingColor ($r['plot']);?>">  <? echo $r['plot'];?></span></td> </tr>
<tr> <td align="left" width="60%">Characters: &nbsp </td> <td align="left" width="7%">  <span class="<?=getRatingColor ($r['characters']);?>">  <? echo $r['characters'];?></span></td> </tr>
<tr> <td align="left" width="60%">Acting: &nbsp </td> <td align="left" width="7%">  <span class="<?=getRatingColor ($r['acting']);?>"> <? echo $r['acting'];?></span></td> </tr>
<tr> <td align="left" width="60%">Cinematography: &nbsp  </td> <td align="left" width="7%">  <span class="<?=getRatingColor ($r['cinematography']);?>"> <? echo $r['cinematography'];?></span></td> </tr>
<tr> <td align="left" width="60%">Production Design: &nbsp  </td> <td align="left" width="7%">  <span class="<?=getRatingColor ($r['plot']);?>">  <? echo $r['production_design'];?></span></td> </tr>
<tr> <td align="left" width="60%">Soundtrack: &nbsp </td> <td align="left" width="7%">  <span class="<?=getRatingColor ($r['soundtrack']);?>"> <? echo $r['soundtrack'];?></span></td> </tr>
<tr> <td align="left" width="60%">Execution: &nbsp  </td> <td align="left" width="7%"> <span class="<?=getRatingColor ($r['execution']);?>"> <? echo $r['execution'];?></td> </tr>
<tr> <td align="left" width="60%">Emotional Impact: &nbsp </td> <td align="left" width="7%">  <span class="<?=getRatingColor ($r['emotional_impact']);?>"> <? echo $r['emotional_impact'];?></span></td> </tr>
<tr>

<tr>
    <td valign="top" class="head03">&nbsp;</td>
  </tr>

</table>
                                                                                                                                                                   
