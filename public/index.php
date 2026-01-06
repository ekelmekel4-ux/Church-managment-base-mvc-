<?php
session_start();

require_once "../app/core/Database.php";
require_once "../app/core/Controller.php";

$db = new Database();

$url = $_GET['url'] ?? 'auth/index';
$url = explode('/', $url);

$controllerName = ucfirst($url[0]) . "Controller";
$method = $url[1] ?? 'index';
$param = $url[2] ?? null;

require_once "../app/controllers/$controllerName.php";

$controller = new $controllerName($db);

$param ? $controller->$method($param) : $controller->$method();
