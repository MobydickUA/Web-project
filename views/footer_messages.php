<?php 
	session_start();
?>
			</div>
			<?php
			if(!empty($_SESSION))
			{
				if($_SESSION['user'] == md5('admin'))
				echo '<div id="sidebar">
				<h2>Navigation</h2>
				<ul class="style1">
					<li><a href="/edit_questions/all">Edit questions</a></li>
					<li><a href="/edit_articles/all">Edit articles</a></li>
					<li><a href="http://cars/profile/messages/all">My messages</a></li>
									</ul>
			</div>';
		}
			?>
			
		</div>
	</div>
</div>