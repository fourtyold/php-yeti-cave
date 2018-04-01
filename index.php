<?php
session_start();

require('functions.php');
require('data.php');
require('lot-data.php');

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
