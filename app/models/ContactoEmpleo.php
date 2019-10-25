<?php

class ContactoEmpleo extends Validator
{
    // Declaracion de propiedades
    private $codi_cont_empl = null;
    private $codi_empl = null;
    private $nomb_cont_empl = null;
    private $apel_cont_empl = null;
    private $corr_cont_empl = null;
    private $esta_cont_empl = null;

    // Encapsulando
    public function setCodiContEmpl($value)
    {
        if ($this->validateId($value)) {
            $this->codi_cont_empl = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getCodiContEmpl()
    {
        return $this->codi_cont_empl;
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
    public function setNombContEmpl($value)
    {
        if ($this->validateAlphabetic($value,1,100)) {
            $this->nomb_cont_empl = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getNombContEmpl()
    {
        return $this->nomb_cont_empl;
    }
    public function setApelContEmpl($value)
    {
        if ($this->validateAlphabetic($value,1,100)) {
            $this->apel_cont_empl = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getApelContEmpl()
    {
        return $this->apel_cont_empl;
    }
    public function setCorrContEmpl($value)
    {
        if ($this->validateEmail($value)) {
            $this->corr_cont_empl = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getCorrContEmpl()
    {
        return $this->corr_cont_empl;
    }
    public function setEstaCorrUsua($value)
    {
        if ($this->validateId($value)) {
            $this->esta_cont_empl = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getEstaCorrUsua()
    {
        return $this->esta_cont_empl;
    }

    public function crearContactoEmpleo()
    {
        $sql = "INSERT INTO contacto_empleo(codi_empl, nomb_cont_empl,apel_cont_emp,corr_cont_empl) VALUES(?,?,?,?)";
        $params = array($this->codi_empl, $this->nomb_cont_empl, $this->apel_cont_emp, $this->corr_cont_empl);
        return Database::executeRow($sql, $params);
    }
    public function modificarContactoEmpleo()
    {
        $sql = "UPDATE contacto_empleo SET nomb_cont_empl=?, apel_cont_emp=?, corr_cont_empl=? WHERE codi_cont_empl=?";
        $params = array($this->nomb_cont_empl, $this->apel_cont_emp, $this->corr_cont_empl, $this->codi_cont_empl);
        return Database::executeRow($sql, $params);
    }
    public function eliminarContactoEmpleo()
    {
        $sql = "UPDATE contacto_empleo SET esta_cont_empl=0 WHERE codi_cont_empl=?";
        $params = array($this->codi_cont_empl);
        return Database::executeRow($sql, $params);
    }
    public function obtenerListaContactoEmpleo()
    {
        $sql = "SELECT * FROM contacto_empleo WHERE codi_empl=? AND esta_cont_empl=1";
        $params = array($this->codi_empl);
        return Database::getRows($sql, $params);
    }
    public function obtenerContactoEmpleo()
    {
        $sql = "SELECT * FROM contacto_empleo WHERE codi_cont_empl=? AND esta_cont_empl=1";
        $params = array($this->codi_cont_empl);
        return Database::getRow($sql, $params);
    }
}