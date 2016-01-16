<?php 
session_start();

class Controller_Profile extends Controller
{
	function __construct($parameters)
	{
		$this->model = new Model_profile();
		$this->view = new View();
	}

	function action_edit()
	{	
		$this->set_header();
		//include_once("views/header.php");
		$routes = explode('/', $_SERVER['REQUEST_URI']);
		$data = $this->model->get_data($routes[3]);
		if(!empty($_SESSION['name']))
		{
			if(!empty($_POST))
			{
				$uploaddir = "Z:\home\cars\www\static\userpic\\";
				if(is_uploaded_file($_FILES["userpic"]["tmp_name"]))
				{
					move_uploaded_file($_FILES['userpic']['tmp_name'], $uploaddir.$_SESSION['name'].".png");
					$this->model->update_picture();
				}

				$this->model->update_profile_data();
				include_once("views/success_profile_change_view.php");

			}			
			elseif($routes[3] == $_SESSION['name'])
				include_once("views/edit_profile_view.php");
		}
		else
			include_once("views/permision_denied_view.php");
		//include_once("views/footer.php");
		$this->set_footer();
	}

	function action_user()
	{	
		$routes = explode('/', $_SERVER['REQUEST_URI']);
		$data = $this->model->get_data($routes[3]);
		//include_once("views/header.php");
		$this->set_header();
		if($routes[3] == $_SESSION['name'] || $routes[3] == "me")
			include_once("views/profile_view.php");
		else
			include_once("views/guest_profile_view.php");
		//include_once("views/footer.php");
		$this->set_footer();
	}

	function action_edit_privacy()
	{	
		$this->set_header();
		//include_once("views/header.php");
		if(!empty($_SESSION['name']))
		{
			if(empty($_POST))
				include_once("views/edit_privacy_view.php");
			else
			{
				include_once("views/success_profile_change_view.php");
				$this->model->update_privacy();

			}
		}
		else
			include_once("views/permision_denied_view.php");
		$this->set_footer();
		//include_once("views/footer.php");
	}

	function action_change_password()
	{	
		$this->set_header();
		//include_once("views/header.php");
		if(!empty($_SESSION['name']))
		{
			if(empty($_POST))
				include_once("views/change_password_view.php");
			else
			{
				if(!empty($_POST['password']) && !empty($_POST['repeat_password']))
				{
					if($_POST['password'] == $_POST['repeat_password'])	
					{
						$this->model->update_password();
						include_once("views/success_password_change_view.php");
					}
					else
						include_once("views/error_password_change_view.php");
				}
				else
					include_once("views/empty_password_view.php");
			}
		}
		else
			include_once("views/permision_denied_view.php");
		//include_once("views/footer.php");
		$this->set_footer();
	}


	function action_messages()
	{
		$this->set_header();
		//include_once("views/header.php");
		$list = $this->model->get_dialog_list();
		include_once("views/dialog_view.php");
		$this->set_footer();
		//include_once("views/footer.php");
	}
}
?>