<?php 
include_once("models/model_registration.php");
session_start();

class Controller_sign_in extends Controller
{
	public $model;
	public $model_registration;
	public $view;

	function __construct()
	{
		$this->model = new Model_sign_in();
		$this->model_registration = new Model_registration();
		$this->view = new View();
	}

	function action_index()
	{	
		//include_once("views/header.php");
		$this->set_header();
		if(empty($_POST)) 
			include_once("views/sign_in_form_view.php");
		elseif($this->model->form_is_valid())
			$this->model->get_and_validate_password();
		else
			include_once("views/sign_in_error_view.php");

		$this->set_footer();
		//include_once("views/footer.php");
	}

	function action_registration()
	{
		$this->set_header();
		//include_once("views/header.php");
		if(empty($_POST)) 
			include_once("views/registration_form_view.php");
		else
		{
			$err = $this->model_registration->form_is_valid();
			if(empty($err))
			{
				$this->model_registration->add_user_to_db();
				$this->action_check();
			}
			include_once("views/registration_error_view.php");
			include_once("views/registration_form_view.php");
		}
		$this->set_footer();
		//include_once("views/footer.php");
	}

	function action_success()
	{
		$this->set_header();
		include_once("views/success_view.php");
		$this->set_footer();
		//$this->view->generate('success_view.php', 'template_view.php', NULL);
	}

	function action_check()
	{
		$data = $this->model->get_and_validate_password();
		if(empty($data['password_db']))
		{
			include_once("views/header.php");
			include_once("views/sign_in_missing_password_view.php");
			include_once("views/sign_in_error_view.php");
			include_once("views/footer.php");
			return false;
		}
		
		if($data['password_db'] != $data['password'])
		{
			include_once("views/header.php");
			echo '<h3>Wrong Password! Try again</h3>';
			include_once("views/sign_in_error_view.php");
			include_once("views/footer.php");
			return false;
		}

		$_SESSION['name'] = $data['username'];
		$_SESSION['user'] = md5($data['user']);
		$_SESSION['email'] = $data['email'];
		$_SESSION['theme_id'] = $data['theme_id'];

		echo '<script type="text/javascript">location.href = "success/";</script>';
	}
}
?>