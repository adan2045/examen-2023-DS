<?php
class Mascota
{
    public $Id;
    public $Nombre;
    public $Raza;
    public $Especie;

    public static function BuscarTodas()
    {
        $con  = Database::getInstance();
        $sql = "select * from mascota";
        $queryClaseAReemplazar = $con->db->prepare($sql);
        $queryClaseAReemplazar->execute();
        $queryClaseAReemplazar->setFetchMode(PDO::FETCH_CLASS, 'Mascota');

        $claseAReemplazarADevolver = array();

        foreach ($queryClaseAReemplazar as $m) {
            $claseAReemplazarADevolver[] = $m;
        }

        return $claseAReemplazarADevolver;
    }

    public function Agregar()
    {
        $con  = Database::getInstance();
        $sql = "insert into mascota (Nombre,Raza,Especie) values (:p1,:p2,:p3)";
        $claseAReemplazar = $con->db->prepare($sql);
        $params = array("p1" => $this->Nombre, "p2" => $this->Raza, "p3" => $this->Especie);
        $claseAReemplazar->execute($params);
    }
}
