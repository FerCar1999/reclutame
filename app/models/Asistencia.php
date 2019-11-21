<?php

class Asistencia extends Validator
{
    // Declaracion de propiedades
    private $codi_asis = null;
    private $codi_expe = null;
    private $fech_asis = null;
    private $esta_asis = null;

    // Encapsulando
    public function setCodiAsis($value)
    {
        if ($this->validateId($value)) {
            $this->codi_asis = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiAsis()
    {
        return $this->codi_asis;
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

    public function setFechAsis($value)
    {
        $this->fech_asis = $value;
        return true;
    }
    public function getFechAsis()
    {
        return $this->fech_asis;
    }

    public function setEstaAsis($value)
    {
        if ($this->validateId($value)) {
            $this->esta_asis = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getEstaAsis()
    {
        return $this->esta_asis;
    }
    public function obtenerCodigoExperiencia($correlativo)
    {
        $sql = "SELECT codi_expe_usua FROM experiencia_usuario WHERE corr_expe = ? AND esta_expe_usua=1";
        $params = array($correlativo);
        return Database::getRow($sql, $params);
    }
    public function verificarEntradaSalida($hoy)
    {
        $sql = "SELECT COUNT(*) as conteo FROM asistencia WHERE codi_expe = ? AND DATE(fech_asis)=? AND esta_asis=1";
        $params = array($this->codi_expe, $hoy);
        return Database::getRow($sql, $params);
    }
    public function agregarAsistencia()
    {
        $sql = "INSERT INTO asistencia (codi_expe, fech_asis) VALUES (?,?)";
        $params = array($this->codi_expe, $this->fech_asis);
        return Database::executeRow($sql, $params);
    }
    public function obtenerListaAsistencia($correlativo, $hoy)
    {
        $sql = "SELECT * FROM asistencia as a INNER JOIN experiencia_usuario as eu ON eu.codi_expe_usua=a.codi_expe INNER JOIN usuario as u ON u.codi_usua=eu.codi_usua WHERE a.esta_asis=1 AND u.codi_usua=? AND DATE(a.fech_asis)=? ORDER BY a.fech_asis ASC";
        $params = array($correlativo, $hoy);
        return Database::getRows($sql, $params);
    }
}
