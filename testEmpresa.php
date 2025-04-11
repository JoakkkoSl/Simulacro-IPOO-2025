<?php
include_once 'Cliente.php';
include_once 'Moto.php';
include_once 'Venta.php';
include_once 'Empresa.php';

// 1. Crear instancias de Cliente
$objCliente1 = new Cliente("Ana", "Pérez", "DNI", "30111222", false);
$objCliente2 = new Cliente("Luis", "Gómez", "DNI", "30444555", false);

// 2. Crear instancias de Moto
$obMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 0.85, true);
$obMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 0.70, true);
$obMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250", 0.55, false);

// 4. Crear objeto Empresa
$empresa = new Empresa(
    "Alta Gama",
    "Av Argentina 123",
    [$objCliente1, $objCliente2],
    [$obMoto1, $obMoto2, $obMoto3]
);

// 5. Registrar venta: Cliente 2 con motos [11, 12, 13]
$importe1 = $empresa->registrarVenta([11, 12, 13], $objCliente2);
echo "Importe De Venta 1: $" . $importe1 . "\n\n";

// 6. Registrar venta: Cliente 2 con moto [0] (no existe)
$importe2 = $empresa->registrarVenta([0], $objCliente2);
echo "Importe venta 2: $" . $importe2 . "\n\n";

// 7. Registrar venta: Cliente 2 con moto [2] (no existe en la colección cargada)
$importe3 = $empresa->registrarVenta([2], $objCliente2);
echo "Importe venta 3: $" . $importe3 . "\n\n";

// 8. Mostrar ventas de Cliente 1
$ventasCliente1 = $empresa->retornarVentasXCliente("DNI", "30111222");
echo "Ventas de Cliente 1:\n";
foreach ($ventasCliente1 as $venta) {
    echo "Numero de venta: " . $venta -> getNumeroVenta(). "\n";
}

// 9. Mostrar ventas de Cliente 2
$ventasCliente2 = $empresa->retornarVentasXCliente("DNI", "30444555");
echo "Ventas de Cliente 2:\n";
foreach ($ventasCliente2 as $venta) {
    echo "Numero de venta: " . $venta -> getNumeroVenta(). "\n";
}

// 10. Mostrar toda la información de la empresa
echo "DATOS DE LA EMPRESA:\n";
echo $empresa;

?>