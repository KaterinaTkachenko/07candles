<?php
	session_start();
	
	function redirect($path){
		header('Location: ' . $path);
		die(); //тут можно написать сообщение
	}

	function dump($obj){
		echo '<pre>' . print_r($obj, true) . '</pre>';
	}