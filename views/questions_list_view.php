<?php
	$messages_on_page = $data['messages_on_page'];
	$page = $data['page'];
	$total_messages= $data['total_messages'];
	$left_limit = ($page - 1)*$messages_on_page +1;
	$right_limit = $page * $messages_on_page;

	echo '<h3><a href="/messages_list?page='."$page".'&display='."answered".'">Display answered</a>    ';
	echo '<a href="/messages_list?page='."$page".'"">Display all</a></h3><p><p>';
	//var_dump($data);
	//echo $total_messages;
	while($accos = mysql_fetch_assoc($data['list']))
	{
		echo '<div style="  border: solid 1px black; margin-bottom:20px; padding:10px; border-radius:4px;">';
		$text = $accos['text'];
		$email = $accos['email'];
		echo '<h3>',$email,'</h3><h4><p>';
		echo  '<div style="width:50%">'.$text.'</div>';
		if($accos['answer'] != "NULL")
		{
			echo ' <span style="margin-left:30%;"><h3>         Answer:</h3>';
			echo $accos['answer'];
			echo '</h4><p></span>';
		}
		echo '</div>';
	}


	//echo $left_limit , $total_messages;
	if($left_limit < $total_messages)
	{
		for($i = 0; $i<ceil(($total_messages - 1) / $messages_on_page); $i++)
			if($i + 1 != $page)
			{
				if(empty($_GET['display']))
					echo '<a href = "?page=',$i + 1,'">',$i+1 ,' ','</a>';
				else
					echo '<a href = "?page=',$i + 1,'&display="answered">',$i+1 ,' ','</a>';
			}
			else
				echo $i + 1, " ";
	}
	else
		echo "Nothing to show <br>";

?>