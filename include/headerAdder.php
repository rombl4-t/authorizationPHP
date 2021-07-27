<?php
function headerAdder($main_menu)
{
    $header = 'Страница не найдена';
    foreach ($main_menu as $item) {
        if ($item['path'] == isCurrentUrl($item['path'])) {
            $header = $item['title'];
        }
    }
    return $header;
}
