<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Это учебная страница для интенсива 'Профессия Full Stack разработчик' в онлайн-школе itproger.com">
    <meta name="author" content="Diana Sinenkova">
    <title>Контакты</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/style.min.css">
    <link rel="stylesheet" href="/public/css/form.min.css">
</head>

<body>

<div class="container text-center">
    <nav class="navbar">
        <div class="navbar-brand"><img src="" alt="logo"></div>
        <li class="nav-item">
            <a class="nav-link" href="/">Главная</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/contact/about/">Про нас</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/contact/">Контакты</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><?php echo "Войти"; ?></a>
        </li>
    </nav>
    <div class="content d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <h1 class="display-6">Обратная связь</h1>
            <p>Напишите нам, если у вас возникли вопросы</p>
            <form action="/contact" method="POST">
                <input type="text" class="form-control" name="name" placeholder="Введите имя">
                <input type="email" class="form-control" name="email" placeholder="Введите email">
                <textarea = "message" class="form-control" class="form-control" placeholder="Введите сообщение"></textarea>
                <div class="error"></div>
                <button class="btn btn-primary" id="send">Отправить</button>
            </form>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <span class="">Все права защищены</span>
    </div>
</footer>
</body>
</html>

