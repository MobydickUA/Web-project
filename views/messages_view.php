<script src="scripts/messages.js"></script>

<h3 id="title_wrapper"><span class="title">Messages to <?php echo $_GET['user'];?></span></h3>
<div id="messages">
<?php 
	while($assoc = mysql_fetch_assoc($data))
	{
		if($assoc['sender'] == $_SESSION['name'])
			$type = "_sent";
		else
			$type = "_get";
		echo "<div id=".$assoc['ID']." class=message".$type."><span class=message_inner>";
		echo $assoc['date']." ".$assoc['sender'].": ".$assoc['text']."</span>
		<span class='date'><span>
		</div>";
	}

?>
</div>

<form method=post id="message_form">
	<textarea id="message_sender" name = "text"  AUTOFOCUS></textarea>
	<p>
	<input id="message_button" type = submit>
</form>