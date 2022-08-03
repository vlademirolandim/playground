<?php
class Cliente{
    private $idCliente;
    private $nome;
    private $dtNasc;

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
            $this->setDtNasc($row["DTNASC"]);
        }
    }

    public function __toString()
    {
        return json_encode(array(
            "idCliente" => $this->getIdCliente(),
            "nome" => $this->getNome(),
            "dtNasc" => $this->getDtNasc()
        ));
    }

    /**
     * Get the value of dtNasc
     */
    public function getDtNasc()
    {
        return $this->dtNasc;
    }

    /**
     * Set the value of dtNasc
     */
    public function setDtNasc($dtNasc): self
    {
        $this->dtNasc = new DateTime($dtNasc);

        return $this;
    }
}