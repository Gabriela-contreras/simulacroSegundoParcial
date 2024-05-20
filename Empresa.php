<?php
// En la clase Empresa:
// 1. Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de
// motos y la colección de ventas realizadas.
// 2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
// 3. Los métodos de acceso para cada una de las variables instancias de la clase.




class Empresa
{
    private $denominacion;
    private $direccion;
    private $colClientes;
    private $colMotos;
    private $colVentasRealizadas;

    public function __construct($denominacion, $direccion, $colClientes, $colMotos, $colVentasRealizadas)
    {

        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colClientes = $colClientes;
        $this->colMotos = $colMotos;
        $this->colVentasRealizadas = $colVentasRealizadas;
    }

    public function getDenominacion()
    {
        return $this->denominacion;
    }

    public function setDenominacion($value)
    {
        $this->denominacion = $value;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($value)
    {
        $this->direccion = $value;
    }

    public function getColClientes()
    {
        return $this->colClientes;
    }

    public function setColClientes($value)
    {
        $this->colClientes = $value;
    }

    public function getColMotos()
    {
        return $this->colMotos;
    }

    public function setColMotos($value)
    {
        $this->colMotos = $value;
    }

    public function getColVentasRealizadas()
    {
        return $this->colVentasRealizadas;
    }

    public function setColVentasRealizadas($value)
    {
        $this->colVentasRealizadas = $value;
    }

    // 4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
    //denominación, dirección, la colección de clientes, colección de
    // motos y la colección de ventas realizadas.

    public function __toString()
    {
        return "Datos emprersa \n" .
            "Denominacion " . $this->getDenominacion() . "\n" .
            "direccion " . $this->getDireccion() . "\n" .
            "coleccion clientes  " . $this->ArraytoString($this->getColClientes()) . "\n" .
            "coleccion motos  " . $this->ArraytoString($this->getColMotos()) . "\n" .
            "coleccion ventas realizadas " . $this->ArraytoString($this->getColVentasRealizadas()) . "\n";
    }
    //convierte Array a string
    public function ArraytoString($array)
    {
        $result = "";
        foreach ($array as $element) {
            $result = $result . $element . " ";
        }
        return $result;
    }





    // 5. Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
    // retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
    public function retornarMoto($codigoMoto)
    {

        $i = 0;
        $count = count($this->getColMotos());
        while ($i < $count) {
            $moto = $this->getColMotos()[$i];
            if ($codigoMoto == $moto->getCodigo()) {
                $result = $moto;
            }
        }
        return $result;
    }

    // 6. Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
    // parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
    // se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
    // Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
    // para registrar una venta en un momento determinado.
    // El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
    // venta.


    public function registrarVenta($colCodigosMoto, $objCliente)
    {


        $i = 0;
        $cantColCodigoMoto = count($colCodigosMoto);

        while ($i < $cantColCodigoMoto) {
            $CodigoM = $colCodigosMoto[$i];
            $arrMoto = $this->getColMotos();
            while ($i < count($arrMoto)) {
                $objMoto = $this->getColMotos()[$i];

                if ($objMoto->getTipo() == "Importada") {
                    $this->informarVentasImportadas();
                }
                if ($objMoto->getCodigo() == $CodigoM && $objMoto->getActiva() == true && $objCliente->getDadoBaja() == false) {

                    $agregandoMotos = array_push($this->getColMotos(), $objMoto);
                    $this->setColMotos($agregandoMotos);
                    $importe = $this->getColMotos()->getPrecioFinal();
                    //Si en la venta al menos una de 
                    //  las motos es importada la venta debe ser informada.
                    if ($objMoto->getTipoMoto() == "importada") {
                        $this->informarVentasImportadas();
                    }
                }
                $i++;
            }
            $i++;
        }
    }

    // 7. Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo

    public function retornarVentasXCliente($tipo, $numDoc)
    {

        $colVentCliente = [];
        foreach ($this->getColVentasRealizadas() as $venta) {
            $cliVent = $venta->getObjCliente();
            if ($cliVent->getTipoDoc() == $tipo && $cliVent->getNumDoc() == $numDoc) {
                $newvent = array_push($colVentCliente, $venta);
            }
            # code...
        }
        return $colVentCliente;
    }

    //     En la clase Empresa:
    // Implementar el método informarSumaVentasNacionales() que recorre la colección de ventas realizadas por la empresa y retorna el importe total
    //  de ventas Nacionales realizadas por la empresa.

    public function informarSumaVentasNacionales()
    {
        $importeTotal = 0;
        foreach ($this->getColVentasRealizadas() as $venta) {
            if ($venta->getTipo() == "Nacional") {
                $importeTotal .= $venta->retornarTotalVentaNacional();
            }
        }
        return $importeTotal;
    }
    // Implementar el método informarVentasImportadas() que recorre la colección de ventas realizadas por la empresa y retorna
    //  una colección de ventas de motos  importadas. Si en la venta al menos una de las motos es importada la venta debe ser informada.
    //                (*IMPORTANTE: invocar a los métodos implementados en la clase venta cuando crea necesario)
    public function informarVentasImportadas()
    {
        $colVentaMotoImp = [];
        foreach ($this->getColVentasRealizadas() as $venta) {
            if ($venta->getTipo() == "Importada") {
                array_push($colVentaMotoImp, $venta);
            }
        }
        return $colVentaMotoImp;
    }
}
