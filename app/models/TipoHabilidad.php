    <?php

class TipoHabilidad extends Validator
{
    public function obtenerListaTipoHabilidad()
    {
        $sql = "SELECT * FROM tipo_habilidad WHERE esta_tipo_habi=1 ORDER BY nomb_tipo_habi";
        $params = array(null);
        return Database::getRows($sql, $params);
    }
}