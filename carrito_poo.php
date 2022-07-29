<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Cliente{
    private $dni;
    private $nombre;
    private $correo;
    private $descuento;
    private $telefono;

     public function __construct()
     { $this->descuento= 0.0;}


 public function __get($propiedad)
 {return $this->$propiedad;}

 public function __set($propiedad, $valor)
 {$this->$propiedad=$valor;}

 public function imprimir()
 {echo "dni:". $this->dni ."<br>";
 echo "nombre:" .$this->nombre . "<br>";
 echo "correo:".$this->correo . "<br>";
 echo "descuento:" . $this->descuento . "<br>";
 echo "telefono:" . $this->telefono . "<br>";
}


}

class Producto
{private $cod;
private $nombre;
private $precio;
private $descripcion;
private $iva;

public function __construct() { //metodo construct puede ser publico, privado o protegido
$this->precio =0.0;
$this->iva= 0.0;
}

public function __get($propiedad)
{return $this-> $propiedad;}

public function __set($propiedad, $valor)
{$this->$propiedad= $valor;}


public function imprimir()
{echo "cod:" .$this->cod. "<br>";
echo "descripcion:" .$this->descripcion. "<br>";
echo "nombre:" .$this->nombre. "<br>";
echo "iva:" .$this->iva. "<br>";
echo "precio:" .$this->precio. "<br>";}



}

class Carrito {
    private $cliente;
    private $aProductos;
    private$subTotal;
    private$total;

    public function __construct()
        {$this->aProductos = array();
        $this->subTotal = 0.0;
        $this ->total= 0.0;}


public function __get($propiedad)
{return $this->$propiedad;}

public function __set($propiedad, $valor)
{return $this->$propiedad= $valor;}


public function cargarProducto ($producto)
{$this->aProductos[]= $producto;}


public function imprimirTicket(){
    echo "<table class='table ' style='width:1000px'>";
    echo "<tr><th colspan='2' class='text-center'>Market</th></tr>
    <tr> <th>FECHA</th>
    <td>" . date("d/m/Y H:i:s") . "</td></tr>
    <tr>
    <th>DNI</th>
    <td>" . $this->cliente->dni . "</td>
  </tr>
  <tr>      <th>Nombre</th>  <td>" . $this->cliente->nombre . "</td>   </tr>
  <tr> <th> Productos:</th>   </tr>";
  foreach ($this->aProductos as $producto) {
    echo "<tr><th>" . $producto->nombre . "</th>
 <td>$ " . number_format($producto->precio, 2, ",", ".") . "</td> </tr>";
    $this->subTotal += $producto->precio;
    $this->total += $producto->precio * (($producto->iva / 100)+1);
  }
 
echo "<tr>
    <th>Subtotal s/IVA:</th>
    <td>$ " . number_format($this->subTotal, 2, ",", ".") . "</td>
  </tr>
<tr>
    <th>TOTAL:</th>
    <td>$ " . number_format($this->total, 2, ",", ".") . "</td>
  </tr>
</table>";
}
}

//Programa
$cliente1 = new Cliente();
$cliente1->dni = "376";
$cliente1->nombre = "Moria";
$cliente1->correo = "abc@gmail.com";
$cliente1->telefono = "+5411";
$cliente1->descuento = 0.09;


$producto1 = new Producto();
$producto1->cod = "9077G7";
$producto1->nombre = "PC Escritorio";
$producto1->descripcion = "PC ";
$producto1->precio = 455;
$producto1->iva = 34;


$producto2 = new Producto();
$producto2->cod = "JBGH678";
$producto2->nombre = "LG K3";
$producto2->descripcion = "Celular";
$producto2->precio = 670;
$producto2->iva = 00.44;


$carrito = new Carrito();
$carrito->cliente = $cliente1;
$carrito->cargarProducto($producto1);
$carrito->cargarProducto($producto2);

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>TIENDA</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
<div class="container">
<div class="row">
<div class="py-5 text-center">
    <?php $carrito->imprimirTicket(); ?>
</div>
</div>
</div>
</body>
</html>
}

}