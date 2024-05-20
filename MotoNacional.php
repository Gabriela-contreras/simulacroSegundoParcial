<?php
class MotoNacional extends Moto
{
    private $porcentajeDes;

    public function __constructor($codigo, $costo, $anioFab, $descripcion, $porINCaNUAL, $activa, $tipo, $porcentajeDes)
    {
        parent::__construct($codigo, $costo, $anioFab, $descripcion, $porINCaNUAL, $activa, $tipo);
        $this->porcentajeDes = $porcentajeDes;
    }

    public function getPorcentajeDes()
    {
        return $this->porcentajeDes;
    }

    public function setPorcentajeDes($value)
    {
        $this->porcentajeDes = $value;
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
        "tipo MOTO " . $this->getTipo(). "\n". 
        "porcentaje descuento : ". $this->getPorcentajeDes();
}


    // polimorfismo del metodo
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
            $ventaN = $compra + $compra * ($anio * $this->getPorIncAnual());
            $descuento = $this->getPorcentajeDes() / 100;
            $venta = $ventaN * $descuento;
        }
        //  else {
        //     $venta = -1;
        // }
        return $venta;
    }
}
