<h2>Your messages</h2>
<div id="dialog_list">
<?php
foreach ($list as $key => $value) 
	echo 
		'<a href="http://cars/messages?user='.$value.'">
			<div class="dialog_item">
				<img src="http://cars/static/delete.png" class="userpic_tiny" />
				<span class="dialog_name">'
					.$value.'
				</span>
			</div>
		</a>';	
?>
</div>