<?php

echo"f";

require_once 'conexion.php';
// ESTE ES EL MODELO DE USUARIO DE AQUI VAMOS AL CONTROLADOR O UserModel
class Peticiones{
    private $db;
    //este construtor se encarga de instaciar el objeto conexion de manera segura
    public function __construct() {
        $this->db = (new Base_Datos())->Conexion_Base_Datos();
    }
    //la funcion se encarga de guardar datos en la base de datos
    public function Agregar_Maquina($ID, $NOMBRE, $MODELO, $FECHA_ULTIMA, $FECHA_PROXIMA){
        //estrcutura de consulta a la base de datos el area de values esta lleno de variables de referencia
        $Carga_Datos_Tabla = "INSERT INTO maquinas_ascardio(FECHA_PROXIMA, FECHA_ULTIMA, ID, MODELO, NOMBRE) VALUES (:FECHA_PROXIMA, :FECHA_ULTIMA, :ID
        , :MODELO, :NOMBRE)";

        $Verifiador = $this->db->prepare($Carga_Datos_Tabla);//se prepara la consulta a base de datos
        //CONVIERTE EL CONTENIDO DE LA CAJA DEL html en texto puro para evitar ataques a la base de datos
        $Verifiador->bindParam(':FECHA_PROXIMA', $FECHA_PROXIMA , PDO::PARAM_STR);
        $Verifiador->bindParam(':FECHA_ULTIMA', $FECHA_ULTIMA, PDO::PARAM_STR);
        $Verifiador->bindParam(':ID',$ID, PDO::PARAM_INT);
        $Verifiador->bindParam(':MODELO', $MODELO, PDO::PARAM_STR);
        $Verifiador->bindParam('NOMBRE', $NOMBRE, PDO::PARAM_STR);
        //TODITO SE TRANSFORMA PARA EVITAR USO INDEVIDO DE LA BASE DE DATOS EL COMANDO [PDO::PARAM_STR] CONVIERTE ESE CONTENIDO A TEXTO 

        if($Verifiador->execute()){ //se ejecuta la consulta para vereificar si contiene datos o no
            return true;
        }else{
            echo "algo fallo pero dios sabra donde";
            return false;
        }  
    }

    public function Mostrar_todas_las_maquinas(){
        $consulta = "SELECT * FROM maquinas_ascardio";//llama a todos los datos de ascardio
        $preparar = $this->db->prepare($consulta); //prepara la consulta
        $preparar->execute(); // sin execute la consulta jamas de jamas se enviara a mi base de datos
        return $preparar->fetchAll(PDO::FETCH_ASSOC); // retornara un arreglo asociativo
    }

    public function Borrar_datos($ID){
        //se coloca el where y el parametro para borrar en este cado el id, si no colocamos el where la base de datos se muere pal coño
        //cuando se coloca para borrar la consulta debe ser [DELETE FROM] no rquieres el asterisco en el medio
        $consulta = "DELETE  FROM  maquinas_ascardio WHERE ID = :ID"; //cuando hablamos de [WHERE ID] ese id hace referencia al nombre de la columnna de la bse de datos
        $preparar = $this->db->prepare($consulta);
        $preparar->bindParam(":ID", $ID, PDO::PARAM_INT); //transformamos ese texto en un valor numerico para pasarlo de manera segura a la base de datos y que borre el 
        //registro relacionado
        return $preparar->execute();
    }

    //permite el actulizar la maquina y se accede a traves del modelo
    public function Actualizar($id,$Nombre,$modelo,$Fecha_Ultima,$Fecha_Proxima){
        //se arma la consulta para actualizar valores en la base de datos 
        /**
         * en esta parte se enlaza el nombre de las columnas de la base de datos a variables por referencia para asi traerlas desde la base de datos
         * todo esto se realiza mediante el ID de esta manera se obtiene el registro deseado 
         */
        $consulta = "UPDATE maquinas_ascardio SET NOMBRE = :Nombre, MODELO = :modelo, FECHA_PROXIMA = :fecha_proxima, FECHA_ULTIMA = :fecha_ultima WHERE ID =:id";
        $preparar = $this->db->prepare($consulta);// preparamos la consulta
        /**
         * estos metodos se encargan de sacar la informacion de la variables por referencia y pasarlas a las variables que usaremos y 
         * agrega la medida que la informacion sacada sea transformada directamente a texto
         */
        $preparar->bindParam(":id", $id, PDO::PARAM_INT);
        $preparar->bindParam(":Nombre", $Nombre, PDO::PARAM_STR);
        $preparar->bindParam(":modelo", $modelo, PDO::PARAM_STR);
        $preparar->bindParam(":fecha_proxima", $Fecha_Proxima, PDO::PARAM_STR);
        $preparar->bindParam(":fecha_ultima", $Fecha_Ultima, PDO::PARAM_STR);
        //se preparo las variables de la consulta y asi ivitamos la inyeccion de sqlaso

        return $preparar->execute();//retorna true

    }

    public function Maquina_ID($id){
        
        $consulta = "SELECT * FROM maquinas_ascardio WHERE  ID = :id";//marcamo el lugar donde usaremos la variables $id con :id
        $preparar = $this->db->prepare($consulta);  //preparamos la consulta
        $preparar->bindParam(":id", $id, PDO::PARAM_INT); //asociamos la variable $id con :id y la pasamos con int de manera segura
        $preparar->execute();// se ejecuta la consulta
        return $preparar->fetch(PDO::FETCH_ASSOC); //nos debuelve el registro que tiene ese id
    }
}

?>