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
    <?php if (isset($msg)) { ?>
    <div class="container">
        <p><?= $msg ?></p>
    </div>
    <?php } ?>
    <div class="container">
        <h2>Вход</h2>
        <form action="/verify" method="POST">
            <div class="input">
                <input type="text" name="email" placeholder="E-mail">
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