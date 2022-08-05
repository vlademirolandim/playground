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
    
    /**
     * Get the value of dtNasc
     */
    public function getDtNasc( $formato = "d/m/Y" )
    {
        return $this->dtNasc->format( $formato ); 
    }

    /**
     * Set the value of dtNasc
     */
    public function setDtNasc($dtNasc): self
    {
        $this->dtNasc = new DateTime($dtNasc);

        return $this;
    }

    /**
     * loadById the value of
     *
     * @param int $id
     * @return void
     */
    public function loadById($id){
        $sql = new Sql();
        $results = $sql->select( "select * from clientes WHERE ID_CLIENTE = :ID", array(
            ":ID" => $id
        ));
        $this->setData( $results );
    }

    /**
     *  @param $results
     */
    private function setData( $results ) {

        if (count($results) > 0) {
            $row = $results[0];

            $this->setNome($row['nome']);
            $this->setDtNasc($row['dtnasc']);
        }

    }

    /**
     * method insert
     *
     * @return void
     */
    public function insert(){
        $sql = new Sql();
        $arr = array(
            ':NOME' => $this->getNome(),
            ':DTNASC' => $this->getDtNasc( "Y-m-d" )
        );
        $sql->query("INSERT INTO clientes ( nome, dtnasc ) VALUES ( :NOME , :DTNASC )",
                    $arr );

        var_dump( $sql->select("select * from clientes") ); 
    }

     /**
     * method update
     *
     * @return void
     */
    public function update( $id ){
        $sql = new Sql();
        $arr = array(
            ':NOME' => $this->getNome(),
            ':DTNASC' => $this->getDtNasc( "Y-m-d" ),
            ':ID_CLIENTE' => $id
        );
        $sql->query("UPDATE clientes SET nome = :NOME, dtnasc = :DTNASC  WHERE ID_CLIENTE=:ID_CLIENTE",
                    $arr );

        var_dump( $sql->select("select * from clientes") ); 
    }

     /**
     * method delete
     *
     * @return void
     */
    public function delete( $id ){
        $sql = new Sql();
        $arr = array(
            ':ID_CLIENTE' => $id
        );
        $sql->query("DELETE FROM clientes WHERE ID_CLIENTE=:ID_CLIENTE",
                    $arr );

        $this->setNome("");
        $this->setDtNasc( null );

        var_dump( $sql->select("select * from clientes") ); 

    }

    /**
     * __toString method
     *
     * @return string 
     */
    public function __toString()
    {
        return json_encode(array(
            "idCliente" => $this->getIdCliente(),
            "nome" => $this->getNome(),
            "dtNasc" => $this->getDtNasc()
        ));
    }

    /**
     * getList method
     *
     * @return array with all fields
     */
    public static function getList(){
        $sql = new Sql();
        return $sql->select("select * from clientes order by nome");
    }

    /**
     * search method
     * @param $nome string
     * 
     * @return array with selected row
     */

     public static function search($nome){
        $sql = new Sql();

        return $sql->select("select * from clientes where nome like :SEARCH order by nome",
                        array( ':SEARCH' => "%".$nome."%" ));
     }
    
}