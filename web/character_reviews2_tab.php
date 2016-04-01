
<?

// results for actor reviews show here, listing 3 only

	$tscore=0;
	$review=mysql_query("select * from rating where id_character=".$idm. " order by id desc limit 3");
	if(mysql_num_rows($review)>0){
	$total_reviews=mysql_num_rows($review);

	while($r=mysql_fetch_array($review)){
 		$member=mysql_query("select * from members where id=".$r['id_member']);
			$m=mysql_fetch_array($member);
			$tscore=($r['acting']+$r['performance']+$r['voice']+$r['screen_presence']+$r['characterization'])/5;



   ?>

<section class="third lift plan-tier">
 <div class="lmov2-cat">
	<h4>Score</h4>
      <h5><span class="plan-price">


<span class="<?=getRatingColor ($tscore);?>"  style="font-size: 22px;"> <? echo number_format($tscore,2,'.','');?></span>
<br />
</span></h5>

	<a href="member_profile.php?idm=<? echo $m['id'];?>"><img src="members/<? echo $m['image'];?>" width="35" />  <br />
        </a> By:<a href="member_profile.php?idm=<? echo $m['id'];?>">   <? echo $m['name'];?> </a>

<ul> 
<li> 
<div style="font-size:10px"> 
        Reviews Written: <a href="member_profile.php?idm=<? echo $m['id'];?>">
         <?
                $review_written=mysql_query("select * from rating where id_member=".$m['id']);
                echo mysql_num_rows($review_written);
         ?> </a>
</div>
</li>

   <li><div style="margin-left:15px;" align="left"> <strong>Acting:</strong><span class="<?=getRatingColor ($r['acting']);?>">  <? echo $r['acting'];?></span></div></li>

<li><div style="margin-left:15px;" align="left"> <strong>Performance:</strong> <span class="<?=getRatingColor ($r['performance']);?>">  <? echo $r['performance'];?></span></div></li>

<li><div style="margin-left:15px;" align="left"> <strong>Voice:</strong> <span class="<?=getRatingColor ($r['voice']);?>">  <? echo $r['voice'];?></span></div></li>

<li><div style="margin-left:15px;" align="left"> <strong>Screen Presence:</strong><span class="<?=getRatingColor ($r['screen_presence']);?>">  <? echo $r['screen_presence'];?></span></div></li>

<li><div style="margin-left:15px;" align="left"> <strong>Characterization:</strong> <span class="<?=getRatingColor ($r['characterization']);?>"> <? echo $r['characterization'];?></span></div></li> 

</ul>
   </div> <!-- end lmov-cat -->
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
}  //end while

	}  //end if
?>

