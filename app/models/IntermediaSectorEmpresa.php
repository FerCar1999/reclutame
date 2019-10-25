    <?php

class IntermediaSectorEmpresa extends Validator
{
       // Declaracion de propiedades
    private $codi_inte_sect_empr = null;
    private $codi_sect = null;
    private $codi_empr = null;
    private $esta_inte_sect_empr = null;  

    // Encapsulando
    public function setCodiInteSectEmpr($value)
    {
        if ($this->validateId($value)) {
            $this->codi_inte_sect_empr = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiInteSectEmpr()
    {
        return $this->codi_inte_sect_empr;
    }
    public function setCodiSect($value)
    {
        if ($this->validateId($value)) {
            $this->codi_sect = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiSect()
    {
        return $this->codi_sect;
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
    public function setEstaInteSectEmpr($value)
    {
        if ($this->validateId($value)) {
            $this->esta_inte_sect_empr = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getEstaInteSectEmpr()
    {
        return $this->esta_inte_sect_empr;
    }
    public function crearSectorEmpresa()
    {
        $sql ="INSERT INTO intermedia_sector_empresa(codi_sect, codi_empr) VALUES(?,?)";
        $params = array($this->codi_sect, $this->codi_empr);
        return Database::executeRow($sql, $params);
    }
    public function modificarSectorEmpresa()
    {
        $sql= "UPDATE intermedia_sector_empresa SET codi_sect=? WHERE codi_empr=?";
        $params = array($this->codi_sect, $this->codi_empr);
        return Database::executeRow($sql, $params);
    }
}