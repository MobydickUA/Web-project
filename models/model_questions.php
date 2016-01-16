<?php
session_start();
class Model_questions extends Model
{
	public function send_message()
		{
			$this->connect_to_db();

			if(isset($_SESSION['name']))
				$nick = $_SESSION['name'];
			else
				$nick = $_POST["login"];

			if(isset($_SESSION['email']))
				$email = $_SESSION['email'];
			else
				$email = $_POST["email"];

			$text = $_POST["text"];
			$ip = $_SERVER["REMOTE_ADDR"];
			$date_of_pub = date("Y-m-d");
			mysql_query("insert into `questions` (`nick`, `email`, `text`, `date_of_pub`, `ip`, `id`, `answer`) values ('".$nick."', '".$email."', '".$text."', '".$date_of_pub."','".$ip."',NULL, NULL);");
		}

	public function form_is_valid()
		{
			$err = 0;
			if(strlen($_POST['login']) < 3)
				$err += 1;
			if (strlen($_POST['text']) < 6) 
				$err += 1;
			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
				$err += 1;


			if($err != 0)
				return false;
			else
				return true;
		}
}
?>