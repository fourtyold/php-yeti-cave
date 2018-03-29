<?php
require('functions.php');
require('data.php');
require('templates/lot-data.php');

// шаблонизация 
$indexData = [
    'lot' => $goods,
    'categorie' => $categories,
    'time' => $lotTimeRemaining
];

$indexContent = renderTemplate('templates/index.php', $indexData);

$layoutData = [
    'title' => 'Главная',
    'user' => $userName,
    'avatar' => $userAvatar,
    'main' => $indexContent
];

print(renderTemplate('templates/layout.php', $layoutData));
?>
