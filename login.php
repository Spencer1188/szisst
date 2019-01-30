<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sz-Isst Login</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
		<div style="padding: 20px 200px;">
			<br><br>
			<h1>Login</h1>
			<hr>
		</div>

		<div class="container">

			
			  <div class="form-group">
				<label for="exampleInputEmail1">Benutzername</label>
				<input type="text" class="form-control" id="usrname" placeholder="Benutzername eingeben" name="username">
			  </div>
			  <div class="form-group">
				<label for="exampleInputPassword1">Passwort</label>
				<input type="password" class="form-control" id="password" placeholder="Passwort eingeben" name="password">
			  </div>
			  <button class="btn btn-outline-dark" onClick="do_login()">Login</button>
		</div>
	
	<div id="snackbar">Error beim Login. Erneut Versuchen</div>
</body>
	 <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	<script>
	function do_login(){
		
		 var usr=$("#usrname").val();
		 var pass=$("#password").val();
		
		 if(usr!="" && pass!="" )
		 {
			  $.ajax
			  ({
			  type:'post',
			  url:'php/do_login.php',
			  data:{
			   username:usr,
			   pw:pass
			  },
			  success:function(data) {
				  if(data == "error"){
					 myFunction()
				  }else{
					 window.location.href = "calendar.php";
				  }
			  },			
			  error:function() {
				  M.toast({html: 'Fehler beim Login'})
			  }
			  });
		 }else {
		  alert("Please Fill All The Details");
		 } 

		}
		
		function myFunction() {
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
	</script>
</html>