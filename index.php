<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sz-Isst</title>
	<?php include "php/head.php" ?>
</head>
<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			<a class="navbar-brand mr-auto" href="#">Hidden brand</a>
			    <ul class="navbar-nav">
				  <li class="nav-item">
					<a class="nav-link" href="login.php"><i class="fas fa-user fa-user" style="padding: 0px 5px;"></i>Anmelden</a>
				  </li>
			  </ul>
		  </div>
		</nav>
</body>
	 <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	<script>
		function redirect_login(){
			window.location = "login.php";
		}
	</script>
</html>