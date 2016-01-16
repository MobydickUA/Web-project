<?php 
session_start();

class Controller_Main extends Controller
{
	private $page;
	function __construct($parameters)
	{
		$this->model = new Model_main();
		$this->view = new View();
		if(!empty($parameters))
			$page = $parameters;

	}

	function action_index()
	{	
		//$data = $this->model->get_data();		
		//$this->view->generate('main_view.php', 'template_view.php', $data);
		$data = $this->model->get_data();		
		$this->set_header();
		include_once("views/main_view.php");
		$this->set_footer();
	}

	function action_articles()
	{	
		$data = $this->model->get_data();		
		$this->set_header();
		include_once("views/main_view.php");
		$this->set_footer();
		//$this->view->generate('main_view.php', 'template_view.php', $data);
	}

	function action_article()
	{	

		$routes = explode('/', $_SERVER['REQUEST_URI']);
		if(isset($_POST['comment_text']))
		{
			$_POST['article_id'] = $routes[3];
			$this->model->send_comment();
		}
		$data = $this->model->get_article($routes[3]);
		$this->set_header();
		//include_once("views/header.php");
		include_once("views/article_view.php");
		$data = $this->model->get_comments($routes[3]);
		if(empty($data))
			include_once("views/comments_empty_view.php");
		else
			include_once("views/comments_view.php");
		if($_SESSION['user'] == md5("user") || $_SESSION['user'] == md5("admin"))
			include_once("views/comments_form_view.php");
		else
		{
			include_once("views/comments_access_denied.php");
			include_once("views/comments_view.php");
		}
		include_once("views/footer.php");
		
		//$this->view->generate('article_view.php', 'template_view.php', $data);
	}

	function action_rss()
	{	
		$data = $this->model->get_data();
		$this->view->generate('rss.php', 'template_view.php', $data);
		//$this->view->generate('article_view.php', 'template_view.php', $data);
	}
}
?>