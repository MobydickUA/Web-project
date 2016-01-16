<?php 	header("Content-Type: text/html; charset=utf-8"); ?>
<head>
	<title>Electrocars</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css' />
	<link href='http://fonts.googleapis.com/css?family=Abel|Satisfy' rel='stylesheet' type='text/css' />

	<link rel="stylesheet" type="text/css" href="/static/style<?php echo $data;?>.css" />
	
	<script src="www/scripts/nockick.js"></script>
	<script src="scripts/jquery.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js1"></script>

</head>
<body>
	<div id="header_big">
		<div id="header">
			<div id="logo">
				<h1><a href="#">Electrocars</a></h1>
			</div>

			<div id="menu">
				<ul>
					<li class="current_page_item"><a href="/main" accesskey="1" title="">Homepage</a></li>
					<li><a href="/questions" accesskey="2" title="">Leave question</a></li>
					<li><a href="/questions_list/view/" accesskey="3" title="">News</a></li>
					<?php
						if($_SESSION['user'] == md5("admin") || $_SESSION['user'] == md5("user"))
						{
							echo '<li><h3><a href = "http://cars/polls/list/all">Polls</a></h3></li>';
							echo '<li><h3><a href = "http://cars/edit_articles/add_article">Add article</a></h3></li>';
							echo '<li><h3><a href = "http://cars/profile/user/me">Profile</a></h3></li>';
							echo '<li><a href="/log_out" accesskey="5" title="">Log Out</a></li>';
						}
					else
						echo '<li><a href="/sign_in" accesskey="5" title="">Sign In</a></li>';
					?>
					
				</ul>
			</div>
			<?php
			if(!empty($_SESSION))
				echo '<div class="name"><h3 class="inner_name">Hello, '.$_SESSION['name'].'</h3></div>';
			?>
		</div>
	</div>
	<div id="wrapper">
		<div id="page-wrapper">
			<div id="page">
				<div id="content">