<?
//results for movie reviews shows here

$tscore=0;
$review=mysql_query("select * from rating where id_movie=".$idm. " order by id desc limit 2");
if(mysql_num_rows($review)>0){
$total_reviews=mysql_num_rows($review);

?>
  <?
 while($r=mysql_fetch_array($review)){
 	$member=mysql_query("select * from members where id=".$r['id_member']);
			$m=mysql_fetch_array($member);
			$tscore=($r['plot']+$r['characters']+$r['acting']+$r['cinematography']+$r['soundtrack']+$r['production_design']+$r['execution']+$r['emotional_impact'])/8;
  ?>


<section class="third lift plan-tier">

     <div class="lmov2-cat">
	<h4>Score</h4>
      <h5><span class="plan-price">

 <span class="<?=getRatingColor ($tscore);?>" style="font-size: 25px;"> <? echo number_format($tscore,2,'.','');?></span>
 <br />
	</span></h5>

	<a href="member_profile.php?idm=<? echo $m['id'];?>"><img src="members/<? echo $m['image'];?>" width="35" />  <br />
        </a> By:<a href="member_profile.php?idm=<? echo $m['id'];?>">   <? echo $m['name'];?> </a>
	<br /><br />
	 <div style="font-size:10px">       Reviews Written: <a href="member_profile.php?idm=<? echo $m['id'];?>">
         <?
                $review_written=mysql_query("select * from rating where id_member=".$m['id']);
                echo mysql_num_rows($review_written);
         ?> </a> </div><br />
      <ul>

<li> <div style="margin-left:15px;" align="left"> <strong>Plot/Story: </strong> 
<span class="<?=getRatingColor ($r['plot']);?>"> <? echo number_format($r['plot'],2,'.','');?> </span>
</div>
</li>

<li> <div style="margin-left:15px;" align="left"> <strong>Characters: </strong>
<span class="<?=getRatingColor ($r['characters']);?>">  <? echo number_format($r['characters'],2,'.','');?> </span>
</div>
</li>

<li> <div style="margin-left:15px;" align="left"> <strong>Acting: </strong>
<span class="<?=getRatingColor ($r['acting'])?>"> <? echo number_format($r['acting'],2,'.','');?> </span>
</div>
</li>

<li> <div style="margin-left:15px;" align="left"> <strong>Cinematography: </strong>
<span class="<?=getRatingColor ($r['cinematography']);?>">  <? echo number_format($r['cinematography'],2,'.','');?></span>
</div>
</li>

<li> <div style="margin-left:15px;" align="left"> <strong>Production Design: </strong>
<span class="<?=getRatingColor ($r['production_design']);?>">  <? echo number_format($r['production_design'],2,'.','');?></span>
</div>
</li>

<li> <div style="margin-left:15px;" align="left"> <strong>Soundtrack: </strong>
<span class="<?=getRatingColor ($r['soundtrack']);?>">  <? echo number_format($r['soundtrack'],2,'.','');?></span>
</div>
</li>

<li> <div style="margin-left:15px;" align="left"> <strong>Execution: </strong>
<span class="<?=getRatingColor ($r['execution']);?>">  <? echo number_format($r['execution'],2,'.','');?></span>
</div>
</li>

<li> <div style="margin-left:15px;" align="left"> <strong>Emotional Impact: </strong>
<span class="<?=getRatingColor ($r['emotional_impact']);?>"> <? echo number_format($r['emotional_impact'],2,'.','');?></span>
</div>
</li>

</ul>

	</div>

    </section>
<table width="75%" style="float:right; text-align:left;">
<tr><th>
<div class="user-rev">
<? 

	$userreview= stripslashes($r['review']);
	echo $userreview;

?>
</th> </tr>
</div>
</table>
    <div style="clear: both"></div>
<br />

<hr />
<br />
	<?
	}
}
?>


