<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Это учебная страница для интенсива 'Профессия Full Stack разработчик' в онлайн-школе itproger.com">
    <meta name="author" content="Diana Sinenkova">
    <title>Сокращение ссылок</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/style.min.css">
    <link rel="stylesheet" href="/public/css/form.min.css">
    <link rel="stylesheet" href="/public/css/card.min.css">
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
        </div>
        <div class="col-md-4">
            <h1 class="display-1">Короче</h1>
            <p>Вам нужно сократить ссылку?<br> Сейчас мы это сделаем!</p>
            <form action="/home/index" method="post">
                <input class="form-control" name="link" type="text" placeholder="Длинная ссылка" value="<?=$_POST['link']?>">
                <input class="form-control" name="keyword" type="text" placeholder="Короткое название" value="<?=$_POST['keyword']?>">
                <div class="error"><?=$data['link_message']?></div>
                <button class="btn btn-primary" id="send">Сократить</button>
            </form>
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <div class="content d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <?php
            require_once 'app/models/ShorterModel.php';
            $shorter = new ShorterModel();
            $links = [];
            $links = $shorter->getLinks();
            if($links == ''):
            ?>
            <p></p>
                <?php
             else :
                ?>
                <h2 class="display-6">Сокращенные ссылки</h2>
             <?php for($i = count($links)-1; $i >= 0; $i--): ?>
                <div class="link-card d-flex flex-column align-items-start">
                    <p><b>Длинная:  </b><?=mb_strimwidth($links[$i]['link'], 0, 50, '...')?></p>
                    <p><b>Короткая: </b><a href="<?=$links[$i]['keyword']?>">localhost<?=$links[$i]['keyword']?></a></p>
                    <form action="/home/index" method="post">
                        <input type="hidden" name="id" value="<?=$links[$i]['id']?>">
                        <button class="btn btn-primary">Удалить</button>
                    </form>
                </div>
            <?php
                endfor;
                endif;
                ?>
        </div>
    </div>

</div>



<?php endif;?>
<?require 'public/blocks/footer.php' ?>

</body>
</html>