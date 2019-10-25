    <?php

class ExperienciaUsuario extends Validator
{
    // Declaracion de propiedades
    private $codi_expe_usua = null;
    private $codi_empr = null;
    private $codi_usua = null;
    private $codi_carg = null;
    private $desd_expe_usua = null;
    private $hast_expe_usua = null;
    private $esta_expe_usua = null;

    // Encapsulando
    public function setCodiExpeUsua($value)
    {
        if ($this->validateId($value)) {
            $this->codi_expe_usua = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiExpeUsua()
    {
        return $this->codi_expe_usua;
    }
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
    public function setCodiUsua($value)
    {
        if ($this->validateId($value)) {
            $this->codi_usua = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiUsua()
    {
        return $this->codi_usua;
    }
    public function setCodiCarg($value)
    {
        if ($this->validateId($value)) {
            $this->codi_carg = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiCarg()
    {
        return $this->codi_carg;
    }
    public function setDesdExpeUsua($value)
    {
            $this->desd_expe_usua = $value;
            return true;
    }
    public function getDesdExpeUsua()
    {
        return $this->desd_expe_usua;
    }
    public function setHastExpeUsua($value)
    {
            $this->hast_expe_usua = $value;
            return true;
    }
    public function getHastExpeUsua()
    {
        return $this->hast_expe_usua;
    }
    public function setEstaExpeUsua($value)
    {
        if ($this->validateId($value)) {
            $this->esta_expe_usua = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getEstaExpeUsua()
    {
        return $this->esta_expe_usua;
    }
    public function crearExperienciaUsuario()
    {
        $sql="INSERT INTO experiencia_usuario SET codi_empr, codi_usua, codi_carg, desd_expe_usua,hast_expe_usua VALUES(?,?,?,?,?)";
        $params = array($this->codi_empr, $this->codi_usua, $this->codi_carg, $this->desd_expe_usua, $this->hast_expe_usua);
        return Database::executeRow($sql, $params);
    }
    public function modificarExperienciaUsuario()
    {
        $sql = "UPDATE experiencia_usuario SET codi_empr=?, codi_carg=?, desd_expe_usua=?, hast_expe_usua=? WHERE codi_expe_usua=?";
        $params = array($this->codi_empr, $this->codi_carg, $this->desd_expe_usua, $this->hast_expe_usua, $this->codi_expe_usua);
        return Database::executeRow($sql, $params);
    }
    public function eliminarExperienciaUsuario()
    {
        $sql = "UPDATE experiencia_usuario SET esta_expe_usua=0 WHERE codi_expe_usua=?";
        $params = array($this->codi_expe_usua);
        return Database::executeRow($sql, $params);
    }
    public function obtenerListaExperienciaUsuario()
    {
        $sql = "SELECT * FROM experiencia_usuario WHERE esta_expe_usua=1 ORDER BY desd_expe_usua ASC";
        $params = array(null);
        return Database::getRows($sql, $params);
    }
    public function obtenerExperienciaUsuario()
    {
        $sql = "SELECT * FROM experiencia_usuario WHERE codi_expe_usua=?";
        $params = array($this->codi_expe_usua);
        return Database::getRow($sql, $params);
    }
}