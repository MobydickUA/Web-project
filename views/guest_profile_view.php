<div id="profile_wrapper">
	<h2>Profile</h2>
		<img id="userpic" src="<?php echo $data['picture_path'] ?>" alt="profile picture">
	<div id = "profile_info">
		<div>Name: <?php echo $data['name'] ?> </div>
		<div>Age: <?php echo $data['age'] ?> </div>
		<div>Sex: <?php echo $data['sex'] ?> </div>
		<div>About me: <?php echo $data['about_me'] ?> </div>
		<div>Mobile Number: <?php echo $data['mobile_number'] ?> </div>
		<div>Car driven: <?php echo $data['car_owned'] ?> </div>
		<div>Email: <?php echo $data['email'] ?> </div>
		<div id="user_links">
			<a href="http://cars/messages?user=<?php echo $data['name'] ?>">Write a message</a>
		</div>
	</div>
</div>