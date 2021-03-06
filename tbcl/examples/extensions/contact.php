<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>Contact Database - Editor</title>
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
		ajax: "../php/contact_code.php",
		fixedHeader: true,
		table: "#example",
		fields: [ {
				label: "ID:",
				name: "id"
			}, {
				label: "Type:",
				name: "type"
			}, {
				label: "Company Name:",
				name: "company_name"
			}, {
				label: "Contact Point:",
				name: "contact_point"
			}, {
				label: "Contact Number:",
				name: "contact_number"
			}, {
				label: "Email:",
				name: "email"
			}, {
				label: "Address:",
				name: "address"
			}, {
				label: "Service Type:",
				name: "service_type"
			}, {
				label: "Remarks:",
				name: "remarks"
			}
		]
	} );

	$('#example').DataTable( {
		dom: 'Bfrtip',
		ajax: "../php/contact_code.php",
		columns: [
			{ data: "id" },
			{ data: "type" },
			{ data: "company_name" },
			{ data: "contact_point" },
			{ data: "contact_number" },
			{ data: "email" },
			{ data: "address" },
			{ data: "service_type" },
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
						<th>Company Name</th>
						<th>Contact Point</th>
						<th>Contact Number</th>
						<th>Email</th>
						<th>Address</th>
						<th>Service Type</th>
						<th>Remarks</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>ID</th>
						<th>Type</th>
						<th>Company Name</th>
						<th>Contact Point</th>
						<th>Contact Number</th>
						<th>Email</th>
						<th>Address</th>
						<th>Service Type</th>
						<th>Remarks</th>
					</tr>
				</tfoot>
			</table>
			
			</section>
	</div>
</body>
</html>