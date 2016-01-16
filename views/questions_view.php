<form action="" method="post">
	<h3>Leave your message</h3><br/>
	<h4>Login:</h4><input type="text" name="login" value=<?php echo $_SESSION['name']?>>
	<h4>E-mail:</h4> <input type="text" name="email" value=<?php echo$_SESSION['email']?>>
	<h4>Text: </h4><textarea name = "text"></textarea>
	<p><p>
	<input type="submit" value="Send">
	</form>