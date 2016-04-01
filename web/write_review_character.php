<? 
@session_start();
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
  <link href="web/css/stylenotabl.css" rel="stylesheet" type="text/css"  media="all" />
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
   
        <!-----START HEADER----->
 
        <?php include("header.php");
 
if(is_numeric($_GET['idm'])){
$idm=$_GET['idm'];
}else{
$idm=0;
}
$characters=mysql_query("select * from characters where id=".$idm);
$char=mysql_fetch_array($characters);
$i=0; 
?>
 
 
<div class="cont-bg">
<div class="container-bdy">
<div class="bdyCont-center">
<span class="head01">Rate &amp; Write Review for <strong style="color:#00A0DE;"><? echo $char['char_name']; ?></strong></span>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="4">
<form id="form1" name="form1" method="post" action="write_review_character1.php?idm=<? echo $idm;?>">
 

  <tr>
    <td colspan="3" class="head02">Rating guideline: <br /><img src="smartphone/images/rating-sheet.jpg" /> <br />
 <br />-- No one should really be given a score of 1.  We're not here to bash. </td>
</tr>
  <tr>
    <td width="5%">&nbsp;</td>
    <td width="95%"><table width="600" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td width="50" class="head03">Acting:</td>
        <td width="50" class="head03"><select name="ddl_act" class="head03" id="ddl_act">
          <? for($i=0;$i<=10;$i++){?>
                  <option value="<? echo $i;?>" <? if(isset($_SESSION['act']) and $_SESSION['act']==$i){echo "selected";}?>><? echo $i;?></option>
                  <?
                  }
                  ?>
        </select>
      <td width="350" class="head03">
Realism in delivery. Did it evoke emotions in you?
</td> </td>
 
 
 
        <tr>
        <td class="head03">Performance:</td>
        <td class="head03"><select name="ddl_perf" id="ddl_perf">
          <? for($i=0;$i<=10;$i++){?>
          <option value="<? echo $i;?>"<? if(isset($_SESSION['perf']) and $_SESSION['perf']==$i){echo "selected";}?>><? echo $i;?></option>
          <?
                  }
                  ?>
        </select></td>

            <td width="350" class="head03">
Effort, enthusiasm and action if realism is lacking.
</td> </td>
</tr>

<tr>
        <td class="head03">Voice:</td>
        <td class="head03"><select name="ddl_voice" id="ddl_voice">
          <? for($i=0;$i<=10;$i++){?>
          <option value="<? echo $i;?>" <? if(isset($_SESSION['voice']) and $_SESSION['voice']==$i){echo "selected";}?>><? echo $i;?></option>
          <?
                  }
                  ?>
        </select></td>

            <td width="350" class="head03">
How did they sound? Was their speech clear? Would you listen to them read a book?
</td> </td>
</tr>


<tr>
        <td class="head03">Screen Presence:</td>
        <td class="head03"><select name="ddl_screen" id="ddl_screen">
          <? for($i=0;$i<=10;$i++){?>
          <option value="<? echo $i;?>" <? if(isset($_SESSION['screen']) and $_SESSION['screen']==$i){echo "selected";}?>><? echo $i;?></option>
          <?
                  }
                  ?>
            <td width="350" class="head03">
How long did you hold your gaze at them? How appealing were they to you?
</td> </td>

</tr>

<tr>
        <td class="head03">Characterization:</td>
        <td class="head03"><select name="ddl_char" id="ddl_char">
          <? for($i=0;$i<=10;$i++){?>
          <option value="<? echo $i;?>" <? if(isset($_SESSION['char']) and $_SESSION['char']==$i){echo "selected";}?>><? echo $i;?></option>
          <?
                  }
                  ?>
        </select></td>
            <td width="350" class="head03">
Did they become the character? How well did they connect with the character?
</td> </td>
</tr>

    </table></td>
  </tr>
  <tr>
    <td colspan="2"><span class="head02">Comments/Review:</span></td>
    </tr>
  <tr>
    <td colspan="2" valign="top">
      <textarea name="Comment" cols="75" rows="15" class="head03" id="Comment" style=" padding:5px;border:solid 1px #999999;"><? if(isset($_SESSION['comments']) and $_SESSION['comments']<>""){echo stripslashes($_SESSION['comments']);}?></textarea>    </td>
    </tr>
  
<tr>
   <td style="padding:10px" colspan="2">
<!-- <input name="Submit" type="submit" class="button_lime" value="Publish" />
-->    
  <input name="Submit" type="submit" class="button_lime" value="Preview" />
<div style="padding:10px" class="head03"> A quick preview is required before submitting. </div>
</td>   
 </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   </form>
</table>
</table>
<!-- end of "bdyCont-left" -->
</div>  
<!-- end of "bdyCont-right" -->
<div class="clearF"></div>
</div>  <!-- end of "container-bdy" -->
 </div> <!-- end wrap -->
</div>   <!-- end of "cont-bg" -->
 
 
 
<? include("copyright.html");?>
 
</body>
</html>
 
