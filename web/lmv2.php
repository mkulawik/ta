<link rel="stylesheet" type="text/css" media="all" href="web/css/ratetable.css" />
        <style>
		article{max-width:1000px;margin: 0 auto;}
        </style>


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
$movtext = array();
$movid = array();
$movmem = array();
$movmemid = array();
$movmemimg =array();
$movdate = array();
$movscore =array();
$movimg =array();
$movyr = array();

// 8mm of film category holders.
$movplot = array();
$movchar = array();
$movact = array();
$movcin = array();
$movsound = array();
$movdesign = array();
$movexec = array();
$movimpact = array();

$review=mysql_query("select * from rating where id_movie !=0 order by id desc limit 5");
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
		$movplot[$k] = $r['plot']; 
		$movchar[$k]= $r['characters'];
		$movact[$k]= $r['acting'];
		$movcin[$k]= $r['cinematography'];
		$movsound[$k]= $r['soundtrack'];
		$movdesign[$k]= $r['production_design'];
		$movexec[$k]= $r['execution'];
		$movimpact[$k]= $r['emotional_impact'];	

		$k++;
}
?>


<article>
<div class="ratetable ratingtable58">
  <div class="ratetable-inner">
        <div class="ratetable-column labeling" style="width:16.66667%">
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

$reviews=mysql_query("select * from rating where plot is not null order by id desc limit 1");
$r=mysql_fetch_array($reviews);
$tscore=($r['plot']+$r['characters']+$r['acting']+$r['cinematography']+$r['soundtrack']+$r['production_design']+$r['execution']+$r['emotional_impact'])/8;
?>


                  <div class="ratetable-column highlight" style="width:16.66667%">
      <div class="ratetable-column-wall">
       <div class="ratetable-header">
          <div class="ratetable-fld-name">  <a href="movie.php?idm=<? echo $movid[$j];?>"><? echo $movtext[$j];?> </a> </div>
         <p>(<?echo $movyr[$j];?>)</p>  
	<div> <a href="movie.php?idm=<? echo $movid[$j];?>"> <img src="movies/<? echo $movimg[$j];?>" width="65"/></a> </div>
          <div class="ratetable-header-inner">
            <div class="ratetable-fld-rate"> <span class="lmov2-cat"><<?=getRatingColor ($tscore);?>><? echo number_format($tscore,2,'.','');?></<?=getRatingColor ($tscore);?>> </span></div>
            <div class="ribbon-wrapper-green"><div class="ribbon-green">Latest</div></div>
	    <p>By: <a href="member_profile.php?idm=<? echo $movmemid[$j];?>"><? echo $movmem[$j];?></a> </p>   
	   <p> <?echo $movdate[$j]; ?> </p>
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
                <div class="ratetable-button-container"> <a href="-">Rate it</a> </div>
              </div>
    </div>
         
                        

<?
for ($j=1; $j<5;$j++){
?>
                    
                            </ul>

                  <div class="ratetable-column" style="width:16.66667%">
      <div class="ratetable-column-wall">
       <div class="ratetable-header">
          <div class="ratetable-fld-name">  <a href="movie.php?idm=<? echo $movid[$j];?>"><? echo $movtext[$j];?> </a> </div>
         <p>(<?echo $movyr[$j];?>)</p>  
	<div> <a href="movie.php?idm=<? echo $movid[$j];?>"> <img src="movies/<? echo $movimg[$j];?>" width="65"/></a> </div>
          <div class="ratetable-header-inner">
            <div class="ratetable-fld-rate"> <span class="lmov2-cat"><<?=getRatingColor ($movscore[$j]);?>><?   echo number_format($movscore[$j],2,'.','');  ?> </<?=getRatingColor ($movscore[$j]);?>></span></div>
	    <p>By: <a href="member_profile.php?idm=<? echo $movmemid[$j];?>"><? echo $movmem[$j];?></a> </p>   
	    <p> <?echo $movdate[$j]; ?> </p>		        
           </div>
        </div>
        <ul class="features">
                                               
                            <li >

                        <span>Plot/Story</span>
                   		<div class="lmov2-cat">  <<?=getRatingColor ($movplot[$j]);?>>  <? echo $movplot[$j];?> </<?=getRatingColor ($movplot[$j]);?>> </div>          
		    </li>

 	            <li >
                        <span>Characters</span>                    
				<div class="lmov2-cat"> <<?=getRatingColor ($movchar[$j]);?>>  <? echo $movchar[$j];?> </<?=getRatingColor ($movchar[$j]);?>> </div>             
		    </li>

                    <li >
                        <span>Acting</span>
                        	<div class="lmov2-cat">  <<?=getRatingColor ($movact[$j]);?>>  <? echo $movact[$j];?> </<?=getRatingColor ($movact[$j]);?>> </div>                      
		    </li>

                    <li >
                         <span>Cinematography</span>
                        	<div class="lmov2-cat">  <<?=getRatingColor ($movcin[$j]);?>>  <? echo $movcin[$j];?> </<?=getRatingColor ($movcin[$j]);?>> </div>
		    </li>
                    
		    <li >
                        <span>Soundtrack</span>
                        <div class="lmov2-cat">  <<?=getRatingColor ($movsound[$j]);?>>  <? echo $movsound[$j];?> </<?=getRatingColor ($movsound[$j]);?>> </div>  
		    </li>
                    
		    <li >
                        <span>Production Design </span>
                        <div class="lmov2-cat">  <<?=getRatingColor ($movdesign[$j]);?>>  <? echo $movdesign[$j];?> </<?=getRatingColor ($movdesign[$j]);?>> </div>    
		    </li>
                    
		    <li >
                        <span>Execution </span>
                        <div class="lmov2-cat">  <<?=getRatingColor ($movexec[$j]);?>>  <? echo $movexec[$j];?> </<?=getRatingColor ($movexec[$j]);?>> </div>
		    </li>

                    <li >
                        <span>Emotional Impact</span>
                        <div class="lmov2-cat">  <<?=getRatingColor ($movimpact[$j]);?>>  <? echo $movimpact[$j];?> </<?=getRatingColor ($movimpact[$j]);?>> </div>
		    </li>



        </ul>
                            
        <div class="ribbon">HOT</div>
                <div class="ratetable-button-container"> <a href="-">Rate it</a> </div>
              </div>
    </div>
    
<? } ?>

</div>
</div>
	<p>&nbsp;</p>
	<p>&nbsp;</p>

</article>
