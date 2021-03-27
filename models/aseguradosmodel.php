<?php
class AseguradosModel extends Model implements IModel
{
    private $id;
    private $nombre;
    private $apellidos;
    private $direccion;
    private $telefono;
    private $fotoCertificadoNacimiento;
    private $fotoCarnetIdentidad;
    private $createAt;
    private $planId;
    private $dependientes;
    private $nombrePlan;
    private $plan;

    public function __construct()
    {
        parent::__construct();
    }
    public function save()
    {
        try {
            $query = $this->prepare("INSERT INTO asegurados(plan_id, nombre, apellidos, direccion, telefono, foto_certificado_nacimiento, foto_carnet_identidad, create_at) 
            VALUES(:planId, :nombre, :apellidos, :direccion, :telefono, :fotoCertificado, :fotoCarnet, :createAt)");
            $query->execute([
                "planId" => $this->planId,
                "nombre" => $this->nombre,
                "apellidos" => $this->apellidos,
                "direccion" => $this->direccion,
                "telefono" => $this->telefono,
                "fotoCertificado" => $this->fotoCertificadoNacimiento,
                "fotoCarnet" => $this->fotoCarnetIdentidad,
                "createAt" => $this->createAt
            ]);
            if ($query->rowCount()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log("Asegurados_Model::save -> Algo anda fallando " . $e);
            return false;
        }
    }
    public function getAll()
    {
        $items = [];

        try {
            $query = $this->query("SELECT * FROM asegurados");
            while ($p = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new AseguradosModel();
                $item->from($p);
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            error_log("Asegurados_Model::getAll -> Algo anda fallando " . $e);
            return false;
        }
    }
    public function getAllWithPlan()
    {

        $sql = "SELECT a.id, a.plan_id, a.nombre, a.apellidos, a.direccion, a.telefono, a.foto_certificado_nacimiento, 
                    a.foto_carnet_identidad, a.create_at, p.nombre as nombre_plan
                    FROM asegurados a
                    INNER JOIN planes p
                    ON a.plan_id = p.id";

        $items = [];

        try {
            $query = $this->query($sql);
            while ($p = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new AseguradosModel();
                $item->from($p);
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            error_log("Asegurados_Model::getAllWithPlan -> Algo anda fallando " . $e);
            return false;
        }
    }
    public function get($id)
    {
        try {
            $query = $this->prepare("SELECT * FROM asegurados WHERE id=:id");
            $query->execute(["id" => $id]);
            $asegurado = $query->fetch(PDO::FETCH_ASSOC);
            $this->from1($asegurado);
            return $this;
        } catch (PDOException $e) {
            error_log("Asegurados_Model::get -> Algo anda fallando " . $e);
            return false;
        }
    }
    public function getWithPlan($id)
    {
        $sql = "SELECT a.id, a.plan_id, a.nombre, a.apellidos, a.direccion, a.telefono, a.foto_certificado_nacimiento, 
                    a.foto_carnet_identidad, a.create_at, p.nombre as nombre_plan
                    FROM asegurados a
                    INNER JOIN planes p
                    ON a.plan_id = p.id
                    WHERE a.id = :id";

        try {
            $query = $this->prepare($sql);
            $query->execute(["id" => $id]);
            $asegurado = $query->fetch(PDO::FETCH_ASSOC);
            $this->from1($asegurado);
            $Plan = new PlanesModel();

            $this->plan = $Plan->getById($this->getPlanId());

            error_log("Plan nombre: " . $this->getPlan()->getNombre());
            return $this;
        } catch (PDOException $e) {
            error_log("Asegurados_Model::getAllWithPlan -> Algo anda fallando " . $e);
            return false;
        }
    }
    public function delete($id)
    {
        try {
            $query = $this->prepare("DELETE FROM asegurados WHERE id=:id");
            $query->execute([
                "id" => $id
            ]);
            return true;
        } catch (PDOException $e) {
            error_log("Asegurados_Model::get -> Algo anda fallando " . $e);
            return false;
        }
    }
    public function numeroDependientes($id)
    {
        $sql = "SELECT COUNT(*) FROM dependientes WHERE asegurado_id = :id";
        try {
            $query = $this->prepare($sql);
            $query->execute(["id" => $id]);
            $numero = $query->fetchColumn();
            return $numero;
        } catch (PDOException $e) {
            error_log("Asegurados_Model::getAllWithPlan -> Algo anda fallando " . $e);
            return false;
        }
    }
    public function update()
    {
        try {
            $query = $this->prepare("UPDATE asegurados SET plan_id = :planId, nombre = :nombre, apellidos = :apellidos,
                                direccion = :direccion, telefono = :telefono, foto_certificado_nacimiento = :fotoCertificado, foto_carnet_identidad = :fotoCarnet WHERE id=:id");
            $query->execute([
                "planId" => $this->planId,
                "nombre" => $this->nombre,
                "apellidos" => $this->apellidos,
                "direccion" => $this->direccion,
                "telefono" => $this->telefono,
                "fotoCertificado" => $this->fotoCertificadoNacimiento,
                "fotoCarnet" => $this->fotoCarnetIdentidad,
                "id" => $this->id
            ]);
            if ($query->rowCount()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log("Asegurados_Model::update -> Algo anda fallando " . $e);
            return false;
        }
    }
    public function from($array)
    {
        $this->id = $array["id"];
        $this->planId = $array["plan_id"];
        $this->nombre = $array["nombre"];
        $this->apellidos = $array["apellidos"];
        $this->direccion = $array["direccion"];
        $this->telefono = $array["telefono"];
        $this->fotoCertificadoNacimiento = $array["foto_certificado_nacimiento"];
        $this->fotoCarnetIdentidad = $array["foto_carnet_identidad"];
        $this->createAt = $array["create_at"];
        $this->nombrePlan = $array["nombre_plan"];
    }
    public function from1($array)
    {
        $this->id = $array["id"];
        $this->planId = $array["plan_id"];
        $this->nombre = $array["nombre"];
        $this->apellidos = $array["apellidos"];
        $this->direccion = $array["direccion"];
        $this->telefono = $array["telefono"];
        $this->fotoCertificadoNacimiento = $array["foto_certificado_nacimiento"];
        $this->fotoCarnetIdentidad = $array["foto_carnet_identidad"];
        $this->createAt = $array["create_at"];
    }

    //Dashboard
    public function cantidadPorPlan()
    {
        $sql = "SELECT p.nombre, COUNT(*) as cantidad 
        FROM asegurados a 
        INNER JOIN planes p ON a.plan_id = p.id 
        GROUP BY a.plan_id;";
        try {
            $query = $this->prepare($sql);
            $query->execute();
            $resultado = $query->fetchAll();
            return $resultado;
        } catch (PDOException $e) {
            error_log("Asegurados_Model::cantidadPorPlan -> Algo anda fallando " . $e);
            return false;
        }
    }
    public function cantidadAsegurados()
    {
        $sql = "SELECT COUNT(*) as cantidad_asegurados FROM asegurados;";
        try {
            $query = $this->prepare($sql);
            $query->execute();
            $numero = $query->fetchColumn();
            return $numero;
        } catch (PDOException $e) {
            error_log("Asegurados_Model::getAllWithPlan -> Algo anda fallando " . $e);
            return false;
        }
    }
    public function cantidadDependientes()
    {
        $sql = "SELECT COUNT(*) as cantidad_afiliados FROM dependientes;";
        try {
            $query = $this->prepare($sql);
            $query->execute();
            $numero = $query->fetchColumn();
            return $numero;
        } catch (PDOException $e) {
            error_log("Asegurados_Model::getAllWithPlan -> Algo anda fallando " . $e);
            return false;
        }
    }

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

    public function getPlanId()
    {
        return $this->planId;
    }
    public function setPlanId($plan): self
    {
        $this->planId = $plan;
        return $this;
    }

    public function getDependientes()
    {
        return $this->dependientes;
    }
    public function setDependientes($dependientes): self
    {
        $this->dependientes = $dependientes;
        return $this;
    }

    public function getCreateAt()
    {
        return $this->createAt;
    }
    public function setCreateAt($createAt): self
    {
        $this->createAt = $createAt;
        return $this;
    }

    public function getNombrePlan()
    {
        return $this->nombrePlan;
    }
    public function setNombrePlan($nombrePlan): self
    {
        $this->nombrePlan = $nombrePlan;
        return $this;
    }

    public function getPlan()
    {
        return $this->plan;
    }
    public function setPlan($plan): self
    {
        $this->plan = $plan;
        return $this;
    }
}
