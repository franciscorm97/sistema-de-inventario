<?php
include_once URL_APP . '/views/custom/header.php';
?>


<!-- Modal insertar producto -->
<div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3 class="text-center" style="margin-bottom:20px;">Insertar nuevo producto</h3>

        <form action="<?php echo URL_PROJECT?>/home/registrar" method="POST">
            <div class="mb-3">
                <select name="marca" id="marca" class="form-select" required>
                    <option value="">Marca</option>
                    <?php foreach ($datos['options']['marcas'] as $datosMarca): ?>
                        <option value="<?php echo $datosMarca->id_marca?>"><?php echo $datosMarca->descripcion_marca?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="mb-3">
                <select name="proveedor" id="proveedor" class="form-select" required>
                    <option value="">Proveedor</option>
                    <?php foreach ($datos['options']['proveedor'] as $datosProveedores): ?>
                        <option value="<?php echo $datosProveedores->id_proveedor?>"><?php echo $datosProveedores->descripcion_proveedor?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="mb-3">
                <select name="zona" id="zona" class="form-select" required>
                    <option value="">Zona</option>
                    <?php foreach ($datos['options']['zona'] as $datosZona): ?>
                        <option value="<?php echo $datosZona->id_zona?>"><?php echo $datosZona->descripcion_zona?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="mb-3">
                <input type="text" name="producto" id="producto" class="form-control" placeholder="Producto" required>
            </div>
            <div class="mb-3">
                <input type="number" name="codigo" id="codigo" class="form-control" placeholder="Código del producto" required>
            </div>
            <div class="mb-3">
                <input type="number" name="precio" id="precio" class="form-control" placeholder="Precio del producto" required>
            </div>
            <div class="mb-3">
                <input type="number" name="stock" id="stock" class="form-control" placeholder="Stock" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-success">Registrar producto</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="container-fluid mt-3">
    <div class="contenido-acciones-formulario-productos mb-3" style="display: flex;justify-content: space-between; align-items: center;">
        <div class="boton-crear-nuevo-producto">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal1"><i class="fas fa-plus mr1"></i> Nuevo</button>   
                              
        </div>
            <form action="<?php echo URL_PROJECT?>/home" method="POST" class="row g-2">
                <div class="col-auto">
                    <input type="search" name="buscar" id="buscar" class="form-control" placeholder="Buscar producto" required>
                </div>
                <div class="col-auto">
                    <button class="btn btn-success"><i class="fas fa-search mr-1"></i> Buscar</button>
                </div>
            </form>
    </div>

    <div class="tabla-vista-productos-acciones">
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Producto</th>
                <th>Marca</th>
                <th>Proveedor</th>
                <th>Zona</th>
                <th>Precio (€)</th>
                <th>Stock (unidades)</th>
                <th>Acciones</th>
            </tr>
            <?php foreach($datos['productos'] as $datosProductos): ?>
                <tr>
                    <th style="font-weight: lighter;"><?php echo $datosProductos->id_producto?></th>
                    <th style="font-weight: lighter;"><?php echo $datosProductos->codigo?></th>
                    <th style="font-weight: lighter;"><?php echo $datosProductos->descripcion_producto?></th>
                    <th style="font-weight: lighter;"><?php echo $datosProductos->descripcion_marca?></th>
                    <th style="font-weight: lighter;"><?php echo $datosProductos->descripcion_proveedor?></th>
                    <th style="font-weight: lighter;"><?php echo $datosProductos->descripcion_zona?></th>
                    <th style="font-weight: lighter;"><?php echo $datosProductos->precio?></th>
                    <th style="font-weight: lighter;"><?php echo $datosProductos->stock?></th>
                    <th>
                        <a href="<?php echo URL_PROJECT?>/home/editar/<?php echo $datosProductos->id_producto?>" class="btn btn-info" style="color:white;"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                        <a href="<?php echo URL_PROJECT?>/home/eliminar/<?php echo $datosProductos->id_producto?>" class="btn btn-danger" onclick="return eliminarProducto()"><i class="fa-solid fa-trash-can"></i> Eliminar</a>
                    </th>
                </tr>
            <?php endforeach ?>
        <table>
    </div>
</div>
<script>

    function eliminarProducto()
{
    let pregunta = confirm('¿Estas esguro de eliminar el producto?');

    if(!pregunta){
        return false;
    }
}
</script>
