<?php

// This is the database connection configuration.
return array(
	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/purchaseorderdb.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=localhost;dbname=purchaseorderdb',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => 'admin',
	'charset' => 'utf8',
	
);