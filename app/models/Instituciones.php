    <?php

class Instituciones extends Validator
{
    // Declaracion de propiedades
    private $codi_inst = null;
    private $nomb_inst = null;
    private $esta_inst = null;

    // Encapsulando
    public function setCodiInst($value)
    {
        if ($this->validateId($value)) {
            $this->codi_inst = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiInst()
    {
        return $this->codi_inst;
    }
    public function setNombInst($value)
    {
        if ($this->validateAlphanumeric($value,1,50)) {
            $this->nomb_inst = $value;
            return true;
        } else {
            return false;
        }
        
    }
    public function getNombInst()
    {
        return $this->nomb_inst;
    }
    public function setEstaInst($value)
    {
        if ($this->validateId($value)) {
            $this->esta_inst = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getEstaInst()
    {
        return $this->esta_inst;
    }
    public function obtenerListaInstitucion()
    {
        $sql = "SELECT * FROM instituciones WHERE esta_inst=1 ORDER BY nomb_inst";
        $params = array(null);
        return Database::getRows($sql, $params);
    }
}