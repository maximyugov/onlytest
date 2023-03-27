# Тестовое задание для компании Only

## Задание

Регистрация и авторизация

Написать формы регистрации и авторизации:

1. В форме регистрации пользователь должен указать Имя, почту, пароль и повтор пароля.
2. Почта должна быть уникальна и если такая в базе уже есть - уведомлять пользователя об этом.
3. Пароли в обеих полях должны совпадать, иначе уведомлять пользователя об этом.
4. Авторизованные пользователи могут авторизоваться в форме авторизации и получить сообщение об успешной авторизации.

## Исправления и дополнения

Ветка dev содержит следующие изменения:

1. Добавлен Composer autoload
2. Добавлены типы аргументов и возвращаемых значений, где этого не было
3. Изменен метод redirect класса Router
4. Добавлены отдельные свойства классу User вместо ассоциативного массива

## TODO

1. Убрать дублирование: функция-хелпер redirect() и Router->redirect404()
2. Реализовать проверку прав доступа вместо функции redirect()
3. Подключить PHPUnit, написать тесты
4. Исправить нарушения принципа SRP

## PHPUnit