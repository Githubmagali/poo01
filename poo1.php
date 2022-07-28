<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Definición de clases

 class Persona { // clase padre 
    protected $dni;
    protected $nombre; //protected hace que la propiedad sea visible visible a la de sus hijas (docente y estudiante) y a su propia clase
    protected $edad; //TODAS las propiedaddes tienen que ser privadas o protegidas
    protected $nacionalidad;

    public function setNombre($nombre){ $this->nombre ; } //los metodos si pueden ser públicos
    public function getNombre(){ return $this->nombre; } //return devuelve el valor
    //el metodo publico hace que sea visible en cualquier entorno
    
    public function setDni($dni){ $this->dni; }
    public function getDni(){ return $this->dni; }
    
    public function setEdad($edad){ $this->edad; }
    public function getEdad(){ return $this->edad; } //get y set; accesores y modificadores
    
    public function setNacionalidad($nacionalidad){ $this->nacionalidad; }
    public function getNacionalidad(){ return $this->nacionalidad; }
    
    public function imprimir(){

    }
    //método es una función miembro de una clase, mientras que una función independiente no
}

class Estudiante extends Persona { //estudiante y docente son clases hijas de persona
    private $legajo;
    private $notaPortfolio;
    private $notaPhp;
    private $notaProyecto;
    
    public function __construct(){
        $this->notaPortfolio = 0.0;
        $this->notaPhp = 0.0;
        $this->notaProyecto = 0.0;
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function imprimir(){
        echo "DNI: " . $this->dni . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Nacionalidad: " . $this->nacionalidad . "<br>";
        echo "Nota Portfolio: " . $this->notaPortfolio . "<br>";
        echo "Nota PHP: " . $this->notaPhp . "<br>";
        echo "Nota Proyecto: " . $this->notaProyecto . "<br>";
        echo "El promedio es: " . $this->calcularPromedio() . "<br><br>";
    }

    public function calcularPromedio(){
        return ($this->notaPortfolio + $this->notaPhp + $this->notaProyecto) / 3;
    }

}

class Docente extends Persona {
    private $especialidad;

    const ESPECIALIDAD_QUI = "Quimica";
    const ESPECIALIDAD_MAT= "Matematica";
    const ESPECIALIDAD_FIS = "Fisica";


    public function __construct($dni, $nombre, $especialidad){
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->especialidad = $especialidad;
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }


    public function imprimir(){
        echo "DNI: " . $this->dni . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Nacionalidad: " . $this->nacionalidad . "<br>";
        echo "Especialidad: " . $this->especialidad . "<br><br>";
    }

    public function imprimirEspecialidadesHabilitadas(){
        echo "Las especialidades habilitadas para un docente son:<br>";
        echo self::ESPECIALIDAD_FIS. "<br>";
        echo self::ESPECIALIDAD_QUI . "<br>";
        echo self::ESPECIALIDAD_MAT . "<br><br>";
    }

   //funcion destruct se genera automaticamente para liberar espacio en la memorestudiante

}

//Programa
$estudiante1 = new Estudiante(); //estudiante 1 es un objeto porque tiene declarado valores
$estudiante1->setNombre("Segismungo");
$estudiante1->setEdad(34);
$estudiante1->setNacionalidad("Argentino");
$estudiante1->notaPhp = 54;
$estudiante1->notaPortfolio = 88;
$estudiante1->notaProyecto = 96;
$estudiante1->getNombre();;
$estudiante1->imprimir();

$estudiante2 = new Estudiante();
$estudiante2->setNombre("Selva");
$estudiante2->setEdad(30);
$estudiante2->notaPortfolio = 79;
$estudiante2->notaPhp = 85;
$estudiante2->notaProyecto = 45;
$estudiante2->imprimir();

$docente1 = new Docente("344", "Sarte", Docente::ESPECIALIDAD_MAT);