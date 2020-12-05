<?php
	
	define("HOST", "localhost");//127.0.0.1
	define("USER", "root");
	define("PSWD", "");
	define("DBNM", "ghiblix2");
	
	function connect(){
		$conn = new mysqli(HOST, USER, PSWD, DBNM);
		if ($conn) {
			return $conn;
		}
		return null;
	}
?>