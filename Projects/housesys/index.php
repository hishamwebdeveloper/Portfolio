<?php
	// Start Session
	session_start();
	
	// Include Config
	require('config.php');
	
	require('classes/Bootstrap.php');
	require('classes/Controller.php');
	require('classes/Model.php');
	
	require('controllers/dashboard.php');
	require('controllers/house.php');
	require('controllers/task.php');
	require('controllers/employee.php');
	require('controllers/salary.php');
	
	require('models/dashboard.php');
	require('models/house.php');
	require('models/task.php');
	require('models/employee.php');
	require('models/salary.php');

	$bootstrap = new Bootstrap($_GET);
	$controller = $bootstrap->createController();
	if($controller){
		$controller->executeAction();
	}