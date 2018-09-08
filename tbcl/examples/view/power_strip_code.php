<?php
include 'db.php';

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;

$columns = array( 
// datatable column index  => database column name
	0 => 'name', 
	1 => 'location',
	2 => 'source_ips',
	3 => 'power_input',
	4 => 'port', 
	5 => 'tag',
	6 => 'equipment',
	7 => 'load2',
	8 => 'status'
);



// getting total number records without any search
$sql = "SELECT id";
$sql.=" FROM power_strip";
$query=mysqli_query($conn, $sql) or die("power_strip_code.php: get ");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT * ";
$sql.=" FROM power_strip WHERE 1=1";
if( !empty($requestData['columns'][0]['search']['value']) ){
	$sql.=" AND  name LIKE '%".$requestData['columns'][0]['search']['value']."%' ";    
}
if( !empty($requestData['columns'][1]['search']['value']) ){
	$sql.=" AND  location LIKE '%".$requestData['columns'][1]['search']['value']."%' ";
}
if( !empty($requestData['columns'][2]['search']['value']) ){
	$sql.=" AND  source_ips LIKE '%".$requestData['columns'][2]['search']['value']."%' ";
}
if( !empty($requestData['columns'][3]['search']['value']) ){
	$sql.=" AND  power_input LIKE '%".$requestData['columns'][3]['search']['value']."%' ";
}
if( !empty($requestData['columns'][4]['search']['value']) ){
	$sql.=" AND  port LIKE '%".$requestData['columns'][4]['search']['value']."%' ";    
}
if( !empty($requestData['columns'][5]['search']['value']) ){
	$sql.=" AND  tag LIKE '%".$requestData['columns'][5]['search']['value']."%' ";
}
if( !empty($requestData['columns'][6]['search']['value']) ){
	$sql.=" AND  equipment LIKE '%".$requestData['columns'][6]['search']['value']."%' ";
}
if( !empty($requestData['columns'][7]['search']['value']) ){
	$sql.=" AND  load2 LIKE '%".$requestData['columns'][7]['search']['value']."%' ";
}
if( !empty($requestData['columns'][8]['search']['value']) ){
	$sql.=" AND  status LIKE '%".$requestData['columns'][8]['search']['value']."%' ";
}

$query=mysqli_query($conn, $sql) or die("power_strip_code.php: get ");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains column index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("power_strip_code.php: get ");
	

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["name"];
	$nestedData[] = $row["location"];
	$nestedData[] = $row["source_ips"];
	$nestedData[] = $row["power_input"];
	$nestedData[] = $row["port"];
	$nestedData[] = $row["tag"];
	$nestedData[] = $row["equipment"];
	$nestedData[] = $row["load2"];
	$nestedData[] = $row["status"];
	
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
