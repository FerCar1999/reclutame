    <?php

class TipoEmpleo extends Validator
{
    public function obtenerListaTipoEmpleo()
    {
        $sql = "SELECT * FROM tipo_empleo WHERE esta_tipo_empl=1 ORDER BY nomb_tipo_empl";
        $params = array(null);
        return Database::getRows($sql, $params);
    }
}