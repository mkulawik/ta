<?
include("db/dbcon.php");
include('db/db.php');
include('db/functions.php');
include('db/page.php');	
?>


<script type="text/javascript">
    $(document).ready(function () {
        $("iframe").width(210);
        $("iframe").height(180);
    });
</script>
	  <table cellpadding="20" cellspacing="20">
<tr>
	<?
	$video=mysql_query("select * from videos where video_code <>'' order by id desc limit 5");
	while($vid=mysql_fetch_array($video)){
		$newDate = date("M d 'y", strtotime($vid['posted_date']));
		$mmbers=mysql_query("select * from members where id=".$vid['id_member']);
	 	$mem=mysql_fetch_array($mmbers);
	
		$moviepost=mysql_query("select * from movies where id=".$vid['id_movie']);
		$mpost=mysql_fetch_array($moviepost);

?>
<td><? echo ($vid['video_code']); ?>
</td>
<? 
	}	
	?>
    </tr>
</table>
