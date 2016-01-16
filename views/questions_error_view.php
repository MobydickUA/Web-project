<h3>There some errors with your form...</h3>
<p>
<?php
if(strlen($_POST['login']) < 3)
	echo "Your login is too short","<br>";
if (strlen($_POST['text']) < 6) 
	echo  "Your text is too short <br>";
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	echo  "Your E-mail is not valid <br>";
?>
<form action="" method="post">
	<h4>Login: </h4><input type="text" name="login" value=<?php echo $_POST['login']?> ><br/>
	<h4>E-mail: </h4> <input type="text" name="email" value=<?php echo $_POST['email']?> ><br/>
	<h4>Text: </h4><textarea name = "text"><?php echo $_POST['text']?></textarea><br/>
	<p><p>
	<input type="submit" value="Send">
</form>