<br />
<table width="100%" border="0" cellspacing="0" cellpadding="3">
    <tr style="font-size:14px; font-weight:bold">
      <td width="45%">MOVIES</td>
      <td width="30%">CHARACTER</td>
      <td width="15%">SCORE</td>
      <td width="10%">YEAR</td>
    </tr>
         <tr>
      <td colspan="3" height="10"></td>
      </tr>
        <?
$color=FALSE;
$characters=mysql_query("select *,characters.id as c_id from characters right outer join movies as m on m.id = id_movie where id_actor= ".$idm." order by year desc");
$tscore=0;
 
// While Start *************
 
        while($char=mysql_fetch_array($characters)){
                $reviews=mysql_query("select * from rating where id_character=".$char['c_id']);
 
                $avg=0; 
                $net_avg=0; 
                if(mysql_num_rows($review)>0){
                        $total_reviews=mysql_num_rows($reviews);
                        while($r=mysql_fetch_array($reviews)){
                                $avg=$avg+(($r['acting']+$r['performance']+$r['characterization']+$r['screen_presence'])/4);
                                $t_act=$t_act+$r['acting'];
                                $t_perf=$t_perf+$r['performance'];
                                $t_char=$t_char+$r['characterization'];
                                $t_screen=$t_screen+$r['screen_presence'];
                                                             }
                        $net_avg=$avg/$total_reviews;
 
                                     }else 
                                     { 
                                        $net_avg=0;
                                     }
 
//******* Movie rating total *****
$mov_avg=0;
$mov_net_avg=0;
$revs=mysql_query("select * from rating where id_movie=".$char['id_movie']. " order by id desc");
if(mysql_num_rows($revs)>0){
$total_revs=mysql_num_rows($revs);
while($r=mysql_fetch_array($revs)){
      $mov_avg=$mov_avg+(($r['plot']+$r['characters']+$r['acting']+$r['cinematography']+$r['soundtrack']+$r['production_design']+$r['execution']+$r['emotional_impact'])/8);
      $t_plot=$t_plot+$r['plot'];
      $t_char=$t_char+$r['characters'];
      $t_acting=$t_acting+$r['acting'];
      $t_cinema=$t_cinema+$r['cinematography'];
      $t_sound=$t_sound+$r['soundtrack'];
      $t_design=$t_design+$r['production_design'];
      $t_execution=$t_execution+$r['execution'];
      $t_impact=$t_impact+$r['emotional_impact'];
}
$mov_net_avg=$mov_avg/$total_revs;
}else{
$mov_net_avg=0;
 
}
 
 
 
        ?>
 
<?
// *********   ALTERNATE COLOR  **************************************************************
//$color="1";
if ($color ==FALSE) {           echo "<tr>";  
                                $color=TRUE;
                                   }
else {          echo "<tr bgcolor='#C6D4DD'>";  //FFCC99 //DBDBFF
                $color=FALSE;
      } ?>
 
<td style="font-size:13px" ><?
          $movie=mysql_query("select * from movies where id=".$char['id_movie']);
          $mov=mysql_fetch_array($movie);
          ?>
          <a href="movie.php?idm=<? echo $char['id_movie'];?>"><img src="movies/<? echo $mov['image'];?>" width="30"></a> <a href="movie.php?idm=<? echo $mov['id'];?>"><? echo $mov['movie_name'];?></a></td>
        <td style="font-size:13px" ><a href="character.php?idm=<? echo $char['c_id'];?>"><? echo $char['char_name'];?></a></td>
        <td style="font-size:12px" ><span class="<?=getRatingColor ($net_avg);?>"><? echo number_format($net_avg,'2','.','');?></td>
        <td style="font-size:12px" ><?echo $mov['year'];?></a></td> 
        </tr>
        <?
 
        } //end while
// ******************************************************
 
        ?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>


<? 
// ***********************  ORIGINAL ACTOR FILMOGRAPHY WITH MOVIE SCORES **********
/*

<br />
<div class="tab-content" id="1" style="display:block">
  <table width="600" border="0" cellspacing="0" cellpadding="3">
    <tr>
      <td width="225" class="head02">MOVIES</td>
      <td width="75" class="head02">MOVIE SCORE</td>
      <td width="150" class="head02">CHARACTER</td>
      <td width="75" class="head02">SCORE</td>
      <td width="75" class="head02">YEAR</td>
    </tr>
         <tr>
      <td colspan="3" height="10"></td>
      </tr>
        <?
$color=FALSE;
$characters=mysql_query("select *,characters.id as c_id from characters right outer join movies as m on m.id = id_movie where id_actor= ".$idm." order by year desc");
$tscore=0;
 
// While Start *************
 
        while($char=mysql_fetch_array($characters)){
                $reviews=mysql_query("select * from rating where id_character=".$char['c_id']);
 
                $avg=0; 
                $net_avg=0; 
                if(mysql_num_rows($review)>0){
                        $total_reviews=mysql_num_rows($reviews);
                        while($r=mysql_fetch_array($reviews)){
                                $avg=$avg+(($r['acting']+$r['performance']+$r['characterization']+$r['screen_presence'])/4);
                                $t_act=$t_act+$r['acting'];
                                $t_perf=$t_perf+$r['performance'];
                                $t_char=$t_char+$r['characterization'];
                                $t_screen=$t_screen+$r['screen_presence'];
                                                             }
                        $net_avg=$avg/$total_reviews;
 
                                     }else 
                                     { 
                                        $net_avg=0;
                                     }
 
//******* Movie rating total *****
$mov_avg=0;
$mov_net_avg=0;
$revs=mysql_query("select * from rating where id_movie=".$char['id_movie']. " order by id desc");
if(mysql_num_rows($revs)>0){
$total_revs=mysql_num_rows($revs);
while($r=mysql_fetch_array($revs)){
      $mov_avg=$mov_avg+(($r['plot']+$r['characters']+$r['acting']+$r['cinematography']+$r['soundtrack']+$r['production_design']+$r['execution']+$r['emotional_impact'])/8);
      $t_plot=$t_plot+$r['plot'];
      $t_char=$t_char+$r['characters'];
      $t_acting=$t_acting+$r['acting'];
      $t_cinema=$t_cinema+$r['cinematography'];
      $t_sound=$t_sound+$r['soundtrack'];
      $t_design=$t_design+$r['production_design'];
      $t_execution=$t_execution+$r['execution'];
      $t_impact=$t_impact+$r['emotional_impact'];
}
$mov_net_avg=$mov_avg/$total_revs;
}else{
$mov_net_avg=0;
 
}
 
 
 
        ?>
 
<?
// *********   ALTERNATE COLOR  **************************************************************
//$color="1";
if ($color ==FALSE) {           echo "<tr>";  
                                $color=TRUE;
                                   }
else {          echo "<tr bgcolor='#C6D4DD'>";  //FFCC99 //DBDBFF
                $color=FALSE;
      } ?>
 
<td class="head03"><?
          $movie=mysql_query("select * from movies where id=".$char['id_movie']);
          $mov=mysql_fetch_array($movie);
          ?>
          <a href="movie.php?idm=<? echo $char['id_movie'];?>"><img src="movies/<? echo $mov['image'];?>" width="30"></a> <a href="movie.php?idm=<? echo $mov['id'];?>"><? echo $mov['movie_name'];?></a></td>
        <td class="head03"><span class="<?=getRatingColor ($mov_net_avg);?>"><? echo number_format($mov_net_avg,'2','.','');?></td>
        <td class="head03"><a href="character.php?idm=<? echo $char['c_id'];?>"><? echo $char['char_name'];?></a></td>
        <td class="head03"><span class="<?=getRatingColor ($net_avg);?>"><? echo number_format($net_avg,'2','.','');?></td>
        <td class="head03"><?echo $mov['year'];?></a></td> 
        </tr>
        <?
 
        } //end while
// ******************************************************
 
        ?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div> 
<!-- end of "tab-content" -->

*/
//***********************  ORIGINAL ACTOR FILMOGRAPHY WITH MOVIE SCORES **********
?>
