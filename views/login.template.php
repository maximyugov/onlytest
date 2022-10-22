<?php
$email = $_SESSION['old_email'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>
    <?php if (isset($_SESSION['flash'])) { ?>
    <div class="container">
        <p><?= $_SESSION['flash'] ?></p>
    </div>
    <?php } unset($_SESSION['flash']); ?>
    <div class="container">
        <h2>Вход</h2>
        <form action="/verify" method="POST">
            <div class="input">
                <input type="text" name="email" placeholder="E-mail" value="<?=$email?>">
            </div>
            <div class="input">
                <input type="password" name="password" placeholder="Пароль">
            </div>
            <div class="input">
                <button>Войти</button>
            </div>
        </form>
        <div class="input">
            <a href="/register">Регистрация</a>
        </div>
    </div>

</body>
</html>

<?php
unset($_SESSION['old_name']);
unset($_SESSION['old_email']);
?>