<?php
class Venta
{
    //     En la clase Venta:
    // 1. Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de
    // motos y el precio final.
    // 2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada
    // atributo de la clase.
    // 3. Los métodos de acceso de cada uno de los atributos de la clase.
    // 4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
    //

    private $numero;
    private $fecha;
    private $objCliente;
    private $arrMotos;
    private $precioFinal;

    public function __construct($numero,  $fecha, $objCliente, $arrMotos, $precioFinal)
    {

        $this->numero  = $numero;
        $this->fecha  = $fecha;
        $this->objCliente = $objCliente;
        $this->arrMotos = $arrMotos;
        $this->precioFinal = $precioFinal;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($value)
    {
        $this->numero  = $value;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($value)
    {
        $this->fecha  = $value;
    }

    public function getObjCliente()
    {
        return $this->objCliente;
    }

    public function setObjCliente($value)
    {
        $this->objCliente = $value;
    }

    public function getArrMotos()
    {
        return $this->arrMotos;
    }

    public function setArrMotos($value)
    {
        $this->arrMotos = $value;
    }

    public function getPrecioFinal()
    {
        return $this->precioFinal;
    }

    public function setPrecioFinal($value)
    {
        $this->precioFinal = $value;
    }
    //metodo de array ti string 



    //to string  número, fecha, referencia al cliente, referencia a una colección de
    // motos y el precio final.
    public function __toString()
    {
        return "\n datos venta \n " .
            "Numero " . $this->getNumero() . "\n" .
            "fecha " . $this->getFecha() . "\n" .
            "Cliente " . $this->getObjCliente() . "\n" .
            "coleccion de motos  " . $this->ArraytoString($this->getArrMotos()) . "\n" .
            "Precio final " . $this->getPrecioFinal() . "\n";
    }

    //convierte array en string 
    public function ArraytoString($array)
    {
        $result = "";
        foreach ($array as $element) {
            $result = $result . $element . " ";
        }
        return $result;
    }




    //5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
    // incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
    // vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
    // Utilizar el método que calcula el precio de venta de la moto donde crea necesario.

    public function incorporarMoto($objMoto)
    {

        if ($objMoto->getActiva() == true ) {

            $newColM = array_push($this->getArrMotos(), $objMoto);
            $this->setArrMotos($newColM);
            $precioObjMoto = $objMoto->darPrecioVenta();
            $precio = $this->getPrecioFinal() + $precioObjMoto;
            $this->setPrecioFinal($precio);
        }
    }
    //     En la clase Venta:
    // Implementar el método retornarTotalVentaNacional() que retorna  la sumatoria del precio venta de cada una de las
    //  motos Nacionales vinculadas a la venta.
    public function retornarTotalVentaNacional()
    {
        $sumPrecio = 0;
        foreach ($this->getArrMotos() as $moto) {

            if ($moto->getTipo() == "Nacional") {
                $sumPrecio .= $moto->darPrecioVenta();
            }
        }
        return $sumPrecio;
    }
    // Implementar el método retornarMotosImportadas() que retorna una colección de motos importadas vinculadas a la venta.
    //  Si la venta solo se corresponde con motos Nacionales la colección retornada debe ser vacía.
    public function retornarMotosImportadas()
    {
        $colImportadas = [];
        foreach ($this->getArrMotos() as $moto) {
            if ($moto->getTipo() == "Importada") {
                array_push($colImportadas, $moto);
            }
            
        }
        return $colImportadas;
    }
}
