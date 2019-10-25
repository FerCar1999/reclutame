    <?php

class Habilidad extends Validator
{
    // Declaracion de propiedades
    private $codi_habi = null;
    private $nomb_habi = null;
    private $codi_tipo_habi = null;
    private $esta_habi = null;

    // Encapsulando
    public function setCodiHabi($value)
    {
        if ($this->validateId($value)) {
            $this->codi_habi = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiHabi()
    {
        return $this->codi_habi;
    }
    public function setNombHabi($value)
    {
        if ($this->validateAlphanumeric($value,1,50)) {
            $this->nomb_habi = $value;
            return true;
        } else {
            return false;
        }
        
    }
    public function getNombHabi()
    {
        return $this->nomb_habi;
    }
    public function setCodiTipoHabi($value)
    {
        if ($this->validateId($value)) {
            $this->codi_tipo_habi = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiTipoHabi()
    {
        return $this->codi_tipo_habi;
    }
    public function setEstaHabi($value)
    {
        if ($this->validateId($value)) {
            $this->esta_habi = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getEstaHabi()
    {
        return $this->esta_habi;
    }
    public function obtenerListaHabilidad()
    {
        $sql = "SELECT * FROM habilidad WHERE esta_habi=1 ORDER BY nomb_habi";
        $params = array(null);
        return Database::getRows($sql, $params);
    }
}