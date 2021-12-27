<?php 
class DB extends Conexion
{
    private $conexion;
    private $query;
    private $values;



    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion =   $this->conexion->conect();
    }


    /* ----------------------------------------------------- */
    /*             SELECT ALL                  */
    /* ----------------------------------------------------- */
    public function selectAll(string $query)
    {
        $this->query = $query;
        $result = $this->conexion->prepare($this->query);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }






}