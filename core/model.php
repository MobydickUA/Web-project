<?php
class Model
{
	public function connect_to_db()
	{
		mysql_connect('localhost','root','');
		mysql_select_db('site_info');
		mysql_query('SET NAMES utf8;');
	}

	public function get_theme_id()
	{
		if(empty($_SESSION['theme_id']))
			return 1;
		else
			return $_SESSION['theme_id'];
	}

	public function change_theme_id($id)
	{
		$_SESSION['theme_id'] = $id;
		mysql_connect('localhost','root','');
		mysql_select_db('site_info');
		mysql_query("update `users` set `theme_id` = ".$id." where `name` = '".$_SESSION['name']."';");
	}

	public function get_data()
	{
	}
}
?>