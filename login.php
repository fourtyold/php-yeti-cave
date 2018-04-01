<?php
	session_start(); 
	require('functions.php');
	require('data.php');
	require('userdata.php');

	$email = $_POST['email'] ?? '';
	$password = $_POST['password'] ?? '';

	$required = ['email', 'password'];
	$fieldsInvalid = [];

	$loginData = [
		'email' => $email,
		'password' => $password,
		'fields-invalid' => &$fieldsInvalid
	];

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		foreach ($_POST as $key => $value) {
			if (in_array($key, $required) && $value == '') {
				$fieldsInvalid[] = $key;
			}
		}
		if (!count($fieldsInvalid)) {
			if ($user = searchUserByEmail($email, $users)) {
				if (password_verify($password, $user['password'])) {
					$_SESSION['user'] = $user;
					header('Location: /index.php');
				} else {
					$fieldsInvalid[] = 'password';
					$fieldsInvalid[] = 'incorrect-password';
				}
			} else {
				$fieldsInvalid[] = 'email';
				$fieldsInvalid[] = 'unknown-user';
			}
		}
	}

	$main = renderTemplate('templates/login.php', $loginData);

	$layoutData = [
	    'title' => 'Вход',
	    'avatar' => $userAvatar,
	    'main' => $main
	]; 

	print(renderTemplate('templates/layout.php', $layoutData));
?>