<?php require '../vendor/autoload.php';
use App\Controller\StartController;
session_start();


$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r){

    $r->addRoute('GET','/',function (){
        StartController::index();
    });

    $r->addRoute('GET','/panier/add/{id: \d+}',function ($id){
        StartController::addPanier($id);
    });

    $r->addRoute('GET','/panier',function (){
        StartController::panier();
    });
});

$requestMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$pos = strpos($uri,'?');

if (false !== $pos) {
    $uri = substr($uri,0,$pos);
}

$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($requestMethod,$uri);
$httpCode = $routeInfo[0];
$callBack = $routeInfo[1];
$params = $routeInfo[2];

if (is_callable($callBack)){
    call_user_func_array($callBack,$params);
}
