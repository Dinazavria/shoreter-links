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

<?php require 'public/blocks/header.php' ?>

    <div class="content d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <h1 class="display-6">Обратная связь</h1>
            <p>Напишите нам, если у вас возникли вопросы</p>
            <form action="/contact" method="post">
                <input type="text" class="form-control" name="name" placeholder="Введите имя" value="<?=$_POST['name']?>">
                <input type="email" class="form-control" name="email" placeholder="Введите email" value="<?=$_POST['email']?>">
                <textarea name="message" class="form-control" class="form-control" placeholder="Введите сообщение"><?=$_POST['message']?></textarea>
                <div class="error"><?=$data['message']?></div>
                <button class="btn btn-primary" id="send">Отправить</button>
            </form>
        </div>
    </div>
</div>

<?php require 'public/blocks/footer.php' ?>

</body>
</html>

