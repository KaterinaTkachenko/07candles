<?php 
	function setSession($name, $value){
		$_SESSION[$name] = $value;
	}

	function getSession($name){
		return issetSession($name) ? $_SESSION[$name] : null;
	}

	function issetSession($name){
		return isset($_SESSION[$name]);
	}

	function removeSession($name){
		unset($_SESSION[$name]);
	}

	function removeSessionAll(){
		unset($_SESSION);
	}