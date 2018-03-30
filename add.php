<?php 
	require('functions.php');
	require('data.php');

	$lotName = $_POST['lot-name'] ?? '';
	$message = $_POST['message'] ?? '';
	$lotRate = $_POST['lot-rate'] ?? '';
	$lotStep = $_POST['lot-step'] ?? '';
	$lotDate = $_POST['lot-date'] ?? '';

	$required = ['lot-name', 'message', 'lot-rate', 'lot-step', 'lot-date'];
	$numbersOnly = ['lot-rate', 'lot-step'];
	$fieldsInvalid = [];

	$lotData = [
		'lot-name' => $lotName,
		'message' => $message,
		'lot-rate' => $lotRate,
		'lot-step' => $lotStep,
		'lot-date' => $lotDate,
		'invalid-fields' => &$fieldsInvalid,
		'form-sent' => false
	];

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if ($_POST['category'] == 'Выберите категорию') {
			$fieldsInvalid[] = 'category';
		}
		foreach ($_POST as $key => $value) {
			if (in_array($key, $required) && $value == '') {
				$fieldsInvalid[] = $key;
			}
			if (in_array($key, $numbersOnly) && !in_array($key, $fieldsInvalid) && !is_numeric($value)) {
				$fieldsInvalid[] = $key;
			}
		}
		if (!count($fieldsInvalid)) {
			if (isset($_FILES['lot-picture'])) {
				move_uploaded_file($_FILES['lot-picture']['tmp_name'], 'img/'.$_FILES['lot-picture']['name']);
			}
			$lotData['form-sent'] = true;
		} 
	} 

	$main = renderTemplate('templates/add.php', $lotData);

	$layoutData = [
    'title' => 'Добавление лота',
    'user' => $userName,
    'avatar' => $userAvatar,
    'main' => $main
	];

	print(renderTemplate('templates/layout.php', $layoutData));

?>