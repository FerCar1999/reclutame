    <?php

class IntermediaRedEmpresa extends Validator
{
    // Declaracion de propiedades
    private $codi_inte_rede_empr = null;
    private $codi_rede = null;
    private $codi_empr = null;
    private $link_rede = null;
    private $esta_inte_rede_empr = null;  

    // Encapsulando
    public function setCodiInteRedeEmpr($value)
    {
        if ($this->validateId($value)) {
            $this->codi_inte_rede_empr = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiInteRedeEmpr()
    {
        return $this->codi_inte_rede_empr;
    }
    public function setCodiRede($value)
    {
        if ($this->validateId($value)) {
            $this->codi_rede = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiRede()
    {
        return $this->codi_rede;
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
        return $this->codi_rede;
    }
    public function setLinkRede($value)
    {
        if ($this->validateAlphanumeric($value,1,400)) {
            $this->link_rede = $value;
            return true;
        } else {
            return false;
        }
        
    }
    public function getLinkRede()
    {
        return $this->link_rede;
    }
    public function setEstaInteRedeEmpr($value)
    {
        if ($this->validateId($value)) {
            $this->esta_inte_rede_empr = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getEstaInteRedeEmpr()
    {
        return $this->esta_inte_rede_empr;
    }
    public function crearRedEmpresa()
    {
        $sql ="INSERT INTO intermedia_red_empresa(codi_empr,codi_rede, link_rede) VALUES(?,?,?)";
        $params = array($this->codi_empr, $this->codi_rede, $this->link_rede);
        return Database::executeRow($sql, $params);
    }
    public function modificarRedEmpresa()
    {
        $sql= "UPDATE intermedia_red_empresa SET codi_rede=?, link_rede=? WHERE codi_inte_rede_empr=?";
        $params = array($this->codi_rede, $this->link_rede, $this->codi_inte_rede_empr);
        return Database::executeRow($sql, $params);
    }
    public function eliminarRedEmpresa()
    {
        $sql = "UPDATE intermedia_red_empresa SET esta_inte_rede_empr = 0 WHERE codi_inte_rede_empr=?";
        $params = array($this->codi_inte_rede_empr);
        return Database::executeRow($sql, $params);
    }
    public function obtenerListaRedEmpresa()
    {
        $sql = "SELECT * FROM intermedia_red_empresa WHERE esta_inte_rede_empr=1 AND codi_empr=? ORDER BY codi_rede";
        $params = array($this->codi_empr);
        return Database::getRows($sql, $params);
    }
    public function obtenerRedEmpresa()
    {
        $sql = "SELECT * FROM intermedia_red_empresa WHERE codi_inte_rede_empr=?";
        $params = array($this->codi_inte_rede_empr);
        return Database::getRows($sql, $params);
    }
}