<?php

include_once 'Conn.php';

class Fornecedor
{
    private $id;
    private $nome;
    private $sigla;
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

    public function getSigla()
    {
        return $this->sigla;
    }

    public function setSigla($sigla)
    {
        $this->sigla = $sigla;
        return $this;
    }

    public function salvar()
    {
        try {
            $this->conn = new Conn();
            $sql = "CALL salvar_fornecedor(?, ?, ?)";
            $executar = $this->conn->prepare($sql);
            $executar->bindValue(1, $this->id);
            $executar->bindValue(2, mb_strtoupper($this->nome));
            $executar->bindValue(3, mb_strtoupper($this->sigla));
            return $executar->execute() == 1 ? true : false;
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }
}
