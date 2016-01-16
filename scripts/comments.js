$(document).ready(function()
{
	$("#comment_sender").bind("click",function(event)
	{	
		event.preventDefault();
		$.post("/core/comments.php", {text:$("#comment_text").val()}, 
		function(result){
			result = JSON.parse(result);
			$('#comments').append('<div id="' + result[0] + '" class="'+$class_name+'""><span class=message_inner>'+ result[4] + " " + result[1] + ": " + result[3] +'</span></div>');
			$("#comment_text").html("");
		});
	});
});