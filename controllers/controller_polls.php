<?php 
session_start();

class Controller_polls extends Controller
{
	public $model;
	public $view;

	function __construct()
	{
		$this->model = new Model_polls();
		$this->view = new View();
	}

	function action_list()
	{	
		$this->set_header();
		//include_once("views/header.php");
		$data = $this->model->get_poll_list();
		include_once("views/polls_view.php");
		//include_once("views/footer.php");
		$this->set_footer();
	}

	function action_index()
	{
		$this->set_header();
		//include_once("views/header.php");
		if(isset($_POST['item1']) || isset($_POST['item2']) || isset($_POST['item3']))
		{
			$item = $this->get_selected_index();
			$id = $_GET['id'];
			$this->model->set_new_value($id,$item);
			$data = $this->model->get_poll($_GET['id']);
			include_once("views/poll_statistics_view.php");
		}
		elseif(isset($_GET['id']))
		{
			$data = $this->model->get_poll($_GET['id']);
			include_once("views/poll_view.php");
		}
		else
			include_once("views/permision_denied_view.php");
		$this->set_footer();
		//include_once("views/footer.php");
	}

	function get_selected_index()
	{
		if(isset($_POST['item1']))
			return 1;
		if(isset($_POST['item2']))
			return 2;
		if(isset($_POST['item3']))
			return 3;
	}

	function action_add()
	{
		$this->set_header();
		//include_once("views/header.php");
		if(!empty($_POST))
		{
			$this->model->create_poll();
		}
		else
			include_once("views/poll_create_view.php");
		//include_once("views/footer.php");
		$this->set_footer();
	}
}
?>