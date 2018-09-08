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
Editor::inst( $db, 'tj_details' )
	->fields(
		Field::inst( 'id' ),
		Field::inst( 'name' ),
		Field::inst( 'location' ),
		Field::inst( 'core' ),
			//->validator( Validate::email( ValidateOptions::inst()
			//	->message( 'Please enter an e-mail comment' )	
			//) ),
		Field::inst( 'tjid' ),
		Field::inst( 'date' )
			//->validator( Validate::numeric() )
			//->setFormatter( Format::ifEmpty(null) )
	)
	->process( $_POST )
	->json();
