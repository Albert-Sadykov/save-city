<?php
	require 'includes/config.php';
	require 'includes/db.php';
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title><?php echo $config['title'];?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="/"><?php echo $config['title'];?></a></h1>
						<nav class="main">
							<ul>
								<li class="menu">
									<a class="fa-user" href="#menu">Menu</a>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Menu -->
					<section id="menu">
							<?php 
								if($_COOKIE['user'] != ''):
							?>
							<section>
								<ul class="links">
									<li>
										<a href="add.php">
											<h3>Добавить заявку</h3>
										</a>
									</li>
									<li>
										<a href="php/log_out.php"><h3>Выйти</h3></a>
									</li>
								</ul>
							</section>
						<!-- Actions -->

							<?php else:?>
								<section>
								<ul class="actions vertical">
									<li><h3>Войти</h3></li>
									<li>
										<form action="php/login.php" method="post">
											<input type="text" name="name" placeholder="Username"><br>
											<input type="password" name="password" placeholder="Password"><br>
											<input type="submit" class="button big fit" value="Log In">
										</form>
									</li>

									<li><h3>Регистрация</h3></li>
									<li>
										<form action="php/registration.php" method="post">
											<input type="text" name="name" placeholder="Username"><br>
											<input type="password" name="password" placeholder="Password"><br>
											<input type="submit" class="button big fit" value="Sign up">
										</form>
									</li>
								</ul>
							</section>
							<?php endif?>
					</section>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
						<?php
							$sql = "SELECT * FROM `articles`";
							$articles = mysqli_query($connection, $sql);
							
							while ($art = mysqli_fetch_assoc($articles)) {
							?>
								
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="#"><?php echo $art['title']?></a></h2>
										<p><?php echo $art['subtitle']?></p>
									</div>
									<div class="meta">
										<time class="published" datetime="2015-11-01"><?php echo $art['pubdate']?></time>
										<a href="#" class="author"><span class="name">Albert</span><img src="images/avatar.jpg" alt="" /></a>
									</div>
								</header>
								<a href="#" class="image featured"><img src="article_img/<?php echo $art['img']?>" alt="" /></a>
								<p><?php echo $art['anons']?></p>
								<footer>
									<ul class="actions">
										<li><a href="/single.php?id=<?php echo $art['id']?>" class="button big">Читать полностью</a></li>
									</ul>
									<ul class="stats">
										<li><a href="#" class="icon fa-heart"><?php echo $art['likes']?></a></li>
										<li><a href="#" class="icon fa-comment">
											<?php
												$article_id = $art['id'];
												$count = mysqli_query($connection, "SELECT COUNT(id) AS 'count' FROM `comments` WHERE `article_id` = $article_id");
												echo mysqli_fetch_assoc($count)['count'];
											?>
										</a></li>
									</ul>
								</footer>
							</article>
							<?php
							}
						?>
							


					</div>

				<!-- Sidebar -->
					<section id="sidebar">

						<!-- Intro -->
							<section id="intro">
								<a href="#" class="logo__intro"><img src="images/logo.jpg" alt="" /></a>
								<header>
									<h2><?php echo $config['title']?></h2>
									<p>Помоги своему городу стать лучше</p>
								</header>
							</section>

						
						

					</section>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>