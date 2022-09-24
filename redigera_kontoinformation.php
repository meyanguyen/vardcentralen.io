<!DOCTYPE HTML>
<!--
	Industrious by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<html lang='se'>
	<head>
		<title>Vårdcentralen Majorna - redigera kontoinformation</title>
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
				<h1>Redigera kontoinformation</h1>
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
						<header>
							<?php
							$pdo = new PDO('mysql:dbname=a17marng_utvit;host=wwwlab.iit.his.se', 'sqllab', 'Tomten2009');
													
							echo '<div>';
								echo '<h2>Patientinformation</h2>';
								echo '<p>Du kan endast ändra ditt telefonnummer eller e-post då vi hämtar resterande uppgifter från skatteverket, vid frågor kontakta oss.</p>';
								echo '<table>';	
								if(isset($_POST['TeleNr'])){
									$querystring='UPDATE patient SET TeleNr=:TeleNr, Epost=:Epost WHERE ErpID=:ErpID;';
									$stmt = $pdo->prepare($querystring);
									$stmt->bindParam(':TeleNr', $_POST['TeleNr']);
									$stmt->bindParam(':Epost', $_POST['Epost']);
									$stmt->bindParam(':ErpID', $_SESSION['ErpID']); 
									$stmt->execute();        
								}
							  
                                foreach($pdo->query('SELECT * FROM patient WHERE ErpID="'.$_SESSION["ErpID"].'"') as $row){
                                    echo "<form action='redigera_kontoinformation.php' method='post' >";
                                        echo "<tr><th>Förnamn: ".$row['Fornamn']."</th></tr>";
                                        echo "<tr><th>Efternamn: ".$row['Efternamn']."</th></tr>"; 
                                        echo "<tr><th>Postadress: ".$row['Postadress']."</th></tr>"; 
                                        echo "<tr><th>Postnummer: ".$row['Postnr']."</th></tr>"; 
                                        echo "<tr><th>Stad: ".$row['Ort']."</th></tr>"; 
                                        echo "<tr><th>Telefonnummer: <input type='text' name='TeleNr' value='".$row['TeleNr']."'></th></tr>";
                                        echo "<tr><th>E-post: <input type='text' name='Epost' value='".$row['Epost']."'></th></tr>"; 
                                }
                                echo '</table>';
                                echo "<input type='submit' value='Spara redigering' />";  
                                echo "</form>";
                            echo '</div>';
                            
                            ?>
						</header>
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