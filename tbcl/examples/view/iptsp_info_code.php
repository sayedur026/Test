<?php
include 'db.php';

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;

$columns = array( 
// datatable column index  => database column name
	0 => 'username', 
	1 => 'account',
	2 => 'zone',
	3 => 'iptsp_name',
	4 => 'sip_server',
	5 => 'address',
	6 => 'SAF',
	7 => 'remarks'
);



// getting total number records without any search
$sql = "SELECT id";
$sql.=" FROM iptsp_info";
$query=mysqli_query($conn, $sql) or die("iptsp_info_code.php: get ");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT * ";
$sql.=" FROM iptsp_info WHERE 1=1";
if( !empty($requestData['columns'][0]['search']['value']) ){
	$sql.=" AND  username LIKE '%".$requestData['columns'][0]['search']['value']."%' ";    
}
if( !empty($requestData['columns'][1]['search']['value']) ){
	$sql.=" AND  account LIKE '%".$requestData['columns'][1]['search']['value']."%' ";
}
if( !empty($requestData['columns'][2]['search']['value']) ){
	$sql.=" AND  zone LIKE '%".$requestData['columns'][2]['search']['value']."%' ";    
}
if( !empty($requestData['columns'][3]['search']['value']) ){
	$sql.=" AND  iptsp_name LIKE '%".$requestData['columns'][3]['search']['value']."%' ";
}
if( !empty($requestData['columns'][4]['search']['value']) ){
	$sql.=" AND  sip_server LIKE '%".$requestData['columns'][4]['search']['value']."%' ";    
}
if( !empty($requestData['columns'][5]['search']['value']) ){
	$sql.=" AND  address LIKE '%".$requestData['columns'][5]['search']['value']."%' ";
}
if( !empty($requestData['columns'][6]['search']['value']) ){
	$sql.=" AND  SAF LIKE '%".$requestData['columns'][6]['search']['value']."%' ";    
}
if( !empty($requestData['columns'][7]['search']['value']) ){
	$sql.=" AND  remarks LIKE '%".$requestData['columns'][7]['search']['value']."%' ";
}

$query=mysqli_query($conn, $sql) or die("iptsp_info_code.php: get ");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains column index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("iptsp_info_code.php: get ");
	

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["username"];
	$nestedData[] = $row["account"];
	$nestedData[] = $row["zone"];
	$nestedData[] = $row["iptsp_name"];
	$nestedData[] = $row["sip_server"];
	$nestedData[] = $row["address"];
	$nestedData[] = $row["SAF"];
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
