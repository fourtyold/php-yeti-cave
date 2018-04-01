<?php
session_start();

require('functions.php');
require('lot-data.php');
require('data.php');

// ставки пользователей, которыми надо заполнить таблицу
$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];

if (isset($_GET['lot']) && $_GET['lot'] >= 0 && $_GET['lot'] < count($goods))   {
    $lotNumber = $_GET['lot'];
} else {
    http_response_code(404);
    die('Error 404. Object not found!');
}

foreach ($bets as $key => $val) {
    $bets[$key]['timeleft'] = getBetTime($val['ts']);
}


$lotData = [
    'lots' => $goods,
    'lot-number' => $lotNumber,
    'time-remaining' => $lotTimeRemaining,
    'bets' => $bets
];

$main = renderTemplate('templates/lot.php', $lotData);

$layoutData = [
    'title' => 'Добавление лота',
    'avatar' => $userAvatar,
    'main' => $main
    ];

print(renderTemplate('templates/layout.php', $layoutData));
?>

