<?php
session_start();
class Model_edit_questions extends Model
{
	public function get_data($q)
	{
		$this->connect_to_db();
		$tmp = mysql_query($q);
		return $tmp;
	}

	public function delete_question($id)
	{
		$this->connect_to_db();
		mysql_query("DELETE FROM `questions` WHERE id = '$id'");
	}

	public function edit_question()
	{
		$this->connect_to_db();
		$q = "SELECT `answer`, `text` FROM `questions` WHERE `id` = '$_GET[id]'";
		$tmp = mysql_query($q);
		$accos = mysql_fetch_array($tmp);
		return $accos;
	}

	public function send_answer()
	{
		$this->connect_to_db();
		$q = "UPDATE `questions` SET answer = '$_POST[answer]' WHERE id = '$_GET[id]'";
		mysql_query($q);
	}
}
?>