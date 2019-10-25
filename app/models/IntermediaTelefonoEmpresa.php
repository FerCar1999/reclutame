    <?php

class IntermediaTelefonoEmpresa extends Validator
{
    // Declaracion de propiedades
    private $codi_inte_tele_empr = null;
    private $codi_tele = null;
    private $codi_empr = null;
    private $nume_tele = null;
    private $esta_inte_tele_empr = null;  

    // Encapsulando
    public function setCodiInteTeleEmpr($value)
    {
        if ($this->validateId($value)) {
            $this->codi_inte_tele_empr = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiInteTeleEmpr()
    {
        return $this->codi_inte_tele_empr;
    }
    public function setCodiTele($value)
    {
        if ($this->validateId($value)) {
            $this->codi_tele = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiTele()
    {
        return $this->codi_tele;
    }
    public function setCodiEmpr($value)
    {
        if ($this->validateId($value)) {
            $this->codi_empr = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiEmpr()
    {
        return $this->codi_empr;
    }
    public function setNumeTele($value)
    {
        if ($this->validateTelefono($value)) {
            $this->nume_tele = $value;
            return true;
        } else {
            return false;
        }
        
    }
    public function getNumeTele()
    {
        return $this->nume_tele;
    }
    public function setEstaInteTeleEmpr($value)
    {
        if ($this->validateId($value)) {
            $this->esta_inte_tele_empr = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getEstaInteTeleEmpr()
    {
        return $this->esta_inte_tele_empr;
    }
    public function crearTelefonoEmpresa()
    {
        $sql ="INSERT INTO intermedia_telefono_empresa(codi_tele,codi_empr, nume_tele) VALUES(?,?,?)";
        $params = array($this->codi_tele, $this->codi_empr, $this->nume_tele);
        return Database::executeRow($sql, $params);
    }
    public function modificarTelefonoEmpresa()
    {
        $sql= "UPDATE intermedia_telefono_empresa SET codi_tele=?, nume_tele=? WHERE codi_inte_tele_empr=?";
        $params = array($this->codi_tele, $this->nume_tele, $this->codi_inte_tele_empr);
        return Database::executeRow($sql, $params);
    }
    public function eliminarTelefonoEmpresa()
    {
        $sql = "UPDATE intermedia_telefono_empresa SET esta_inte_tele_empr = 0 WHERE codi_inte_tele_empr=?";
        $params = array($this->codi_inte_tele_empr);
        return Database::executeRow($sql, $params);
    }
    public function obtenerListaTelefonoEmpresa()
    {
        $sql = "SELECT * FROM intermedia_telefono_empresa WHERE esta_inte_tele_empr=1 ORDER BY codi_tele";
        $params = array(null);
        return Database::getRows($sql, $params);
    }
    public function obtenerTelefonoEmpresa()
    {
        $sql = "SELECT * FROM intermedia_telefono_empresa WHERE codi_inte_tele_empr=?";
        $params = array($this->codi_inte_tele_empr);
        return Database::getRows($sql, $params);
    }
}