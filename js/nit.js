$(document).ready(function() {

	$("#car").submit(function() {
		$.ajax({
			type: "POST",
			url: "../logic/add_car.php",
			data: $(this).serialize()
		}).done(function() {
			$(this).find("input").val("");
			alert("Спасибо за заявку! Скоро мы с вами свяжемся.");
			$("#car").trigger("reset");
		});
		return false;
	});
	
});