<?php
session_start();
class Model_questions_list extends Model
{
	public function get_data()
	{
		$this->connect_to_db();

		$num = 3;
		if(!empty($_GET))
				$page = $_GET['page'];
		else
			$page = 1;
			
		$questions_on_page = $num;
		$left_limit = ($page - 1)*$questions_on_page +1;
		$right_limit = $page * $questions_on_page;
		if(empty($_GET['display']))
		{
			$tmp = mysql_query("SELECT COUNT(*) FROM questions");
			//echo $_GET['display'];
		}
		else
			$tmp = mysql_query('SELECT COUNT(*) FROM questions WHERE answer != "NULL"');
		$arr = mysql_fetch_array($tmp);
		$total_questions = $arr[0];
		//echo $left_limit, $right_limit;
		if($left_limit < $total_questions)
		{
			//echo $left_limit, $right_limit;
			if(empty($_GET['display']))
				$q = "SELECT * FROM questions WHERE id BETWEEN $left_limit AND $right_limit ";
			else
				$q = "SELECT * FROM questions WHERE answer != 'NULL' AND id BETWEEN $left_limit AND $right_limit";
			$tmp = mysql_query($q);

			$data = array(
				'list' => $tmp,
				'page' => $page,
				'total_questions' => $total_questions,
				'questions_on_page' => $questions_on_page,
			);
			return $data;
		}
	}
}
?>