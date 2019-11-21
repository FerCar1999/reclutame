<?php

class Evaluacion extends Validator
{
    // Declaracion de propiedades
    private $codi_eval = null;
    private $codi_expe = null;
    private $fech_eval = null;
    private $docu_eval = null;
    private $esta_eval = null;

    // Encapsulando
    public function setCodiEval($value)
    {
        if ($this->validateId($value)) {
            $this->codi_eval = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiEval()
    {
        return $this->codi_eval;
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
    public function setFechEval($value)
    {
        if ($this->validateDate($value)) {
            $this->fech_eval = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getFechEval()
    {
        return $this->fech_eval;
    }
    public function setDocuEval($file)
    {
        if ($this->validateFile($file, $this->docu_eval, "../../web/evaluacion/")) {
            $this->docu_eval = $this->getFileName();
            return true;
        } else {
            return false;
        }
    }
    public function getDocuEval()
    {
        return $this->docu_eval;
    }
    public function unsetDocuEval()
    {
        if (unlink("../../web/evaluacion/" . $this->docu_eval)) {
            $this->docu_eval = null;
            return true;
        } else {
            return false;
        }
    }
    public function setEstaEval($value)
    {
        if ($this->validateId($value)) {
            $this->esta_eval = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getEstaEval()
    {
        return $this->esta_eval;
    }
    
    public function agregarEvaluacion()
    {
        $sql = "INSERT INTO evaluacion (codi_expe, fech_eval, docu_eval) VALUES (?,?,?)";
        $params = array($this->codi_expe, $this->fech_eval, $this->docu_eval);
        return Database::executeRow($sql, $params);
    }
    public function obtenerListaEvaluacion()
    {
        $sql = "SELECT * FROM evaluacion as e INNER JOIN experiencia_usuario as eu ON eu.codi_expe_usua=e.codi_expe INNER JOIN usuario as u ON u.codi_usua=eu.codi_usua WHERE e.esta_eval = 1 AND u.codi_usua=?";
        $params = array($this->codi_expe);
        return Database::getRows($sql, $params);
    }
}
