<h3><a href = "http://cars/edit_articles/add_article">Add article</a></h3>
<form  method="post" action="">
<table border=0 cellspacing = 5 bordercolor ="green" cellpadding = 5 style="border-radius:5px;">
	<tr>
		<td></td>
		<td><h4>ID<a href="/edit_articles/all/?field=1&order=ASC" style="text-decoration:none;">▲</a><a href="/edit_articles/all/?field=1&order=DESC" style="text-decoration:none;">▼</a></h4>
		<td><h4>Title<a href="/edit_articles/all/?field=2&order=ASC" style="text-decoration:none;">▲</a><a href="/edit_articles/all/?field=2&order=DESC" style="text-decoration:none;">▼</a></h4>
		<td><h4>Date of publication<a href="/edit_articles.php?field=3&order=ASC" style="text-decoration:none;">▲</a><a href="/edit_articles.php?field=3&order=DESC" style="text-decoration:none;">▼</a></h4>
		<td><h4>Is published<a href="/edit_articles/all/?field=4&order=ASC" style="text-decoration:none;">▲</a><a href="/edit_articles/all/?field=4&order=DESC" style="text-decoration:none;">▼</a></h4>
		<td><h4>Author<a href="/edit_articles/all/?field=5&order=ASC" style="text-decoration:none;">▲</a><a href="/edit_articles/all/?field=5&order=DESC" style="text-decoration:none;">▼</a></h4>
		<td><h4>Visible for<a href="/edit_articles/all/?field=6&order=ASC" style="text-decoration:none;">▲</a><a href="/edit_articles/all/?field=6&order=DESC" style="text-decoration:none;">▼</a></h4>
		<td><h4>Edit</h4>
		<td><h4>Delete</h4>
	</tr>
	<?php
	while($accos = mysql_fetch_assoc($data))
	{
	?>
		<tr>
		<td><input type="checkbox" name = "list_to_do[<?php echo $accos['id']?>]" >
		<td><?php echo $accos['id']?>
		<?php if($accos['published'] != 0)
			echo '<td> <a href="http://cars/main/article/'.$accos['id'].'">'.substr($accos['title'],0,25).'...</a>';
		else
			echo '<td>'.substr($accos['title'],0,25).'...';
		?>
		<td><?php echo $accos['date_of_pub']?>
		<td><?php echo $accos['published']?>
			<form action="" method="post">
				<input type="text"  name = "id_to_update" value = "<?php echo $accos['id']?>" style="display: none;">
				<input type="submit" name = "publish" value="Change"></input>
  			</form>
		<td><?php echo $accos['author']?>
		<td><?php echo $accos['visible']?>
			<form action="" method="post">
				<input type="text"  name = "id_to_update" value = "<?php echo $accos['id']?>" style="display: none;">
				<input type="submit" name = "visibility" value="Change"></input>
  			</form>
		<td><div><a href="/edit_articles/all/?id=<?php echo $accos['id']?>"><image src="/static/images.png"></a></div>
		<td><div><a href="http://cars/edit_articles/delete/?id=<?php echo $accos['id']?>"><image src="/static/delete.png"></a></div>
		</tr>
	<?php
	}
	?>
</table>
<select name = "action">
  			<option>Select...</option>
  			<option>Publish all</option>
  			<option>Unpublish all</option>
			<option>Delete all</option>
		</select>
		<p>
			<p>
<input type="Submit">