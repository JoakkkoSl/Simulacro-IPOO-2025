<?php
//implementamos la clase Moto con los atributos codigo, costo, año de fabricacion, descripcion, porcentaje de incremento anual y moto dada de baja.
class Moto{
    //atributos
    private string $codigoMoto;
    private string $costoMoto;
    private int $anioFabricacion;
    private string $descripcionMoto;
    private float $porcentajeIncrementoAnual;
    private bool $motoDadaDeBaja;


    //Implementamos el metodo constructor para asignarle valores iniciales a los atributos
    public function __construct($codigo, $costo, $anio, $descripcion, $porcentajeIncrementoAnual, $activo){
        $this  -> codigoMoto = $codigo;
        $this -> costoMoto = $costo;
        $this -> anioFabricacion = $anio;
        $this -> descripcionMoto = $descripcion;
        $this -> porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
        $this -> motoDadaDeBaja = $activo; 
    }

    //observadoras
    public function getCodigoMoto() : string {
        return $this -> codigoMoto;
    }  
    public function getCostoMoto() : string {
        return $this -> costoMoto;
    }
    public function getAnioFabricacion() : int {
        return $this -> anioFabricacion;
    }
    public function getDescripcionMoto() : string {
        return $this -> descripcionMoto;
    }
    public function getPorcentajeIncrementoAnual() : float {
        return $this -> porcentajeIncrementoAnual;
    }
    public function getMotoDadaDeBaja() : bool {
        return $this -> motoDadaDeBaja;
    }

    //modificadoras
    public function setCodigoMoto(string $codigo) : void {
        $this -> codigoMoto = $codigo;
    }
    public function setCostoMoto(string $costo) : void {
        $this -> costoMoto = $costo;
    }
    public function setAnioFabricacion(int $anio) : void {
        $this -> anioFabricacion = $anio;
    }
    public function setDescripcionMoto(string $descripcion) : void {
        $this -> descripcionMoto = $descripcion;
    }
    public function setPorcentajeIncrementoAnual(float $porcentajeIncrementoAnual) : void {
        $this -> porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
    }
    public function setMotoDadaDeBaja(bool $motoDadaDeBaja) : void {
        $this -> motoDadaDeBaja = $motoDadaDeBaja;
    }

    //metodo __toString para mostrar los atributos de la clase
    public function __toString() : string {
        return "Codigo de la moto: " . $this -> codigoMoto . "\n" .
            "Costo de la moto: " . $this -> costoMoto . "\n" .
            "Año de fabricacion: " . $this -> anioFabricacion . "\n" .
            "Descripcion de la moto: " . $this -> descripcionMoto . "\n" .
            "Porcentaje de incremento anual: " . $this -> porcentajeIncrementoAnual . "\n" .
            "Moto dada de baja: " . ($this -> motoDadaDeBaja ? 'Si' : 'No') . "\n";
    }


    //metodo para calcular el precio de la moto, si la moto no se encuentra disponible retorna un valor < 0, de lo contrario retorna el valor por el cual se puede vender la moto.
    public function darPrecioVenta() : float {
        //declaracion de variables
        $anioTranscurrido = (2025 - $this -> anioFabricacion); //se calcula el año transcurrido desde la fabricacion de la moto hasta el año actual.
        $costoDeMoto = $this -> costoMoto;
        $porcentajeDeIncrementoAnual = $this -> porcentajeIncrementoAnual; //se obtiene el porcentaje de incremento anual de la moto.

        if($this -> motoDadaDeBaja == false) {
            return -1;// Si la moto está dada de baja, no se puede vender
        }
        else{
            $precioVenta = $costoDeMoto + $costoDeMoto * ($anioTranscurrido * $porcentajeDeIncrementoAnual); //Calculo para calcular el precio de venta de la moto.
            return $precioVenta;
        }
    }   
}
?> 