<?php
session_start();

require_once('functions.php');
require_once('data.php');
require_once('lot-data.php');
require_once('mysql_helper.php');
require_once('init.php');
// шаблонизация 
$indexData = [
    'lot' => $goods,
    'categorie' => $categories,
    'time' => $lotTimeRemaining
];

$indexContent = renderTemplate('templates/index.php', $indexData);

$layoutData = [
    'title' => 'Главная',
    'avatar' => $userAvatar,
    'main' => $indexContent
];

print(renderTemplate('templates/layout.php', $layoutData));
?>
