function logIn(){
	// Процесс авторизации пользователя
	var llogin = $('#llogin').val();
	var lpassword = $('#lpassword').val();

	$.post(
		"admin/core.php",
		{
			"action" : "logIn",
			"llogin" : llogin,
			"lpassword" : lpassword
		},
		function(data)
		{
			data = JSON.parse(data);
			if (data != "0")
			{
				document.cookie = "user=" + data['login'] + "";
				showUserName();	
			}
			console.log(data);
		}
		);
}

function logOut(){
	// document.cookie('user');
	document.cookie = "user=" + null + "";
	// showUserName();
}

$(document).ready(function(){
	$('#login_button').click(logIn);
	$('#log_out').click(logOut);
});