<?php
class SeguimientoPlanModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getByAsegurado($id)
    {
        $sql = "SELECT sa.fecha_cambio, sa.accion, 
        (SELECT nombre FROM planes WHERE id = sa.plan_anterior) as plan_old, 
        (SELECT nombre FROM planes WHERE id = sa.plan_actual) as plan_new 
        FROM seguimiento_asegurado_plan sa 
        WHERE sa.asegurado_id = :id AND sa.plan_anterior <> sa.plan_actual";
        $items = array();
        try {
            $query = $this->prepare($sql);
            $query->execute(["id" => $id]);
            while ($p = $query->fetch(PDO::FETCH_ASSOC)) {
                $items[] = array(
                    "fecha_cambio" => $p["fecha_cambio"],
                    "accion" => $p["accion"],
                    "plan_old" => $p["plan_old"],
                    "plan_new" => $p["plan_new"],
                );
            }
            return $items;
        } catch (PDOException $e) {
            error_log("Seguimiento_Plan::getById -> Algo anda fallando " . $e);
            return false;
        }
    }
}
