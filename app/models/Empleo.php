<?php

class Empleo extends Validator
{
    // Declaracion de propiedades
    private $codi_empl = null;
    private $codi_empr = null;
    private $codi_expe = null;
    private $codi_tipo_empl = null;
    private $nomb_empl = null;
    private $ubic_empl = null;
    private $publ_inic_empl = null;
    private $publ_fina_empl = null;
    private $cant_soli_empl = null;
    private $desc_empl = null;
    private $suel_empl_infe = null;
    private $suel_empl_supe = null;
    private $gene_empl = null;
    private $edad_mini = null;
    private $edad_maxi = null;
    private $esta_empl = null;

    // Encapsulando
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
    public function setCodiTipoEmpl($value)
    {
        if ($this->validateId($value)) {
            $this->codi_tipo_empl = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiTipoEmpl()
    {
        return $this->codi_tipo_empl;
    }
    public function setNombEmpl($value)
    {
        if ($this->validateAlphanumeric($value, 1, 250)) {
            $this->nomb_empl = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getNombEmpl()
    {
        return $this->nomb_empl;
    }
    public function setUbicEmpl($value)
    {
        if ($this->validateAlphanumeric($value, 1, 250)) {
            $this->ubic_empl = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getUbicEmpl()
    {
        return $this->ubic_empl;
    }
    public function setPublInicEmpl($value)
    {
        $this->publ_inic_empl = $value;
        return true;
    }

    public function getPublInicEmpl()
    {
        return $this->publ_inic_empl;
    }
    public function setPublFinaEmpl($value)
    {
        $this->publ_fina_empl = $value;
        return true;
    }

    public function getPublFinaEmpl()
    {
        return $this->publ_fina_empl;
    }
    public function setCantSoliEmpl($value)
    {
        if ($this->validateId($value)) {
            $this->cant_soli_empl = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCantSoliEmpl()
    {
        return $this->codi_soli_empl;
    }
    public function setDescEmpl($value)
    {
        if ($this->validateAlphanumeric($value, 1, 500)) {
            $this->desc_empl = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getDescEmpl()
    {
        return $this->desc_empl;
    }
    public function setSuelEmplInfe($value)
    {
        $this->suel_empl_infe = $value;
        return true;
    }
    public function getSuelEmplInfe()
    {
        return $this->suel_empl_infe;
    }
    public function setSuelEmplSupe($value)
    {
        $this->suel_empl_supe = $value;
        return true;
    }
    public function getSuelEmplSupe()
    {
        return $this->suel_empl_supe;
    }
    public function setGeneEmpl($value)
    {
        if ($this->validateId($value)) {
            $this->gene_empl = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getGeneEmpl()
    {
        return $this->gene_empl;
    }
    public function setEdadMaxi($value)
    {
        if ($this->validateId($value)) {
            $this->edad_maxi = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getEdadMaxi()
    {
        return $this->edad_maxi;
    }
    public function setEdadMini($value)
    {
        if ($this->validateId($value)) {
            $this->edad_mini = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getEdadMini()
    {
        return $this->edad_mini;
    }
    public function setEstaEmpl($value)
    {
        if ($this->validateId($value)) {
            $this->esta_empl = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getEstaEmpl()
    {
        return $this->esta_empl;
    }

    public function crearEmpleo()
    {
        $sql = "INSERT INTO empleo(codi_empr, codi_expe, codi_tipo_empl,nomb_empl,ubic_empl, publ_inic_empl,publ_fina_empl,cant_soli_empl,desc_empl,suel_empl_infe,suel_empl_supe,gene_empl,edad_mini,edad_maxi) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $params = array($this->codi_empr, $this->codi_expe, $this->codi_tipo_empl, $this->nomb_empl, $this->ubic_empl, $this->publ_inic_empl, $this->publ_fina_empl, $this->cant_soli_empl, $this->desc_empl, $this->suel_empl_infe, $this->suel_empl_supe, $this->gene_empl, $this->edad_mini, $this->edad_maxi);
        return Database::executeRow($sql, $params);
    }
    public function modificarEmpleo()
    {
        $sql = "UPDATE empleo SET codi_expe=?, codi_tipo_empl=?, nomb_empl=?, ubic_empl=?, publ_fina_empl=?, cant_soli_empl=?, desc_empl=?, suel_empl_infe=?, suel_empl_supe=?,gene_empl=?,edad_mini=?,edad_maxi=? WHERE codi_empl=?";
        $params = array($this->codi_expe, $this->codi_tipo_empl, $this->nomb_empl, $this->ubic_empl, $this->publ_fina_empl, $this->cant_soli_empl, $this->desc_empl, $this->suel_empl_infe, $this->suel_empl_supe, $this->gene_empl, $this->edad_mini, $this->edad_maxi, $this->codi_empl);
        return Database::executeRow($sql, $params);
    }
    public function eliminarEmpleo()
    {
        $sql = "UPDATE empleo SET esta_empl=0 WHERE codi_empl=?";
        $params = array($this->codi_empl);
        return Database::executeRow($sql, $params);
    }
    public function obtenerEmpleos($fecha)
    {
        $sql = "SELECT * FROM empleo INNER JOIN empresa ON empresa.codi_empr=empleo.codi_empr WHERE publ_fina_empl>=? ORDER BY publ_inic_empl DESC";
        $params = array($fecha);
        return Database::getRows($sql, $params);
    }
    public function obtenerEmpleosM($fecha, $codi)
    {
        $sql = "SELECT * FROM empleo INNER JOIN empresa ON empresa.codi_empr=empleo.codi_empr WHERE publ_fina_empl>=? AND empleo.codi_empr=? ORDER BY publ_inic_empl DESC";
        $params = array($fecha, $codi);
        return Database::getRows($sql, $params);
    }
    public function obtenerEmpleosBusqueda($fecha, $texto, $ubicacion)
    {
        $sql = "SELECT * 
        FROM empleo 
        INNER JOIN empresa ON empresa.codi_empr=empleo.codi_empr 
        WHERE publ_fina_empl>=? AND nomb_empl LIKE " . $texto . " AND
        ubic_empl LIKE " . $texto . " 
        ORDER BY publ_inic_empl DESC";
        $params = array($fecha, $texto, $ubicacion);
        return Database::getRows($sql, $params);
    }
    public function obtenerEmpleo()
    {
        $sql = "SELECT * FROM empleo 
        INNER JOIN empresa ON empresa.codi_empr=empleo.codi_empr
        INNER JOIN experiencia ON experiencia.codi_expe=empleo.codi_expe 
        INNER JOIN tipo_empleo ON tipo_empleo.codi_tipo_empl=empleo.codi_tipo_empl
        WHERE codi_empl=?";
        $params = array($this->codi_empl);
        return Database::getRow($sql, $params);
    }
}
