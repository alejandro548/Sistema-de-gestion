<?php
require_once("modelo.php");

class Controlador_Maquina{
    private $Modelo_Maquina;

    public function __construct(){
        
        $this->Modelo_Maquina = new Peticiones();
    }

    public function Mostrar_formulario(){
        require_once 'formulario.php';
    }

    public function Mostrar_lista(){
        //se instacia una variable que contendra el objeto con el llamado al metodo del modelo
        $maquinas = $this->Modelo_Maquina->Mostrar_todas_las_maquinas();
        //llamamos al archivo de php que contiene la vista para ingresar los datos
        require_once 'lista.php';

    }

    public function Eliminar_Registro(){
        //se recibe el [ID] del la vista esa d
        if(isset($_GET['ID'])){
            //traspasa el id a la variable y genera la consulta 
            $id = $_GET['ID'];
            if($this->Modelo_Maquina->Borrar_datos($id)){
                echo'borrado';
                header('location: controlador.php?action=Mostrar_lista');
            }else{
                echo'error al eliminar' . $id;
            }
        }
    }

    public function Mostrar_Registro(){
        if(isset($_GET['ID'])){
            $id = $_GET['ID'];

            $maquina = $this->Modelo_Maquina->Maquina_ID( $id );//se llama a la funcion del modelo para de esta manera saber los datos relacionados del id
            require_once 'formulario_edicion.php';//estos datos se pasaran al formulario de edicion de manera automatica

        }
    }
    
    public function Generar_Actualizacion(){
        //recibe los datos del formulario_edicion.php y los pasa a las variables pormetodo post
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['ID'];
            $modelo = $_POST['MODELO'];
            $nombre = $_POST['NOMBRE'];
            $fecha_ultima = $_POST['FECHA_ULTIMA'];
            $fecha_proxima = $_POST['FECHA_PROXIMA'];

            if($this->Modelo_Maquina->Actualizar($id, $nombre, $modelo, $fecha_ultima, $fecha_proxima )){
                header('location: controlador.php?action=Mostrar_lista');
                exit;
            }else{
                echo 'error de actualizacion';
            }
        }
    }

    public function Agregar_Maquinaria(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //se recoge los datos del html
            $Fecha_Proxima = $_POST['FECHA_PROXIMA'] ?? null;
            $Fecha_Ultima = $_POST['Fecha_Ultima'] ?? null;
            $Nombre = $_POST['Nombre'] ?? null;
            $Modelo = $_POST['modelo'] ?? null;
            $ID = $_POST['ID'] ?? null;

            if(empty($ID) || empty($Nombre) || empty($Fecha_Proxima)){
                die ("los campos [ID][Nombre][Fecha ultima] son obligatorios");
            }

            $Validacion = $this->Modelo_Maquina->Agregar_Maquina($ID, $Nombre, $Modelo, $Fecha_Ultima, $Fecha_Proxima);

            if($Validacion){
                header('location: controlador.php?action=Mostrar_lista');
                exit;
            }else{
                echo "Error al Agregar [REVISA MUY BIEN]";
            }

        }
   
        
    }
   

}   
$action =  $_GET["action"] ?? 'Mostrar_formulario';

$Controlador = new Controlador_Maquina();

switch ($action) {
    case'guardar':
        $Controlador->Agregar_Maquinaria();
    break;

    case 'Mostrar_lista':
        $Controlador->Mostrar_lista();
        break;
    
    case 'eliminar':
        $Controlador->Eliminar_Registro();
        break;

    case 'editar':
        $Controlador->Mostrar_Registro() ;
        break;
    
    case 'actualizar':
        $Controlador->Generar_Actualizacion();
        break;

    default:
        $Controlador->Mostrar_formulario() ;



}

  
?>