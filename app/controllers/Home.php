<?php

class Home extends Controller
{
    public $productos;

    public function __construct()
    {
        $this->productos = $this->model('producto');
    }

    public function index()
    {
        $opcionesProductos = [
            'marcas' => $this->productos->getOptionProducts('marca'),
            'proveedor' => $this->productos->getOptionProducts('proveedor'),
            'zona' => $this->productos->getOptionProducts('zona')

        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST' ){
            
            $getProductos = $this->productos->filtrarProductos($_POST['buscar']);
            $datos = [
                'productos' => $getProductos,
                'options' => $opcionesProductos
            ];

        } else{
            $getProductos = $this->productos->leer();
            $datos = [
                'productos' => $getProductos,
                'options' => $opcionesProductos
            ];
        }

        $this->view('/pages/home' , $datos);
    }

    public function registrar()
    { 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datosProducto = [
                'marca' => trim($_POST['marca']),
                'proveedor' => trim($_POST['proveedor']),
                'zona' => trim($_POST['zona']),
                'producto' => trim($_POST['producto']),
                'codigo' => trim($_POST['codigo']),
                'precio' => trim($_POST['precio']),
                'stock' => trim($_POST['stock']),
                
            ];
           
            if($this->productos->registrar($datosProducto)){
                redirection('/home');
            }else {
                redirection('/home');
            }
        }else {
            redirection('/home');
        }
    }

    function eliminar($id)
    {
        if($this->productos->eliminar($id)){
            redirection('/home');

        }else{
            redirection('/home');
        }


    }

    function editar($id)
    { 

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $datosProducto = [
                'marca' => trim($_POST['marca']),
                'proveedor' => trim($_POST['proveedor']),
                'zona' => trim($_POST['zona']),
                'codigo' => trim($_POST['codigo']),
                'producto' => trim($_POST['producto']),
                'precio' => trim($_POST['precio']),
                'stock' => trim($_POST['stock']),
            ];
           
            if($this->productos->actualizar($datosProducto, $id)){
                redirection('/home');
            }else {
                redirection('/home');
            }

        }else{

            $opcionesProductos = [
                'marcas' => $this->productos->getOptionProducts('marca'),
                'proveedor' => $this->productos->getOptionProducts('proveedor'),
                'zona' => $this->productos->getOptionProducts('zona')
            ];

            $datos = [
                'producto' => $this->productos->getProducto($id),
                'opciones' => $opcionesProductos
            ];

            $this->view('/pages/editar' , $datos);
        }
      


    }

}