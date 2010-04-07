<?php
// system/application/plugins/doctrine_pi.php

// load Doctrine library
require_once APPPATH.'/plugins/doctrine/lib/Doctrine.php';

// load database configuration from CodeIgniter
require_once APPPATH.'/config/database.php';

// this will allow Doctrine to load Model classes automatically
spl_autoload_register(array('Doctrine', 'autoload'));

// we load our database connections into Doctrine_Manager
// this loop allows us to use multiple connections later on
foreach ($db as $connection_name => $db_values) {

	// first we must convert to dsn format
	$dsn = $db[$connection_name]['dbdriver'] .
		'://' . $db[$connection_name]['username'] .
		':' . $db[$connection_name]['password'].
		'@' . $db[$connection_name]['hostname'] .
		'/' . $db[$connection_name]['database'];

	Doctrine_Manager::connection($dsn,$connection_name);
}

// CodeIgniter's Model class needs to be loaded
require_once BASEPATH.'/libraries/Model.php';

// telling Doctrine where our models are located
Doctrine::loadModels(APPPATH.'/models');

// (OPTIONAL) CONFIGURATION BELOW

$doctrineManager = Doctrine_Manager::getInstance();

// this will allow us to use "mutators"
$doctrineManager->setAttribute(
	Doctrine::ATTR_AUTO_ACCESSOR_OVERRIDE, true);

// this sets all table columns to notnull and unsigned (for ints) by default
$doctrineManager->setAttribute(
	Doctrine::ATTR_DEFAULT_COLUMN_OPTIONS,
	array('notnull' => true, 'unsigned' => true));

// set the default primary key to be named 'id', integer, 4 bytes
$doctrineManager->setAttribute(
	Doctrine::ATTR_DEFAULT_IDENTIFIER_OPTIONS,
	array('name' => 'id', 'type' => 'integer', 'length' => 4));

$doctrineManager->setCharset('utf8');
$doctrineManager->setCollate('utf8_general_ci');