      <!--         <link rel="stylesheet" type="text/css" media="all" href="web/css/ratetable.css" />
        <style>
	         article{max-width:1000px;margin: 0 auto;}
        </style> 
-->
<?


// ---*******    COLOR TEMPERATURE RATING SYSTEM ************ /
/*
function getRatingColor($number)
{
    if  ($number > 0 && $number < 5)
        return 'cold';  // COLD = Low
    else if ($number >= 5 && $number < 8)
        return 'warm';  // WARM = Mid
    else if ($number >= 8 && $number <= 10)
        return 'hot';  // HOT  = High
}
*/

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
$movid = array();

// Take 5 of acting categories
$actact = array();
$actperf = array();
$actvoice = array();
$actscreen = array();
$actcharz = array();


$review=mysql_query("select * from rating where performance is not null order by id desc limit 5");
while($r=mysql_fetch_array($review)){

$tscore=($r['acting']+$r['performance']+$r['voice']+$r['screen_presence']+$r['characterization'])/5;
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
		$movid[$k] = $char['id_movie'];
		$actact[$k] = $r['acting'];
		$actperf[$k] = $r['performance'];
		$actvoice[$k] = $r['voice'];
		$actscreen[$k] = $r['screen_presence'];
		$actcharz[$k] = $r['characterization'];
		
		$k++;
}
?>

<article>
<div class="ratetable ratingtable58">
  <div class="ratetable-inner">
        <div class="ratetable-column labeling" style="width:27%">
      <div class="ratetable-column-wall">
        <div class="ratetable-header">
          <div class="ratetable-fld-name">none</div>
          <div class="ratetable-header-inner">
          </div>
        </div>
        <ul class="features">
                    <li > Acting                </li>
                    <li > Performance           </li>
                    <li > Voice                 </li>
                    <li > Screen Presence       </li>
                    <li > Characterization      </li>
					
        </ul>

<?

$reviews=mysql_query("select * from rating where performance is not null order by id desc limit 1");
$r=mysql_fetch_array($reviews);
$tscore=($r['acting']+$r['performance']+$r['voice']+$r['screen_presence']+$r['characterization'])/5;
?>

                <div class="ratetable-button-container"> <a href="-"> <span class="ratetable-gradient"><span class="ratetable-noise">Rate it</span></span> </a> </div>        <div class="labelTitle"></div>
      </div>
      </div>
                  <div class="ratetable-column highlight" style="width:33.333%">
      <div class="ratetable-column-wall">
       <div class="ratetable-header">
          <div class="ratetable-fld-name"><a href="profile.php?idm=<? echo $actid[$j];?>"><? echo $actfname[$j];?></a></div>
          <div class="ratetable-fld-name"><a href="profile.php?idm=<? echo $actid[$j];?>"><? echo $actlname[$j];?></a></div>
		<p> as <? echo $actchar[$j];?> </p>
		<p> in <? echo $movname[$j];?> </p>
          <div> <a href="profile.php?idm=<? echo $actid[$j];?>"> <img src="actors/<? echo $actimg[$j];?>" width="45%"/></a></div>
          <div class="ratetable-header-inner">
            <div class="ratetable-fld-rate"> <span class="lmov2-cat"><<?=getRatingColor ($tscore);?>><? echo number_format($tscore,2,'.','');?></<?=getRatingColor ($tscore);?>> </span></div>
            <div class="ribbon-wrapper-green"><div class="ribbon-green">Latest</div></div>
   <p> By: <a href="member_profile.php?idm=<? echo $actmemid[$j];?>"><? echo $actmem[$j];?></a> </p>
   <p> <?echo $actdate[$j]; ?> </p>	
<hr /> 
                     </div>
        </div>
        <ul class="features">

                              <li >
                        <span>Acting</span>
                    <div class="lmov2-cat"><<?=getRatingColor ($r['acting']);?>>  <? echo $r['acting'];?> </<?=getRatingColor ($r['acting']);?>></div>   </li>
                    <li >
                        <span>Performance</span>
                     <div class="lmov2-cat"><<?=getRatingColor ($r['performance']);?>>  <? echo $r['performance'];?></<?=getRatingColor ($r['performance']);?>></div>       </li>
                    <li >
                        <span>Voice</span>
                      <div class="lmov2-cat"> <<?=getRatingColor ($r['voice']);?>>  <? echo $r['voice'];?></<?=getRatingColor ($r['voice']);?>></div> </li>
                    <li >
                         <span>Screen Presence</span>
                      <div class="lmov2-cat"> <td align="right"><<?=getRatingColor ($r['screen_presence']);?>> <? echo $r['screen_presence'];?></<?=getRatingColor ($r['screen_presence']);?>></div>  </li>
                    <li >
                        <span>Characterization</span>
                       <div class="lmov2-cat"> <<?=getRatingColor ($r['characterization']);?>> <? echo $r['characterization'];?></<?=getRatingColor ($r['characterization']);?>></div>    </li>


                                               
        </ul>
                            
        <div class="ribbon">HOT</div>

<div class="ratetable-button-container"><a <? if(isset($_SESSION['idm'])){?> href="write_review_actor.php?idm=<? echo $actid[$j];?>"  <?} else {?> href="log-in.php" <? }?>>Rate me</a></div>

              </div>
    </div>

        
<?
for ($j=1; $j<2;$j++){
?>

          <div class="ratetable-column" style="width:33.333%">
      <div class="ratetable-column-wall">
       <div class="ratetable-header">
          <div class="ratetable-fld-name"><a href="profile.php?idm=<? echo $actid[$j];?>"><? echo $actfname[$j];?></a></div>
          <div class="ratetable-fld-name"><a href="profile.php?idm=<? echo $actid[$j];?>"><? echo $actlname[$j];?></a></div>
		<p> as <? echo $actchar[$j];?> </p>
		<p> in <? echo $movname[$j];?> </p>
          <div> <a href="profile.php?idm=<? echo $actid[$j];?>"><img src="actors/<? echo $actimg[$j];?>" width="45%"/></a></div>
          <div class="ratetable-header-inner">
            <div class="ratetable-fld-rate"> <span class="lmov2-cat"><<?=getRatingColor ($actscore[$j]);?>><? echo number_format($actscore[$j],2,'.','');?></<?=getRatingColor ($actscore[$j]);?>> </span></div>
      <p> By: <a href="member_profile.php?idm=<? echo $actmemid[$j];?>"><? echo $actmem[$j];?></a> </p>
      <p> <?echo $actdate[$j]; ?> </p>	
<hr />
                      </div>
        </div>

        <ul class="features">
        
                              <li >
                        <span>Acting</span>
                    <div class="lmov2-cat"><<?=getRatingColor ($actact[$j]);?>>  <? echo $actact[$j];?> </<?=getRatingColor ($actact[$j]);?>></div>   </li>   
                    <li >
                        <span>Performance</span>
                     <div class="lmov2-cat"><<?=getRatingColor ($actperf[$j]);?>>  <? echo $actperf[$j];?></<?=getRatingColor ($actperf[$j]);?>></div>       </li>
                    <li >      
                        <span>Voice</span>
                      <div class="lmov2-cat"> <<?=getRatingColor ($actvoice[$j]);?>>  <? echo $actvoice[$j];?></<?=getRatingColor ($actvoice[$j]);?>></div> </li>        
                    <li >
                         <span>Screen Presence</span>
                      <div class="lmov2-cat"> <td align="right"><<?=getRatingColor ($actscreen[$j]);?>> <? echo $actscreen[$j];?></<?=getRatingColor ($actscreen[$j]);?>></div>  </li>
                    <li >
                        <span>Characterization</span>
                       <div class="lmov2-cat"> <<?=getRatingColor ($actcharz[$j]);?>> <? echo $actcharz[$j];?></<?=getRatingColor ($actcharz[$j]);?>></div>    </li> 


                                       
        </ul>
                            
        <div class="ribbon">HOT</div>
        <div class="ratetable-button-container"><a <? if(isset($_SESSION['idm'])){?> href="write_review_actor.php?idm=<? echo $actid[$j];?>"  <?} else {?> href="log-in.php" <? }?>>Rate me</a></div>      

	</div>
    </div>



<? 
}
?>
         
</div>
</div>
                        
<p>&nbsp;</p>
<p>&nbsp;</p>
	

      
      
</article>


