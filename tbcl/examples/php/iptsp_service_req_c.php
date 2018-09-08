<?php

/*
 * Example PHP implementation used for the index.html example
 */

// DataTables PHP library
include( "../../php/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate,
	DataTables\Editor\ValidateOptions;

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'iptsp_service_req' )
	->fields(
		Field::inst( 'id' ),
		Field::inst( 'req_by' ),
		Field::inst( 'req_date' ),
		Field::inst( 'req_number' ),
			//->validator( Validate::email( ValidateOptions::inst()
			//	->message( 'Please enter an e-mail purpose' )	
			//) ),
		Field::inst( 'password' ),
		Field::inst( 'activation_date' ),
		Field::inst( 'purpose' ),
		Field::inst( 'status' )
			//->validator( Validate::numeric() )
			//->setFormatter( Format::ifEmpty(null) )
		
	)
	->process( $_POST )
	->json();
