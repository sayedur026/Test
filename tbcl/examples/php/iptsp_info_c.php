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
Editor::inst( $db, 'iptsp_info' )
	->fields(
		Field::inst( 'id' ),
		Field::inst( 'username' ),
		Field::inst( 'account' ),
		Field::inst( 'zone' ),
			//->validator( Validate::email( ValidateOptions::inst()
			//	->message( 'Please enter an e-mail address' )	
			//) ),
		Field::inst( 'iptsp_name' ),
		Field::inst( 'sip_server' ),
		Field::inst( 'address' ),
		Field::inst( 'SAF' ),
		Field::inst( 'remarks' )
			//->validator( Validate::numeric() )
			//->setFormatter( Format::ifEmpty(null) )
		
	)
	->process( $_POST )
	->json();
?>