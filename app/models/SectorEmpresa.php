    <?php

class SectorEmpresa extends Validator
{
    public function obtenerListaSectorEmpresa()
    {
        $sql = "SELECT * FROM sector_empresa WHERE esta_sect_empr=1 ORDER BY nomb_sect_empr";
        $params = array(null);
        return Database::getRows($sql, $params);
    }
}