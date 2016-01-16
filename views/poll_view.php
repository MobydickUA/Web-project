<h3><?php echo $data['name'];?></h3><br><br>
<form method=post>
	<input type="radio" name="item1"><?php echo $data['item1'];?><br><br><br>
	<input type="radio" name="item2"><?php echo $data['item2'];?><br><br><br>
	<?php if(!empty($data['item3'])) echo '<input type="radio" name="item3">'.$data["item3"]?>
	<br><br><br><input type="submit">
</form>

