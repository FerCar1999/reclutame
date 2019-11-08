    <?php

class IdiomaUsuario extends Validator
{
    // Declaracion de propiedades
    private $codi_idio_usua = null;
    private $codi_usua = null;
    private $codi_idio = null;
    private $codi_nive = null;
    private $esta_idio_usua = null;

    // Encapsulando
    public function setCodiIdioUsua($value)
    {
        if ($this->validateId($value)) {
            $this->codi_idio_usua = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiIdioUsua()
    {
        return $this->codi_idio_usua;
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
    public function setCodiIdio($value)
    {
        if ($this->validateId($value)) {
            $this->codi_idio = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCodiIdio()
    {
        return $this->codi_idio;
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
    public function setEstaIdioUsua($value)
    {
        if ($this->validateId($value)) {
            $this->esta_idio_usua = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getEstaIdioUsua()
    {
        return $this->esta_idio_usua;
    }
    public function crearIdiomaUsuario()
    {
        $sql = "INSERT INTO idioma_usuario(codi_usua,codi_idio,codi_nive) VALUES(?,?,?)";
        $params = array($this->codi_usua, $this->codi_idio, $this->codi_nive);
        return Database::executeRow($sql, $params);
    }
    public function modificarIdiomaUsuario()
    {
        $sql = "UPDATE idioma_usuario SET codi_idio=?, codi_nive=? WHERE codi_idio_usua=?";
        $params = array($this->codi_idio, $this->codi_nive, $this->codi_idio_usua);
        return Database::executeRow($sql, $params);
    }
    public function eliminarIdiomaUsuario()
    {
        $sql = "UPDATE idioma_usuario SET esta_idio_usua=0 WHERE codi_idio_usua=?";
        $params = array($this->codi_idio_usua);
        return Database::executeRow($sql, $params);
    }
    public function obtenerListaIdiomaUsuario()
    {
        $sql = "SELECT * FROM idioma_usuario INNER JOIN idioma ON idioma.codi_idio=idioma_usuario.codi_idio INNER JOIN nivel ON nivel.codi_nive_idio=idioma_usuario.codi_nive WHERE codi_usua=? AND esta_idio_usua=1";
        $params = array($this->codi_usua);
        return Database::getRows($sql, $params);
    }
    public function obtenerIdiomaUsuario()
    {
        $sql = "SELECT * FROM idioma_usuario WHERE codi_idio_usua=?";
        $params = array($this->codi_idio_usua);
        return Database::getRow($sql, $params);
    }
}