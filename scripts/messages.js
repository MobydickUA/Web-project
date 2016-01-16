$(document).ready(function()
{
	function send_message()
	{
		event.preventDefault();
		$.post("/core/messages.php", {text:$("#message_sender").val()}, 
		function(result)
		{
			$("#message_sender").empty();
			result = JSON.parse(result);
			$class_name = "message_";
			if(result[1] != result[5])
				$class_name = "message_get";
			else
				$class_name = "message_sent";

			$('#messages').append('<div id="' + result[0] + '" class="'+$class_name+'""><span class=message_inner>'+ result[4] + " " + result[1] + ": " + result[3] +'</span></div>');
			
		});
	}

	$("#message_button").bind("click",function(event)
	{	
		send_message();
	});

	addEventListener("keyup", function(event){
		if(event.keyCode == 13)
			send_message();
	});


});