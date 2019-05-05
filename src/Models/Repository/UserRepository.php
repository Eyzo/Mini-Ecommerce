<?php
namespace App\Models\Repository;

use App\Core\PdoConnection;

class UserRepository extends PdoConnection {

    protected $class = 'App\Models\User';
    protected $table = 'user';

    public function findUniqueName($nom) {
        $statement = $this->getPDO()->prepare("SELECT * FROM {$this->table} WHERE name= :name");
        $statement->bindValue(':name',$nom);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_CLASS,$this->class);
        $result = $statement->fetch();
        return $result;
    }

    public function InsertUser($name,$password) {
        $statement = $this->getPDO()
            ->prepare("INSERT INTO user (name, password) VALUES (:name, :password)");
        $statement->bindValue(':name',$name);
        $statement->bindValue(':password',$password);
        $statement->execute();
    }



}
