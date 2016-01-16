<div id="comments_wrapper">
	<h3 style="margin-bottom:10px;"><span>Comments</span></h3>
	<div id="comments">
	<?php
	while($assoc = mysql_fetch_assoc($data))
		echo "<div id=comment> <a class=user_profile href=http://cars/profile/user/".$assoc['name']."><span>".$assoc['name']."</a>: ".$assoc['text']."</span>
	<span class=comment_date>".$assoc['date_of_pub']."</span></div>";
	?>
</div>
</div>