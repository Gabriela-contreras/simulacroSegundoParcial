<?php
// En la clase Cliente:
// 0. Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de
// documento. Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
// 1. Método constructor que recibe como parámetros los valores iniciales para los atributos.
// 2. Los métodos de acceso de cada uno de los atributos de la clase.
// 3. Redefinir el método _toString para que retorne la información de los atributos de la clase.

class Cliente{
    private $nombre;
    private $apellido;
    private $dadoBaja;
    private $tipoDoc;
    private $numDoc;
    


	public function __construct($nombre, $apellido, $dadoBaja, $tipoDoc, $numDoc) {

		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->dadoBaja = $dadoBaja;
		$this->tipoDoc = $tipoDoc;
		$this->numDoc = $numDoc;
	}

	public function getNombre() {
		return $this->nombre;
	}

	public function setNombre($value) {
		$this->nombre = $value;
	}

	public function getApellido() {
		return $this->apellido;
	}

	public function setApellido($value) {
		$this->apellido = $value;
	}

	public function getDadoBaja() {
		return $this->dadoBaja;
	}

	public function setDadoBaja($value) {
		$this->dadoBaja = $value;
	}

	public function getTipoDoc() {
		return $this->tipoDoc;
	}

	public function setTipoDoc($value) {
		$this->tipoDoc = $value;
	}

	public function getNumDoc() {
		return $this->numDoc;
	}

	public function setNumDoc($value) {
		$this->numDoc = $value;
	}

    public function __toString()
    {
        return "Datos Cliente " . 
        "Nombre". $this->getNombre(). "\n" .
        "Apellido". $this->getApellido(). "\n" .
        "Dado de baja". $this->getDadoBaja(). "\n" .
        "Tipo documento". $this->getTipoDoc(). "\n" .
        "documento". $this->getNumDoc(). "\n" ;
    }





}