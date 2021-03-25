<?php

class UserModel extends Model implements IModel{

    private $id;
    private $nombre;
    private $apellidos;
    private $cargo;
    private $usuario;
    private $password;
    private $rol;
    private $urlImagen;

    public function __construct(){
        parent::__construct();
        $this->id = 0;
        $this->nombre = "";
        $this->apellidos = "";
        $this->cargo = "";
        $this->usuario = "";
        $this->password = "";
        $this->rol = "";
        $this->urlImagen = "";
    }
    public function save(){
        try{
            $query = $this->prepare("INSERT INTO usuarios(nombre, apellidos, cargo, usuario, password, rol, url_imagen) 
            VALUES(:nombre, :apellidos, :cargo, :usuario, :password, :rol, :urlImagen)");
            $query->execute([
                "nombre" => $this->nombre,
                "apellidos" => $this->apellidos,
                "cargo" => $this->cargo,
                "usuario" => $this->usuario,
                "password" => $this->password,
                "rol" => $this->rol,
                "urlImagen" => $this->urlImagen
            ]);
            return true;
        }catch(PDOException $e){
            error_log("User_Model::save -> Algo anda fallando " . $e);
            return false;
        }
    }
    public function getAll(){
        $items = [];
        try{
            $query = $this->query("SELECT * FROM usuarios");
            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new UserModel();
                $item->setId($p["id"]);
                $item->setNombre($p["nombre"]);
                $item->setApellidos($p["apellidos"]);
                $item->setCargo($p["cargo"]);
                $item->setUsuario($p["usuario"]);
                $item->setPassword($p["password"], false);
                $item->setRol($p["rol"]);
                $item->setUrlImagen($p["url_imagen"]);

                array_push($items, $item);
            }
            return $items;
        }catch(PDOException $e){
            error_log("User_Model::getAll -> Algo anda fallando " . $e);
        }
    }
    public function get($id){
        try{
            $query = $this->prepare("SELECT * FROM usuarios WHERE id = :id");
            $query->execute([
                "id" => $id
            ]);

            $user = $query->fetch(PDO::FETCH_ASSOC);
            $this->setId($user["id"]);
            $this->setNombre($user["nombre"]);
            $this->setApellidos($user["apellidos"]);
            $this->setCargo($user["cargo"]);
            $this->setUsuario($user["usuario"]);
            $this->setPassword($user["password"], false);
            $this->setRol($user["rol"]);
            $this->setUrlImagen($user["url_imagen"]);
            return $this;
        }catch(PDOException $e){
            error_log("User_Model::getId -> Algo anda fallando " . $e);
        }
    }
    public function delete($id){
        try {
            $query = $this->prepare("DELETE FROM usuarios WHERE id = :id");
            $query->execute([
                "id" => $id
            ]);
            return true;
        } catch(PDOException $e){
            error_log("User_Model::Delete -> Algo anda fallando " . $e);
        }
    }
    public function update(){
        try{
            $query = $this->prepare("UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, cargo = :cargo, 
            usuario = :usuario, password = :password, rol = :rol, url_imagen = urlImagen WHERE id = :id");
            $query->execute([
                "id" => $this->id,
                "nombre" => $this->nombre,
                "apellidos" => $this->apellidos,
                "cargo" => $this->cargo,
                "usuario" => $this->usuario,
                "password" => $this->password,
                "rol" => $this->rol,
                "urlImagen" => $this->urlImagen
            ]);
            return true;
        }catch(PDOException $e){
            error_log("User_Model::getId -> Algo anda fallando " . $e);
            return false;
        }
    }
    public function from($array){
        $this->id = $array['id'];
        $this->nombre = $array['nombre'];
        $this->apellidos = $array['apellidos'];
        $this->cargo = $array['cargo'];
        $this->usuario = $array['usuario'];
        $this->password = $array['password'];
        $this->rol = $array['rol'];
        $this->urlImagen = $array['urlImagen'];
    }
    public function exists($username){
        try {
            $query = $this->prepare("SELECT username FROM usuarios WHERE usuario = :usuario");
            $query->execute([
                "username" => $username
            ]);
            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            error_log("User_Model::exists -> Algo anda fallando " . $e);
            return false;
        }
    }

    public function comparePassword($password, $id){
        try {
            $user = $this->get($id);
            return password_verify($password, $user->getPassword());
        } catch (PDOException $e) {
            error_log("User_Model::comparar pass -> Algo anda fallando " . $e);
            return false;

        }
    }

    private function getHashedPassword($password){
        return password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
    }


    public function getUrlImagen(){ return $this->urlImagen; }
    public function setUrlImagen($urlImagen) : self { $this->urlImagen = $urlImagen; return $this; }

    public function getRol(){ return $this->rol; }
    public function setRol($rol) : self { $this->rol = $rol; return $this; }

    public function getPassword(){ return $this->password; }
    public function setPassword($password, $hash = true){ 
        if($hash){
            $this->password = $this->getHashedPassword($password);
        }else{
            $this->password = $password;
        }
    }

    public function getUsuario(){ return $this->usuario; }
    public function setUsuario($usuario) : self { $this->usuario = $usuario; return $this; }

    public function getCargo(){ return $this->cargo; }
    public function setCargo($cargo) : self { $this->cargo = $cargo; return $this; }

    public function getApellidos(){ return $this->apellidos; }
    public function setApellidos($apellidos) : self { $this->apellidos = $apellidos; return $this; }

    public function getNombre(){ return $this->nombre; }
    public function setNombre($nombre) : self { $this->nombre = $nombre; return $this; }

    public function getId(){ return $this->id; }
    public function setId($id) : self { $this->id = $id; return $this; }
}