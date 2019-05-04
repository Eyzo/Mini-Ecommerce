<?php
namespace App\Controller;

use App\Core\Controller;

class StartController extends Controller {

    public static function index() {

        $repo = parent::getRepository('Products');
        $products = $repo->findAll();

        dump($products);

        parent::render('home/index.php',[
            'title' => 'Home',
            'description' => 'Mini Site e-commerce ou vous pouvez trouver toute sortent de produits'
        ]);
    }

    public static function products(int $id) {


        parent::render('home/products.php',[
           'id' => $id
        ]);
    }


}
