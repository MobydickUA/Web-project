<form action="" method="post">
	<h4>Title: 				</h4>	<input type="text" name="title" style="width:50%;" value="<?php echo $data['title'] ?>" >
	<h4>Text: 				</h4>	<textarea name = "content" style="width:80%; height:400px;"><?php echo $data['content']?></textarea>
	<h4>Is published: 		</h4>	<input type="text" name="published" value=<?php echo $data['published']?> >
	<h4>Visible for: 		</h4>	<select name="visible"><option>anon</option><option>signed</option></select>
	<p><p>
	<input type="submit" value="Send">
</form>