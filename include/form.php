<form action="/?login=yes" method="POST">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <?php if (empty($_SESSION["username"]) && empty($_COOKIE['login'])) { ?>
            <td class="iat">
                <label for="login_id">Ваш e-mail:</label>
                <input id="login_id" value="<?= $loginValue ?>" size="30" name="login">
            </td>
        </tr>
        <?php } ?>
        <tr>
            <td class="iat">
                <label for="password_id">Ваш пароль:</label>
                <input id="password_id" value="<?= $passwordValue ?>" size="30" name="password" type="password">
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="Войти"></td>
        </tr>
    </table>
</form>
