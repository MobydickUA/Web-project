<?php 
session_start();
class Controller_log_out extends Controller
{
	function __construct()
	{
	}

	function action_index()
	{	
		session_unset();
		echo '<script type="text/javascript">location.href = "/main";</script>';
	}
}
?>