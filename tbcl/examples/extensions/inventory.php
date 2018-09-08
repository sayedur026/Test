<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>Inventory Database - Editor</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/editor.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.5/css/select.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="../resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="../resources/demo.css">
	<style type="text/css" class="init">
	
	a.buttons-collection {
		margin-left: 1em;
	}

	</style>
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="../../js/dataTables.editor.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
	<script type="text/javascript" language="javascript" src="../resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="../resources/demo.js"></script>
	<script type="text/javascript" language="javascript" src="../resources/editor-demo.js"></script>
	<script type="text/javascript" language="javascript" class="init">
	


var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function() {
	editor = new $.fn.dataTable.Editor( {
		ajax: "../php/inventory_code.php",
		fixedHeader: true,
		table: "#example",
		fields: [ {
				label: "ID:",
				name: "id"
			}, {
				label: "Type:",
				name: "type"
			}, {
				label: "Name:",
				name: "name"
			}, {
				label: "Model:",
				name: "model"
			}, {
				label: "Serial:",
				name: "serial"
			}, {
				label: "Location:",
				name: "location"
			}, {
				label: "Room:",
				name: "room"
			}, {
				label: "Quantity:",
				name: "quantity"
			}, {
				label: "MinQuantity:",
				name: "minQuantity"
			}, {
				label: "LastChecked:",
				name: "lastChecked"
			}, {
				label: "Comment:",
				name: "comment"
			}, {
				label: "Status:",
				name: "status"
			}, {
				label: "Remarks:",
				name: "remarks"
			}
		]
	} );

	$('#example').DataTable( {
		dom: 'Bfrtip',
		ajax: "../php/inventory_code.php",
		columns: [
			{ data: "id" },
			{ data: "type" },
			{ data: "name" },
			{ data: "model" },
			{ data: "serial" },
			{ data: "location" },
			{ data: "room" },
			{ data: "quantity" },
			{ data: "minQuantity" },
			{ data: "lastChecked" },
			{ data: "comment" },
			{ data: "status" },
			{ data: "remarks" }
		],
		select: true,
		buttons: [
			{ extend: 'create', editor: editor },
			{ extend: 'edit',   editor: editor },
			{ extend: 'remove', editor: editor },
			{ extend: 'selectNone', editor: editor },
			{
				extend: 'collection',
				text: 'Export',
				buttons: [
					'copy',
					'excel',
					'csv',
					'pdf',
					'print',
					'selectNone'
				]
			}
		]
	} );
} );



	</script>
</head>
<body class="dt-example">
<?php include 'edit_menu.php'; ?>
	<div class="container">
		<section>
			
			
			<div class="demo-html"></div>
			<table id="example" class="display" style="width:100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>Type</th>
						<th>Name</th>
						<th>Model</th>
						<th>Serial</th>
						<th>Location</th>
						<th>Room</th>
						<th>Quantity</th>
						<th>Min Quantity</th>
						<th>Last Checked</th>
						<th>Comment</th>
						<th>Status</th>
						<th>Remarks</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>ID</th>
						<th>Type</th>
						<th>Name</th>
						<th>Model</th>
						<th>Serial</th>
						<th>Location</th>
						<th>Room</th>
						<th>Quantity</th>
						<th>Min Quantity</th>
						<th>Last Checked</th>
						<th>Comment</th>
						<th>Status</th>
						<th>Remarks</th>
					</tr>
				</tfoot>
			</table>
			
			</section>
	</div>
</body>
</html>