<?php
//var_dump($_GET);
define('SERVER_ROOT', __DIR__);
define('CLIENT_ROOT', str_replace($_SERVER['DOCUMENT_ROOT'],'',__DIR__));
//redefinition des root
//var_dump(__DIR__, $_SERVER, SERVER_ROOT, CLIENT_ROOT);
spl_autoload_register(function($class){
	$dir=array('core','controllers','models','views');
	foreach ($dir as $key => $value) {
		if (file_exists($value.'/'.$class.'.php')) {
			include $value.'/'.$class.'.php';
		}
	}
});

$controllerName=ucfirst($_GET['controller']).'Controller';
$actionName=$_GET['action'].'Action';

if(class_exists($controllerName)){
	$controller=new $controllerName();
}
else{
	exit('page inexistante');
}
if(method_exists($controller,$actionName)){
	$controller->$actionName();
}
else{
	exit('page inexistante');
}