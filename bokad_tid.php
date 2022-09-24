<?php
	session_start();
	 
	echo $_SESSION["ErpID"];


	if(empty($_SESSION["ErpID"])){
	  header("location: logga_in.php");
	}
?>
<!DOCTYPE HTML>
<!--
	Industrious by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->

<html>
<html lang='se'>

	<head>
		<title>Vårdcentralen Majorna - Om oss</title>
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
					<li><a href="inloggad.php">Mina sidor</a></li>
					<li><a href="om_oss.html">Om oss</a></li>
					<li><a href="kontakt.html">Kontakt</a></li>
				</ul>
			</nav>

		<!-- Heading -->
			<div id="heading" >
				<h1>Tidsbokning</h1>
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
						<header>
							<h2>Du har bokat en tid hos oss.</h2>
						</header>
						<div style='background-color:#f0eeed; border:1px solid black; box-shadow: 8px 12px 9px 2px rgba(153,153,153,0.7); border-radius: 7px;'>
						<p>Detta är en bekräftelse på att du bokat en tid hos oss.</p>
						<?php	
						ini_set('display_errors', 1);
						ini_set('display_startup_errors', 1);
						error_reporting(E_ALL);
					 
						$cookiepath = "/tmp/cookies.txt";
						$tmeout=3600; // (3600=1hr)
							
						// här sätter ni er domän
							
						$baseurl= 'https://vardcentralenmajorna.erpnext.com/';
				
						try{
							$ch = curl_init($baseurl.'api/method/login');
						}catch (Exception $e) {
							echo 'Caught exception: ',  $e->getMessage(), "\n";
						}

						curl_setopt($ch,CURLOPT_POST, true);
							
						// Här sätter ni era login-data

						curl_setopt($ch,CURLOPT_POSTFIELDS, '{"usr":"a17marng@student.his.se", "pwd":"Januari1997"}');
						curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: application/json'));
						curl_setopt($ch,CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
						curl_setopt($ch,CURLOPT_COOKIEJAR, $cookiepath);
						curl_setopt($ch,CURLOPT_COOKIEFILE, $cookiepath);
						curl_setopt($ch,CURLOPT_TIMEOUT, $tmeout);
						curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

						$response = curl_exec($ch);
						$response = json_decode($response,true);

						$error_no = curl_errno($ch);
						$error = curl_error($ch);
						curl_close($ch);
																																					
							
						if (isset ($_POST['Datum'])){
						$ch = curl_init($baseurl.'api/resource/Patient%20Appointment');
						curl_setopt($ch,CURLOPT_CUSTOMREQUEST, 'POST');
						curl_setopt($ch,CURLOPT_POSTFIELDS, '{"appointment_date":"'.$_POST['Datum'].'", "appointment_time":"'.$_POST['tid'].'", "practitioner":"'.$_POST['ID'].'", "patient":"'.$_SESSION['ErpID'].'", "duration":"30"}');
						curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: application/json'));
						curl_setopt($ch,CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
						curl_setopt($ch,CURLOPT_COOKIEJAR, $cookiepath);
						curl_setopt($ch,CURLOPT_COOKIEFILE, $cookiepath);
						curl_setopt($ch,CURLOPT_TIMEOUT, $tmeout);
						curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);		
							
							
						$response = curl_exec($ch);
						$response = json_decode($response,true);

						$error_no = curl_errno($ch);
						$error = curl_error($ch);
						curl_close($ch);
					 
						if(!empty($error_no)){
							echo "<div style='background-color:red'>";
							echo '$error_no<br>';
							var_dump($error_no);
							echo "<hr>";					 
							echo '$error<br>';
							var_dump($error);
							echo "<hr>";
							echo "</div>";					 
						}
					 

							}
							
							echo "<div>";
							foreach ($response as $tidsbokning) {
								echo "<b>Datum och tid: </b><p>".$tidsbokning['appointment_datetime']."</p>";
								echo "<b>Plats: </b><p>".$tidsbokning['company']."</p>";
								echo "<b>Läkare: </b><p>".$tidsbokning['practitioner_name']."</p>";
								echo "<b>Patient: </b><p>".$tidsbokning['patient_name']."</p>";
							}        
							echo "</div>";
							
						?>
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