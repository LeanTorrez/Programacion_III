<?php
/*
LEANDRO EMANUEL TORREZ
Aplicación No 17 (Auto)
Realizar una clase llamada “Auto” que posea los siguientes atributos

privados: _color (String)
_precio (Double)
_marca (String).
_fecha (DateTime)

Realizar un constructor capaz de poder instanciar objetos pasándole como

parámetros: i. La marca y el color.
ii. La marca, color y el precio.
iii. La marca, color, precio y fecha.

Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble
por parámetro y que se sumará al precio del objeto.
Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto”
por parámetro y que mostrará todos los atributos de dicho objeto.
Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo
devolverá TRUE si ambos “Autos” son de la misma marca.
Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son
de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con
la suma de los precios o cero si no se pudo realizar la operación.
Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);

En testAuto.php:
● Crear dos objetos “Auto” de la misma marca y distinto color.
● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
● Crear un objeto “Auto” utilizando la sobrecarga restante.

● Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
al atributo precio.
● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
resultado obtenido.
● Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o
no.
● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3,
5)
*/

class Auto
{

    private $_color;
    public $_precio;
    public $_marca;
    public $_fecha;

    public function __construct($marca , $color, $precio = 0, $fecha = "sin fecha")
    {
        $this->_marca = $marca;
        $this->_color = $color;
        $this->_precio = $precio;
        $this->_fecha = $fecha;
    }
  
    public function AgregarImpuestos($impuesto){
        $this->_precio += $impuesto;
    }
   
    static function MostrarAuto(Auto $auto){
        echo "Marca: $auto->_marca </br>Color: $auto->_color </br>Precio: $auto->_precio </br>Fecha: $auto->_fecha</br></br>";
    }

    public function Equals(Auto $auto){
        if($this->_marca == $auto->_marca){
            return true;
        }
        return false;
    }

    static function Add(Auto $auto1, Auto $auto2){

        if($auto1->Equals($auto2) && $auto2->_color == $auto1->_color ){    
            return $auto1->_precio + $auto2->_precio;
        }else{
            return 0;
        }
    }

    static function EscrituraAutoCSV($auto){

        if($auto instanceof Auto){
            $archivo = fopen("../clase03/auto.csv","a");
            $cadena = "$auto->_marca".","."$auto->_color".","."$auto->_precio".","."$auto->_fecha\n";

            $retorno = fwrite($archivo,$cadena);

            if($retorno > 0){
                echo "Se agrego el auto";
            }
            else
            {
                echo "No se pudo agregar el auto";
            }
            fclose($archivo);
        }
        return false;
    }

    static function LecturaAutoCSV(){
        
        if(file_exists("../clase03/auto.csv")){
            $archivo = fopen("../clase03/auto.csv","r");           
            while(!feof($archivo)){
               
                $parametros = fgetcsv($archivo,null,",");
                if($parametros != false){
                    $auto = new Auto($parametros[0],$parametros[1],$parametros[2],$parametros[3]);                
                    $arrayAutos[] = $auto;
                }else{
                    break;
                }
             
            } 

            return $arrayAutos;
        }
        return false;
    }
}
?>