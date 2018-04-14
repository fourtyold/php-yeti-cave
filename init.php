<?php
	require_once('functions.php');
	
	@$con = mysqli_connect('localhost', 'root', '', 'yeticave');
	if (!$con) {
		$errorData = [
			'error' => mysqli_connect_error()
		];
		print(renderTemplate('templates/error.php', $errorData));
		exit();
	} 
?>