<?php
include_once("Empresa.php");
include_once("Moto.php");
include_once("Venta.php");
include_once("MotoImportada.php");
include_once("MotoNacional.php");
include_once("Cliente.php");


function TestEmpresa()
{

    // Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2.
    $cliente1 = new Cliente("juana", "fonce", "true", "DNI", 4512152);
    $cliente2 = new Cliente("juan", "fiollee", "false", "DNI", 785695);

    // Cree 4 objetos Motos con la  información visualizada en las siguientes tablas: código, 
    // costo, año fabricación, descripción, porcentaje incremento anual, activo entre otros.
    $moto1 = new MotoNacional(11, 4222222, 2020, "alta gama ", 15, true, "Nacional");
    $moto2 = new MotoNacional(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true, 10, "Nacional");
    $moto3 = new MotoNacional(13, 4222222, 2023, "alta gama ", 50, true, "Nacional");
    $moto4 = new MotoImportada(14, 4222222, 2020, "alta gama ", 100, true, "Nacional", "francia", 1523645);


    // Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av Argenetina 123”, 
    //  colección de motos= [$obMoto11, $obMoto12, $obMoto13, $obMoto14] , colección de clientes = [$objCliente1, $objCliente2 ]
    //  , la colección de ventas realizadas=[].
    $colMotos = [$moto1, $moto2, $moto3, $moto4];
    $colClientes = [$cliente1, $cliente2];
    $colVentaRealizadas = [];
    $empresa = new Empresa("Alta Gama", "av Argentina123", $colClientes, $colMotos, $colVentaRealizadas);
    // Invocar al método  registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el $objCliente es una referencia
    //  a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la
    //   siguiente [11,12,13,14]. Visualizar el resultado obtenido.

    $empresa->registrarVenta([11, 12, 13, 14], $cliente1);

    // Invocar al método  registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es una referencia 
    // a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [13,14]. 
    //  Visualizar el resultado obtenido.
    $empresa->registrarVenta([11, 12, 13, 14], $cliente1);

    // Invocar al método  registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es una referencia
    //  a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [14,2].
    //    Visualizar el resultado obtenido.
    $empresa->registrarVenta([11, 12, 13, 14], $cliente2);


    // Invocar al método  informarVentasImportadas().  Visualizar el resultado obtenido.

    echo $empresa->informarVentasImportadas() . "\n";
    // Invocar al método  informarSumaVentasNacionales().  Visualizar el resultado obtenido.
    $empresa->informarSumaVentasNacionales();
    echo $empresa;
    // Realizar un echo de la variable Empresa creada en 2.


}

function main()
{
    TestEmpresa();
}

main();
