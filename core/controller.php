<?php
class Controller {
	
	public $model;
	public $view;
	
	function __construct($parameters = NULL)
	{
		$this->view = new View();
	}
	
	function action_index()
	{

	}

	public function set_header()
	{
		if(!empty($_GET['color']))
			model::change_theme_id($_GET['color']);
		$data = model::get_theme_id();
		include_once("views/header.php");
	}

	public function set_footer()
	{
		$tmp = explode('?', $_SERVER['REQUEST_URI']);
		$routes = explode('/', $tmp[0]);
		if($routes[1] == "messages")
			include_once("views/footer_messages.php");
		else
		include_once("views/footer.php");
	}
}
?>