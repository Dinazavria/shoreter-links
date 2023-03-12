<!DOCTYPE html>
<body lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Это учебная страница для интенсива 'Профессия Full Stack разработчик' в онлайн-школе itproger.com">
    <meta name="author" content="Diana Sinenkova">
    <title>Сокращение ссылок</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/style.min.css">
    <link rel="stylesheet" href="/public/css/form.min.css">
</head>
<body>

<?php require 'public/blocks/header.php' ?>
<?php if($_COOKIE['login'] == ''): ?>
    <div class="content d-flex justify-content-center align-items-center">
        <div class="col-md-4">
                <h1 class="display-1">Короче</h1>
                <p>Вам нужно сократить ссылку? Прежде чем это сделать, зарегистрируйтесь на сайте</p>
                <form action="/home/index" method="post">
                    <input class="form-control" name="email" type="email" placeholder="Введите email" value="<?=$_POST['email']?>">
                    <input class="form-control" name="login" type="text" placeholder="Введите логин" value="<?=$_POST['login']?>">
                    <input class="form-control" name="password" type="password" placeholder="Введите пароль" value="<?=$_POST['password']?>">
                    <input class="form-control" name="repass" type="password" placeholder="Повторите пароль" value="<?=$_POST['repass']?>">
                    <div class="error"><?=$data['message']?></div>
                    <button class="btn btn-primary" id="send">Зарегистрироваться</button>
                </form>
                <p>Есть аккаунт? Тогда вы можете <a href="" class="link-in-p">авторизоваться</a></p>
        </div>
    </div>
</div>

<?php else: ?>
    <div class="content d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <h1 class="display-1">Короче</h1>
            <p>Вам нужно сократить ссылку?<br> Сейчас мы это сделаем!</p>
            <form action="/home/index" method="post">
                <input class="form-control" name="link" type="text" placeholder="Длинная ссылка" value="<?=$_POST['link']?>">
                <input class="form-control" name="keyword" type="text" placeholder="Короткое название" value="<?=$_POST['keyword']?>">
                <div class="error"><?=$data['message']?></div>
                <button class="btn btn-primary" id="send">Сократить</button>
            </form>

        </div>
    </div>
</div>

<?php endif;?>
<?require 'public/blocks/footer.php' ?>

</body>
</html>