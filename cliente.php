<?php
//implementamos la clase Cliente con el atributo nombre, apellido, tipo y numero de documento 
// y si esta dado de baja, si lo esta,, no puede registrar compras desde el momento de su baja.
class Cliente{
    //atributos
    private string $nombreCliente;
    private string $apellidoCliente;
    private string $tipoDocumento;
    private string $documentoCliente;
    private bool $clienteDadoDeBaja;

    //Implementamos el metodo constructor para asignarle valores iniciales a los atributos
    public function __construct($nombre, $apellido, $tipoDeDocumento, $documento, $dadoDeBaja){
        $this  -> nombreCliente = $nombre;
        $this -> apellidoCliente = $apellido;
        $this -> tipoDocumento = $tipoDeDocumento;
        $this -> documentoCliente = $documento;
        $this -> clienteDadoDeBaja = $dadoDeBaja;
    }

    //observadoras
    public function getNombreCliente() : string {
        return $this -> nombreCliente;
    }
    public function getApellidoCliente() :  string{
        return $this ->  apellidoCliente;
    }
    public function getTipoDocumento() : string{
        return $this -> tipoDocumento;
    }
    public function getDocumentoCliente() : string{
        return $this -> documentoCliente;
    }
    public function getClienteDadoDeBaja() : bool{
        return $this -> clienteDadoDeBaja;
    }

    //modificadoras
    public function setNombreCliente($nombre){
        $this  -> nombreCliente = $nombre;
    }
    public function setApellidoCliente($apellido){
        $this -> apellidoCliente = $apellido;
    }
    public function setTipoDocumento($tipoDeDocumento){
        $this -> tipoDocumento = $tipoDeDocumento;
    }
    public function setDocumentoCliente($documento){
        $this -> documentoCliente = $documento;
    }

    //metodo __toString para retornar los valores de los atributos
    public function __toString() {
        return "Nombre del cliente: " . $this->getNombreCliente() . 
            "\nApellido del cliente: " . $this->getApellidoCliente() . 
            "\nTipo de documento del cliente: " . $this->getTipoDocumento() . 
            "\nNumero de documento del cliente: " . $this->getDocumentoCliente() . 
            "\nCliente dado de baja: " . $this->getClienteDadoDeBaja() . "\n";
    }
}
?>