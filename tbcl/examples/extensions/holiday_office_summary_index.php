<?php session_start(); ?>
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
				ajax: "holiday_office_code.php", // json datasource

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
			div.container {
			    max-width: 980px;
			    margin: 0 auto;
			}
			div.header {
			    margin: 0 auto;
			    max-width:980px;
			}
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
	<?php include 'edit_menu.php'; include '../view/db.php'; 
	if(isset($_POST['month_Dropdown']))
	{
		$curr_month = $_POST['month_Dropdown'];
		$curr_year = $_POST['year_Dropdown'];
	}
	else
	{
		$curr_month = date("M",strtotime('-1 month', time()));
		$curr_year = date("y");
	}
	?>
		<div class="header"><h1>Holiday Office Summary</h1></div>
		<div class="container">
		<form method="post" action="">
			<select Name="month_Dropdown" id="month_Dropdown">
			<?php 
				echo '<option  value=""';
						if($curr_month == "") echo "Selected";
						echo '>ALL</option>';
				echo '<option  value="Jan"';
						if($curr_month == "Jan") echo "Selected";
						echo '>January</option>';
				echo '<option  value="Feb"';
						if($curr_month == "Feb") echo "Selected";
						echo '>February</option>';
				echo '<option  value="Mar"';
						if($curr_month == "Mar") echo "Selected";
						echo '>March</option>';
				echo '<option  value="Apr"';
						if($curr_month == "Apr") echo "Selected";
						echo '>April</option>';
				echo '<option  value="May"';
						if($curr_month == "May") echo "Selected";
						echo '>May</option>';
				echo '<option  value="Jun"';
						if($curr_month == "Jun") echo "Selected";
						echo '>June</option>';
				echo '<option  value="Jul"';
						if($curr_month == "Jul") echo "Selected";
						echo '>July</option>';
				echo '<option  value="Aug"';
						if($curr_month == "Aug") echo "Selected";
						echo '>August</option>';
				echo '<option  value="Sep"';
						if($curr_month == "Sep") echo "Selected";
						echo '>September</option>';
				echo '<option  value="Oct"';
						if($curr_month == "Oct") echo "Selected";
						echo '>October</option>';
				echo '<option  value="Nov"';
						if($curr_month == "Nov") echo "Selected";
						echo '>November</option>';
				echo '<option  value="Dec"';
						if($curr_month == "Dec") echo "Selected";
						echo '>December</option>';
						?>
			</select>
			<select Name="year_Dropdown" id="year_Dropdown">
			<?php
				echo '<option  value="16"';
						if($curr_year == "16") echo "Selected";
						echo '>2016</option>';
				echo '<option  value="17"';
						if($curr_year == "17") echo "Selected";
						echo '>2017</option>';
				echo '<option  value="18"';
						if($curr_year == "18") echo "Selected";
						echo '>2018</option>';
				echo '<option  value="19"';
						if($curr_year == "19") echo "Selected";
						echo '>2019</option>';
				echo '<option  value="20"';
						if($curr_year == "20") echo "Selected";
						echo '>2020</option>';
				echo '<option  value="21"';
						if($curr_year == "21") echo "Selected";
						echo '>2021</option>';
				?>
			</select>
			
			
		<input type="submit" name="submit" class="btn button btn-success" value="SUBMIT" />
		</form>
		<h3>Day Count in <?php echo $curr_month.'- 20'.$curr_year; ?> </h3>
		<table border="1" class="table table-striped " cellspacing="0">
		<thead><tr><td><b>Name</b></td><td><b>No of Day(s)</b></td></tr></thead>
		<tbody>
		<?php
		$sql = "SELECT count(id) as count, name FROM `holiday_office` WHERE date LIKE '%".$curr_month."-".$curr_year."%' GROUP BY name";
		$query=mysqli_query($conn, $sql);
		if ($query->num_rows > 0) {
			while( $row=mysqli_fetch_array($query) ) {
				echo '<tr>';
				echo '<td>'.$row['name'].'</td>';
				echo '<td>'.$row['count'].'</td>';
				echo '</tr>';
			}
			$sql = "SELECT count(id) as d FROM `holiday_office` WHERE date LIKE '%".$curr_month."-".$curr_year."%'";
		$result=mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		echo '<tr><td colspan="1">Total</td><td>'.$row['d'].'</td>';
		}
		else
		{
			echo "<tr><td colspan='5'><font color='red' >No Result Found!</font></td></tr>";
		}
		?>
		</tbody></table>
		
		<?php
		$sql = "SELECT * FROM holiday_office WHERE date LIKE '%".$curr_month."-".$curr_year."%'";
		$query=mysqli_query($conn, $sql);
		?>
		<h3>Office Details in <?php echo $curr_month.'- 20'.$curr_year; ?> </h3>
		<table id="holiday_summary" border="1" class="table table-striped " cellspacing="0" width="100%">
		<thead>
				<tr>
				<td><b>Name</b></td>
				<td><b>Date</b></td>
				<td><b>Issue</b></td>
				<td><b>Location</b></td>
				<td><b>Duration</b></td>
				</tr>
		</thead>
		<tbody>
		<?php
		if ($query->num_rows > 0) {
		while( $row=mysqli_fetch_array($query) ) {
					echo '<tr>';
					echo '<td>'.$row['name'].'</td>';
					echo '<td>'.$row['date'].'</td>';
					echo '<td>'.$row['issue'].'</td>';
					echo '<td>'.$row['location'].'</td>';
					echo '<td>'.$row['duration'].'</td>';
					echo '</tr>';
				}
		}
		else
		{
			echo "<tr><td colspan='5'><font color='red' >No Result Found!</font></td></tr>";
		}
		?>
		</tbody>	
		</table>
		
		</div>
	</body>
</html>
