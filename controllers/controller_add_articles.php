<?php 
session_start();
class Controller_edit_articles extends Controller
{
	function __construct()
	{
		$this->model = new Model_edit_articles();
		$this->view = new View();
	}

	function action_index()
	{	
		$data = $this->model->get_data();
		$this->set_header();	
		include_once("views/main_view.php");
		//$this->view->generate('main_view.php', 'template_view.php', $data);
		$this->set_footer();
	}

	function action_all()
	{	
		$data = $this->model->get_data();	
		$this->set_header();
		include_once("views/edit_articles_view.php");
		//$this->view->generate('edit_articles_view.php', 'template_view.php', $data);
		$this->set_footer();
	}

	
}
?>