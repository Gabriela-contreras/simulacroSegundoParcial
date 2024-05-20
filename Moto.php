<?php
// En la clase Moto:
// 1. Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje
// incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la
// venta y false en caso contrario).
// 2. Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la
// clase.
// 3. Los métodos de acceso de cada uno de los atributos de la clase.
// 4. Redefinir el método toString para que retorne la información de los atributos de la clase.
// 
class Moto
{
    private $codigo;
    private $costo;
    private $anioFab;
    private $descripcion;
    private $porIncAnual;
    private $activa;
    private $tipo;

    public function __construct($codigo, $costo, $anioFab, $descripcion, $porIncAnual, $activa, $tipo)
    {

        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFab = $anioFab;
        $this->descripcion = $descripcion;
        $this->porIncAnual = $porIncAnual;
        $this->activa = $activa;
        $this->tipo = $tipo;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($value)
    {
        $this->codigo = $value;
    }

    public function getCosto()
    {
        return $this->costo;
    }

    public function setCosto($value)
    {
        $this->costo = $value;
    }

    public function getAnioFab()
    {
        return $this->anioFab;
    }

    public function setAnioFab($value)
    {
        $this->anioFab = $value;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($value)
    {
        $this->descripcion = $value;
    }

    public function getPorIncAnual()
    {
        return $this->porIncAnual;
    }

    public function setPorIncAnual($value)
    {
        $this->porIncAnual = $value;
    }

    public function getActiva()
    {
        return $this->activa;
    }

    public function setActiva($value)
    {
        $this->activa = $value;
    }
    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($value)
    {
        $this->tipo = $value;
    }
    //to string
    public function __toString()
    {
        return "\n Datos moto \n" .
            "costo : " . $this->getCosto() . "\n" .
            "Codigo : " . $this->getCodigo() . "\n" .
            "anio fabricacion : " . $this->getAnioFab() . "\n" .
            "descripcion : " . $this->getDescripcion() . "\n" .
            "porcentaje incremento anual  : " . $this->getPorIncAnual() . "\n" .
            "Activa : " . $this->getActiva() . "\n" .
            "tipo MOTO " . $this->getTipo();
    }


    // 5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
    // Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
    // la venta, el método realiza el siguiente cálculo:



    public function darPrecioVenta()
    {
        if ($this->getActiva() == true) {
            // $_venta = $_compra + $_compra * (anio * por_inc_anual)
            // donde $_compra: es el costo de la moto.
            // anio: cantidad de años transcurridos desde que se fabricó la moto.
            // por_inc_anual: porcentaje de incremento anual de la moto
            $compra = $this->getCosto();
            $anioAc = date("Y");
            $anio = $anioAc - $this->getAnioFab();
            $venta = $compra + $compra * ($anio * $this->getPorIncAnual());
        } else {
            $venta = -1;
        }
        return $venta;
    }
}
