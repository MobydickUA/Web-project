<?php

class Model_registration extends Model
{
	public function get_data()
	{

	}

	public function form_is_valid()
	{
			if(!empty($_POST))
			{
				$err = array(0,0,0,0,0,0);
				if(strlen($_POST['name']) < 4)
					$err[0] = 1;
				if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
					$err[1] = 1;
				if(strlen($_POST['password']) < 4)
					$err[2] = 1;
				if($_POST['password'] != $_POST['r_password'])
					$err[3] = 1;

				$this->connect_to_db();
				$email = $_POST['email'];
				$q = "SELECT COUNT(*) FROM users WHERE email = '$email'";
				$tmp = mysql_query($q);
				$assoc = mysql_fetch_array($tmp);
				if($assoc['COUNT(*)'] != 0)
					$err[4] = 1;
				$q = "SELECT COUNT(*) FROM users WHERE name = '$_POST[name]'";
				$tmp = mysql_query($q);
				$assoc = mysql_fetch_array($tmp);
				if($assoc['COUNT(*)'] != 0)
				{
					$err[5] = 1;
				}

				if($err[0] +$err[1] +$err[2] +$err[3] +$err[4] +$err[5] != 0)
				{
					$err_list[0] = "<h3>There some errors with your form...</h3><br/>";
					if ($err[0] == 1)
						array_push($err_list,"Your name is too short <br>");
					if ($err[1] == 1)
						array_push($err_list,"Your E-mail is not valid <br>");
					if ($err[2] == 1)
						array_push($err_list,"Your password is too short<br>");
					if ($err[3] == 1)
						array_push($err_list,"Your password doesn`t match<br>");
					if ($err[4] == 1)
						array_push($err_list,"User with this email is alredy exists <br>");
					if ($err[5] == 1)
						array_push($err_list,"User with this name is alredy exists <br>");
					array_push($err_list,"<p>");
					return $err_list;
				}
				//else
				//	$this->add_user_to_db();
			}
	}

	public function add_user_to_db()
	{
		$q = "INSERT INTO `users`(`ID`, `name`, `type`, `password`, `email`, `age`, `sex`, `about_me`, `mobile_number`) VALUES ('NULL','$_POST[name]','user','$_POST[password]','$_POST[email]', '$_POST[age]', '$_POST[sex]', '$_POST[about_me]', '$_POST[mobile_number]')";
		mysql_query($q);
		echo '<script type="text/javascript">location.href = "http://cars/sign_in/success/?name='.$_POST['name'].'&user='.md5(user).'&email='.$_POST['email'].'";</script>';
	}
	
	
}
?>