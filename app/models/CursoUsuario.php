<?php

class CursoUsuario extends Validator
{
    // Declaracion de propiedades
    private $codi_curs_usua = null;
    private $codi_usua = null;
    private $codi_insti = null;
    private $nomb_curs = null;
    private $fech_curs = null;
    private $arch_curs = null;
    private $esta_curs = null;
    // Encapsulando
    public function setCodiCursUsua($value)
    {
        if ($this->validateId($value)) {
            $this->codi_curs_usua = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiCursUsua()
    {
        return $this->codi_curs_usua;
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
    public function setCodiInsti($value)
    {
        if ($this->validateId($value)) {
            $this->codi_insti = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getCodiInsti()
    {
        return $this->codi_insti;
    }
    public function setNombCurs($value)
    {
        if ($this->validateAlphanumeric($value, 1, 100)) {
            $this->nomb_curs = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getNombCurs()
    {
        return $this->nomb_curs;
    }
    public function setFechCurs($value)
    {
        $this->fech_curs = $value;
        return true;
    }
    public function getFechCurs($value)
    {
        return $this->fech_curs;
    }
    public function setArchCurs($file)
    {
        if ($this->validateFile($file, $this->arch_curs, "../../web/curso/")) {
            $this->arch_curs = $this->getFileName();
            return true;
        } else {
            return false;
        }
    }
    public function getArchCurs()
    {
        return $this->arch_curs;
    }
    public function unsetArchCurs()
    {
        if (unlink("../../web/curso/" . $this->arch_curs)) {
            $this->arch_curs = null;
            return true;
        } else {
            return false;
        }
    }
    public function setEstaCurs($value)
    {
        if ($this->validateId($value)) {
            $this->esta_curs = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getEstaCurs()
    {
        return $this->esta_curs;
    }


    public function crearCursoUsuario()
    {
        $sql = "INSERT INTO curso_usuario(codi_usua, codi_insti, nomb_curs, fech_curs, arch_curs) VALUES(?,?,?,?,?)";
        $params = array($this->codi_usua, $this->codi_insti, $this->nomb_curs, $this->fech_curs, $this->arch_curs);
        return Database::executeRow($sql, $params);
    }

    public function modificarCursoUsuario()
    {
        $sql = "UPDATE curso_usuario SET codi_insti=?, nomb_curs=?, fech_curs=? WHERE codi_curs_usua=?";
        $params = array($this->codi_insti, $this->nomb_curs, $this->fech_curs, $this->codi_curs_usua);
        return Database::executeRow($sql, $params);
    }

    public function modificarArchivoCursoUsuario()
    {
        $sql = "UPDATE curso_usuario SET arch_curs=? WHERE codi_curs_usua=?";
        $params = array($this->arch_curs, $this->codi_curs_usua);
        return Database::executeRow($sql, $params);
    }

    public function eliminarCursoUsuario()
    {
        $sql = "UPDATE curso_usuario SET esta_curs=0 WHERE codi_curs_usua=?";
        $params = array($this->codi_curs_usua);
        return Database::executeRow($sql, $params);
    }
    public function obtenerCursoUsuario()
    {
        $sql = "SELECT * FROM curso_usuario WHERE codi_usua=? AND esta_curs=1";
        $params = array($this->codi_usua);
        return Database::getRows($sql, $params);
    }
    public function obtenerCursoUsuarioEspecifico()
    {
        $sql = "SELECT * FROM curso_usuario WHERE codi_curs_usua=? AND esta_curs=1";
        $params = array($this->codi_curs_usua);
        return Database::getRow($sql, $params);
    }
}
