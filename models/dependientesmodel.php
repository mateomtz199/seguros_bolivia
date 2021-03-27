<?php

class DependienteModel extends Model implements IModel
{
    private $id;
    private $nombre;
    private $apellidos;
    private $direccion;
    private $telefono;
    private $fotoCertificadoNacimiento;
    private $fotoCarnetIdentidad;
    private $aseguradoId;
    public function __construct()
    {
        parent::__construct();
    }
    public function save()
    {
        try {
            $query = $this->prepare("INSERT INTO dependientes(asegurado_id, nombre, apellidos, direccion, telefono, foto_certificado_nacimiento, foto_carnet_identidad) 
            VALUES(:aseguradoId, :nombre, :apellidos, :direccion, :telefono, :fotoCertificado, :fotoCarnet)");
            $query->execute([
                "aseguradoId" => $this->aseguradoId,
                "nombre" => $this->nombre,
                "apellidos" => $this->apellidos,
                "direccion" => $this->direccion,
                "telefono" => $this->telefono,
                "fotoCertificado" => $this->fotoCertificadoNacimiento,
                "fotoCarnet" => $this->fotoCarnetIdentidad,
            ]);
            if ($query->rowCount()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log("Dependientes_Model::save -> Algo anda fallando " . $e);
            return false;
        }
    }
    public function getAll()
    {
        $items = [];

        try {
            $query = $this->query("SELECT * FROM dependientes");
            while ($p = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new DependienteModel();
                $item->from($p);
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            error_log("Dependientes_Model::getAll -> Algo anda fallando " . $e);
            return false;
        }
    }
    public function getPorAsegurado($id)
    {
        $sql = "SELECT * FROM dependientes WHERE asegurado_id=" . $id;
        $items = [];

        try {
            $query = $this->query($sql);
            while ($p = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new DependienteModel();
                $item->from($p);
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            error_log("Dependientes_Model::getAll -> Algo anda fallando " . $e);
            return false;
        }
    }
    public function getIdAsegurado($id)
    {
        $sql = "SELECT asegurado_id FROM dependientes WHERE id = :id";
        try {
            $query = $this->prepare($sql);
            $query->execute(["id" => $id]);
            $id = $query->fetchColumn();
            return $id;
        } catch (PDOException $e) {
            error_log("Asegurados_Model::getAllWithPlan -> Algo anda fallando " . $e);
            return false;
        }
    }
    public function get($id)
    {
        try {
            $query = $this->prepare("SELECT * FROM dependientes WHERE id=:id");
            $query->execute([
                "id" => $id
            ]);
            $dependiente = $query->fetch(PDO::FETCH_ASSOC);
            $this->from($dependiente);
            return $this;
        } catch (PDOException $e) {
            error_log("Dependientes_Model::get -> Algo anda fallando " . $e);
            return false;
        }
    }
    public function delete($id)
    {
        try {
            $query = $this->prepare("DELETE FROM dependientes WHERE id=:id");
            $query->execute([
                "id" => $id
            ]);
            return true;
        } catch (PDOException $e) {
            error_log("Asegurados_Model::get -> Algo anda fallando " . $e);
            return false;
        }
    }
    public function update()
    {
        try {
            $query = $this->prepare("UPDATE dependientes SET asegurado_id = :aseguradoId, nombre = :nombre, apellidos = :apellidos,
                                direccion = :direccion, telefono = :telefono, foto_certificado_nacimiento = :fotoCertificado, foto_carnet_identidad = :fotoCarnet WHERE id=:id");
            $query->execute([
                "id" => $this->id,
                "aseguradoId" => $this->aseguradoId,
                "nombre" => $this->nombre,
                "apellidos" => $this->apellidos,
                "direccion" => $this->direccion,
                "telefono" => $this->telefono,
                "fotoCertificado" => $this->fotoCertificadoNacimiento,
                "fotoCarnet" => $this->fotoCarnetIdentidad,

            ]);
            error_log("Dependientes_Model::update -> Asegurado ID " . $this->id);
            if ($query->rowCount()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log("Dependientes_Model::update -> Algo anda fallando " . $e);
            return false;
        }
    }

    public function from($array)
    {
        $this->id = $array["id"];
        $this->aseguradoId = $array["asegurado_id"];
        $this->nombre = $array["nombre"];
        $this->apellidos = $array["apellidos"];
        $this->direccion = $array["direccion"];
        $this->telefono = $array["telefono"];
        $this->fotoCertificadoNacimiento = $array["foto_certificado_nacimiento"];
        $this->fotoCarnetIdentidad = $array["foto_carnet_identidad"];
    }


    //Getter y setter
    public function getId()
    {
        return $this->id;
    }
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }
    public function setApellidos($apellidos): self
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($direccion): self
    {
        $this->direccion = $direccion;
        return $this;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setTelefono($telefono): self
    {
        $this->telefono = $telefono;
        return $this;
    }

    public function getFotoCertificadoNacimiento()
    {
        return $this->fotoCertificadoNacimiento;
    }
    public function setFotoCertificadoNacimiento($fotoCertificadoNacimiento): self
    {
        $this->fotoCertificadoNacimiento = $fotoCertificadoNacimiento;
        return $this;
    }

    public function getFotoCarnetIdentidad()
    {
        return $this->fotoCarnetIdentidad;
    }
    public function setFotoCarnetIdentidad($fotoCarnetIdentidad): self
    {
        $this->fotoCarnetIdentidad = $fotoCarnetIdentidad;
        return $this;
    }

    public function getAseguradoId()
    {
        return $this->aseguradoId;
    }
    public function setAseguradoId($aseguradoId): self
    {
        $this->aseguradoId = $aseguradoId;
        return $this;
    }
}
