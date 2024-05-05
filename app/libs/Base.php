<?php

class Base 
{
    private $host = DB_HOST;
    private $db_name = DB_NAME;
    private $user = DB_USER;
    private $password = DB_PASSWORD;

    private $dbh;
    private $stmt;
    private $error;

    //Para crear conexión segura a BD con PDO

    public function __construct()
    {
        $dns = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        $options = [
            PDO::ATTR_ERRMODE => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try{
            $this->dbh = new PDO($dns , $this->user , $this->password , $options);
            $this->dbh->exec('set names utf8');
        }catch(PDOException $e){
            $this->error = $e -> getMessage();
            echo $this->error;
        }
    }

    public function query($query)
    {
        return $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param , $value , $type = null)
    {
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                break;
                default:
                $type = PDO::PARAM_STR;
                break;
            }
        }

        return $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        return $this->stmt->execute();
    }

    public function registers()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function register()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function row()
    {
        return $this->stmt->rowCount();
    }
}