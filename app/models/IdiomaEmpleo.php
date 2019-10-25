    <?php

class IdiomaEmpleo extends Validator
{
    // Declaracion de propiedades
    private $codi_idio_empl = null;
    private $codi_empl = null;
    private $codi_idio = null;
    private $codi_nive = null;
    private $esta_idio_empl = null;

    // Encapsulando
    public function setCodiIdioEmpl($value)
    {
        if ($this->validateId($value)) {
            $this->codi_idio_empl = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiIdioEmpl()
    {
        return $this->codi_idio_empl;
    }
    public function setCodiEmpl($value)
    {
        if ($this->validateId($value)) {
            $this->codi_empl = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiEmpl()
    {
        return $this->codi_empl;
    }
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
        return $this->codi_idio;
    }
    public function setCodiNive($value)
    {
        if ($this->validateId($value)) {
            $this->codi_nive = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiNive()
    {
        return $this->codi_nive;
    }
    public function setEstaIdioEmpl($value)
    {
        if ($this->validateId($value)) {
            $this->esta_idio_empl = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getEstaIdioEmpl()
    {
        return $this->esta_idio_empl;
    }
    public function crearIdiomaEmpleo()
    {
        $sql = "INSERT INTO idioma_empleo(codi_empl,codi_idio,codi_nive) VALUES(?,?,?)";
        $params = array($this->codi_empl, $this->codi_idio, $this->codi_nive);
        return Database::executeRow($sql, $params);
    }
    public function eliminarIdiomaEmpleo()
    {
        $sql = "UPDATE esta_idio_empl=0 WHERE codi_idio_empl=?";
        $params = array($this->codi_idio_empl);
        return Database::executeRow($sql, $params);
    }
    public function obtenerListaIdiomaEmpleo()
    {
        $sql = "SELECT * FROM idioma_empleo WHERE esta_idio_empl=1 ORDER BY codi_idio";
        $params = array(null);
        return Database::getRows($sql, $params);
    }
}