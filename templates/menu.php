<?php
echo '<ul class="main-menu' . $ulClass . '">';

foreach ($main_menu as $item) {
    $class = '';
    $cutedTitle = cutString($item['title'], 12, '...');
    if (isCurrentUrl($item['path'])) {
        $class = 'active';
    }

    echo "<li class = $class>" . '<a href="' . $item['path'] . '">' . $cutedTitle . '</a></li>';
}
echo '</ul>';
