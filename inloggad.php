<!DOCTYPE HTML>
<!--
	Industrious by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<html lang='se'>
	<head>
		<title>Vårdcentralen Majorna - Logga in</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">
	<?php
	session_start();
	
	echo "<b>Inloggad som: </b>";
	echo $_SESSION["ErpID"];


	if(empty($_SESSION["ErpID"])){
	  header("location: logga_in.php");
	}
	?>

		<!-- Header -->
			<header id="header">
				<a class="logo" href="startsida.html">Vårdcentralen Majorna</a>
				<nav>
					<a href="#menu">Meny</a>
				</nav>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="startsida.html">Startssida<a></li>
					<li><a href="inloggad.php">Mina sidor</a></li>
					<li><a href="om_oss.html">Om oss</a></li>
					<li><a href="kontakt.html">Kontakt</a></li>
				</ul>
			</nav>

		<!-- Heading -->
			<div id="heading" >
				<h1>Vårdcentralen Majorna</h1>
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">

					<!-- Elements -->
						<div style="text-align: center;">
							<div class="col-6 col-12-medium">
								<!-- Form -->
									<h3>Välkommen! Vad vill du göra?</h3>
										<div class="row gtr-uniform">
											<div style="width: 300px;margin: 0 auto;">
												<ul class="actions">
													<li><a href="redigera_kontoinformation.php"><input type="submit" value="Redigera kontoinformation" style="width: 275px; background-color: #f0eeed;"/></a></li>
												</ul>
												<ul class="actions">
													<li><a href="boka_tid.html"><input type="submit" value="Boka tid" style="width: 275px; background-color: #f0eeed;"></a></li>
												</ul>
												<ul class="actions">
													<li><a href=""><input type="submit" value="Omboka/Avboka tid" style="width: 275px; background-color: #f0eeed;"/></a></li>
												</ul>
												<ul class="actions">
													<li><a href=""><input type="submit" value="Förnya recept" style="width: 275px; background-color: #f0eeed;"/></a></li>
												</ul>
												<ul class="actions">
													<li><a href="Visa_journal.php"><input type="submit" value="Se journal" style="width: 275px; background-color: #f0eeed;"/></a></li>
												</ul>	
												<ul class="actions">
													<li><a href=""><input type="submit" value="Se provsvar" style="width: 275px; background-color: #f0eeed;"/></a></li>
												</ul>
												<ul class="actions">
													<li><a href=""><input type="submit" value="Hjälp"/ style="width: 275px; background-color: #f0eeed;"></a></li>
												</ul>												
											</div>
										</div>
							</div>
						</div>
					</div>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="content">
						<section>
							<h3>Vårdcentralen Majorna</h3>
							<p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing. Lorem ipsum dolor vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing sed feugiat eu faucibus. Integer ac sed amet praesent. Nunc lacinia ante nunc ac gravida.</p>
						</section>
						<section>
							<h4>Hittar du det du söker?</h4>
							<ul class="alt">
								<li><a href="#">Kontakt.</a></li>
								<li><a href="#">Jobba med oss.</a></li>
								<li><a href="#">Hitta till oss.</a></li>
							</ul>
						</section>
					</div>
					<div class="copyright">
						&copy; Untitled. Photos <a href="https://unsplash.co">Unsplash</a>, Video <a href="https://coverr.co">Coverr</a>.
					</div>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>