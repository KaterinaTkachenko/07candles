<?php
	require_once 'functions/sessions.php';

	function setMessage($text, $type){
		setSession('message', compact('text', 'type'));
	}

	function showMessage(){
		return getSession('message');		
		return $message;
	}

	function issetMessage(){
		return issetSession('message');
	}