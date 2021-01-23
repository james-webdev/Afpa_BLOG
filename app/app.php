<?php


if(!isset($_GET['module'])){

	$module = DEFAULT_MODULE;

} else {

	$module = $_GET['module'];

}

if(!isset($_GET['action'])){

	$action = DEFAULT_ACTION;

} else {

	$action = $_GET['action'];

}

$url = "app/controller/". $module . ".php";

if(file_exists($url)){

	include($url);
	new Controller($module, $action);
	
} else {
 die('Module introuvable');
}