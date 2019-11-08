<?php

class Empresa extends Validator
{
    // Declaracion de propiedades
    private $codi_empr = null;
    private $nomb_empr = null;
    private $desc_empr = null;
    private $dire_empr = null;
    private $fech_fund_empr = null;
    private $logo_empr = null;
    private $visi_empr = null;
    private $misi_empr = null;
    private $codi_sect = null;
    private $esta_empr = null;
    // Encapsulando
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
    public function setNombEmpr($value)
    {
        if ($this->validateAlphanumeric($value, 1, 30)) {
            $this->nomb_empr = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getNombEmpr()
    {
        return $this->nomb_empr;
    }
    public function setDescEmpr($value)
    {
        if ($this->validateAlphanumeric($value, 1, 300)) {
            $this->desc_empr = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getDescEmpr()
    {
        return $this->desc_empr;
    }
    public function setDireEmpr($value)
    {
        if ($this->validateAlphanumeric($value, 1, 400)) {
            $this->dire_empr = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getDireEmpr()
    {
        return $this->dire_empr;
    }
    public function setFechFundEmpr($value)
    {
        $this->fech_fund_empr = $value;
        return true;
    }
    public function getFechFundEmpr()
    {
        return $this->fech_fund_empr;
    }
    public function setImagen($file)
    {
        if ($this->validateImage($file, $this->logo_empr, "../../web/img/logos/", 3840, 2460)) {
            $this->logo_empr = $this->getImageName();
            return true;
        } else {
            return false;
        }
    }
    public function getImagen()
    {
        return $this->logo_empr;
    }
    public function unsetImagen()
    {
        if (unlink("../../web/img/logos/" . $this->logo_empr)) {
            $this->logo_empr = null;
            return true;
        } else {
            return false;
        }
    }
    public function setVisiEmpr($value)
    {
        if ($this->validateAlphanumeric($value, 1, 500)) {
            $this->visi_empr = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getVisiEmpr()
    {
        return $this->visi_empr;
    }
    public function setMisiEmpr($value)
    {
        if ($this->validateAlphanumeric($value, 1, 500)) {
            $this->misi_empr = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getMisiEmpr()
    {
        return $this->misi_empr;
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
    public function setEstaEmpr($value)
    {
        if ($this->validateId($value)) {
            $this->esta_empr = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getEstaEmpr()
    {
        return $this->esta_empr;
    }
    public function crearEmpresa()
    {
        $sql = "INSERT INTO empresa(nomb_empr,logo_empr, codi_sect) VALUES(?,?,?)";
        $params = array($this->nomb_empr, $this->logo_empr, $this->codi_sect);
        return Database::executeRow($sql, $params);
    }
    public function modificarEmpresa()
    {
        $sql = "UPDATE empresa SET nomb_empr=?, desc_empr=?, dire_empr=?, fech_fund_empr=?, codi_espe=? WHERE codi_empr=?";
        $params = array($this->nomb_empr, $this->desc_empr, $this->dire_empr, $this->fech_fund_empr, $this->codi_espe, $this->codi_empr);
        return Database::executeRow($sql, $params);
    }
    public function obtenerEmpresas()
    {
        $sql = "SELECT * FROM empresa WHERE esta_empr=1 ORDER BY nomb_empr";
        $params = array(null);
        return Database::getRows($sql, $params);
    }
    public function obtenerEmpresa()
    {
        $sql = "SELECT * FROM empresa WHERE codi_empr=? AND esta_empr=1";
        $params = array($this->codi_empr);
        return Database::getRow($sql, $params);
    }
}
