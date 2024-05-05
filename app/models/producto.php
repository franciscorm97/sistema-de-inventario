<?php

class producto
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function registrar($datos)
    {
        $this->db->query('INSERT INTO producto (id_marca, id_proveedor, id_zona, codigo, descripcion_producto, precio, stock)
        VALUES (:idmarca , :idproveedor , :idzona , :codigo , :producto , :precio , :stock)');
        $this->db->bind(':idmarca' , $datos['marca']);
        $this->db->bind(':idproveedor' , $datos['proveedor']);
        $this->db->bind(':idzona' , $datos['zona']);
        $this->db->bind(':codigo' , $datos['codigo']);
        $this->db->bind(':producto' , $datos['producto']);
        $this->db->bind(':precio' , $datos['precio']);
        $this->db->bind(':stock' , $datos['stock']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    } 



    public function leer()
    {
        $this->db->query('SELECT P.id_producto , P.codigo , P.descripcion_producto , P.precio ,  
        P.stock , M.descripcion_marca , Prov.descripcion_proveedor, Z.descripcion_zona FROM producto P
        INNER JOIN marca M ON M.id_marca = P.id_marca
        INNER JOIN proveedor Prov ON Prov.id_proveedor = P.id_proveedor
        INNER JOIN zona Z ON Z.id_zona = P.id_zona');
        return $this->db->registers();
    }

    public function getProducto($id)
    {
        $this->db->query('SELECT P.id_producto , P.codigo , P.descripcion_producto , P.precio ,  
        P.stock , M.descripcion_marca , Prov.descripcion_proveedor, Z.descripcion_zona FROM producto P
        INNER JOIN marca M ON M.id_marca = P.id_marca
        INNER JOIN proveedor Prov ON Prov.id_proveedor = P.id_proveedor
        INNER JOIN zona Z ON Z.id_zona = P.id_zona WHERE P.id_producto = :id');
        $this->db->bind(':id' , $id);
        return $this->db->register();
        
    }

    public function filtrarProductos($busqueda)
    {
        $this->db->query('SELECT P.id_producto , P.codigo , P.descripcion_producto , P.precio ,  
        P.stock , M.descripcion_marca , Prov.descripcion_proveedor, Z.descripcion_zona FROM producto P
        INNER JOIN marca M ON M.id_marca = P.id_marca
        INNER JOIN proveedor Prov ON Prov.id_proveedor = P.id_proveedor
        INNER JOIN zona Z ON Z.id_zona = P.id_zona WHERE M.descripcion_marca LIKE :buscar');
        $this->db->bind(':buscar' , '%' . $busqueda . '%');
        return $this->db->registers();

    }

    public function getOptionProducts($tipo)
    {
        switch($tipo){
            case 'marca':
                $this->db->query('SELECT * FROM marca');
                return $this->db->registers();
                break;

             case 'proveedor':
                $this->db->query('SELECT * FROM proveedor');
                return $this->db->registers();
                break;

             case 'zona':
                $this->db->query('SELECT * FROM zona');
                return $this->db->registers();
                break;
        
            
        }

    }

    public function eliminar($id)
    {
        $this->db->query('DELETE FROM producto WHERE id_producto = :id');
        $this->db->bind(':id' , $id);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function actualizar($datosProducto, $id)
    {
        $this->db->query('UPDATE producto SET id_marca = :idmarca, id_proveedor = :idproveedor, 
        id_zona = :idzona, codigo = :codigo, descripcion_producto = :productodescripcion, precio = :precio, stock = :stock 
        WHERE id_producto = :idProducto');
        $this->db->bind(':idmarca' , $datosProducto['marca']);
        $this->db->bind(':idproveedor' , $datosProducto['proveedor']);
        $this->db->bind(':idzona' , $datosProducto['zona']);
        $this->db->bind(':codigo' , $datosProducto['codigo']);
        $this->db->bind(':productodescripcion' , $datosProducto['producto']);
        $this->db->bind(':precio' , $datosProducto['precio']);
        $this->db->bind(':stock' , $datosProducto['stock']);
        $this->db->bind(':idProducto' , $id);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }
}