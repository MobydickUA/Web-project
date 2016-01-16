<?php

class Model_polls extends Model
{
	public function get_data()
	{

	}

	public function get_poll_list()
	{
		$this->connect_to_db();
		$q = "select id, name from polls";
		$data = mysql_query($q);
		return $data;
	}

	public function get_poll($id)
	{
		$this->connect_to_db();
		$q = "select * from polls where id=".$id;
		$tmp = mysql_query($q);
		$assoc = mysql_fetch_assoc($tmp);
		return $assoc;
	}

	public function set_new_value($id,$value)
	{
		$this->connect_to_db();
		$q = "UPDATE `polls` SET `item".$value."_value`= `item".$value."_value` + 1 where `id`=".$id.";";
		mysql_query($q);
	}

	public function create_poll()
	{
		$this->connect_to_db();
		$q = "INSERT INTO `polls`( `name`, `item1`, `item2`, `item3`) VALUES ('".$_POST['name']."','".$_POST['item1']."','".$_POST['item2']."','".$_POST['item3']."');";
		mysql_query($q);
	}
}
?>