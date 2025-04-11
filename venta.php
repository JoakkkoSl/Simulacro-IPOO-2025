<?php 
//implementamos la clase Venta con los atributos numero de venta, fecha, cliente, moto y precio total de la venta.
class Venta{
    //atributos
    private int $numeroVenta;
    private string $fechaVenta;
    private object $objCliente;
    private array $coleccionMotos;
    private float $precioTotalVenta;

    //Implementamos el metodo constructor para asignarle valores iniciales a los atributos
    public function __construct($numero, $fecha , $cliente, $moto, $precioTotal){
        $this  -> numeroVenta = $numero;
        $this -> fechaVenta = $fecha;
        $this -> objCliente = $cliente;
        $this -> coleccionMotos =  [];
        $this -> precioTotalVenta = $precioTotal;
    }

    //observadoras
    public function getNumeroVenta() : int {
        return $this -> numeroVenta;
    }
    public function getFechaVenta() : string {
        return $this -> fechaVenta;
    }
    public function getObjCliente() : object {
        return $this -> objCliente;
    }
    public function getColeccionMotos() : array {
        return $this -> coleccionMotos;
    }
    public function getPrecioTotalVenta() : float {
        return $this -> precioTotalVenta;
    }

    //modificadoras
    public function setNumeroVenta(int $numero) : void {
        $this -> numeroVenta = $numero;
    }
    public function setFechaVenta(string $fecha) : void {
        $this -> fechaVenta = $fecha;
    }
    public function setObjCliente(object $cliente) : void {
        $this -> objCliente = $cliente;
    }
    public function setColeccionMotos(array $motos) : void {
        $this -> coleccionMotos = $motos;
    }
    public function setPrecioTotalVenta(float $precioTotal) : void {
        $this -> precioTotalVenta = $precioTotal;
    }

    //implementamos el metodo que recibe como parametro un objeto moto y lo incorpora a la coleccion de motos en venta, cada vez que 
    //se incorpora una moto a la venta, se actualiza la variable instacia PrecioFinal de la venta.
    public function incorporarMoto($objMoto){
        $precioMoto = $objMoto -> darPrecioVenta();

        if ($precioMoto > 0){
            $this -> coleccionMotos[] = $objMoto;
            $this -> precioTotalVenta += $precioMoto;
        } 
        else {
        return "Error, la moto esta dada de baja";
    }
}

    //metodo __toString para retornar los valores de los atributos
    public function __toString(){
        $motos = "";
        foreach($this -> getColeccionMotos() as $moto){
            $motos .= $moto -> getCodigoMoto() . "\n";
        }

        return 
        "\n"."Numero de venta: " . $this ->getNumeroVenta() . 
        "\nFecha de venta: " . $this ->getFechaVenta() . 
        "\nCliente: " . $this ->getObjCliente() -> getNombreCliente() . 
        "\nMoto: " . $motos .
        "\nPrecio total de la venta: " . $this -> getPrecioTotalVenta();
    }
}
?>