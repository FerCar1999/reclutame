    <?php

class Idioma extends Validator
{
    // Declaracion de propiedades
    private $codi_idio = null;
    private $nomb_idio = null;
    private $esta_expe = null;

    // Encapsulando
    public function setCodiIdio($value)
    {
        if ($this->validateId($value)) {
            $this->codi_idio = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiIdio()
    {
        return $this->codi_expe;
    }
    public function setNombIdio($value)
    {
        if ($this->validateAlphanumeric($value,1,50)) {
            $this->nomb_idio = $value;
            return true;
        } else {
            return false;
        }
        
    }
    public function getNombIdio()
    {
        return $this->nomb_idio;
    }
    public function setEstaIdio($value)
    {
        if ($this->validateId($value)) {
            $this->esta_idio = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getEstaIdio()
    {
        return $this->esta_idio;
    }
    public function obtenerListaIdioma()
    {
        $sql = "SELECT * FROM idioma WHERE esta_idio=1 ORDER BY nomb_idio";
        $params = array(null);
        return Database::getRows($sql, $params);
    }
}