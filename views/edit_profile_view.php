<h2>Edit profile</h2>
<form method=post enctype=multipart/form-data>
<div>Name:			</div><p><input type="text" name="name" value="<?php echo $data['name'] ?>"> <p><p>
<div>Age: 			</div><p><input type="text" name="age" value="<?php echo $data['age'] ?>"> <p><p>
<div>Email: 		</div><p><input type="email" name="email" value="<?php echo $data['email'] ?>"> <p><p>
<div>About me:		</div><p><textarea type="text" name="about_me"> <?php echo $data['about_me'] ?> </textarea><p><p>
<div>Mobile Number: </div><p><input type="text" name="mobile_number" value="<?php echo $data['mobile_number'] ?>"><p><p>
<div>New photo:     </div><p><input type="file" name="userpic" accept="image/*"><p>
<div>Car owned:</div><p><input typr="text" name="car_owned" value="<?php echo $data['car_owned'] ?>"><p><p>

<p>
<input type="submit" value="Update">
</form>
<a href="http://cars/profile/change_password/<?php echo $_SESSION['name'];?>">Change password</a>
