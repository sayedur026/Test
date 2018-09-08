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
Editor::inst( $db, 'tj_connection' )
	->fields(
		Field::inst( 'id' ),
		Field::inst( 'stj' ),
		Field::inst( 'scolor' ),
		Field::inst( 'sdir' ),
			//->validator( Validate::email( ValidateOptions::inst()
			//	->message( 'Please enter an e-mail comment' )	
			//) ),
		Field::inst( 'dtj' ),
		Field::inst( 'dcolor' ),
		Field::inst( 'ddir' ),
		Field::inst( 'via' ),
		Field::inst( 'state' )
			//->validator( Validate::numeric() )
			//->setFormatter( Format::ifEmpty(null) )
	)
	->process( $_POST )
	->json();
