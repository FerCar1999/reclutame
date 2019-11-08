<?php

class EmpleoUsuario extends Validator
{
    // Declaracion de propiedades
    private $codi_empl_usua = null;
    private $codi_empl = null;
    private $codi_usua = null;
    private $moti_elim = null;
    private $prue_usua = null;
    private $cont_usua = null;
    private $regl_usua = null;
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
    public function setArchPrue($file)
    {
        if ($this->validateFile($file, $this->prue_usua, "../../web/prueba/")) {
            $this->prue_usua = $this->getFileName();
            return true;
        } else {
            return false;
        }
    }
    public function getArchPrue()
    {
        return $this->prue_usua;
    }
    public function unsetArchPrue()
    {
        if (unlink("../../web/prueba/" . $this->prue_usua)) {
            $this->prue_usua = null;
            return true;
        } else {
            return false;
        }
    }
    public function setArchCont($file)
    {
        if ($this->validateFile($file, $this->cont_usua, "../../web/contrato/")) {
            $this->contrato = $this->getFileName();
            return true;
        } else {
            return false;
        }
    }
    public function getArchCont()
    {
        return $this->cont_usua;
    }
    public function unsetArchCont()
    {
        if (unlink("../../web/contrato/" . $this->cont_usua)) {
            $this->prue_usua = null;
            return true;
        } else {
            return false;
        }
    }
    public function setArchRegl($file)
    {
        if ($this->validateFile($file, $this->regl_usua, "../../web/reglamento/")) {
            $this->regl_usua = $this->getFileName();
            return true;
        } else {
            return false;
        }
    }
    public function getArchRegl()
    {
        return $this->regl_usua;
    }
    public function unsetArchRegl()
    {
        if (unlink("../../web/reglamento/" . $this->regl_usua)) {
            $this->prue_usua = null;
            return true;
        } else {
            return false;
        }
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
        $sql = "UPDATE empleo_usuario SET esta_empl_usua=0, moti_elim=?  WHERE codi_empl_usua=?";
        $params = array($this->moti_elim,$this->codi_empl_usua);
        return Database::executeRow($sql, $params);
    }
    public function obtenerMiListaEmpleos()
    {
        $sql = "SELECT * FROM empleo_usuario INNER JOIN empleo ON empleo.codi_empl=empleo_usuario.codi_empl WHERE codi_usua=?";
        $params = array($this->codi_usua);
        return Database::getRows($sql, $params);
    }
    public function obtenerListaEmpleoUsuario()
    {
        $sql = "SELECT * FROM empleo_usuario INNER JOIN usuario on usuario.codi_usua=empleo_usuario.codi_usua WHERE codi_empl=? AND esta_empl_usua!=0";
        $params = array($this->codi_empl);
        return Database::getRows($sql, $params);
    }
    public function modificarPrueba()
    {
        $sql = "UPDATE empleo_usuario SET prue_usua=? WHERE codi_empl_usua=?";
        $params = array($this->prue_usua, $this->codi_empl_usua);
        return Database::executeRow($sql, $params);
    }
    public function modificarContrato()
    {
        $sql = "UPDATE empleo_usuario SET cont_usua=? WHERE codi_empl_usua=?";
        $params = array($this->cont_usua, $this->codi_empl_usua);
        return Database::executeRow($sql, $params);
    }
    public function modificarReglamento()
    {
        $sql = "UPDATE empleo_usuario SET regl_usua=? WHERE codi_empl_usua=?";
        $params = array($this->regl_usua, $this->codi_empl_usua);
        return Database::executeRow($sql, $params);
    }
}