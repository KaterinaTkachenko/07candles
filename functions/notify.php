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
    
    // https://api.telegram.org/bot1468780566:AAEsBNknmcwX-8dnxW091AP456y12paZy3o/getUpdates
	if($phone){	
		if(preg_match("/^38\([0][1-9]{2}\)\s[0-9]{3}-[0-9]{2}-[0-9]{2}$/", $phone)) {
			$token = "1468780566:AAEsBNknmcwX-8dnxW091AP456y12paZy3o";
			$chat_id = "-409658462";
			$arr = array(
				'Имя пользователя: ' => $request->name,
				'Телефон: ' => $request->phone,
				'Сообщение: ' => $request->message,
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
		}
		else{
			setMessage('Неверный формат ввода номера телефона.<br>Попробуйте еще раз', 'danger');
			redirect('/index.php');			
		}
    }