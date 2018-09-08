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
Editor::inst( $db, 'mux_info' )
	->fields(
		Field::inst( 'id' ),
		Field::inst( 'zone' ),
		Field::inst( 'location' ),
		Field::inst( 'equipment' ),
			//->validator( Validate::email( ValidateOptions::inst()
			//	->message( 'Please enter an e-mail ip1' )	
			//) ),
		Field::inst( 'hardware_model' ),
		Field::inst( 'software_model' ),
		Field::inst( 'ip1' ),
		Field::inst( 'ip2' ),
		Field::inst( 'comment' )
			//->validator( Validate::numeric() )
			//->setFormatter( Format::ifEmpty(null) )
		
	)
	->process( $_POST )
	->json();
