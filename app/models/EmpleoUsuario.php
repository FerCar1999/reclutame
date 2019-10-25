<?php

class EmpleoUsuario extends Validator
{
    // Declaracion de propiedades
    private $codi_empl_usua = null;
    private $codi_empl = null;
    private $codi_usua = null;
    private $moti_elim = null;
    private $esta_empl_usua = null;

    // Encapsulando
    public function setCodiEmplUsua($value)
    {
        if ($this->validateId($value)) {
            $this->codi_empl_usua = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiEmplUsua()
    {
        return $this->codi_empl_usua;
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
    public function setMotiElim($value)
    {
        if ($this->validateAlphanumeric($value,1,100)) {
            $this->moti_elim = $value;
            return true;
        } else {
            return false;
        }
        
    }
    public function getMotiElim()
    {
        return $this->moti_elim;
    }
    public function setEstaEmplUsua($value)
    {
        if ($this->validateId($value)) {
            $this->esta_empl_usua = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getEstaEmplUsua()
    {
        return $this->esta_empl_usua;
    }

    public function crearEmpleoUsuario()
    {
        $sql = "INSERT INTO empleo_usuario(codi_empl, codi_usua) VALUES(?,?)";
        $params = array($this->codi_empl, $this->codi_usua);
        return Database::executeRow($sql, $params);
    }
    public function eliminarEmpleoUsuario()
    {
        $sql = "UPDATE empleo_usuario SET esta_cont_empl=0, moti_elim=?  WHERE codi_cont_empl=?";
        $params = array($this->moti_elim,$this->codi_cont_empl);
        return Database::executeRow($sql, $params);
    }
    public function obtenerListaEmpleoUsuario()
    {
        $sql = "SELECT * FROM empleo_usuario INNER JOIN usuario on usuario.codi_usua=empleo_usuario.codi_usua WHERE codi_empl=? AND esta_empl_usua=1";
        $params = array($this->codi_empl);
        return Database::getRows($sql, $params);
    }
    public function obtenerContactoEmpleo()
    {
        $sql = "SELECT * FROM contacto_empleo WHERE codi_cont_empl=? AND esta_cont_empl=1";
        $params = array($sql, $params);
        return Database::getRow($sql, $params);
    }
}