<?php

class EstadoCivil extends Validator
{
    public function obtenerListaEstadoCivil()
    {
        $sql = "SELECT * FROM estado_civil WHERE esta_esta_civi=1 ORDER BY nomb_esta_civi";
        $params = array(null);
        return Database::getRows($sql, $params);
    }
}
