<?php
namespace App\Core;

class PdoConnection {

    private $pdo;
    protected $table;
    protected $class;


    public function initPDO($data = []) {

        try {
            $this->pdo = new \PDO($data['dsn'],$data['user'],$data['password']);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
        } catch (\Exception $e) {
            echo 'Erreur pdo '.$e->getMessage();
        }
    }

    public function getPDO() {
        if (is_null($this->pdo)) {

            $data = [
                'dsn' => 'mysql:host=localhost;dbname=mini-ecommerce;charset=utf8',
                'user' => 'root',
                'password' => ''
            ];


            $this->initPDO($data);
        }

        return $this->pdo;
    }

    public function findAll() {
        $statement = $this->getPDO()->query("SELECT * FROM {$this->table}");
        $statement->execute();
        $results = $statement->fetchAll(\PDO::FETCH_CLASS,$this->class);
        return $results;
    }

    public function find($id) {
        $statement = $this->getPDO()->prepare("SELECT * FROM {$this->table} WHERE id= :id");
        $statement->bindValue(':id',$id);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_CLASS,$this->class);
        $result = $statement->fetch();
        return $result;
    }


}
