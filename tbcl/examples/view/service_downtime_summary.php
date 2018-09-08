<!DOCTYPE html>
<html>
	<title>Service Downtime Summary Database | TBCL</title>
	<head>
		<meta name="description" content="Contact Point Database | TBCL" />
		<meta name="keywords" content="Contact Point Database | TBCL" />
		<meta name="author" content="Sayedur Rahman" />
		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		 <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

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
			#chart-container {
				width: 90%;
				height: auto;
			}
		</style>
		
	</head>
	<body>
	<?php include 'menu.php'; include 'db.php'; 
	if(isset($_POST['month_Dropdown']))
	{
		$curr_month = $_POST['month_Dropdown'];
		$curr_year = $_POST['year_Dropdown'];
	}
	else
	{
		$curr_month = date("m",strtotime('-1 month', time()));
		$curr_year = date("Y");
	}
	?>
		<div class="header"><h1>Service Downtime Summary</h1></div>
		<div class="container">
		<div id="chart-container">
			<canvas id="mycanvas"></canvas>
			<h6><center>Legend: X : Month - Year, Y : Minutes</center></h6>
		</div><br/>
		<form method="post" action="">
			<select Name="month_Dropdown" id="month_Dropdown">
			<?php 
				echo '<option  value=""';
						if($curr_month == "") echo "Selected";
						echo '>ALL</option>';
				echo '<option  value="01"';
						if($curr_month == "01") echo "Selected";
						echo '>January</option>';
				echo '<option  value="02"';
						if($curr_month == "02") echo "Selected";
						echo '>February</option>';
				echo '<option  value="03"';
						if($curr_month == "03") echo "Selected";
						echo '>March</option>';
				echo '<option  value="04"';
						if($curr_month == "04") echo "Selected";
						echo '>April</option>';
				echo '<option  value="05"';
						if($curr_month == "05") echo "Selected";
						echo '>May</option>';
				echo '<option  value="06"';
						if($curr_month == "06") echo "Selected";
						echo '>June</option>';
				echo '<option  value="07"';
						if($curr_month == "07") echo "Selected";
						echo '>July</option>';
				echo '<option  value="08"';
						if($curr_month == "08") echo "Selected";
						echo '>August</option>';
				echo '<option  value="09"';
						if($curr_month == "09") echo "Selected";
						echo '>September</option>';
				echo '<option  value="10"';
						if($curr_month == "10") echo "Selected";
						echo '>October</option>';
				echo '<option  value="11"';
						if($curr_month == "11") echo "Selected";
						echo '>November</option>';
				echo '<option  value="12"';
						if($curr_month == "12") echo "Selected";
						echo '>December</option>';
						?>
			</select>
			<select Name="year_Dropdown" id="year_Dropdown">
			<?php
				echo '<option  value="2016"';
						if($curr_year == "2016") echo "Selected";
						echo '>2016</option>';
				echo '<option  value="2017"';
						if($curr_year == "2017") echo "Selected";
						echo '>2017</option>';
				echo '<option  value="2018"';
						if($curr_year == "2018") echo "Selected";
						echo '>2018</option>';
				echo '<option  value="2019"';
						if($curr_year == "2019") echo "Selected";
						echo '>2019</option>';
				echo '<option  value="2020"';
						if($curr_year == "2020") echo "Selected";
						echo '>2020</option>';
				echo '<option  value="2021"';
						if($curr_year == "2021") echo "Selected";
						echo '>2021</option>';
				?>
			</select>
			
			
		<input type="submit" name="submit" class="btn button btn-success" value="SUBMIT" />
		</form>
		<h3>Downtime Summary</h3>
		<table border="1" class="table table-striped " cellspacing="0">
		<thead><tr><td><b>Month</b></td><td><b>Year</b></td><td><b>Downtime</b></td></tr></thead>
		<tbody>
		<?php
		$sql = "SELECT SPLIT_STRING(date,'.',2) as month, SPLIT_STRING(date,'.',3) as year, CONCAT(SPLIT_STRING(date,'.',2),'-',SPLIT_STRING(date,'.',3)) as axis1, SUM(duration) as duration FROM service_downtime WHERE date LIKE '%".$curr_month.".".$curr_year."%' GROUP BY month";
		$query=mysqli_query($conn, $sql);
		if ($query->num_rows > 0) {
			while( $row=mysqli_fetch_array($query) ) {
				echo '<tr>';
				echo '<td>'.$row['month'].'</td>';
				echo '<td>'.$row['year'].'</td>';
				echo '<td>'.$row['duration'].'</td>';
				echo '</tr>';
			}
			$sql = "SELECT SUM(duration) as d FROM service_downtime WHERE date LIKE '%".$curr_month.".".$curr_year."%'";
		$result=mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		echo '<tr><td colspan="2">Total</td><td>'.$row['d'].'</td>';
		}
		else
		{
			echo "<tr><td colspan='5'><font color='red' >No Result Found!</font></td></tr>";
		}
		?>
		</tbody></table>
		
		
		
		</div>
		<script type="text/javascript" src="../extensions/js/jquery.min.js"></script>
		<script type="text/javascript" src="../extensions/js/Chart.min.js"></script>
		<script type="text/javascript" src="../extensions/app.js"></script>
		
		<script src="assets/js/bootstrap.min.js"></script>
	</body>
</html>
