<?php
class Cliente{
    private $idCliente;
    private $nome;

    /**
     * Get the value of idCliente
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * Set the value of idCliente
     */
    public function setIdCliente($idCliente): self
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function loadById($id){
        $sql = new Sql();
        $results = $sql->select( "select * from clientes WHERE ID_CLIENTE = :ID", array(
            ":ID" => $id
        ));
        if (count($results) > 0) {
            $row = $results[0];
            $this->setIdCliente($row["ID_CLIENTE"]);
            $this->setNome($row["NOME"]);
        }
    }

    public function __toString()
    {
        return json_encode(array(
            "idCliente" => $this->getIdCliente(),
            "nome" => $this->getNome()
        ));
    }
}