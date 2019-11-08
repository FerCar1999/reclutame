<?php

class HabilidadUsuario extends Validator
{
    // Declaracion de propiedades
    private $codi_habi_usua = null;
    private $codi_usua = null;
    private $codi_habi = null;
    private $codi_nive = null;
    private $esta_habi_usua = null;

    // Encapsulando
    public function setCodiHabiUsua($value)
    {
        if ($this->validateId($value)) {
            $this->codi_habi_usua = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiHabiUsua()
    {
        return $this->codi_habi_usua;
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
    public function setCodiHabi($value)
    {
        if ($this->validateId($value)) {
            $this->codi_habi = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiHabi()
    {
        return $this->codi_habi;
    }
    public function setCodiNive($value)
    {
        if ($this->validateId($value)) {
            $this->codi_nive = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiNive()
    {
        return $this->codi_nive;
    }
    public function setEstaHabiUsua($value)
    {
        if ($this->validateId($value)) {
            $this->esta_habi_usua = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getEstaHabiUsua()
    {
        return $this->esta_habi_usua;
    }
    public function crearHabilidadUsuario()
    {
        $sql = "INSERT INTO habilidad_usuario(codi_usua, codi_habi, codi_nive) VALUES(?,?,?)";
        $params = array($this->codi_usua, $this->codi_habi, $this->codi_nive);
        return Database::executeRow($sql, $params);
    }
    public function modificarHabilidadUsuario()
    {
        $sql = "UPDATE habilidad_usuario SET codi_habi = ?, codi_nive = ? WHERE codi_habi_usua=?";
        $params = array($this->codi_habi, $this->codi_nive, $this->codi_habi_usua);
        return Database::executeRow($sql, $params);
    }
    public function eliminarHabilidadUsuario()
    {
        $sql = "UPDATE habilidad_usuario SET esta_habi_usua=0 WHERE codi_habi_usua=?";
        $params = array($this->codi_habi_usua);
        return Database::executeRow($sql, $params);
    }
    public function obtenerListaHabilidadUsuario()
    {
        $sql = "SELECT * FROM habilidad_usuario INNER JOIN habilidad ON habilidad.codi_habi=habilidad_usuario.codi_habi WHERE codi_usua=? AND esta_habi_usua=1";
        $params = array($this->codi_usua);
        return Database::getRows($sql, $params);
    }
    public function obtenerListaHabilidadUsuarioEspecifica()
    {
        $sql = "SELECT * FROM habilidad_usuario INNER JOIN habilidad ON habilidad.codi_habi=habilidad_usuario.codi_habi WHERE codi_habi_usua=?";
        $params = array($this->codi_habi_usua);
        return Database::getRow($sql, $params);
    }
}
