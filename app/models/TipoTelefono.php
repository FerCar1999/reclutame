    <?php

class TipoTelefono extends Validator
{
    public function obtenerListaTipoTelefono()
    {
        $sql = "SELECT * FROM tipo_telefono WHERE esta_tipo_tele=1 ORDER BY nomb_tipo_tele";
        $params = array(null);
        return Database::getRows($sql, $params);
    }
}