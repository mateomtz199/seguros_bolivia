<?php
class PagosModel extends Model
{
    private $id;
    private $aseguradoId;
    private $claveFactura;
    private $fechaPago;
    private $mesPago;
    private $cantidadPagada;
    private $nmes;

    function __construct()
    {
        parent::__construct();
    }
    public function save()
    {
        $sql = "INSERT INTO pagos (asegurado_id, clave_factura, mes_pago, cantidad_pagada, nmes)
        VALUES(:aseguradoId, :claveFactura, :mesPago, :cantidadPagada, :nmes)";
        try {
            $query = $this->prepare($sql);
            $query->execute([
                "aseguradoId" => $this->aseguradoId,
                "claveFactura" => $this->claveFactura,
                "mesPago" => $this->mesPago,
                "cantidadPagada" => $this->cantidadPagada,
                "nmes" => $this->nmes,
            ]);
            if ($query->rowCount()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log("Pagos_Model::save -> Algo anda fallando " . $e);
            return false;
        }
    }

    public function mesPendiente($id)
    {
        $sql = "SELECT 
        TIMESTAMPDIFF(MONTH, mes_pago, CURDATE()) AS meses_transcurridos FROM pagos 
        WHERE asegurado_id=:id GROUP BY id DESC LIMIT 1";
        try {
            $query = $this->prepare($sql);
            $query->execute(["id" => $id]);
            $numero = $query->fetchColumn();
            return $numero;
        } catch (PDOException $e) {
            error_log("Pagos_Model::Mes pendiente -> Algo anda fallando " . $e);
            return false;
        }
    }
    public function fechaVencimiento($id)
    {
        $sql = "SELECT mes_pago 
                    FROM pagos 
                    WHERE asegurado_id=:id 
                    GROUP BY id 
                    DESC LIMIT 1";
        try {
            $query = $this->prepare($sql);
            $query->execute(["id" => $id]);
            $numero = $query->fetchColumn();
            return $numero;
        } catch (PDOException $e) {
            error_log("Pagos_Model::fechaVencimiento -> Algo anda fallando " . $e);
            return false;
        }
    }
    public function getAll()
    {
        $sql = "SELECT p.id, p.fecha_pago, a.nombre, a.apellidos, p.mes_pago, p.cantidad_pagada, pl.nombre as plan
        FROM pagos p 
        LEFT JOIN asegurados a ON p.asegurado_id = a.id
        LEFT JOIN planes pl ON a.plan_id = pl.id
        ORDER BY p.fecha_pago DESC";
        $items = array();
        try {
            $query = $this->query($sql);
            while ($p = $query->fetch(PDO::FETCH_ASSOC)) {
                $items[] = array(
                    "id" => $p["id"],
                    "fecha_pago" => $p["fecha_pago"],
                    "nombre" => $p["nombre"],
                    "apellidos" => $p["apellidos"],
                    "mes_pago" => $p["mes_pago"],
                    "cantidad_pagada" => $p["cantidad_pagada"],
                    "plan" => $p["plan"],
                );
            }
            return $items;
        } catch (PDOException $e) {
            error_log("Pagos_Model::getAll -> Algo anda fallando " . $e);
            return false;
        }
    }
    public function getById($id)
    {
        $sql = "SELECT p.id, p.fecha_pago, p.mes_pago, p.cantidad_pagada, p.clave_factura, p.nmes, a.id as aid, a.nombre, 
        a.apellidos, a.direccion, a.telefono, pl.nombre as plan, pl.precio, pl.precio_dependiente, 
        (SELECT COUNT(*) FROM dependientes WHERE asegurado_id = a.id) AS ndependientes
        FROM pagos p 
        LEFT JOIN asegurados a ON p.asegurado_id = a.id
        LEFT JOIN planes pl ON a.plan_id = pl.id
        WHERE p.id=:id";
        $items = array();
        try {
            $query = $this->prepare($sql);
            $query->execute(["id" => $id]);
            $pago = $query->fetch(PDO::FETCH_ASSOC);
            $items = array(
                "id" => $pago["id"],
                "fecha_pago" => $pago["fecha_pago"],
                "mes_pago" => $pago["mes_pago"],
                "cantidad_pagada" => $pago["cantidad_pagada"],
                "clave_factura" => $pago["clave_factura"],
                "aid" => $pago["aid"],
                "nombre" => $pago["nombre"],
                "apellidos" => $pago["apellidos"],
                "direccion" => $pago["direccion"],
                "telefono" => $pago["telefono"],
                "plan" => $pago["plan"],
                "precio" => $pago["precio"],
                "precio_dependiente" => $pago["precio_dependiente"],
                "ndependientes" => $pago["ndependientes"],
                "nmes" => $pago["nmes"],
            );
            return $items;
        } catch (PDOException $e) {
            error_log("Pagos_Model::getById -> Algo anda fallando " . $e);
            return false;
        }
    }

    public function ultimoId()
    {
        $query = $this->prepare("SELECT MAX(id) AS id FROM pagos");
        $query->execute();
        $pago = $query->fetch(PDO::FETCH_ASSOC);
        return $pago["id"];
    }
    public function aseguradosMesesAtrasados()
    {
        $sql = "SELECT 
        MAX(mes_pago) AS ultimo_pago, p.asegurado_id, a.nombre, a.apellidos, a.telefono, a.direccion,
        TIMESTAMPDIFF(MONTH, MAX(mes_pago), CURDATE()) AS meses_pendientes
        FROM pagos p
        LEFT JOIN asegurados a ON p.asegurado_id = a.id
        WHERE TIMESTAMPDIFF(MONTH, mes_pago, CURDATE()) > 1
        GROUP BY p.asegurado_id";
        $items = array();
        try {
            $query = $this->query($sql);
            while ($p = $query->fetch(PDO::FETCH_ASSOC)) {
                $items[] = array(
                    "ultimo_pago" => $p["ultimo_pago"],
                    "asegurado_id" => $p["asegurado_id"],
                    "nombre" => $p["nombre"],
                    "apellidos" => $p["apellidos"],
                    "telefono" => $p["telefono"],
                    "direccion" => $p["direccion"],
                    "meses_pendientes" => $p["meses_pendientes"],
                );
            }
            return $items;
        } catch (PDOException $e) {
            error_log("Asegurados_Model::cantidadPorPlan -> Algo anda fallando " . $e);
            return false;
        }
    }

    /* Getters y setters */

    public function getId()
    {
        return $this->id;
    }
    public function setId($id): self
    {
        $this->id = $id;
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

    public function getClaveFactura()
    {
        return $this->claveFactura;
    }
    public function setClaveFactura($claveFactura): self
    {
        $this->claveFactura = $claveFactura;
        return $this;
    }

    public function getFechaPago()
    {
        return $this->fechaPago;
    }
    public function setFechaPago($fechaPago): self
    {
        $this->fechaPago = $fechaPago;
        return $this;
    }

    public function getMesPago()
    {
        return $this->mesPago;
    }
    public function setMesPago($mesPago): self
    {
        $this->mesPago = $mesPago;
        return $this;
    }

    public function getCantidadPagada()
    {
        return $this->cantidadPagada;
    }
    public function setCantidadPagada($cantidadPagada): self
    {
        $this->cantidadPagada = $cantidadPagada;
        return $this;
    }

    public function getNmes()
    {
        return $this->nmes;
    }
    public function setNmes($nmes): self
    {
        $this->nmes = $nmes;
        return $this;
    }
}
