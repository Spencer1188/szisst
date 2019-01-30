<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>SZ - Isst</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Economica' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Respomsive slider -->
    <link href="assets/css/responsive-calendar.css" rel="stylesheet">
  </head>
  <body>
	<nav class="navbar navbar-dark bg-dark">
	  <a class="navbar-brand" href="#">Navbar</a>
	</nav><br>
	  
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
	 
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Essen Bestellung für <span id="date"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row">
		<div class="row justify-content-center col-6">
		  	<select class="form-control col-6" id="selmenue">
			  <option>Menü 1</option>
			  <option>Menü 2</option>
			</select>
		</div>
		<div class="row justify-content-center col-6">
			<h5>Menü Info:</h5>
		</div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-primary">Bestellen</button>
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
      });
		
		function modalop(date){
			var td = date.split("_");
			var day = td["0"];
			var month = td["1"];
			var year = td["2"];
			var datestr = day+month+year;
			
			$.ajax({
			  method: "GET",
			  url: "php/getmenue.php?datum="+datestr
			})
			  .done(function( msg ) {
				    var myArr = JSON.parse(msg);
					$('#selmenue').append($('<option>', {value:1, text: myArr[1]}));
					$('#selmenue').append($('<option>', {value:1, text: myArr[2]}));
			  });
			
			$("#modal").modal();
			$("#date").html(day+"."+month+"."+year);
			$
			
		}
		
		
    </script>
</html>