<!DOCTYPE html>
<html>
	<title>Router Info Database | TBCL</title>
	<head>
		<meta name="description" content="Contact Point Database | TBCL" />
		<meta name="keywords" content="Contact Point Database | TBCL" />
		<meta name="author" content="Sayedur Rahman" />
		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		
		<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		
		 <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script type="text/javascript" language="javascript" >
			$(document).ready(function() {
			
				var dataTable =  $('#employee-grid').DataTable( {
				processing: true,
				serverSide: true,
				ajax: "router_info_code.php", // json datasource

				} );
				
				$("#employee-grid_filter").css("display","none");  // hiding global search box
				
				$('.employee-search-input').on( 'keyup click change', function () {   
					var i =$(this).attr('id');  // getting column index
					var v =$(this).val();  // getting search input value
					dataTable.columns(i).search(v).draw();
				} );
		
				 $( ".datepicker" ).datepicker({
				 	dateFormat: "yy-mm-dd",
					showOn: "button",
					showAnim: 'slideDown',
					showButtonPanel: true ,
					autoSize: true,
					buttonImage: "//jqueryui.com/resources/demos/datepicker/images/calendar.gif",
					buttonImageOnly: true,
					buttonText: "Select date",
					closeText: "Clear"
				});
				$(document).on("click", ".ui-datepicker-close", function(){
					$('.datepicker').val("");
					dataTable.columns(3).search("").draw();
				});
			} );

		</script>
		<style>
			body {
			    background: #f7f7f7;
			    color: #333;
			}
			.employee-search-input {
			    width: 100%;
			}
			.datepicker {
				float:left;width:70%;
			}
		</style>
		
	</head>
	<body>
	<?php include 'menu.php'; ?><br><br><br>
		<div class="header"><h1>Router Info Database</h1></div>
		<div class="container">
			<table id="employee-grid"  class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Name</th>
						<th>Model</th>
						<th>Quantity</th>
						<th>Location</th>
						<th>Zone</th>
						<th>Status</th>
						<th>Remarks</th>
						
					</tr>
				</thead>
				<thead>
					<tr>
						<td><input type="text" id="0"  class="employee-search-input"></td>
						<td><input type="text" id="1" class="employee-search-input"></td>
						<td><input type="text" id="2" class="employee-search-input" ></td>
						<td><input type="text" id="3"  class="employee-search-input"></td>
						<td><input type="text" id="4" class="employee-search-input"></td>
						<td><input type="text" id="5" class="employee-search-input" ></td>
						<td><input type="text" id="6" class="employee-search-input" ></td>
					</tr>
				</thead>
			</table>
		</div>
		<script src="assets/js/bootstrap.min.js"></script>
	</body>
</html>
