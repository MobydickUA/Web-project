<?php
session_start();
class Model_messages extends Model
{
	public function get_data()
	{
		$this->connect_to_db();
		$tmp = mysql_query("select * from `messages` where (`sender` = '".$_SESSION['name']."' and `achiever` = '".$_GET['user']."') or (`sender` = '".$_GET['user']."' and `achiever` = '".$_SESSION['name']."') order by `ID` ASC;");
		return $tmp;
	}
	public function send_message()
	{

		$this->connect_to_db();
		mysql_query("insert into `messages`(`ID`, `sender`, `achiever`, `text`, `date`) values (NULL,'".$_SESSION['name']."','".$_GET['user']."','".$_POST['text']."',NULL);");
	}
}
?>