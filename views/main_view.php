<script src="scripts/noclick.js1"></script>
<h1  id="title">Articles</h1><p><p><p><p>
<img id="loadImg" src="/static/ajax-loader (1).gif" />
<span class="article" id="article_all">
<ul id="articleList">
<?php
	while($accos = mysql_fetch_assoc($data))
	{
		$text = $accos['content'];
		$title = $accos['title'];
		$id = $accos['id'];
		echo '<li><h3><a class="noclick" id='.$id.' href = "main/article/',$id,'">',$title,'</a></h3></li>';
		echo  '<p>',substr($text,0,500),"...",'</p>';
	}
?>
</ul>
</span>
<div  id="articleDate"> 
</div>
</ul>