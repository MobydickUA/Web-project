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
				<div><a href="http://cars/profile/messages/all">My messages</a></div>
			<p>
				<div><a href="http://cars/profile/edit/<?php echo $data['name'] ?>">Edit profile</a></div>
			<p>
				<div><a href="http://cars/profile/edit_privacy/<?php echo $data['name'] ?>">Edit privacy</a></div>
		</div>
	</div>
</div>