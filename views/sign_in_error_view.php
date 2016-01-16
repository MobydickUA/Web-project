<?php
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	echo  "Your E-mail is not valid <br>";
?>
<form action="" method="post">
	<h4>E-mail: </h4> <input type="text" name="email" value=<?php echo $_POST['email']?> ><p>
	<h4>Password: </h4><input type="password" name="password"  >
	<p><p>
	<input type="submit" value="Send">
</form>