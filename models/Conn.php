<?php

class Conn extends PDO
{
    private static $instancia;
    private $host    = "localhost";
    private $usuario = "root";
    private $senha   = "";
    private $db      = "bd_backend";

    public function __construct()
    {
        parent::__construct(
            "mysql:host=$this->host;dbname=$this->db;charset=utf8mb4",
            "$this->usuario",
            "$this->senha"
        );
    }

    public static function getInstance()
    {
        if (!isset(self::$instancia)) {
            try {
                self::$instancia = new Conn;
            } catch (Exception $e) {
                echo 'Erro ao conectar';
                exit();
            }
        }
        return self::$instancia;
    }
}
