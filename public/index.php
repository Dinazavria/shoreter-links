<?php include 'header.php'; ?>

		<div class="container text-center">
			<nav class="navbar">
				<div class="navbar-brand"><img src=""></div>
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
			        <a class="nav-link" href="#">Войти</a>
			    </li>
			</nav>
			<div class="content d-flex justify-content-center align-items-center">
				<div class="col-md-4">
					<h1 class="display-1">Короче</h1>
					<p class="lead">Вам нужно сократить ссылку? Прежде чем это сделать, зарегистрируйтесь на сайте</p>
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

<?php include 'footer.php'; ?>