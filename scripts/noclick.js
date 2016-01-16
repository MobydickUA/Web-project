$(document).ready(function()
	{

		function startLoadingAnimation() // - функция запуска анимации
		{
		  // найдем элемент с изображением загрузки и уберем невидимость:
		  var imgObj = $("#loadImg");
		  imgObj.show();
		  $("#title").html("Loading...");
		  $("#articleList").html("");
		 
		  // вычислим в какие координаты нужно поместить изображение загрузки,
		  // чтобы оно оказалось в серидине страницы:
		  //var centerY = $(window).scrollTop() + ($(window).height() + imgObj.height())/2;
		  //var centerX = $(window).scrollLeft() + ($(window).width() + imgObj.width())/2;
		 
		  // поменяем координаты изображения на нужные:
		  //imgObj.offset(top:centerY, left:centerX);
		}
		 
		function stopLoadingAnimation() // - функция останавливающая анимацию
		{
		  $("#loadImg").hide();
		}

		$(".noclick").bind("click",function(event)
		{	
			event.preventDefault();
			startLoadingAnimation();
			//alert($(this).val());
			//alert($(this).attr('id'));
			$.post("/core/page.php", {id:$(this).attr('id')}, 
    			function(result){
    				stopLoadingAnimation();
    				result = JSON.parse(result);
         			$("#title").html(result[0]);
					$("#articleList").html("");
					$("#article_all").html(result[1]);
					$("#articleDate").html("Date of publication : " + result[2]);
         		});
			/*$.ajax({
				dataType: "json",
				url: "/core/page.php",
				method: "post",
				data: {id:2},
				success: function(result) {
					$("#title").html(result[0]);
					$("#articleList").html("");
					$("#article_all").html(result[1]);
					$("#articleDate").html("Date of publication : " + result[2]);
				},
				error: function(jqXHR,textStatus,errorThrown) {
					console.log(textStatus);
				}
			});
*/
		});
	});