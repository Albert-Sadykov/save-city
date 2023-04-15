<?php
	require 'includes/config.php';
	require 'includes/db.php';
?>
<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
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
						<h1><a href="/"><?php echo $_COOKIE['user'];?></a></h1>
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
							<?php 
								if($_COOKIE['name'] == ''):
							?>
						<!-- Actions -->
							<section>
								<ul class="actions vertical">
									<li><h3>Login</h3></li>
									<li>
										<form action="php/login.php" method="post">
											<input type="text" name="name" placeholder="Username"><br>
											<input type="password" name="password" placeholder="Password"><br>
											<input type="submit" class="button big fit" value="Log In">
										</form>
									</li>

									<li><h3>Registration</h3></li>
									<li>
										<form action="php/registration.php" method="post">
											<input type="text" name="name" placeholder="Username"><br>
											<input type="password" name="password" placeholder="Password"><br>
											<input type="submit" class="button big fit" value="Sign up">
										</form>
									</li>
								</ul>
							</section>
							<?php else:?>
							<section>
								<ul class="links">
									<li>
										<a href="add.php">
											<h3>Add Post</h3>
										</a>
									</li>
									<li>
										<a href="php/log_out.php"><h3>Log Out</h3></a>
									</li>
								</ul>
							</section>
							<?php endif?>
					</section>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="#">
											
										<?php 
											$id = $_GET['id'];
											$article_query = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` = $id");
											$art = mysqli_fetch_assoc($article_query);
											echo $art['title'] 
										?>
									
									</a></h2>
										<p><?php echo $art['subtitle']?></p>
									</div>
									<div class="meta">
										<time class="published" datetime="2015-11-01"><?php echo $art['pubdate']?></time>
										<a href="#" class="author"><span class="name">Albert</span><img src="images/avatar.jpg" alt="" /></a>
									</div>
								</header>
								<span class="image featured"><img src="article_img/<?php echo $art['img']?>" alt="" /></span>
								<p><?php echo $art['anons']?></p>
								<p><?php echo $art['text']?></p>
								<footer>
									<ul class="stats">
										<?php if ($_COOKIE['isAdmin']):?>
										<li><a href="#" class="red">Delete</a></li>
										<?php endif ?>
										<li><a href="#" class="icon fa-heart"><?php echo $art['likes']?></a></li>
										<li><a href="#" class="icon fa-comment"><?php 
											$count = mysqli_query($connection, "SELECT COUNT(id) AS 'count' FROM `comments` WHERE `article_id` = $id");
											echo mysqli_fetch_assoc($count)['count'];
										?></a></li>
									</ul>
								</footer>
							</article>

						<!-- Comments -->
							<div class="post">
								<section class="comments">
									<h3>Comments</h3>
									<form action="php/comment.php?id=<?php echo $art['id']?>" method="post">
										
										<textarea name="text"></textarea><br>
										<input type="submit" class="button big fit" value="Add Comment">
									</form>
								</section>
								<?php 
								
								$comments = mysqli_query($connection, "SELECT * FROM `comments` WHERE `article_id` = $id");
								while ($com = mysqli_fetch_assoc($comments)){
									?>
									<article class="comment">
										<div class="comment-autor">
											<a href="#"><img src="images/avatar.jpg"></a>
											<a href="#">
												<?php
													$user_id = $com['user_id'];
													$name = mysqli_query($connection, "SELECT * FROM `users` WHERE `id` = '$user_id'");
													echo mysqli_fetch_assoc($name)['name'];
												?>
											</a>
										</div>
										<p><?php echo $com['text']?></p>
									</article>
									<?php
								}
								
								?>

							</div>

					</div>

				<!-- Footer -->
					<section id="footer">
						<p class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>.</p>
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