<?php 
	session_start();

	require('functions.php');
	require('data.php');
	require('mysql_helper.php');
	require('init.php');

	$cost = $_POST['cost'];
	$lotNumber = $_POST['lot-number'];
	$mylotsData = [];
	$name = 'mylots';
	$expire = strtotime('+30 days');

	if (isset($_COOKIE[$name])) {
		$mylotsData = json_decode($_COOKIE[$name], true);
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($cost)) {
			$betTime = strtotime('now');
			$betData = [
				'cost' => $cost,
				'lot-number' => $lotNumber,
				'time' => $betTime,
				'time-remaining' => $lotTimeRemaining
			];
			$mylotsData[] = $betData;
			setcookie($name, json_encode($mylotsData), $expire);
	}

	$main = renderTemplate('templates/mylots.php', $mylotsData);

	$layoutData = [
	    'title' => 'Ставки',
	    'avatar' => $userAvatar,
	    'main' => $main
	    ];

	print(renderTemplate('templates/layout.php', $layoutData));
?>