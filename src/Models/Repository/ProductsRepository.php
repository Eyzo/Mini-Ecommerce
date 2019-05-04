<?php
namespace App\Models\Repository;
use App\Core\PdoConnection;

class ProductsRepository extends PdoConnection {

    protected $table = 'products';
    protected $class = 'App\Models\Products';


}
