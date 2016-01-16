<h2>Available polls:</h2>
<div id="polls_list">
<?php
if($_SESSION['user'] = md5('admin'))
echo '<a href="http://cars/polls/add">Add new poll</a><br><br>';
while($assoc = mysql_fetch_assoc($data))
{
	echo 
		'<a href="http://cars/polls?id='.$assoc['id'].'">
			<div class="dialog_item">
				<span class="poll_name">'
					.$assoc['name'].'
				</span>
			</div>
		</a>';	
}
	
?>
</div>

