<?php
include 'db.php';

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;

$columns = array( 
// datatable column index  => database column ips_no
	0 => 'id', 
	1 => 'type',
	2 => 'name',
	3 => 'model',
	4 => 'serial', 
	5 => 'location',
	6 => 'room', 
	7 => 'quantity',
	8 => 'minQuantity',
	9 => 'lastChecked',
	10 => 'comment', 
	11 => 'status',
	11 => 'remarks'
);
// getting total number records without any search
$sql = "SELECT id";
$sql.=" FROM inventory";
$query=mysqli_query($conn, $sql) or die("inventory_code.php: get ");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT * ";
$sql.=" FROM inventory WHERE 1=1";
if( !empty($requestData['columns'][0]['search']['value']) ){
	$sql.=" AND  id LIKE '%".$requestData['columns'][0]['search']['value']."%' ";    
}
if( !empty($requestData['columns'][1]['search']['value']) ){
	$sql.=" AND  type LIKE '%".$requestData['columns'][1]['search']['value']."%' ";
}
if( !empty($requestData['columns'][2]['search']['value']) ){
	$sql.=" AND  name LIKE '%".$requestData['columns'][2]['search']['value']."%' ";
}
if( !empty($requestData['columns'][3]['search']['value']) ){
	$sql.=" AND  model LIKE '%".$requestData['columns'][3]['search']['value']."%' ";
}
if( !empty($requestData['columns'][4]['search']['value']) ){
	$sql.=" AND  serial LIKE '%".$requestData['columns'][4]['search']['value']."%' ";    
}
if( !empty($requestData['columns'][5]['search']['value']) ){
	$sql.=" AND  location LIKE '%".$requestData['columns'][5]['search']['value']."%' ";
}
if( !empty($requestData['columns'][6]['search']['value']) ){
	$sql.=" AND  room LIKE '%".$requestData['columns'][6]['search']['value']."%' ";    
}
if( !empty($requestData['columns'][7]['search']['value']) ){
	$sql.=" AND  quantity LIKE '%".$requestData['columns'][7]['search']['value']."%' ";
}
if( !empty($requestData['columns'][8]['search']['value']) ){
	$sql.=" AND  minQuantity LIKE '%".$requestData['columns'][8]['search']['value']."%' ";
}
if( !empty($requestData['columns'][9]['search']['value']) ){
	$sql.=" AND  lastChecked LIKE '%".$requestData['columns'][9]['search']['value']."%' ";
}
if( !empty($requestData['columns'][10]['search']['value']) ){
	$sql.=" AND  comment LIKE '%".$requestData['columns'][10]['search']['value']."%' ";    
}
if( !empty($requestData['columns'][11]['search']['value']) ){
	$sql.=" AND  status LIKE '%".$requestData['columns'][11]['search']['value']."%' ";
}
if( !empty($requestData['columns'][12]['search']['value']) ){
	$sql.=" AND  remarks LIKE '%".$requestData['columns'][12]['search']['value']."%' ";
}

$query=mysqli_query($conn, $sql) or die("inventory_code.php: get ");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains column index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("inventory_code.php: get ");
	

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["id"];
	$nestedData[] = $row["type"];
	$nestedData[] = $row["name"];
	$nestedData[] = $row["model"];
	$nestedData[] = $row["serial"];
	$nestedData[] = $row["location"];
	$nestedData[] = $row["room"];
	$nestedData[] = $row["quantity"];
	$nestedData[] = $row["minQuantity"];
	$nestedData[] = $row["lastChecked"];
	$nestedData[] = $row["comment"];
	$nestedData[] = $row["status"];
	$nestedData[] = $row["remarks"];
	$data[] = $nestedData;
}

$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
