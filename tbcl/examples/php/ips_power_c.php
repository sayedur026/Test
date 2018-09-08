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
Editor::inst( $db, 'ips_power' )
	->fields(
		Field::inst( 'id' ),
		Field::inst( 'ips_no' ),
		Field::inst( 'brand' ),
		Field::inst( 'model' ),
			//->validator( Validate::email( ValidateOptions::inst()
			//	->message( 'Please enter an e-mail rem_power' )	
			//) ),
		Field::inst( 'capacity' ),
		Field::inst( 'total_load' ),
		Field::inst( 'rem_power' ),
		Field::inst( 'backup_time' ),
		Field::inst( 'zone' ),
		Field::inst( 'remarks' )
			//->validator( Validate::numeric() )
			//->setFormatter( Format::ifEmpty(null) )
		
	)
	->process( $_POST )
	->json();
