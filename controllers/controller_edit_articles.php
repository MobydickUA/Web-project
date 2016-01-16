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
		$this->action_all();
	}

	function action_all()
	{	
		$this->set_header();
		//include_once("views/header.php");
		if($_SESSION['user'] == md5('admin'))
		{
			if(!empty($_POST['visibility']))
			{
				$this->model->post_article();
				$data = $this->model->get_data();
				include_once("views/edit_article_layout_view.php");
			}
			elseif(!empty($_POST['publish']))
			{
				$this->model->publish_one_article();
				$data = $this->model->get_data();
				include_once("views/edit_article_layout_view.php");
			}
			elseif(!empty($_POST['action']))
			{
				$data = $this->model->get_data();
				switch($_POST['action'])
				{
					case "Publish all":
					{
						$max = max(array_keys($_POST['list_to_do']));
						for($i = 0; $i <= $max; $i++)
							if ($_POST['list_to_do'][$i] == "on") 
								$this->model->publish_all($i);
						break;
					}
						case "Unpublish all":
					{
						$max = max(array_keys($_POST['list_to_do']));
						for($i = 0; $i <= $max; $i++)
							if ($_POST['list_to_do'][$i] == "on") 
								$this->model->unpublish_all($i);
						break;
					}
						case "Delete all":
					{
						$max = max(array_keys($_POST['list_to_do']));
						for($i = 0; $i <= $max; $i++)
							if ($_POST['list_to_do'][$i] == "on") 
								$this->model->delete_all($i);
					break;
					}
				}
			}

			if($_GET['id'] != NULL)
			{
				$data = $this->model->get_data();
				$data = mysql_fetch_assoc($data);
				include_once("views/edit_article_view.php");
					if(!empty($_POST))
					{
						$this->model->article_update();
						echo '<script type="text/javascript">location.href = "http://cars/edit_articles/all";</script>';
					}
			}

			$data = $this->model->get_data();
			include_once("views/edit_article_layout_view.php");
		}
		else
			include_once("views/permision_denied_view.php");

		$this->set_footer();
		//include_once("views/footer.php");
	}

	function action_add_article()
	{
		$this->set_header();
		//include_once("views/header.php");
		include_once("views/add_article_view.php");
		if(!empty($_POST))
			$this->model->add_article();
		//include_once("views/footer.php");
		$this->set_footer();
	}

	function action_delete()
	{
		$this->set_header();
		//include_once("views/header.php");
		if($_SESSION['user'] == md5('admin'))
			$this->model->delete_article();
		$data = $this->model->get_data();
		include_once("views/edit_article_layout_view.php");
		//include_once("views/footer.php");
		$this->set_footer();
	}
}
?>