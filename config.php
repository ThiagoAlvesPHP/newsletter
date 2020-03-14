<?php
require 'environment.php';

$config = array();

if (ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost/newsletter/");
	$config['dbname'] = 'newsletter';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	define("BASE_URL", "http://www.ganmix.com/");
	$config['dbname'] = 'ganmi302_ganmix';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'ganmi302';
	$config['dbpass'] = 'teamotata30';
}

global $db;
try {
	$options = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"];
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass'], $options);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo "Falhou ".$e->getMessage();
	exit;
}
?>