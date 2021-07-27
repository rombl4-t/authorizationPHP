<td class="right-collum-index">
    <div class="project-folders-menu">
        <ul class="project-folders-v">
            <li class="project-folders-v-active">
                <a href=<?= empty($_SESSION["username"]) ? "?login=yes" : "?login=no" ?>>
                    <?= empty($_SESSION["username"]) ? 'Авторизация' : 'Выйти' ?></a>
            </li>
            <li><a href="#">Регистрация</a></li>
            <li><a href="#">Забыли пароль?</a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="index-auth">
        <?php
        if (!empty($_GET['login']) && $_GET['login'] === 'yes') {
            include $_SERVER['DOCUMENT_ROOT'] . '/include/form.php';
        }
        if (!empty($_POST)) {
            if ($isAuth) {
                include $_SERVER['DOCUMENT_ROOT'] . '/include/success.php';
            } else {
                include $_SERVER['DOCUMENT_ROOT'] . '/include/fail.php';
            }
        }
        ?>
    </div>
</td>
