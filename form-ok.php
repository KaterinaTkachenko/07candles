<?php
	require_once 'functions/main.php';
	require_once 'functions/messages.php';
	require_once 'functions/sessions.php';
	
	if (isset($_POST['name']))
		$name = htmlspecialchars( trim($_POST['name']) );	
	else
		$name = null;

	if (isset($_POST['phone']))
		$phone = htmlspecialchars( trim($_POST['phone']) );	
	else
		$phone = null;

	if (isset($_POST['message']))
		$message = htmlspecialchars( trim($_POST['message']) );	
	else
		$message = null;
    
    // https://api.telegram.org/bot1468780566:AAEsBNknmcwX-8dnxW091AP456y12paZy3o/getUpdates
	if($phone){	
		// if(preg_match("/^+38\([0][1-9]{2}\)\s[0-9]{3}-[0-9]{2}-[0-9]{2}$/", $phone)) {
			$token = "1468780566:AAEsBNknmcwX-8dnxW091AP456y12paZy3o";
			$chat_id = "-1001445504507";
			$arr = array(
				'Имя пользователя: ' => $name,
				'Телефон: ' => $phone,
				'Сообщение: ' => $message,
			);
			$txt="";
			foreach($arr as $key => $value){
				$txt .= "<b>".$key."</b>".$value."%0A";
			}

			$sendToTelegram = fopen("https://api.telegram.org/bot1468780566:AAEsBNknmcwX-8dnxW091AP456y12paZy3o/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}", "r");

			if($sendToTelegram){
				setSession("mailSend", "ok");
				//return redirect()->route('formok')->with('success', 'Благодарим за сообщение! Администратор свяжется с Вами в ближайшее время.');
			}
			else{
				setSession("mailSend", "error");	
				//return redirect()->route('contacts')->withErrors(['error' => 'При отправке уведомления возникла ошибка. Попробуйте позже или свяжитесь с нами по Viber:+38 050 606 25 59'])->withInput();
			} 
			redirect('form-ok.php'); 
		
	  		// $to = 'stopychevatanya@gmail.com';
			// $subject = 'Запись на сайте Brokgroup';
			// $message = "<p><strong>Имя: </strong>$name</p><p><strong>Телефон: </strong>$phone</p>";
			// $headers  = 'MIME-Version: 1.0' . "\r\n";
			// $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";			

			// if (mail($to, $subject, $message, $headers))			
			// 	setSession("mailSend", "ok");
			// else
			// 	setSession("mailSend", "error");				
			// redirect('form-ok.php');	
		// }
		// else{
		// 	setMessage('Неверный формат ввода номера телефона.<br>Попробуйте еще раз', 'danger');
		// 	redirect('/index.php');			
		// }
    }
?>
<!doctype html>
<html lang="en">
  <head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
	<link rel="shortcut icon" href="favicon.ico" type="image/png">

	<link href="fonts/OpenSans/OpenSans-Regular.ttf" rel="stylesheet">
	<link href="fonts/Optima/Optima-Bold.ttf" rel="stylesheet">

	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<link rel="stylesheet" href="css/all.min.css" >
	
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

    <title></title>
    <meta name="description" content="">
	<meta name="keywords" content="">
  </head>
  <body>
		<div class="container-fluid" id="formok">
			<div class="row">
				<div class="col-lg-12">	
						<?php
							if(isset($_SESSION["mailSend"])) {
								$result = getSession("mailSend"); 
								if ($result=="ok") {						
									$title = "Ваше сообщение отправлено!";
									$desc = "Благодарим! Ваши данные успешно отправлены. С Вами свяжется менеджер и уточнит все детали!";							
								}							
								else{
									$title = "Возникла ошибка!";
									$desc = "Пожалуйста, вернитесь на предыдущую страницу и заполните форму.";
								}
								removeSession("mailSend");
							}
							else{
								$title = "Возникла ошибка!";
								$desc = "Пожалуйста, вернитесь на предыдущую страницу и заполните форму.";
							}
						?>
						<a class="" href="/">
							<div class="logo">Massage Candel</div>
							<div class="logo_desc" style="text-align:center">Hand made</div>
						</a>
						<div>
							<p class="title" style="margin-top: 30px"><?=$title?></p>
							<p class="desc" style="margin-bottom: 40px;"><?=$desc?></p>
							<p><a href="/" class="mainBtn">На главную</a></p>
						</div>						
				</div>
			</div>
		</div>	
	</body>
</html>