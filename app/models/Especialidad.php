    <?php

class Especialidad extends Validator
{
    // Declaracion de propiedades
    private $codi_espe = null;
    private $nomb_espe = null;
    private $esta_espe = null;

    // Encapsulando
    public function setCodiEspe($value)
    {
        if ($this->validateId($value)) {
            $this->codi_espe = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiEspe()
    {
        return $this->codi_espe;
    }
    public function setNombEspe($value)
    {
        if ($this->validateAlphanumeric($value,1,50)) {
            $this->nomb_espe = $value;
            return true;
        } else {
            return false;
        }
        
    }
    public function getNombEspe()
    {
        return $this->nomb_espe;
    }
    public function setEstaEspe($value)
    {
        if ($this->validateId($value)) {
            $this->esta_espe = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getEstaEspe()
    {
        return $this->esta_espe;
    }
    public function obtenerListaEspecialidad()
    {
        $sql = "SELECT * FROM especialidad WHERE esta_espe=1 ORDER BY nomb_espe";
        $params = array(null);
        return Database::getRows($sql, $params);
    }
}