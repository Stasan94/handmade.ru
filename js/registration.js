function registration(){
	// Процесс регистрации пользователя
	var rlogin = $('#rlogin').val();
	var remail = $('#remail').val();
	var rpassword = $('#rpassword').val();
	var rpasswordRepeat = $('#rpassword_repeat').val();

	var out = '';

	if (rlogin != '' && remail != '' && rpassword != '' && rpasswordRepeat != '' &&
		rlogin.length >= 5 && rlogin.length <= 20 &&
		rpassword.length >= 5)
	{
		if (rpassword == rpasswordRepeat)
		{
			$.post(
				"admin/core.php",
				{
					"action" : "registration",
					"rlogin" : rlogin,
					"remail" : remail,
					"rpassword" : rpassword,
					"rpasswordRepeat" : rpasswordRepeat
				},
				function(data){
					console.log(data);
					switch (data)
					{
						case 'same_login':
						out = '<p>Пользователь с таким логином уже зарегистрирован!</p>';
						$('.reg_message').toggleClass('reg_error')
						break;

						case 'same_email':
						out = '<p>Пользователь с таким почтовым ящиком уже зарегистрирован!</p>';
						$('.reg_message').toggleClass('reg_error')
						break;

						case 'success':
						out = '<p>Поздравляем с успешной регистрацией!<br>Вам на почту отправлено письмо<br>.Для подтверждения регистрации перейдите по ссылке, указанной в письме.</p>';
						$('.reg_message').toggleClass('reg_success');
						$('#rlogin').val('');
						$('#remail').val('');
						$('#rpassword').val('');
						$('#rpassword_repeat').val('');
						break;
					}
					$('.reg_message').html(out);
				}
				);
		}
		else
		{
			out = '<p>Введенные пароли не совпадают!</p>';
			$('.reg_message').toggleClass('reg_error').html(out);
		}	
	}
}

$(document).ready(function(){
	$('#reg_button').click(registration);
});