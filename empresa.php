<?php
require_once 'venta.php';

// implementamos la clase Empresa con los atributos denominacion, direccion, coleccion de clientes, coleccion de motos y coleccion de ventas.
class Empresa{
    //atributos
    private $denominacion;
    private $direccion;
    private array $coleccionClientes;
    private array $coleccionMotos;
    private array $coleccionVentas;

    //Implementamos el metodo constructor para asignarle valores iniciales a los atributos
    public function __construct($denominacion, $direccion, $clientes, $motos){
        $this -> denominacion = $denominacion;
        $this -> direccion = $direccion;
        $this -> coleccionClientes = $clientes;
        $this -> coleccionMotos = $motos;
        $this -> coleccionVentas = [];
    }

    //observadoras
    public function getDenominacion() : string {
        return $this -> denominacion;
    }
    public function getDireccion() : string {
        return $this -> direccion;
    }
    public function getColeccionClientes() : array {
        return $this -> coleccionClientes;
    }
    public function getColeccionMotos() : array {
        return $this -> coleccionMotos;
    }
    public function getColeccionVentas() : array {
        return $this -> coleccionVentas;
    }

    //modificadoras
    public function setDenominacion($denominacion) : void {
        $this -> denominacion = $denominacion;
    }
    public function setDireccion($direccion) : void {
        $this -> direccion = $direccion;
    }
    public function setColeccionClientes(array $coleccionClientes) : void {
        $this -> coleccionClientes = $coleccionClientes;
    }
    public function setColeccionMotos(array $coleccionMotos) : void {
        $this -> coleccionMotos = $coleccionMotos;
    }
    public function setColeccionVentas(array $coleccionVentas) : void {
        $this -> coleccionVentas = $coleccionVentas;
    }

    public function retornarMoto($codigoMoto){
        foreach($this -> coleccionMotos as $moto){
            if($moto -> getCodigoMoto() == $codigoMoto){
                return $moto;
            }else {
                return null;
            }
        }
    }

    public function registrarVenta($coleccionCodigosMotos, $objCliente){
        $coleccionMotosActivas = [];
        $numeroVenta = count($this -> coleccionVentas) + 1;

        if($objCliente -> getClienteDadoDeBaja() == true){
            return "El cliente esta dado de baja, no puede registrar compras";
        }
        $venta = new Venta($numeroVenta, date("Y-m-d"), $objCliente, $coleccionMotosActivas, 0);

            foreach($coleccionCodigosMotos as $codigoMoto){
                $moto = $this -> retornarMoto($codigoMoto);
                if($moto != null){
                    $venta -> incorporarMoto($moto);
                    return $venta;
                }else{
                    return "La moto no se encuentra disponible para la venta";
                }
            }
        $this -> coleccionVentas[] = $venta;
        return $venta -> getPrecioTotalVenta();
    }

    public function retornarVentasXCliente($tipoDoc, $numDoc){
        $ventas = [];
        foreach($this -> coleccionVentas as $venta){
            $objCliente = $venta -> getObjCliente();
            if($objCliente  -> getTipoDocumento() == $tipoDoc && $objCliente -> getDocumentoCliente() == $numDoc){
                $ventas[] = $venta;
            }
        }
        return $ventas;
    }

//metodo __toString para retornar los valores de los atributos
    public function __toString() : string {
        $clientes = "";
        $motos = "";
        $ventas = "";
        foreach($this -> getColeccionClientes() as $cliente){
            $clientes .= $cliente . "\n";
        }
        foreach($this -> getColeccionMotos() as $moto){
            $motos .= $moto . "\n";
        }
        foreach($this -> getColeccionVentas() as $venta){
            $ventas .= $venta . "\n";
        }
        return
        "\n Denominacion de la empresa: " . ($this -> denominacion) .
        "\n Direccion de la empresa: " . ($this -> direccion) . "\n" .
        "CLIENTES: " . "\n" . $clientes . "\n" .
        "MOTOS: " . "\n" . $motos .
        "\n VENTAS: " . "\n" . $ventas . "\n";
    }
}
?>