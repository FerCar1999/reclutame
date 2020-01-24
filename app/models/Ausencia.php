<?php

class Ausencia extends Validator
{
    // Declaracion de propiedades
    private $codi_ause = null;
    private $codi_tipo_ause = null;
    private $codi_expe = null;
    private $remu_ause = null;
    private $fech_inic_ause = null;
    private $fech_fina_ause = null;
    private $hora_inic_ause = null;
    private $hora_fina_ause = null;
    private $comp_ause = null;
    private $esta_asis = null;

    // Encapsulando
    public function setCodiAuse($value)
    {
        if ($this->validateId($value)) {
            $this->codi_ause = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiAuse()
    {
        return $this->codi_ause;
    }
    public function setCodiTipoAuse($value)
    {
        if ($this->validateId($value)) {
            $this->codi_tipo_ause = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiTipoAuse()
    {
        return $this->codi_tipo_ause;
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
    public function setRemuAuse($value)
    {
        if ($this->validateId($value)) {
            $this->remu_ause = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getRemuAuse()
    {
        return $this->remu_ause;
    }
    public function setFechInicAuse($value)
    {
        if ($this->validateDate($value)) {
            $this->fech_inic_ause = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getFechInicAuse()
    {
        return $this->fech_inic_ause;
    }
    public function setFechFinaAuse($value)
    {
        if ($this->validateDate($value)) {
            $this->fech_fina_ause = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getFechFinaAuse()
    {
        return $this->fech_fina_ause;
    }
    public function setHoraInicAuse($value)
    {
        $this->hora_inic_ause = $value;
        return true;
    }
    public function getHoraInicAuse()
    {
        return $this->hora_inic_ause;
    }
    public function setHoraFinaAuse($value)
    {
        $this->hora_fina_ause = $value;
        return true;
    }
    public function getHoraFinaAuse()
    {
        return $this->hora_fina_ause;
    }
    public function setComprobante($file)
    {
        if ($this->validateImage($file, $this->comp_ause, "../../web/img/comprobante/", 3840, 2460)) {
            $this->comp_ause = $this->getImageName();
            return true;
        } else {
            return false;
        }
    }
    public function getComprobante()
    {
        return $this->comp_ause;
    }
    public function unsetComprobante()
    {
        if (unlink("../../web/img/comprobante/" . $this->comp_ause)) {
            $this->comp_ause = null;
            return true;
        } else {
            return false;
        }
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
    public function agregarAusenciaDia()
    {
        $sql = "INSERT INTO ausencia (codi_tipo_ause, remu_ause, fech_inic_ause, fech_fina_ause) VALUES (?,?,?,?)";
        $params = array($this->codi_tipo_ause, $this->remu_ause, $this->fech_inic_ause, $this->fech_fina_ause);
        return Database::executeRow($sql, $params);
    }
    public function agregarAusenciaHora()
    {
        $sql = "INSERT INTO ausencia (codi_tipo_ause, remu_ause, hora_inic_ause, hora_fina_ause) VALUES (?,?,?,?)";
        $params = array($this->codi_tipo_ause, $this->remu_ause, $this->hora_inic_ause, $this->hora_fina_ause);
        return Database::executeRow($sql, $params);
    }
    public function agregarComprobanteAusencia()
    {
        $sql = "UPDATE ausencia SET comp_ause = ? WHERE codi_ause = ?";
        $params = array($this->comp_ause, $this->codi_ause);
        return Database::executeRow($sql, $params);
    }
    public function obtenerListaAusencia($x, $y)
    {
        $sql = "SELECT * FROM ausencia as a INNER JOIN experiencia_usuario as eu On eu.codi_expe_usua=a.codi_expe INNER JOIN usuario as u ON u.codi_usua=eu.codi_usua WHERE esta_ause = 1 AND eu.codi_usua=? AND eu.codi_empr=?";
        $params = array($x, $y);
        return Database::getRows($sql, $params);
    }
    public function obtenerIAT($empresa, $empleado)
    {
        $sql = "SELECT eu.codi_expe_usua,
        DATEDIFF(a.fech_fina_ause, a.fech_inic_ause) AS dias,
        TIMEDIFF(a.hora_fina_ause, a.hora_inic_ause) AS horas,
        TIMEDIFF(eu.hora_expe_fina, eu.hora_expe_inic) AS horasL FROM ausencia AS a 
        INNER JOIN experiencia_usuario AS eu ON eu.codi_expe_usua=a.codi_expe 
        WHERE eu.codi_empr=? AND eu.codi_usua=?";
        $params = array($empresa, $empleado);
        return Database::getRows($sql, $params);
    }
    public function obtenerIATR($empresa, $empleado)
    {
        $sql = "SELECT eu.codi_expe_usua,
        DATEDIFF(a.fech_fina_ause, a.fech_inic_ause) AS dias,
        TIMEDIFF(a.hora_fina_ause, a.hora_inic_ause) AS horas,
        TIMEDIFF(eu.hora_expe_fina, eu.hora_expe_inic) AS horasL FROM ausencia AS a 
        INNER JOIN experiencia_usuario AS eu ON eu.codi_expe_usua=a.codi_expe 
        WHERE eu.codi_empr=? AND eu.codi_usua=? AND a.remu_ause=1";
        $params = array($empresa, $empleado);
        return Database::getRows($sql, $params);
    }
    public function obtenerIATNR($empresa, $empleado)
    {
        $sql = "SELECT eu.codi_expe_usua,
        DATEDIFF(a.fech_fina_ause, a.fech_inic_ause) AS dias,
        TIMEDIFF(a.hora_fina_ause, a.hora_inic_ause) AS horas,
        TIMEDIFF(eu.hora_expe_fina, eu.hora_expe_inic) AS horasL FROM ausencia AS a 
        INNER JOIN experiencia_usuario AS eu ON eu.codi_expe_usua=a.codi_expe 
        WHERE eu.codi_empr=? AND eu.codi_usua=? AND a.remu_ause=0";
        $params = array($empresa, $empleado);
        return Database::getRows($sql, $params);
    }
}
