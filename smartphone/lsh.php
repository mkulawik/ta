        <style>
		article{max-width:1000px;margin: 0 auto;}
        </style>


<?



$k=0;
$j=0;
$shotext = array();
$shoid = array();
$shomem = array();
$shomemid = array();
$shomemimg =array();
$shodate = array();
$shoscore =array();
$shoimg =array();
$shoyr = array();

// 8mm of film category holders.
$shoplot = array();
$shochar = array();
$shoact = array();
$shocin = array();
$shosound = array();
$shodesign = array();
$shoexec = array();
$shoimpact = array();

$review=mysql_query("select * from rating where id_shows !=0 order by id desc limit 5");
while($r=mysql_fetch_array($review)){

$tscore=($r['plot']+$r['characters']+$r['acting']+$r['cinematography']+$r['soundtrack']+$r['production_design']+$r['execution']+$r['emotional_impact'])/8;
$member=mysql_query("select * from members where id=".$r['id_member']);
$mem=mysql_fetch_array($member);
$shows=mysql_query("select * from shows where id=".$r['id_shows']);
$sho=mysql_fetch_array($shows);

                $shotext[$k]= $sho['show_name'];
                $shoid[$k]= $sho['id'];
                $shomem[$k]= $mem['name'];
                $shomemid[$k]= $mem['id'];
                $shomemimg[$k]=$mem['image'];
		$shodate[$k]= $r['rating_date'];
		$shoscore[$k]= $tscore;
		$shoimg[$k] = $sho['image'];
		$shoyr[$k] = $sho['year'];
		$shoplot[$k] = $r['plot']; 
		$shochar[$k]= $r['characters'];
		$shoact[$k]= $r['acting'];
		$shocin[$k]= $r['cinematography'];
		$shosound[$k]= $r['soundtrack'];
		$shodesign[$k]= $r['production_design'];
		$shoexec[$k]= $r['execution'];
		$shoimpact[$k]= $r['emotional_impact'];	

		$k++;
}
?>


<article>
<div class="ratetable ratingtable58">
  <div class="ratetable-inner">
        <div class="ratetable-column labeling" style="width:15%">
      <div class="ratetable-column-wall">
        <div class="ratetable-header">
          <div class="ratetable-fld-name">none</div>
          <div class="ratetable-header-inner">
          </div>
        </div>
        <ul class="features">
                    <li > Plot/Story                     </li>
                    <li > Characters                     </li>
                    <li > Acting                      </li>
                    <li > Cinematography                     </li>
                    <li > Soundtrack                     </li>
		    <li > Production Design                     </li>
                    <li > Execution                     </li>
                    <li > Emotional Impact                     </li>

                    
                            </ul>
        <div class="ratetable-feature-lbl">Features &raquo;</div>
                <div class="ratetable-button-container"> <a href="-"> <span class="ratetable-gradient"><span class="ratetable-noise">Rate it</span></span> </a> </div>        <div class="labelTitle"></div>
      </div>
      </div>

<?

$reviews=mysql_query("select * from rating where id_shows !=0 order by id desc limit 1");
$r=mysql_fetch_array($reviews);
$tscore=($r['plot']+$r['characters']+$r['acting']+$r['cinematography']+$r['soundtrack']+$r['production_design']+$r['execution']+$r['emotional_impact'])/8;
?>


                  <div class="ratetable-column highlight" style="width:12%">
      <div class="ratetable-column-wall">
       <div class="ratetable-header">
          <div class="ratetable-fld-name">  <a href="shows.php?idm=<? echo $shoid[$j];?>"><? echo $shotext[$j];?> </a> </div>
         <p>(<?echo $shoyr[$j];?>)</p>  
	<div> <a href="shows.php?idm=<? echo $shoid[$j];?>"> <img src="shows/<? echo $shoimg[$j];?>" width="45"/></a> </div>
          <div class="ratetable-header-inner">
            <div class="ratetable-fld-rate"> <span class="lmov2-cat"><<?=getRatingColor ($tscore);?>><? echo number_format($tscore,2,'.','');?></<?=getRatingColor ($tscore);?>> </span></div>
            <div class="ribbon-wrapper-green"><div class="ribbon-green">Latest</div></div>
	    <p>By: <a href="member_profile.php?idm=<? echo $shomemid[$j];?>"><? echo $shomem[$j];?></a> </p>   
                   </div>
        </div>
        <ul class="features">
                                               
                            <li >
                        <span>Plot/Story</span>
                   		<div class="lmov2-cat">  <<?=getRatingColor ($r['plot']);?>>  <? echo $r['plot'];?> </<?=getRatingColor ($r['plot']);?>> </div>          
		    </li>

 	            <li >
                        <span>Characters</span>                    
				<div class="lmov2-cat"> <<?=getRatingColor ($r['characters']);?>>  <? echo $r['characters'];?> </<?=getRatingColor ($r['characters']);?>> </div>             
		    </li>

                    <li >
                        <span>Acting</span>
                        	<div class="lmov2-cat">  <<?=getRatingColor ($r['acting']);?>>  <? echo $r['acting'];?> </<?=getRatingColor ($r['acting']);?>> </div>                      
		    </li>

                    <li >
                         <span>Cinematography</span>
                        	<div class="lmov2-cat">  <<?=getRatingColor ($r['cinematography']);?>>  <? echo $r['cinematography'];?> </<?=getRatingColor ($r['cinematography']);?>> </div>
		    </li>
                    
		    <li >
                        <span>Soundtrack</span>
                        <div class="lmov2-cat">  <<?=getRatingColor ($r['soundtrack']);?>>  <? echo $r['soundtrack'];?> </<?=getRatingColor ($r['soundtrack']);?>> </div>  
		    </li>
                    
		    <li >
                        <span>Production Design </span>
                        <div class="lmov2-cat">  <<?=getRatingColor ($r['production_design']);?>>  <? echo $r['production_design'];?> </<?=getRatingColor ($r['production_design']);?>> </div>    
		    </li>
                    
		    <li >
                        <span>Execution </span>
                        <div class="lmov2-cat">  <<?=getRatingColor ($r['execution']);?>>  <? echo $r['execution'];?> </<?=getRatingColor ($r['execution']);?>> </div>
		    </li>

                    <li >
                        <span>Emotional Impact</span>
                        <div class="lmov2-cat">  <<?=getRatingColor ($r['emotional_impact']);?>>  <? echo $r['emotional_impact'];?> </<?=getRatingColor ($r['emotional_impact']);?>> </div>
		    </li>




        </ul>
                            
        <div class="ribbon">HOT</div>
<div class="ratetable-button-container"><a <? if(isset($_SESSION['idm'])){?> href="write_review_shows.php?idm=<? echo $shoid[$j];?>"  <?} else {?> href="log-in.php" <? }?>>Rate me</a></div>      
              </div>
    </div>
         
                        

<?
for ($j=1; $j<2;$j++){
?>
                    
                            </ul>

                  <div class="ratetable-column" style="width:12%">
      <div class="ratetable-column-wall">
       <div class="ratetable-header">
          <div class="ratetable-fld-name">  <a href="shows.php?idm=<? echo $shoid[$j];?>"><? echo $shotext[$j];?> </a> </div>
         <p>(<?echo $shoyr[$j];?>)</p>  
	<div> <a href="shows.php?idm=<? echo $shoid[$j];?>"> <img src="shows/<? echo $shoimg[$j];?>" width="45"/></a> </div>
          <div class="ratetable-header-inner">
		 <div class="ratetable-fld-rate"> <span class="lmov2-cat"><<?=getRatingColor ($shoscore[$j]);?>><?  echo number_format($shoscore[$j],2,'.',''); ?> </<?=getRatingColor ($shoscore[$j]);?>></span></div>
	    <p>By: <a href="member_profile.php?idm=<? echo $shomemid[$j];?>"><? echo $shomem[$j];?></a> </p>   
                   </div>
        </div>
        <ul class="features">
                                               
                            <li >

                        <span>Plot/Story</span>
                   		<div class="lmov2-cat">  <<?=getRatingColor ($shoplot[$j]);?>>  <? echo $shoplot[$j];?> </<?=getRatingColor ($shoplot[$j]);?>> </div>          
		    </li>

 	            <li >
                        <span>Characters</span>                    
				<div class="lmov2-cat"> <<?=getRatingColor ($shochar[$j]);?>>  <? echo $shochar[$j];?> </<?=getRatingColor ($shochar[$j]);?>> </div>             
		    </li>

                    <li >
                        <span>Acting</span>
                        	<div class="lmov2-cat">  <<?=getRatingColor ($shoact[$j]);?>>  <? echo $shoact[$j];?> </<?=getRatingColor ($shoact[$j]);?>> </div>                      
		    </li>

                    <li >
                         <span>Cinematography</span>
                        	<div class="lmov2-cat">  <<?=getRatingColor ($shocin[$j]);?>>  <? echo $shocin[$j];?> </<?=getRatingColor ($shocin[$j]);?>> </div>
		    </li>
                    
		    <li >
                        <span>Soundtrack</span>
                        <div class="lmov2-cat">  <<?=getRatingColor ($shosound[$j]);?>>  <? echo $shosound[$j];?> </<?=getRatingColor ($shosound[$j]);?>> </div>  
		    </li>
                    
		    <li >
                        <span>Production Design </span>
                        <div class="lmov2-cat">  <<?=getRatingColor ($shodesign[$j]);?>>  <? echo $shodesign[$j];?> </<?=getRatingColor ($shodesign[$j]);?>> </div>    
		    </li>
                    
		    <li >
                        <span>Execution </span>
                        <div class="lmov2-cat">  <<?=getRatingColor ($shoexec[$j]);?>>  <? echo $shoexec[$j];?> </<?=getRatingColor ($shoexec[$j]);?>> </div>
		    </li>

                    <li >
                        <span>Emotional Impact</span>
                        <div class="lmov2-cat">  <<?=getRatingColor ($shoimpact[$j]);?>>  <? echo $shoimpact[$j];?> </<?=getRatingColor ($shoimpact[$j]);?>> </div>
		    </li>



        </ul>
                            
        <div class="ribbon">HOT</div>
<div class="ratetable-button-container"><a <? if(isset($_SESSION['idm'])){?> href="write_review_shows.php?idm=<? echo $shoid[$j];?>"  <?} else {?> href="log-in.php" <? }?>>Rate me</a></div>      
              </div>
    </div>
      
      
<? } ?>

	<p>&nbsp;</p>
	<p>&nbsp;</p>

</article>


