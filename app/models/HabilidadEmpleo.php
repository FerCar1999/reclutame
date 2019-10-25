    <?php

class HabilidadEmpleo extends Validator
{
    // Declaracion de propiedades
    private $codi_habi_empl = null;
    private $codi_empl = null;
    private $codi_habi = null;
    private $esta_habi_empl = null;

    // Encapsulando
    public function setCodiHabiEmpl($value)
    {
        if ($this->validateId($value)) {
            $this->codi_habi_empl = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiHabiEmpl()
    {
        return $this->codi_habi_empl;
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
    public function setEstaHabiEmpl($value)
    {
        if ($this->validateId($value)) {
            $this->esta_habi_empl = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getEstaHabiEmpl()
    {
        return $this->esta_habi_empl;
    }
    public function crearHabilidadEmpleo()
    {
        $sql = "INSERT INTO habilidad_empleo(codi_empl, codi_habi) VALUES(?,?)";
        $params = array($this->codi_empl, $this->codi_habi);
        return Database::executeRow($sql, $params);
    }
    public function eliminarHabilidadEmpleo()
    {
        $sql = "UPDATE habilidad_empleo SET esta_habi_empl=0 WHERE codi_empl=? AND codi_habi=?";
        $params = array($this->codi_empl, $this->codi_habi);
        return Database::executeRow($sql, $params);
    }
    public function obtenerListaHabilidadEmpleo()
    {
        $sql = "SELECT * FROM habilidad_empleo WHERE codi_empl=? AND esta_habi_empl=1 ORDER BY codi_habi";
        $params = array($this->codi_empl);
        return Database::getRows($sql, $params);
    }
}