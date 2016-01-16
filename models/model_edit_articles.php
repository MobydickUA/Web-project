<?php
session_start();
class Model_edit_articles extends Model
{
	public function get_data()
	{
		$this->connect_to_db();
		if($_GET['id'] != NULL)
			$q = 'SELECT * FROM articles WHERE id = '.$_GET[id];
		else
		{
			if($_GET['field'] != NULL && $_GET['order'] != NULL)
			{
				$fields = array('1' => "ID",'2' => "title",'3' => "date_of_pub",'4' => "published",'5' => "author",'6' => "visible");
				if($_GET['field'] > 5 || $_GET['field'] < 1)
					$_GET['field'] = 1;
				if($_GET['order'] != 'ASC' && $_GET['order'] != 'DESC')
					$_GET['order'] = 'ASC';
				$q = 'SELECT * FROM articles ORDER BY '.$fields[$_GET[field]].' '.$_GET[order];

			}
			else
				$q = 'SELECT * FROM articles';
		}
		$tmp = mysql_query($q);
		return $tmp;
	}

	public function add_article()
	{
		$this->connect_to_db();
		$date = date('Y-m-d');
		if(!isset($_SESSION['name']))
			$_SESSION['name'] = 'anon';
		$q = "INSERT INTO `articles`(`ID`,`title`,`content`,`date_of_pub`,`order_row`,`published`,`visible`,`author`) 
		VALUES(NULL,'$_POST[title]','$_POST[content]','$date','999','0','$_POST[visible]','$_SESSION[name]');";
		mysql_query($q);
	}


	public function publish_one_article()
	{
		$this->connect_to_db();
		$id = $_POST['id_to_update'];
		$q = "SELECT `published` from `articles` where `id` = '".$id."';";
		$tmp = mysql_query($q);
		$accos = mysql_fetch_array($tmp);
		if($accos['published'] == '0')
			$q = "UPDATE articles SET published = '1' WHERE id = '$id'";
		else
			$q = "UPDATE articles SET published = '0' WHERE id = '$id'";
		mysql_query($q);
	}
			
	public function post_article()
	{
		$this->connect_to_db();
		$id = $_POST['id_to_update'];
		$q = "SELECT visible from articles where id = '$id'";
		$tmp = mysql_query($q);
		$accos = mysql_fetch_array($tmp);
		if($accos['visible'] == 'signed')
			$q = "UPDATE articles SET visible = 'anon' WHERE id = '$id'";
		else
			$q = "UPDATE articles SET visible = 'signed' WHERE id = '$id'";
		mysql_query($q);

	}

	public function publish_all($i)
	{
		$this->connect_to_db();
		$q = 'UPDATE articles SET published = 1 WHERE id = '.$i;
		mysql_query($q);
		echo '<script type="text/javascript">location.href = "http://cars/edit_articles/all";</script>';
	}

	public function unpublish_all($i)
	{
		$this->connect_to_db();
		$q = 'UPDATE articles SET published = 0 WHERE id = '.$i;
		mysql_query($q);
		echo '<script type="text/javascript">location.href = "http://cars/edit_articles/all";</script>';
	}

	public function delete_all($i)
	{
		$this->connect_to_db();
		$q = 'DELETE FROM articles WHERE id = '.$i;
		mysql_query($q);
		echo '<script type="text/javascript">location.href = "http://cars/edit_articles/all";</script>';
	}

	public function delete_article()
	{
		$this->connect_to_db();
		$id = $_GET['id'];
		mysql_query("DELETE FROM `articles` WHERE id = '$id'");
	}

	public function article_update()
	{
		$this->connect_to_db();
		mysql_query("UPDATE `articles` SET `title`= '".$_POST['title']."',`content`='".$_POST['content']."', `published`='".$_POST['published']."',`visible`='".$_POST['visible']."' WHERE `ID` = ".$_GET['id'].";");
	}

}
?>