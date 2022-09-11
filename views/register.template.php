<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>
    <?php if (isset($msg)) { ?>
    <div class="container">
        <p><?= $msg ?></p>
    </div>
    <?php } ?>
    <div class="container">
        <h2>Регистрация</h2>
        <form action="/create" method="POST">
            <div class="input">
                <input type="text" name="name" placeholder="Имя">
            </div>
            <div class="input">
                <input type="text" name="email" placeholder="E-mail">
            </div>
            <div class="input">
                <input type="password" name="password" placeholder="Пароль">
            </div>
            <div class="input">
                <input type="password" name="passwordcheck" placeholder="Повторите пароль">
            </div>
            <div class="input">
                <button>Зарегистрироваться</button>
            </div>
        </form>
        <div class="input">
            <a href="/login">Уже зарегистрированы?</a>
        </div>
    </div>
</body>
</html>