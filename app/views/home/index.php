<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Это учебная страница для интенсива 'Профессия Full Stack разработчик' в онлайн-школе itproger.com">
    <meta name="author" content="Diana Sinenkova">
    <title>Сокращение ссылок онлайн</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.min.css">
</head>

<body>

<div class="container text-center">
    <nav class="navbar">
        <div class="navbar-brand"><img src="" alt="logo"></div>
        <li class="nav-item">
            <a class="nav-link" href="#">Главная</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Про нас</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Контакты</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><?php echo "Войти"; ?></a>
        </li>
    </nav>
    <div class="content d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <h1 class="display-1">Короче</h1>
            <p class="lead">Вам нужно сократить ссылку? Прежде чем это сделать, зарегистрируйтесь на сайте</p>
            <p><?=$data['test']?></p>
            <p><?=$data['name']?></p>
            <form action="" method="POST">
                <input class="form-control" type="email" placeholder="Введите email">
                <input class="form-control" type="text" placeholder="Введите логин">
                <input class="form-control" type="password" placeholder="Введите пароль">
                <button class="btn btn-primary" type="submit">Зарегистрироваться</button>
            </form>
            <p>Есть аккаунт? Тогда вы можете <a href="" class="link-in-p">авторизоваться</a></p>
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
