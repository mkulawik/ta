<?
session_start();
@ob_start();
include("chksession.php");
?>
<!--
FADVIEWS
URL: http://fadviews.com
-->
<!DOCTYPE HTML>
<html>
<head>
  <title>FADVIEWS - Film Actor Database Reviews | Rating </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="smartphone/css/style.css" rel="stylesheet" type="text/css"  media="all" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
 </head>

<?
include("db/dbcon.php");
include('db/db.php');
include('db/functions.php');
include('db/page.php');
?>

  <body>
   
	<!-----START HEADER----->

	<?php include("header.php");
if(is_numeric($_GET['idm'])){
$idm=$_GET['idm'];
}else{
$idm=0;
}
$shows=mysql_query("select * from shows where id=".$idm);
$sho=mysql_fetch_array($shows);

?>


<div class="cont-bg">
<div class="container-bdy">
<? include("search_box.php");?>
<div class="bdyCont-center">
<span class="head01">Rate &amp; Write Review for <strong style="color:#00A0DE;"><? echo $sho['show_name']; ?></strong></span>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="4">
<form id="form1" name="form1" method="post" action="write_review_shows1.php?idm=<? echo $idm;?>">
  
  <tr>
    <td colspan="3" class="head02">Rating guideline: <br /><img src="web/images/rating-sheet.jpg" /> </td>
    </tr>
  
<tr>
    <td width="5%">&nbsp;</td>
    <td width="95%">
	<table width="600" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td width="50" class="head03">Plot & Story:</td>
        <td width="50" class="head03"><select name="ddl_plot" class="head03" id="ddl_plot">
          <? for($i=0;$i<=10;$i++){?>
		  <option value="<? echo $i;?>" <? if(isset($_SESSION['plot']) and $_SESSION['plot']==$i){echo "selected";}?>><? echo $i;?></option>
</span>		<?
		  }
		  ?>
        </select>
<td width="350" class="head03">
Plot are the main events of the show. Story is everything that unfolds from beginning to end.
</td> </td>             

</td>
        <td width="37" class="head03">&nbsp;</td>
      </tr>
        
	</select></td>
        <td class="head03">&nbsp;</td>
      </tr>
      <tr>
        <td class="head03">Characters:</td>
        <td class="head03"><select name="ddl_char" id="ddl_char">
          <? for($i=0;$i<=10;$i++){?>
          <option value="<? echo $i;?>" <? if(isset($_SESSION['char']) and $_SESSION['char']==$i){echo "selected";}?>><? echo $i;?></option>
          <?
		  }
		  ?>
        </select>
<td width="350" class="head03">
How do you like the characters in the story?
</td> </td>

</td>
        <td class="head03">&nbsp;</td>
      </tr>
      <tr>
        <td class="head03">Acting:</td>
        <td class="head03"><select name="ddl_acting" id="ddl_acting">
          <? for($i=0;$i<=10;$i++){?>
          <option value="<? echo $i;?>" <? if(isset($_SESSION['acting']) and $_SESSION['acting']==$i){echo "selected";}?>><? echo $i;?></option>
          <?
		  }
		  ?>
        </select>
<td width="350" class="head03">
How well did the actors portray their characters? 
</td>


</td>
        <td class="head03">&nbsp;</td>
      </tr>
      <tr>
        <td class="head03">Cinematography:</td>
        <td class="head03"><select name="ddl_cinema" id="ddl_cinema">
          <? for($i=0;$i<=10;$i++){?>
          <option value="<? echo $i;?>" <? if(isset($_SESSION['cinema']) and $_SESSION['cinema']==$i){echo "selected";}?>><? echo $i;?></option>
          <?
		  }
		  ?>
        </select>
<td width="350" class="head03">
How was it filmed? How did the camera take you througout the story?
</td> 

</td>
        <td class="head03">&nbsp;</td>
      </tr>
      <tr>
        <td class="head03">Soundtrack:</td>
        <td class="head03"><select name="ddl_sound" id="ddl_sound">
          <? for($i=0;$i<=10;$i++){?>
          <option value="<? echo $i;?>" <? if(isset($_SESSION['sound']) and $_SESSION['sound']==$i){echo "selected";}?>><? echo $i;?></option>
          <?
		  }
		  ?>
        </select>
<td width="350" class="head03">
How did it sound? Sound effects, background music, soundtrack, noise?
</td>

</td>

        <td class="head03">&nbsp;</td>
      </tr>
      <tr>
        <td class="head03">Production Design:</td>
        <td class="head03"><select name="ddl_design" id="ddl_design">
          <? for($i=0;$i<=10;$i++){?>
          <option value="<? echo $i;?>" <? if(isset($_SESSION['design']) and $_SESSION['design']==$i){echo "selected";}?>><? echo $i;?></option>
          <?
                  }
                  ?>
        </select>
<td width="350" class="head03">
Visual/Special effects, wardrobe, location, sets, props.
</td>

</td>
        <td class="head03">&nbsp;</td>
      </tr>
      <tr>
        <td class="head03">Execution:</td>
        <td class="head03"><select name="ddl_execution" id="ddl_execution">
          <? for($i=0;$i<=10;$i++){?>
          <option value="<? echo $i;?>" <? if(isset($_SESSION['execution']) and $_SESSION['execution']==$i){echo "selected";}?>><? echo $i;?></option>
          <?
		  }
		  ?>
        </select>
<td width="350" class="head03">
The editing. How well did categories 1 through 6 come together?
</td> 

</td>
        <td class="head03">&nbsp;</td>
      </tr>
      <tr>
        <td class="head03">Emotional Impact:</td>
        <td class="head03"><select name="ddl_impact" id="ddl_impact">
          <? for($i=0;$i<=10;$i++){?>
          <option value="<? echo $i;?>" <? if(isset($_SESSION['impact']) and $_SESSION['impact']==$i){echo "selected";}?>><? echo $i;?></option>
          <?
		  }
		  ?>
        </select>

<td width="350" class="head03">
How did you feel throughout the show? Did it make you cry, laugh, sad, happy..?
</td> 
</td>
        <td class="head03">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><span class="head02">Comments/Review:</span></td>
    </tr>
  <tr>
    <td colspan="2" valign="top">
      <textarea name="Comment" cols="110" rows="15" class="head03" id="Comment" style=" padding:5px;border:solid 1px #999999;"><? if(isset($_SESSION['comments']) and $_SESSION['comments']<>""){echo stripslashes($_SESSION['comments']);}?></textarea>    </td>
    </tr>
  <tr>
   <td style="padding:10px" colspan="2">
	<input name="Submit" type="submit" class="button_lime" value="Preview" />
	<div style="padding:10px" class="head03"> A quick preview is required before submitting. </div>
   </td>  
  </tr>
  <tr>


  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   </form>
</table>
<!-- end of "bdyCont-left" -->
</div>  
<!-- end of "bdyCont-right" -->
<div class="clearF"></div>
</div>  <!-- end of "container-bdy" -->

</div>   <!-- end of "cont-bg" -->



<? include("copyright.html");?>

</body>
</html>

