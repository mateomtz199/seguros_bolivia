<?php
class PlanesModel extends Model
{
    private $id;
    private $nombre;
    private $precio;
    private $precioDependiente;
    private $descripcion;

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $items = [];
        try {
            $query = $this->query("SELECT * FROM planes");
            while ($p = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new PlanesModel();
                $item->from($p);
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            error_log("Planes_Model::getAll -> Algo anda fallando " . $e);
            return false;
        }
    }
    public function getById($id)
    {
        try {
            $query = $this->query("SELECT * FROM planes WHERE id=:id");
            $query->execute([
                "id" => $id
            ]);
            $plan = $query->fetch(PDO::FETCH_ASSOC);
            $this->from($plan);
            return $this;
        } catch (PDOException $e) {
            error_log("Asegurados_Model::get -> Algo anda fallando " . $e);
            return false;
        }
    }

    public function from($array)
    {
        $this->id = $array["id"];
        $this->nombre = $array["nombre"];
        $this->precio = $array["nombre"];
        $this->precioDependiente = $array["precio_dependiente"];
        $this->descripcion = $array["descripcion"];
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

    public function getPrecio()
    {
        return $this->precio;
    }
    public function setPrecio($precio): self
    {
        $this->precio = $precio;
        return $this;
    }

    public function getPrecioDependiente()
    {
        return $this->precioDependiente;
    }
    public function setPrecioDependiente($precioDependiente): self
    {
        $this->precioDependiente = $precioDependiente;
        return $this;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion): self
    {
        $this->descripcion = $descripcion;
        return $this;
    }
}
