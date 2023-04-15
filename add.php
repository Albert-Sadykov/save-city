<?php
	require 'includes/config.php';
	require 'includes/db.php';
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Single - Future Imperfect by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="single">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="/"><?php echo $config['title'];?></a></h1>
						<nav class="main">
							<ul>
								<li class="menu user">
									<a href="#menu"><img src="images/avatar.jpg"></a>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Menu -->
					<section id="menu">

						<!-- Links -->
							<section>
								<ul class="links">
									<li>
										<a href="#">
											<h3>Добавить заявку</h3>
										</a>
									</li>
									<li>
										<a href="php/log_out.php"><h3>Выйти</h3></a>
									</li>
								</ul>
							</section>

					</section>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
						<form action="php/post.php" method="post" enctype="multipart/form-data">
							<article class="post">
								<h1>Добавить заявку</h1>
								<input type="text" name="title" placeholder="Загаловок"><br>
								<input type="text" name="subtitle" placeholder="Подзагаловок"><br>
								<input type="text" name="anons" placeholder="Суть проблемы"><br>
								<textarea name="content" placeholder="Текст заявки"></textarea><br>
								<input type="file" name="file"><br><br>
								<input type="submit" class="button big fit" value="Добавить заявку">
							</article>
						</form>
					</div>

				<!-- Footer -->
					

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>