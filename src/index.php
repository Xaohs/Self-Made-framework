<?php

require '../vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('views');
$twig = new \Twig\Environment($loader);
$path =  $_SERVER['REQUEST_URI'];
if ($path == "/") {
	include "controllers/HomeController.php";
	$controllerO = new HomeController();
	$controllerO->index($twig);
	die();
}
$exploded = (explode('/', ltrim($path))); 
if (!isset($exploded[2])) {
	http_response_code(404);
	echo "ERROR 404: The page you're looking for does not exist.";
	die();
}
$controller = $exploded[1] .= "Controller.php";
$controller = ucfirst($controller);
$methodExists = lcfirst($exploded[2]);
$controllerExists = "controllers/" . $controller;
$className = str_replace('.php', "", $controller);
if (file_exists($controllerExists)) {
	include $controllerExists;
	$controllerO = new $className();
	if (method_exists($className, $methodExists)) {
		$controllerO->$methodExists($twig);
	} else {
		http_response_code(404);
		echo "ERROR 404: The page you're looking for does not exist.";
		die();
	}
} else {
	http_response_code(404);
	echo "ERROR 404: The page you're looking for does not exist.";
	die();
}
?>
