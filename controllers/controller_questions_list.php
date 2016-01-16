<?php 
session_start();
class Controller_questions_list extends Controller 
{
	function __construct()
	{
		$this->model = new Model_questions_list();
		$this->view = new View();
	}

	function action_index()
	{	
		//$data = $this->model->get_data();		
		//$this->view->generate('messages_list_view.php', 'template_view.php', $data);
	}

	function action_view()
	{
		$data = $this->model->get_data();		
		$this->set_header();
		include_once("views/questions_list_view.php");
		//$this->view->generate('questions_list_view.php', 'template_view.php', $data);		
		$this->set_footer();
	}
}
?>