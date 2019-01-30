<?php
	session_start();
	if(isset($_SESSION['vali'])){
	if($_SESSION['vali'] == 1){
?>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>SZ - Isst</title>
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
	  <br>
	  
    <div class="container">
      <!-- Responsive calendar - START -->
    	<div class="responsive-calendar">
        <div class="controls">
            <a class="pull-left" data-go="prev"><div class="btn btn-primary">Zurück</div></a>
            <h4><span data-head-year></span> <span data-head-month></span></h4>
            <a class="pull-right" data-go="next"><div class="btn btn-primary">Vor</div></a>
        </div><hr/>
        <div class="day-headers">
          <div class="day header">Mo</div>
          <div class="day header">Di</div>
          <div class="day header">Mi</div>
          <div class="day header">Do</div>
          <div class="day header">Fr</div>
          <div class="day header">Sa</div>
          <div class="day header">So</div>
        </div>
        <div class="days" data-group="days">
          
        </div>
      </div>
      <!-- Responsive calendar - END -->
    </div>
	
	  
<!-- Modal Bestellung wählen -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Essen Bestellung für <span id="date"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="row justify-content-center">
		  	<select class="form-control col-8" id="selmenue" onChange="getinfo()">
				<option>Kein Essen</option>
			</select>
		</div><br>
		<div class="row justify-content-center">
			
			<ul class="list-group" id="menu-info-list">
			</ul>
		</div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-primary" onClick="bestellen()">Bestellen</button>
      </div>
    </div>
  </div>
</div>
	  
<!-- Modal Submitt Bestellung -->
	  
<div class="modal fade" id="submitmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Bestätigung</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Wollen Sie wirklich für <span id="datesub"></span> das <span id="menu"></span> kaufen?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Nein</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onClick="safe_best()">Ja</button>
      </div>
    </div>
  </div>
</div>
	  
  </body>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/responsive-calendar.js"></script>
    <script type="text/javascript">
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth() + 1; //January is 0!

		var yyyy = today.getFullYear();
		if (dd < 10) {
		  dd = '0' + dd;
		} 
		if (mm < 10) {
		  mm = '0' + mm;
		} 
		var today = yyyy+"-"+mm;
		
      $(document).ready(function () {
        $(".responsive-calendar").responsiveCalendar({
          time: today
        });
					 $.ajax({
			  method: "GET",
			  url: "php/get_best_set_class.php"
			})
			  .done(function( msg ) {
				   var myArr = JSON.parse(msg);
				 	for(var i = 0;i<myArr.length;i++){
						
						$("#"+myArr[i]).addClass("bestellt");
					}
			  });  
		
      });
	
		function modalop(date){
			var td = date.split("_");
			var day = td["0"];
			var month = td["1"];
			var year = td["2"];
			var datestr = day+month+year;
			
			var inst = $("#"+datestr);
			if(inst.classList.contains("bestellt")){
				alert("ok")
			}

			$("#selmenue option").remove();
			$('#selmenue').append($('<option>', {text: "Kein Essen"}));
			$.ajax({
			  method: "GET",
			  url: "php/getmenue.php?datum="+datestr
			})
			  .done(function( msg ) {
				    var myArr = JSON.parse(msg);
					var menue1 = myArr[0].split("_");
					var menue2 = myArr[1].split("_");
					var menu1nr = menue1[1];
					var menu2nr = menue2[1];
					$('#selmenue').append($('<option>', {value:menu1nr, text: menue1[0]}));
					$('#selmenue').append($('<option>', {value:menu2nr, text: menue2[0]}));
			  });
			
			$("#modal").modal();
			$("#date").html(day+"."+month+"."+year);
			
			
		}
		
		function getinfo(){
			var valstr = $("#selmenue").val();
			var nr = valstr.split("_");
			$('#menu-info-list').empty();
			$.ajax({
			  method: "GET",
			  url: "php/getinfo.php?nr="+nr[0]
			})
			  .done(function( msg ) {
				    var myArr = JSON.parse(msg);
				
					for(var i = 0;i<myArr.length;i++){
						
						if(myArr[i] != "0"){
							$("#menu-info-list").append('<li class="list-group-item">' + myArr[i] + "</li>");
						}
					}
			  });
		}
		
		function bestellen(){
			$('#modal').modal('hide')
			$("#submitmodal").modal();
			var valstr = $("#selmenue").val();
			var date = $("#date").text();
			$("#datesub").html(date);
			$("#menu").html("Menü " + valstr);
		}
		
		function safe_best(){
			$('#submitmodal').modal('hide');
			var valstr = $("#selmenue").val();
			var date = $("#date").text();
			var td = date.split(".");
			date = td[0]+""+td[1]+""+td[2];
			$.ajax({
			  method: "GET",
			  url: "php/insertbestellung.php?menuid="+valstr+"&date="+date
			})
			  .done(function( msg ) {
			  });
				
		}
		
		
    </script>
</html>
<?php
							  }else{
		echo "Error - Log dich ein";
	}
	}else{
		echo "Error - Log dich ein";
	}
		?>