<div class="container text-center">
    <nav class="navbar">
        <div class="navbar-brand"><img src="/public/img/logo.svg" alt="logo"></div>
        <li class="nav-item">
            <a class="nav-link" href="/">Главная</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/contact/about">Про нас</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/contact">Контакты</a>
        </li>
        <?php if($_COOKIE['login'] == ''): ?>
        <li class="nav-item">
            <a class="nav-link" href="/user/auth"><?php echo "Войти"; ?></a>
        </li>
        <?php else: ?>
        <li class="nav-item">
            <a class="nav-link" href="/user/profile"><?php echo "Кабинет пользователя"; ?></a>
        </li>
        <?php endif; ?>
    </nav>