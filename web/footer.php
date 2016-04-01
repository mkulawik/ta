<!--
FADVIEWS
URL: http://fadviews.com
-->

<?
$datetime1 = new DateTime('now');
$datetime2 = new DateTime('2015-03-05');
$interval = $datetime1->diff($datetime2);
//echo $interval->format('%R%a days');
?>

		 <div class="footer">
		<div class="wrap">
			<div class="footer-grid">
				<h3>About us</h3>
				<p>We are a work force of 2 people with full time jobs. We will work hard to have this site blossom into something special for everyone, especially to those who enjoy, appreciate and love films, actors, shows and performances.  Click below to learn more about us.</p>
				<a href="about.php">ReadMore</a>
			</div>
			<div class="footer-grid center-grid">
				<h3>Some Highlights</h3>
				<ul>
					<li><a href="/rating_system.php">Our rating system</a></li>	
                                        <li><a href="/rating_system.php#1">The 8mm of Film</a></li>
                                        <li><a href="/rating_system.php#2">The Take 5 of Acting</a></li>

				</ul>
				       <a href="/acknowledgements.php"><h3>Acknowledgements</h3></a>
			</div>
			<div class="footer-grid twitts">
				<h3>Latest Tweets</h3>
		<blockquote class="twitter-tweet" lang="en"><p>I just spent 20 hours of coding last weekend and I&#39;m feeling the effects of it now. Still in great spirits though! -art</p>&mdash; FADViews (@fadviews) <a href="https://twitter.com/fadviews/status/573541746585399296">March 5, 2015</a></blockquote>
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>	

		<span> <? echo $interval->format('%R%a days');?> ago</span>
			</div>
			<div class="footer-grid">
                                <h3>DO YOU KNOW..?</h3>
                                <p>...the movies famous actors made while they were your age? Send yourself an email and find out!</p>
                                <a href="/bdaycard.php">Try It</a>

			</div>	
  		<div class="clear"> </div>
	</div>
  <div class="clear"> </div>
</div>
<!---- Copyright  -->	
		<?php include("copyright.html");?>
	</body>
</html>


