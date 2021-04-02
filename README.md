# seguros_bolivia

La empresa de seguros de salud Bolivia Seguros S.A., necesita un sistema para la gestión de sus asegurados, los pagos, las clínicas, los laboratorios, las farmacias y los doctores que atienden a los asegurados.

## Seguimiento de tabla

```sql
DROP TRIGGER IF EXISTS seguimiento_update_asegurado;
CREATE TRIGGER seguimiento_update_asegurado AFTER UPDATE ON asegurados FOR EACH ROW
INSERT INTO seguimiento_asegurado_plan (asegurado_id, plan_anterior, plan_actual, accion) VALUES(NEW.id, OLD.plan_id, NEW.plan_id, "update")
```
