<?php session_start(); ?>
<?php include '../view/db.php'; 
$curr_selected ="all"?>
<!DOCTYPE html>
<html>
	<title>Router Summary | TBCL</title>
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
	<?php include 'edit_menu.php'; ?>
		
		<div class="header"><h1>Router Summary</h1></div>
		<div class="container">
		<?php
				$sql='SELECT SUM(quantity) AS total  FROM `router_info`';
				$query=mysqli_query($conn, $sql);
				$row1=mysqli_fetch_array($query);
				
				$sql='SELECT SUM(quantity) AS live  FROM `router_info` WHERE status="LIVE"';
				$query=mysqli_query($conn, $sql);
				$row2=mysqli_fetch_array($query);
				
				$sql='SELECT SUM(quantity) AS spare  FROM `router_info` WHERE status="Spare"';
				$query=mysqli_query($conn, $sql);
				$row3=mysqli_fetch_array($query);
				echo '<h3>Total Router: '.$row1["total"].' <br />';
				echo 'LIVE: '.$row2["live"].' | ';
				echo 'Spare: '.$row3["spare"].' </h3>';
		if(isset($_POST['Network_Dropdown']))
		{
			$curr_selected = $_POST['Network_Dropdown'];
		}
		echo '<form method="post" action="">
		<select Name="Network_Dropdown" onchange="run()" id="Network_Dropdown">
            <option  value="all" ';
			if($curr_selected=="all") echo 'selected';
			echo'>ALL</option>
            <option value="live" ';
			if($curr_selected=="live") echo 'selected';
			echo '>Live</option>
            <option value="spare" ';
			if($curr_selected=="spare") echo 'selected';
			echo '>Spare</option>
		</select>' ?>
		 <input type="submit" name="submit" class="btn button btn-success" value="SUBMIT" />
		</form>
		
		
			<table id="employee-grid" border="1" class="table table-striped " cellspacing="0" width="100%">
			<thead>
			<?php
				if(isset($curr_selected))
				{
					echo '
				<tr>
				<td><b>Model</b></td>
				<td><b>Status</b></td>
				<td><b>Quantity</b></td>
				</tr>';
				
					if($curr_selected=="all")
						$sql='SELECT router_info.model,router_info.status, SUM(router_info.quantity) AS quantity FROM `router_info`
						GROUP BY router_info.model ORDER BY router_info.model';
					else if($curr_selected=="live")
						$sql='SELECT router_info.model,router_info.status, SUM(router_info.quantity) AS quantity FROM `router_info`
						WHERE router_info.status="LIVE" GROUP BY router_info.model';
					else if($curr_selected=="spare")
						$sql='SELECT router_info.model,router_info.status, SUM(router_info.quantity) AS quantity FROM `router_info`
						WHERE router_info.status="Spare" GROUP BY router_info.model';
					else
						$sql='SELECT router_info.model,router_info.status, SUM(router_info.quantity) AS quantity FROM `router_info`
						 WHERE 1!=1 GROUP BY router_info.model';
				
				$query=mysqli_query($conn, $sql);
				while( $row=mysqli_fetch_array($query) ) {
					echo '<tr>';
					echo '<td>'.$row['model'].'</td>';
					echo '<td>'.$row['status'].'</td>';
					echo '<td>'.$row['quantity'].'</td>';
					echo '</tr>';
				}
				
				}
				?>
			</thead>	
			</table>
		</div>
	</body>
</html>
