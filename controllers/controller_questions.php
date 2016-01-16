<?php
session_start();

class Controller_questions extends Controller
 {
	public $model;
	public $view;
	function __construct()
	{
		$this->model = new Model_questions();
		$this->view = new View();
	}
	
	function action_index()
	{
		//include_once("views/header.php");
		$this->set_header();
		if(empty($_POST))
			include_once("views/questions_view.php");
		elseif(!$this->model->form_is_valid())
			include_once("views/questions_error_view.php");
		else
		{
			$this->model->send_message();
			include_once("views/success_view.php");
		}
		$this->set_footer();
		//include_once("views/footer.php");
	}
}
?>