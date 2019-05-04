<?php
namespace App\Controller;

use App\Core\Controller;

class StartController extends Controller {

    public static function index() {

        $repo = parent::getRepository('Products');
        $products = $repo->findAll();

        parent::render('home/index.php',[
            'title' => 'Home',
            'description' => 'Mini Site e-commerce ou vous pouvez trouver toute sortent de produits',
            'products' => $products
        ]);
    }

    public static function addPanier($id) {

        if (!isset($_SESSION['panier'][$id])) {

            $_SESSION['panier'][$id] = 1;

        } else {

         $_SESSION['panier'][$id]++;

        }

        header('Location: /panier');

    }

    public static function panier() {

        if (isset($_SESSION['panier'])) {

            $panier = $_SESSION['panier'];

        } else {

            $_SESSION['panier'] = [];
            $panier = $_SESSION['panier'];

        }

        $produits = [];

        foreach($panier as $produit => $quantite) {

            $repo = parent::getRepository('Products');
            $produit = $repo->find(intval($produit));

            $produits[] = $produit;
        }

        parent::render('home/panier.php',[
            'panier' => $panier,
            'produits' => $produits
        ]);
    }


}
