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
	 
	echo $_SESSION["ErpID"];


	if(empty($_SESSION["ErpID"])){
	  header("location: logga_in.php");
	}
?>
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
							} catch (Exception $e) {
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
					 
							echo "<div style='background-color:lightgray; border:1px solid black'>";
							echo '$response<br><pre>';
							echo print_r($response)."</pre><br>";
							echo "</div>";
							
							//HÄMTA LÄKARGRUPP
							$ch = curl_init($baseurl."api/resource/Employee%20Group/L%C3%A4kare");
							curl_setopt($ch, CURLOPT_CUSTOMERQUEST, 'GET');
							
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
					 
							echo "<div style='background-color:lightgray; border:1px solid black'>";
							echo '$response<br><pre>';
							echo print_r($response)."</pre><br>";
							echo "</div>";

										
							echo "<div class='valj_vardgivare'>";
							echo "<form action='response.php' method='post'>";
							echo "<select>";
							foreach ($response["data"]["employee_list"] as $vardgivare) {
								echo "<option value='".$vardgivare[employee_name]."'>".$vardgivare[employee_name]."</option>";
							}        
							echo "<select>";
							echo "<button>Submit</button>";
							echo "</form>";        
							echo "</div>";
						?>
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