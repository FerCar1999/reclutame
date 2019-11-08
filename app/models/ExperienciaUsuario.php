    <?php

class ExperienciaUsuario extends Validator
{
    // Declaracion de propiedades
    private $codi_expe_usua = null;
    private $codi_empr = null;
    private $codi_usua = null;
    private $nomb_carg = null;
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
    public function setNombCarg($value)
    {
        if ($this->validateAlphanumeric($value,1,125)) {
            $this->nomb_carg = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getNombCarg()
    {
        return $this->nomb_carg;
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
        $sql="INSERT INTO experiencia_usuario(codi_empr, codi_usua, nomb_carg, desd_expe_usua,hast_expe_usua) VALUES(?,?,?,?,?)";
        $params = array($this->codi_empr, $this->codi_usua, $this->nomb_carg, $this->desd_expe_usua, $this->hast_expe_usua);
        return Database::executeRow($sql, $params);
    }
    public function modificarExperienciaUsuario()
    {
        $sql = "UPDATE experiencia_usuario SET codi_empr=?, nomb_carg=?, desd_expe_usua=?, hast_expe_usua=? WHERE codi_expe_usua=?";
        $params = array($this->codi_empr, $this->nomb_carg, $this->desd_expe_usua, $this->hast_expe_usua, $this->codi_expe_usua);
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
        $sql = "SELECT * FROM experiencia_usuario INNER JOIN empresa ON empresa.codi_empr=experiencia_usuario.codi_empr WHERE esta_expe_usua=1 ORDER BY desd_expe_usua ASC";
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