<form  method="post" action="">
	<table border=0 cellspacing = 0 bordercolor ="green" cellpadding = 5 style="border-radius:5px;">
		<tr>
			<td>
			<td><h4>Nick<a href="/edit_questions/all/?field=1&order=ASC" style="text-decoration:none;">▲</a><a href="/edit_questions/all/?field=1&order=DESC" style="text-decoration:none;">▼</a></h4>
			<td><h4>Email<a href="/edit_questions/all/?field=2&order=ASC" style="text-decoration:none;">▲</a><a href="/edit_questions/all/?field=2&order=DESC" style="text-decoration:none;">▼</a></h4></h4>
			<td><h4>Text</h4>
			<td><h4>Date of publication<a href="/edit_questions/all/?field=3&order=ASC" style="text-decoration:none;">▲</a><a href="/edit_questions/all/?field=3&order=DESC" style="text-decoration:none;">▼</a></h4></h4>
			<td><h4>IP adress</h4>
			<td><h4>Answer</h4>
			<td><h4>Delete</h4>
		</tr>
		<?php
		while($accos = mysql_fetch_assoc($data))
		{
		?>
		<tr>
			<td><input type="checkbox" name = "list_to_do['.$accos['id'].']" >
			<td><?php echo $accos['nick']?>
			<td><?php echo substr($accos['email'],0,20)?>...
			<td><?php echo substr($accos['text'],0,30)?>...
			<td><?php echo $accos['date_of_pub']?>
			<td><?php echo $accos['ip']?>
			<td><div><a href="/edit_questions/edit/?id=<?php echo $accos['id']?>"><image src="/static/images.png"></a></div>
			<td><div><a href="http://cars/edit_questions/delete/?id=<?php echo $accos['id']?>"><image src="/static/delete.png"></a></div>
		</tr>
		<?php 
		}
		?>
	</table>
	<select name = "action">
		<option>Delete all</option>
	</select>
	<input type="Submit">
</form>
	