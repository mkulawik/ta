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
  <link href="web/css/style.css" rel="stylesheet" type="text/css"  media="all" />
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
$movies=mysql_query("select * from movies where id=".$idm);
$mov=mysql_fetch_array($movies);

?>


<div class="cont-bg">
<div class="container-bdy">
<? include("search_box.php");?>
<div class="bdyCont-center">
<span class="head01">Rate &amp; Write Review for <strong style="color:#00A0DE;"><? echo $mov['movie_name']; ?></strong></span>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="4">
<form id="form1" name="form1" method="post" action="write_review_movie1.php?idm=<? echo $idm;?>">
  
  <tr>
    <td colspan="2" class="head02">Give Rating: (10 = Excellent, 1 = Poor) </td>
    </tr>
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="96%"><table width="300" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td width="87" class="head03">Plot:</td>
        <td width="176" class="head03"><select name="ddl_plot" class="head03" id="ddl_plot">
          <? for($i=1;$i<=10;$i++){?>
		  <option value="<? echo $i;?>" <? if(isset($_SESSION['plot']) and $_SESSION['plot']==$i){echo "selected";}?>><? echo $i;?></option>
		  <?
		  }
		  ?>
        </select>
        </td>
        <td width="37" class="head03">&nbsp;</td>
      </tr>
      <tr>
        <td class="head03">Story:</td>
        <td class="head03"><select name="ddl_story" id="ddl_story">
          <? for($i=1;$i<=10;$i++){?>
          <option value="<? echo $i;?>" <? if(isset($_SESSION['story']) and $_SESSION['story']==$i){echo "selected";}?>><? echo $i;?></option>
          <?
		  }
		  ?>
        </select></td>
        <td class="head03">&nbsp;</td>
      </tr>
      <tr>
        <td class="head03">Characters:</td>
        <td class="head03"><select name="ddl_char" id="ddl_char">
          <? for($i=1;$i<=10;$i++){?>
          <option value="<? echo $i;?>" <? if(isset($_SESSION['char']) and $_SESSION['char']==$i){echo "selected";}?>><? echo $i;?></option>
          <?
		  }
		  ?>
        </select></td>
        <td class="head03">&nbsp;</td>
      </tr>
      <tr>
        <td class="head03">Acting:</td>
        <td class="head03"><select name="ddl_acting" id="ddl_acting">
          <? for($i=1;$i<=10;$i++){?>
          <option value="<? echo $i;?>" <? if(isset($_SESSION['acting']) and $_SESSION['acting']==$i){echo "selected";}?>><? echo $i;?></option>
          <?
		  }
		  ?>
        </select></td>
        <td class="head03">&nbsp;</td>
      </tr>
      <tr>
        <td class="head03">Cinematography:</td>
        <td class="head03"><select name="ddl_cinema" id="ddl_cinema">
          <? for($i=1;$i<=10;$i++){?>
          <option value="<? echo $i;?>" <? if(isset($_SESSION['cinema']) and $_SESSION['cinema']==$i){echo "selected";}?>><? echo $i;?></option>
          <?
		  }
		  ?>
        </select></td>
        <td class="head03">&nbsp;</td>
      </tr>
      <tr>
        <td class="head03">Soundtrack:</td>
        <td class="head03"><select name="ddl_sound" id="ddl_sound">
          <? for($i=1;$i<=10;$i++){?>
          <option value="<? echo $i;?>" <? if(isset($_SESSION['sound']) and $_SESSION['sound']==$i){echo "selected";}?>><? echo $i;?></option>
          <?
		  }
		  ?>
        </select></td>
        <td class="head03">&nbsp;</td>
      </tr>
      <tr>
        <td class="head03">Execution:</td>
        <td class="head03"><select name="ddl_execution" id="ddl_execution">
          <? for($i=1;$i<=10;$i++){?>
          <option value="<? echo $i;?>" <? if(isset($_SESSION['execution']) and $_SESSION['execution']==$i){echo "selected";}?>><? echo $i;?></option>
          <?
		  }
		  ?>
        </select></td>
        <td class="head03">&nbsp;</td>
      </tr>
      <tr>
        <td class="head03">Emotional Impact:</td>
        <td class="head03"><select name="ddl_impact" id="ddl_impact">
          <? for($i=1;$i<=10;$i++){?>
          <option value="<? echo $i;?>" <? if(isset($_SESSION['impact']) and $_SESSION['impact']==$i){echo "selected";}?>><? echo $i;?></option>
          <?
		  }
		  ?>
        </select></td>
        <td class="head03">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><span class="head02">Comments/Review:</span></td>
    </tr>
  <tr>
    <td colspan="2" valign="top">
      <textarea name="Comment" cols="110" rows="15" class="head03" id="Comment" style=" padding:5px;border:solid 1px #999999;"><? if(isset($_SESSION['comments']) and $_SESSION['comments']<>""){echo $_SESSION['comments'];}?></textarea>    </td>
    </tr>
  <tr>
    <td colspan="2"><input name="Submit" type="submit" class="button_lime" value="Publish" />
      <input name="Submit" type="submit" class="button_lime" value="Preview" /></td>
    </tr>
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



<? include("copyright.php");?>

</body>
</html>
