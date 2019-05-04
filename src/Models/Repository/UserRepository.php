<?php
namespace App\Models\Repository;

use App\Core\PdoConnection;

class UserRepository extends PdoConnection {

    protected $class = 'App\Models\User';
    protected $table = 'user';




}
