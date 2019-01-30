<!doctype html>
<?php
	session_start();
	if(isset($_SESSION['vali'])){
	if($_SESSION['vali'] == 1){
?>
<html>
<head>
<meta charset="utf-8">
<title>Unbenanntes Dokument</title>
	<?php include "php/head.php"; ?>
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
					<a class="nav-link" href="calendar.php"><i class="fas fa-calendar-alt" style="padding: 0px 5px;"></i>Mein Kalender</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="list.php"><i class="fas fa-th-list" style="padding: 0px 5px;"></i>Meine Bestellungen</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="php/logout.php"><i class="fas fa-sign-out-alt" style="padding: 0px 5px;"></i>Abmelden (<?php echo $_SESSION['username']; ?>)</a>
				  </li>
			  </ul>
		  </div>
		</nav>
</body>
</html>

<?php
							  }else{
		echo "Error - Log dich ein";
	}
	}else{
		echo "Error - Log dich ein";
	}
		?>