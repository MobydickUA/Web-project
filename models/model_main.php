<?php
session_start();

class Model_main extends Model
{
	public function get_data()
	{
		$this->connect_to_db();
		date('Y-m-d');
		mysql_query("SET NAMES utf8");
		
		if(!empty($_SESSION))
			$tmp = mysql_query("SELECT articles.*, users.name FROM articles INNER JOIN users ON articles.author = users.id where articles.published != 0");
		else
			$tmp = mysql_query("SELECT articles.*, users.name FROM articles INNER JOIN users ON articles.author = users.id where articles.published != 0 and articles.visible = 'anon'");
		return $tmp;
	}

	public function get_article($page)
	{
		$this->connect_to_db();
		$id = $page;
		$tmp = mysql_query("SELECT articles.*, users.name FROM articles INNER JOIN users ON articles.author = users.id where articles.published != 0 and articles.id = ".$id);
		$accos = mysql_fetch_assoc($tmp);
		return $accos;
	}

	public function get_comments($page)
	{
		$this->connect_to_db();
		$id = $page;
		$tmp = mysql_query("SELECT comments.*, users.name from comments inner join users on comments.author = users.id where comments.article_id = ".$id);
		return $tmp;
	}

	public function send_comment()
	{
		$this->connect_to_db();
		$id = $this->get_user_id($_SESSION['name']);
		mysql_query("insert into `comments`(`id`, `article_id`, `text`, `author`, `date_of_pub`) values (NULL,'".$_POST['article_id']."','".$_POST['comment_text']."','".$id."',NULL)");
		$_POST = "";
	}

	public function get_user_id($name)
	{
		$this->connect_to_db();
		$tmp = mysql_query("select id from users where name = '".$name."';");
		$assoc = mysql_fetch_assoc($tmp);
		return $assoc['id'];
	}
}
	
?>