<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['hostname'] 	= 'localhost';
$config['username'] 	= ($_SERVER['SERVER_NAME'] == 'localhost') ? 'root' : 'dev_eyesoccer';
$config['password'] 	= ($_SERVER['SERVER_NAME'] == 'localhost') ? '' : 'kaca-muka-siapakah-ini-2018';
$config['database'] 	= ($_SERVER['SERVER_NAME'] == 'localhost') ? 'admin_eyesoback' : 'dev_eyesoccer';
$config['dbprefix'] 	= 'es_';
$config['dbdriver'] 	= 'mysqli';