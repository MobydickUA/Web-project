<?php

class Model_sign_in extends Model
{
	public function get_data()
	{

	}
	
	public function form_is_valid()
	{
		$err = array(0,0);
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
			$err[0] = 1;

		if($err[0] != 0)
			return false;
		else
			return true;
	}

	public function get_and_validate_password()
	{
		$this->connect_to_db();
		$email = $_POST['email'];
		$q = "SELECT * FROM users WHERE email = '$email'";
		$tmp = mysql_query($q);
		$assoc = mysql_fetch_assoc($tmp);
		$password_db = $assoc['password'];
		$password = $_POST['password'];
		$data = array(
			"password_db" => $assoc['password'],
			"password" => $password,
			"user" => $assoc['type'],
			"username" => $assoc['name'],
			"email"  => $_POST['email'],
			"theme_id" => $assoc['theme_id'],
		);
		return $data;
	}
}
?>