<?php
$main_menu = [
    [
        'title' => 'Главная',
        'path' => '/',
        'sort' => 0
    ],
    [
        'title' => 'О нас',
        'path' => '/route/about/',
        'sort' => 1
    ],
    [
        'title' => 'Контакты',
        'path' => '/route/contacts/',
        'sort' => 2
    ],
    [
        'title' => 'Новости',
        'path' => '/route/news/',
        'sort' => 3
    ],
    [
        'title' => 'Каталог',
        'path' => '/route/catalog/',
        'sort' => 4
    ],
];

function arraySort($sortedArr, $key, $sort)
{
    $tmp_Array = array_column($sortedArr, $key);

    array_multisort($tmp_Array, $sort, $sortedArr);

    return $sortedArr;
}

function cutString($line, $length, $appends)
{
    return mb_strimwidth($line, 0, $length, $appends);
}

function isCurrentUrl($url)
{
    return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == $url;
}

function showMenu($main_menu, $ulClass)
{
    include $_SERVER['DOCUMENT_ROOT'] . '/templates/menu.php';
}
