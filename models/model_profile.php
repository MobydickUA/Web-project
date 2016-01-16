<?php
include_once '/core/model.php';
session_start();

class Model_profile extends Model
{
	public function get_data($user)
	{
		$this->connect_to_db();
		if($user == "me")
			$user = $_SESSION['name'];
		$tmp = mysql_query("select * from users where name = '".$user."';");
		$assoc = mysql_fetch_assoc($tmp);
		if($user = $_SESSION['name'])
			return $assoc;
		else
		{
			$user = md5("user");
			$admin = md5("admin");
			if($_SESSION['user'] == $admin)
				return $assoc;
			elseif($_SESSION['user'] == $user)
			{
				if($assoc['age_visibility'] == 'Admins only')
					$assoc['age'] = "-/-/-/";
				if($assoc['about_me_visibility'] == "Admins only")
					$assoc['about_me'] = "-/-/-/";
				if($assoc['email_visibility'] == "Admins only")
					$assoc['email'] = "-/-/-/";
				if($assoc['mobile_number_visibility'] == "Admins only")
					$assoc['mobile_number'] = "-/-/-/";
				return $assoc;
			}
			else
			{
				if($assoc['age_visibility'] != 'Everybody')
					$assoc['age'] = "-/-/-/";
				if($assoc['about_me_visibility'] != "Everybody")
					$assoc['about_me'] = "-/-/-/";
				if($assoc['email_visibility'] != "Everybody")
					$assoc['email'] = "-/-/-/";
				if($assoc['mobile_number_visibility'] != "Everybody")
					$assoc['mobile_number'] = "-/-/-/";
				return $assoc;
			}
		}
	}

	public function update_profile_data()
	{
		$this->connect_to_db();
		mysql_query("update `users` set `name` = '".$_POST['name']."', `age` = '".$_POST['age']."', `email` = '".$_POST['email']."', `mobile_number` = '".$_POST['mobile_number']."', `about_me` = '".$_POST['about_me']."', `car_owned` = '".$_POST['car_owned']."' where `name` = '".$_SESSION['name']."' ");
		$_SESSION['name'] = $_POST['name'];
		$_SESSION['email'] = $_POST['email'];
	}

	public function update_password()
	{
		$this->connect_to_db();
		mysql_query("update `users` set `password` = '".$_POST['password']."' where `name` = '".$_SESSION['name']."';");
	}

	public function update_privacy()
	{
		$this->connect_to_db();
		mysql_query("update `users` set `age_visibility` = '".$_POST['age']."', `about_me_visibility` = '".$_POST['about_me']."', `email_visibility`= '".$_POST['email']."' , `mobile_number_visibility` = '".$_POST['mobile_number']."'  where `name` = '".$_SESSION['name']."';");
	}

	public function update_picture()
	{
		$this->connect_to_db();
		$q = "update `users` set `picture_path` = 'http://cars/static/userpic/".$_SESSION['name'].".png' where `name` = '".$_SESSION['name']."';";
		mysql_query($q);
	}

	public function get_dialog_list()
	{
		$this->connect_to_db();
		$q = "select `achiever` from `messages` where `sender`= '".$_SESSION['name']."';";
		$tmp = mysql_query($q);
		$i = 0;
		while($array = mysql_fetch_array($tmp))
		{
			$data[$i] = $array[0];
			$i += 1;
		}
		//var_dump($data);
		$res = array_unique($data);
		return $res;
	}
}
?>