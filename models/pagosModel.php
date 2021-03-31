<?php
class PagosModel extends Model
{
    private $id;
    private $aseguradoId;
    private $claveFactura;
    private $fechaPago;
    private $mesPago;
    private $cantidadPagada;

    function __construct()
    {
        parent::__construct();
    }
    public function save()
    {
        $sql = "INSERT INTO pagos (asegurado_id, clave_factura, fecha_pago, mes_pago, cantidad_pagada)
        VALUES(:aseguradoId, :claveFactura, :fechaPago, :mesPago, :cantidadPagada)";
        try {
            $query = $this->prepare($sql);
            $query->execute([
                "aseguradoId" => $this->aseguradoId,
                "claveFactura" => $this->claveFactura,
                "fechaPago" => $this->fechaPago,
                "mesPago" => $this->mesPago,
                "cantidadPagada" => $this->cantidadPagada,
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
}
