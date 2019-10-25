    <?php

class Nivel extends Validator
{
    // Declaracion de propiedades
    private $codi_nive = null;
    private $nomb_ = null;
    private $desc_expe = null;
    private $esta_expe = null;

    // Encapsulando
    public function setCodiExpe($value)
    {
        if ($this->validateId($value)) {
            $this->codi_expe = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiExpe()
    {
        return $this->codi_expe;
    }
    public function setNombExpe($value)
    {
        if ($this->validateAlphanumeric($value,1,50)) {
            $this->nomb_expe = $value;
            return true;
        } else {
            return false;
        }
        
    }
    public function getNombExpe()
    {
        return $this->nomb_espe;
    }
    public function setDescExpe($value)
    {
        if ($this->validateAlphanumeric($value,1,50)) {
            $this->desc_expe = $value;
            return true;
        } else {
            return false;
        }
        
    }
    public function getDescExpe()
    {
        return $this->desc_espe;
    }
    public function setEstaExpe($value)
    {
        if ($this->validateId($value)) {
            $this->esta_expe = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getEstaExpe()
    {
        return $this->esta_expe;
    }
    public function obtenerListaNivel()
    {
        $sql = "SELECT * FROM nivel WHERE esta_nive_idio=1 ORDER BY nomb_nive_idio";
        $params = array(null);
        return Database::getRows($sql, $params);
    }
}