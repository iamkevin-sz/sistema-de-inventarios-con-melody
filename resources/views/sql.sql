DELIMITER //
CREATE TRIGGER `tr_updStockCompra` AFTER INSERT ON `detalle_compras`
FOR EACH ROW BEGIN
UPDATE productos SET stock = stock + NEW.cantidad
WHERE productos.id = NEW.producto_id;
END
//
DELIMITER ;


DELIMITER //
CREATE TRIGGER `tr_updStockCompraAnular` AFTER UPDATE ON `compras`
    FOR EACH ROW BEGIN
        UPDATE productos p
        JOIN detalle_compras di
        ON di.producto_id = p.id
        AND di.compras_id = new.id
        set p.stock = p.stock - di.cantidad;
END;
//
DELIMITER ;


DELIMITER //
CREATE TRIGGER `tr_updStockVenta` AFTER INSERT ON `detalle_ventas`
FOR EACH ROW BEGIN
UPDATE productos SET stock = stock - NEW.cantidad
WHERE productos.id = NEW.producto_id;
END
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER `tr_updStockVentaAnular` AFTER UPDATE ON `ventas`
    FOR EACH ROW BEGIN
        UPDATE productos p
        JOIN detalle_ventas dv
        ON dv.producto_id = p.id
        AND dv.ventas_id = new.id
        set p.stock = p.stock + dv.cantidad;
END ;
//
DELIMITER ;

