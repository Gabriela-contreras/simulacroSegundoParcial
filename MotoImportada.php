<?php
class MotoImportada extends Moto
{
    private $pais;
    private $importe;

    public function __constructor($codigo, $costo, $anioFab, $descripcion, $porINCaNUAL, $activa, $tipo, $pais, $importe)
    {
        parent::__construct($codigo, $costo, $anioFab, $descripcion, $porINCaNUAL, $activa, $tipo);
        $this->pais = $pais;
        $this->importe = $importe;
    }

    public function getPais()
    {
        return $this->pais;
    }

    public function setPais($value)
    {
        $this->pais = $value;
    }
    public function getImporte()
    {
        return $this->importe;
    }

    public function setImporte($value)
    {
        $this->importe = $value;
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
            "tipo MOTO " . $this->getTipo() . "\n" .
            "Pais " . $this->getPais() . "\n" .
            "importe " . $this->getImporte();
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
            $ventaI = $compra + $compra * ($anio * $this->getPorIncAnual());
            $venta = $ventaI + $this->getImporte();
        }
        //  else {
        //     $venta = -1;
        // }
        return $venta;
    }
}
