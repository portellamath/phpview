<?php

include_once 'Conn.php';

class Categoria
{
    private $id;
    private $nome;
    private $conn;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function salvar()
    {
        try {
            $this->conn = new Conn();
            $sql = "CALL salvar_categoria(?, ?)";
            $executar = $this->conn->prepare($sql);
            $executar->bindValue(1, $this->id);
            $executar->bindValue(2, mb_strtoupper($this->nome));
            return $executar->execute() == 1 ? true : false;
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }
}
