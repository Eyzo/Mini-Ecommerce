<?php require '../vendor/autoload.php';
use App\Controller\StartController;
use App\Controller\SecurityController;
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

    $r->addRoute(['GET','POST'],'/login',function (){
        SecurityController::login();
    });

    $r->addRoute('GET','/logout',function (){
        SecurityController::logout();
    });

    $r->addRoute(['GET','POST'],'/register',function (){
        SecurityController::register();
    });

    $r->addRoute('GET','/produit/{id: \d+}',function ($id){
        StartController::produit($id);
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
