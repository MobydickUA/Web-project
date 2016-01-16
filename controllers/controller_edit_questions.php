<?php 
session_start();

class Controller_edit_questions extends Controller
{
	function __construct()
	{
		$this->model = new Model_edit_questions();
		$this->view = new View();
	}

	function action_delete()
	{	
		//include_once("views/header.php");
		$this->set_header();
		if($_SESSION['user'] == md5('admin'))
		{
			$id = $_GET['id'];
			$this->model->delete_question($id);
			include_once("views/success_view.php");
		}
		else
			include_once("views/permision_denied_view.php");
		//include_once("views/footer.php");
		$this->set_footer();
	}

	function action_edit()
	{	
		$this->set_header();
		//include_once("views/header.php");
		$data = $this->model->edit_question();
		if(!empty($_POST))
		{
			$this->model->send_answer();
			include_once("views/success_view.php");
		}
		else
			include_once("views/question_answer_view.php");

		//include_once("views/footer.php");
		$this->set_footer();
		
	}

	function action_all()
	{	
		$this->set_header();
		//include_once("views/header.php");
		if($_SESSION['user'] == md5('admin'))
		{
			if($_POST['action'] == "Delete all")
			{	
				$max = max(array_keys($_POST['list_to_do']));
				for($i = 0; $i <= $max; $i++)
					if ($_POST['list_to_do'][$i] == "on") 
						$data = $this->model->delete_question($q);
			}

			if(!empty($_GET))
			{
				if(!empty($_GET['field']) && !empty($_GET['order']))
				{	
					$fields = array('1' => "nick",'2' => "email",'3' => "date_of_pub");
					if($_GET['field'] > 3 || $_GET['field'] < 1)
						$_GET['field'] = 1;
					if($_GET['order'] != 'ASC' && $_GET['order'] != 'DESC')
						$_GET['order'] = 'ASC';
					$q = 'SELECT * FROM questions ORDER BY '.$fields[$_GET[field]].' '.$_GET[order];
					$data = $this->model->get_data($q);
					include_once("views/questions_layout_view.php");
				}
			}
			else
			{
				$q = 'SELECT * FROM questions';
				$data = $this->model->get_data($q);
				include_once("views/questions_layout_view.php");
			}
		}
		$this->set_footer();
		//include_once("views/footer.php");
	}
}
?>