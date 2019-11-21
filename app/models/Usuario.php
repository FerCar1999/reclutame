<?php

class Usuario extends Validator
{
    // Declaracion de propiedades
    private $codi_usua = null;
    private $codi_empr = null;
    private $codi_tipo_usua = null;
    private $nomb_usua = null;
    private $apel_usua = null;
    private $dire_usua = null;
    private $corr_usua = null;
    private $pass_usua = null;
    private $foto_usua = null;
    private $desc_usua = null;
    private $codi_esta_civi = null;
    private $dui_usua = null;
    private $nit_usua = null;
    private $nup_usua = null;
    private $fech_naci_usua = null;
    private $esta_usua = null;

    // Encapsulando
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

    public function setNombUsua($value)
    {
        if ($this->validateAlphanumeric($value, 1, 100)) {
            $this->nomb_usua = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getNombUsua()
    {
        return $this->nomb_usua;
    }

    public function setImagen($file)
    {
        if ($this->validateImage($file, $this->foto_usua, "../../web/img/fotos/", 1080, 1080)) {
            $this->logo_empr = $this->getImageName();
            return true;
        } else {
            return false;
        }
    }
    public function getImagen()
    {
        return $this->foto_usua;
    }
    public function unsetImagen()
    {
        if (unlink("../../web/img/fotos/" . $this->foto_usua)) {
            $this->foto_usua = null;
            return true;
        } else {
            return false;
        }
    }
    public function setApelUsua($value)
    {
        if ($this->validateAlphanumeric($value, 1, 100)) {
            $this->apel_usua = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getApelUsua()
    {
        return $this->apel_usua;
    }
    public function setDireUsua($value)
    {
        if ($this->validateAlphanumeric($value, 1, 500)) {
            $this->dire_usua = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getDireUsua()
    {
        return $this->dire_usua;
    }
    public function setDescUsua($value)
    {
        $this->desc_usua = $value;
        return true;
    }

    public function getDescUsua()
    {
        return $this->desc_usua;
    }

    public function setCorrUsua($value)
    {
        if ($this->validateEmail($value)) {
            $this->corr_usua = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getCorrsua()
    {
        return $this->corr_usua;
    }

    public function setContUsua($value)
    {
        if ($this->validatePassword($value)) {
            $this->pass_usua = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getContUsua()
    {
        return $this->pass_usua;
    }

    public function setCodiEmpr($value)
    {
        $this->codi_empr = $value;
        return true;
    }

    public function getCodiEmpr()
    {
        return $this->codi_empr;
    }

    public function setTipoUsua($value)
    {
        if ($this->validateId($value)) {
            $this->codi_tipo_usua = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getTipoUsua()
    {
        return $this->codi_tipo_usua;
    }

    public function setCodiEstaCivi($value)
    {
        if ($this->validateId($value)) {
            $this->codi_esta_civi = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getCodiEstaCivi()
    {
        return $this->codi_esta_civi;
    }

    public function setDuiUsua($value)
    {
        if ($this->validateDUI($value)) {
            $this->dui_usua = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getDuiUsua()
    {
        return $this->dui_usua;
    }

    public function setNitUsua($value)
    {
        if ($this->validateNIT($value)) {
            $this->nit_usua = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getNitUsua()
    {
        return $this->nit_usua;
    }

    public function setNupUsua($value)
    {
        if ($this->validateNUP($value)) {
            $this->nup_usua = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getNupUsua()
    {
        return $this->nup_usua;
    }

    public function setEstaUsua($value)
    {
        if ($this->validateId($value)) {
            $this->esta_usua = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getEstaUsua()
    {
        return $this->esta_usua;
    }

    // Funciones para CRUD

    // Crear usuario
    public function crearUsuario()
    {
        //Encriptando la contraseña ingresada
        $hash   = password_hash($this->pass_usua, PASSWORD_DEFAULT);
        //realizando consuta
        $sql    = "INSERT INTO usuario(codi_tipo_usua,nomb_usua,apel_usua,corr_usua, pass_usua) VALUES (?,?,?,?,?)";
        //parametros a ingresar
        $params = array(2, $this->nomb_usua, $this->apel_usua, $this->corr_usua, $hash);
        return Database::executeRow($sql, $params);
    }

    public function crearUsuarioEmpresa()
    {
        //Encriptando la contraseña ingresada
        $hash   = password_hash($this->pass_usua, PASSWORD_DEFAULT);
        //realizando consuta
        $sql    = "INSERT INTO usuario(codi_tipo_usua,codi_empr,nomb_usua,apel_usua,corr_usua, pass_usua) VALUES (?,?,?,?,?,?)";
        //parametros a ingresar
        $params = array(1, $this->codi_empr, $this->nomb_usua, $this->apel_usua, $this->corr_usua, $hash);
        return Database::executeRow($sql, $params);
    }

    //Verificar usuario login
    public function checkUser()
    {
        //buscando datos del usuario con el correo ingresado
        $sql = "SELECT * FROM usuario WHERE corr_usua=? AND esta_usua=1";
        //agregando parametros
        $params = array($this->corr_usua);
        //ejecutando consulta y obteniendo los datos
        $data = Database::getRow($sql, $params);
        //si hay datos de la consulta anterior
        if ($data) {
            //se setearan las variables de codigo de usuario y de tipo de usuario
            $this->codi_usua = $data['codi_usua'];
            $this->nomb_usua = $data['nomb_usua'];
            $this->apel_usua = $data['apel_usua'];
            $this->codi_tipo_usua = $data['codi_tipo_usua'];
            $this->codi_empr = $data['codi_empr'];
            $this->foto_usua = $data['foto_usua'];
            //retornando true
            return true;
        } else {
            //retornando false
            return false;
        }
    }

    //verificando contraseña
    public function checkPassword()
    {
        //preparando la consulta para traer la contraseña(encriptada) del usuario
        $sql = "SELECT pass_usua FROM usuario WHERE codi_usua = ?";
        //agregando parametros
        $params = array($this->codi_usua);
        //obteniendo valor de la consutla anterior
        $data = Database::getRow($sql, $params);
        //verificando si la contraseña ingrasada
        if (password_verify($this->pass_usua, $data['pass_usua'])) {
            return true;
        } else {
            return false;
        }
    }

    //funcion para cerrar sesion
    public function logOut()
    {
        //destruyendo variables de sesion
        return session_destroy();
    }

    // Modificar informacion de usuario
    public function updateInformacionUsuario()
    {
        $sql    = "UPDATE usuario SET nomb_usua = ?, apel_usua = ?, dire_usua = ?, corr_usua=? WHERE codi_usua = ?";
        $params = array($this->nomb_usua, $this->apel_usua, $this->dire_usua, $this->corr_usua, $this->codi_usua);
        return Database::executeRow($sql, $params);
    }
    public function updateContraUsuario()
    {
        $hash   = password_hash($this->pass_usua, PASSWORD_DEFAULT);
        $sql    = "UPDATE usuario SET pass_usua = ? WHERE codi_usua = ?";
        $params = array($hash, $this->codi_usua);
        return Database::executeRow($sql, $params);
    }
    public function updateContraUsuarioCorreo()
    {
        $hash   = password_hash($this->pass_usua, PASSWORD_DEFAULT);
        $sql    = "UPDATE usuario SET cont_usua = ? WHERE corr_usua = ?";
        $params = array($hash, $this->corre_usua);
        return Database::executeRow($sql, $params);
    }
    // Eliminar cuenta
    public function deleteUsuario()
    {
        $sql    = "UPDATE usuario SET  esta_usua = 0 WHERE codi_usua = ?";
        $params = array($this->codi_usua);
        return Database::executeRow($sql, $params);
    }

    public function verificarCorreoExistente()
    {
        $sql = "SELECT COUNT(*) as conteo FROM usuario WHERE corr_usua=?";
        $params = array($this->corr_usua);
        return Database::getRow($sql, $params);
    }
    public function verificarCorreoPropio()
    {
        $sql = "SELECT COUNT(*) as conteo FROM usuario WHERE corr_usua=? AND codi_usua=?";
        $params = array($this->corr_usua, $this->codi_usua);
        return Database::getRow($sql, $params);
    }
    //funcion es para los casos de cambios de contraseña cuando el usuario ingresa su contraseña vieja con la contraseña ingresada  
    public function verificarContraseniaAntigua()
    {
        $sql = "SELECT cont_usua FROM usuario WHERE codi_usua = ?";
        $params = array($this->codi_usua);
        return Database::getRow($sql, $params);
    }
    public function modificarFoto()
    {
        $sql = "UPDATE usuario SET foto_usua=? WHERE codi_usua=?";
        $params = array($this->foto_usua, $this->codi_usua);
        return Database::executeRow($sql, $params);
    }
    public function getInfoUsuario()
    {
        $sql = "SELECT * FROM usuario WHERE codi_usua=?";
        $params = array($this->codi_usua);
        return Database::getRow($sql, $params);
    }
    public function modificarDescripcion()
    {
        $sql = "UPDATE usuario SET desc_usua=? WHERE codi_usua=?";
        $params = array(nl2br($this->desc_usua), $this->codi_usua);
        return Database::executeRow($sql, $params);
    }
}
