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
Editor::inst( $db, 'contact' )
	->fields(
		Field::inst( 'id' ),
		Field::inst( 'type' ),
		Field::inst( 'company_name' ),
		Field::inst( 'contact_point' ),
			//->validator( Validate::email( ValidateOptions::inst()
			//	->message( 'Please enter an e-mail address' )	
			//) ),
		Field::inst( 'contact_number' ),
		Field::inst( 'email' ),
		Field::inst( 'address' ),
		Field::inst( 'service_type' ),
		Field::inst( 'remarks' )
			//->validator( Validate::numeric() )
			//->setFormatter( Format::ifEmpty(null) )
		
	)
	->process( $_POST )
	->json();
