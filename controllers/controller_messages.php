<?php
session_start();

class Controller_messages extends Controller
 {
	public $model;
	public $view;
	function __construct()
	{
		$this->model = new Model_messages();
		$this->view = new View();
	}
	
	function action_index()
	{
		$_SESSION['achiever'] = $_GET['user'];
		$data = $this->model->get_data();
		if(!empty($_POST['text']))
			$this->model->send_message();
		$this->set_header();
		//include_once("views/header.php");
		include_once("views/messages_view.php");
		//include_once("views/footer_messages.php");
		$this->set_footer();
	}
}
?>