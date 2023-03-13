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

        <p>Происходит переадресация...</p>
        <?php
        require_once 'app/models/LinkModel.php';
        $links = new LinkModel();
        $redirect = $links->redirect($_GET['url']);
        sleep(5);
        header('Location: ' . $redirect);
        exit();

        ?>

</body>
</html>
