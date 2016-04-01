<?
//results for movie reviews shows here

$tscore=0;
$review=mysql_query("select * from rating where id_movie=".$idm. " order by id desc limit 3");
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
 
<span class="<?=getRatingColor ($tscore);?>" style="font-size: 22px;"> <? echo number_format($tscore,2,'.','');?></span>
 <br />
	</span></h5>

	<a href="member_profile.php?idm=<? echo $m['id'];?>"><img src="members/<? echo $m['image'];?>" width="25" /> <br /> <br />
        </a> By:<a href="member_profile.php?idm=<? echo $m['id'];?>">   <? echo $m['name'];?> </a>
	<br />	
	<div style="font-size:10px"> <? echo $r['rating_date']; ?> </div> 
	<br />

	<div style="font-size:10px">
	Reviews Written: <a href="member_profile.php?idm=<? echo $m['id'];?>">
         <?
                $review_written=mysql_query("select * from rating where id_member=".$m['id']);
                echo mysql_num_rows($review_written);
         ?> </a>
	</div>
   </div>	
</section>

<section class="third lift plan-tier">   
  <div class="lmov2-cat">
 <ul>

<li> <div style="margin-left:5px;" align="left"> <strong>Plot/Story: </strong> 
<span class="<?=getRatingColor ($r['plot']);?>"> <? echo $r['plot'];?> </span>
</div>
</li>

<li> <div style="margin-left:5px;" align="left"> <strong>Characters: </strong>
<span class="<?=getRatingColor ($r['characters']);?>">  <? echo $r['characters'];?> </span>
</div>
</li>

<li> <div style="margin-left:5px;" align="left"> <strong>Acting: </strong>
<span class="<?=getRatingColor ($r['acting'])?>"> <? echo $r['acting'];?> </span>
</div>
</li>

<li> <div style="margin-left:5px;" align="left"> <strong>Cinematography: </strong>
<span class="<?=getRatingColor ($r['cinematography']);?>">  <? echo $r['cinematography'];?></span>
</div>
</li>

<li> <div style="margin-left:5px; width:100%;" align="left"> <strong>Production Design: </strong>
<span class="<?=getRatingColor ($r['soundtrack']);?>">  <? echo $r['soundtrack'];?></span>
</div>
</li>

<li> <div style="margin-left:5px;" align="left"> <strong>Soundtrack: </strong>
<span class="<?=getRatingColor ($r['production_design']);?>">  <? echo $r['production_design'];?></span>
</div>
</li>

<li> <div style="margin-left:5px;" align="left"> <strong>Execution: </strong>
<span class="<?=getRatingColor ($r['execution']);?>">  <? echo $r['execution'];?></span>
</div>
</li>

<li> <div style="margin-left:5px;" align="left"> <strong>Emotional Impact: </strong>
<span class="<?=getRatingColor ($r['emotional_impact']);?>"> <? echo $r['emotional_impact'];?></span>
</div>
</li>
</ul>
	</div>
    </section>
<div class="user-rev" style="float:left; text-align:left; margin-left:10px;">
<? 

	$userreview= stripslashes($r['review']);
	echo $userreview;

?>
</div>
 <div style="clear: both"></div>
<br />
<hr />
<br />

	<?
	}
}
?>


