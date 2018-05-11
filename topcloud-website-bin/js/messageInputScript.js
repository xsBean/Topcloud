$(document).ready(function(){
	$("#userToSendMessage").keyup(function(){
		//Use the suggestUser.php to populate available users
		$.get("suggestUser.php", {inputUsers: $(this).val()}, function(data){
			$("datalist").empty();
			$("datalist").html(data);
		});
	});
});