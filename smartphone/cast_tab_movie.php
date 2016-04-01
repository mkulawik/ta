<br /><br />
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr style="font-size:14px; font-weight:bold">
      <td width="43.333%" >ACTORS</td>
      <td width="43.333%" >CHARACTER</td>
      <td width="14.333%" >SCORE</td>
    </tr>
    <tr>
      <td colspan="3" height="10"></td>
    </tr>
    <?
        $color=FALSE;
        $characters=mysql_query("select * from characters where id_movie=".$idm);
// ***** While start ****************
        while($char=mysql_fetch_array($characters)){
        $reviews=mysql_query("select * from rating where id_character=".$char['id']);
 
                $avg=0; 
                $net_avg=0; 
                if(mysql_num_rows($reviews)>0){
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
 
//******** ALTERNATE ROW COLOR
if ($color == FALSE) { echo "<tr>"; 
                        $color=TRUE; 
                }    
else { echo " <tr bgcolor='C2E0FF'>";
         $color=FALSE;
} 
 
//**********************
?>
 
 
	<td style="font-size:13px" > 
 
<? 
          $actor=mysql_query("select * from actors where id=".$char['id_actor']);
          $act=mysql_fetch_array($actor);
          ?>
   <a href="profile.php?idm=<? echo $act['id'];?>"><img src="actors/<? echo $act['image'];?>" width="30"></a>  <a href="profile.php?idm=<? echo $act['id'];?>"><? echo $act['f_name']."&nbsp;".$act['l_name'];?></a></td>
      <td style="font-size:13px" ><a href="character.php?idm=<? echo $char['id'];?>"><? echo $char['char_name'];?></a></td>
      <td style="font-size:13px" ><span class="<?=getRatingColor ($net_avg);?>"><? echo number_format($net_avg,'2','.','');?></span></td>
        </tr>
    <?
        }
        ?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>

