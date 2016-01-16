<h3> Registration </h3>
<form action="" method="post">
	<h4>Name:</h4> <input type="text" name="name"  min=3 required value="<?php echo $_POST['name']?>" /><br/>
	<h4>Age:</h4> <input TYPE="number" name="age" required min=6 max=122 step=1 value="<?php echo $_POST['age']?>" /><br/>
	<h4>Sex:</h4> <select name="sex"><option>Male</option><option>Female</option><option>Other</option></select><br/>
	<h4>E-mail:</h4> <input type="text" name="email" required value="<?php echo $_POST['email']?>" /><br/>
	<h4>Mobile number:</h4> <input type="number" min=10000000000 name="mobile_number" value="<?php echo $_POST['mobile_number']?>" TITLE="xxx-xx-xx-xx" placeholder="xxx-xx-xx-xx" /><br/>
	<h4>About me: </h4><textarea id="registration_about_me" name="about_me" placeholder="Write a few words about you..."><?php echo $_POST['about_me']?></textarea>
	<h4>Password: </h4><input type="password" min=4 name = "password" required /><br/>
	<h4>Repeat password:</h4> <input type="password" min=4 name="r_password" required /><br/>
	<p><p>
	<input type="submit" value="Send">
</form>