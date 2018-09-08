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
Editor::inst( $db, 'inventory' )
	->fields(
		Field::inst( 'id' ),
		Field::inst( 'type' ),
		Field::inst( 'name' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
				->message( 'A name is required' )	
			) ),
			
		Field::inst( 'model' ),
		Field::inst( 'serial' ),
		Field::inst( 'location' ),
		Field::inst( 'room' ),
			//->validator( Validate::email( ValidateOptions::inst()
			//	->message( 'Please enter an e-mail address' )	
			//) ),
		Field::inst( 'quantity' ),
		Field::inst( 'minQuantity' ),
		Field::inst( 'lastChecked' ),
		Field::inst( 'comment' ),
		Field::inst( 'status' ),
		Field::inst( 'remarks' )
			//->validator( Validate::numeric() )
			//->setFormatter( Format::ifEmpty(null) )
	)
	->process( $_POST )
	->json();
