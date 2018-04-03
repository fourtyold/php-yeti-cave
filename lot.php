<?php
session_start();

require('functions.php');
require('lot-data.php');
require('data.php');

$hideBetForm = false;
$name = 'mylots';
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

if (isset($_COOKIE[$name])) {
    $mylotsData = json_decode($_COOKIE[$name], true);
    foreach ($mylotsData as $key => $value) {
        if ($value['lot-number'] == $lotNumber) {
            $hideBetForm = true;
            break;
        }
    }
}

$lotData = [
    'lots' => $goods,
    'lot-number' => $lotNumber,
    'time-remaining' => $lotTimeRemaining,
    'bets' => $bets,
    'bet-form' => $hideBetForm
];

$main = renderTemplate('templates/lot.php', $lotData);

$layoutData = [
    'title' => 'Добавление лота',
    'avatar' => $userAvatar,
    'main' => $main
    ];

print(renderTemplate('templates/layout.php', $layoutData));
?>

