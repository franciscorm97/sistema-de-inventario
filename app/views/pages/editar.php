<?php
include_once URL_APP . '/views/custom/header.php';
?>

<div class="container mt-4">
  
        <a href="<?php echo URL_PROJECT?>" class="btn btn-danger"><i class="fa-solid fa-xmark"></i> Cancelar</a>
    
        <h3 class="text-center" style="margin-bottom:20px;">Editar producto</h3>

        <form action="<?php echo URL_PROJECT?>/home/editar/<?php echo $datos['producto']->id_producto?>" method="POST">
            <div class="mb-3">
                <select name="marca" id="marca" class="form-select">
                    <option value="<?php echo $datos['producto']->id_marca?>"><?php echo $datos['producto']->descripcion_marca?></option>
                    <?php foreach ($datos['opciones']['marcas'] as $datosMarca): ?>
                        <option value="<?php echo $datosMarca->id_marca?>"><?php echo $datosMarca->descripcion_marca?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="mb-3">
                <select name="proveedor" id="proveedor" class="form-select" required>
                    <option value="<?php echo $datos['producto']->id_proveedor?>"><?php echo $datos['producto']->descripcion_proveedor?></option>
                    <?php foreach ($datos['opciones']['proveedor'] as $datosProveedores): ?>
                        <option value="<?php echo $datosProveedores->id_proveedor?>"><?php echo $datosProveedores->descripcion_proveedor?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="mb-3">
                <select name="zona" id="zona" class="form-select" required>
                    <option value="<?php echo $datos['producto']->id_zona?>"><?php echo $datos['producto']->descripcion_zona?></option>
                    <?php foreach ($datos['opciones']['zona'] as $datosZona): ?>
                        <option value="<?php echo $datosZona->id_zona?>"><?php echo $datosZona->descripcion_zona?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="mb-3">
                <input type="text" name="producto" id="producto" class="form-control" placeholder="Producto" value ="<?php echo $datos['producto']->descripcion_producto?>" required>
            </div>
            <div class="mb-3">
                <input type="number" name="codigo" id="codigo" class="form-control" placeholder="Código del producto" value ="<?php echo $datos['producto']->codigo?>" required>
            </div>
            <div class="mb-3">
                <input type="number" name="precio" id="precio" class="form-control" placeholder="Precio del producto" value ="<?php echo $datos['producto']->precio?>" required>
            </div>
            <div class="mb-3">
                <input type="number" name="stock" id="stock" class="form-control" placeholder="Stock"  value ="<?php echo $datos['producto']->stock?>"required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-success">Editar producto</button>
            </div>
        </form>
</div>

