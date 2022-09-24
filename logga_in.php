<!DOCTYPE HTML>
<!--
	Industrious by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<html lang='se'>
<?php
 session_start();
 
?>
	<head>
		<title>Vårdcentralen Majorna - Logga in</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">
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
					<li><a href="logga_in.php">Logga in</a></li>
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
						<div class="row">
							<div class="col-6 col-12-medium">
								<!-- Form -->
									<h3>Logga in</h3>
									<form method="post" action="logga_in.php">
										<div class="row gtr-uniform">
											<div class="col-6 col-12-xsmall">
												<input type="text" name="pnr" id="pnr" value="" placeholder="Personnummer 10-siffror" />
											</div>
											<!-- Break -->
											<div class="col-12">
												<input type="submit" value="Logga in med bankID" class="primary" />
											</div>
										</div>
									</form>
									<?php
									
								// Function to debug parameters
								//function debug($o){
								//  echo '<pre>';
								//  print_r($o);
								//  echo '</pre>';
								// }
							 
								// debug($_POST);

									$pdo = new PDO('mysql:dbname=a17marng_utvit;host=wwwlab.iit.his.se', 'sqllab', 'Tomten2009');
									
									if (isset($_POST['pnr'])){
										$query = 'SELECT * FROM patient WHERE Pnr=:Pnr;';
										$stmt = $pdo->prepare($query);
										$stmt->bindParam(':Pnr', $_POST['pnr']);
										$stmt->execute();
										$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
										if(!empty($result[0]["ErpID"])){
											 $_SESSION["ErpID"]=$result[0]["ErpID"]; //databasvärde
									?>	
										<script>
											window.location.href = "inloggad.php";
										</script>
									<?php
										} elseif(empty($result[0]["ErpID"])) {
											echo 'Fel inloggning försök igen';
										}
									}
									?>
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