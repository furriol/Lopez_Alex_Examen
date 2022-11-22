<?php

class Producto {

    private $numProducto;
    private $nombre;
    private $categoria;
    private $precio;

    public function __construct($numProducto, $nombre, $categoria, $precio) {
        $this->numProducto = $numProducto;
        $this->nombre = $nombre;
        $this->categoria = $categoria;
        $this->precio = $precio;
    }

    public function getNumProducto()
    {
        return $this->numProducto;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function toArray() {
        return [
            'numProducto' => $this->getNumProducto(),
            'nombre' => $this->getNombre(),
            'categoria' => $this->getCategoria(),
            'precio' => $this->getPrecio()
        ];
    }
}