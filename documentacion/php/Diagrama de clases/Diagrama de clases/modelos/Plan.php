<?php

declare(strict_types=1);

namespace modelos;

/**
 * @author Edgar
 */
class Plan
{

    /** @var string */
    private string $nombre;

    /** @var double */
    private double $precio;

    /** @var double */
    private double $precio_dependiente;

    /** @var string */
    private string $descripcion;


    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        // TODO implement here
        return "";
    }

    /**
     * @param string $value
     */
    public function setNombre(string $value)
    {
        // TODO implement here
    }

    /**
     * @return double
     */
    public function getPrecio(): double
    {
        // TODO implement here
        return 0.0;
    }

    /**
     * @param double $value
     */
    public function setPrecio(double $value)
    {
        // TODO implement here
    }

    /**
     * @return double
     */
    public function getPrecio_dependiente(): double
    {
        // TODO implement here
        return 0.0;
    }

    /**
     * @param double $value
     */
    public function setPrecio_dependiente(double $value)
    {
        // TODO implement here
    }

    /**
     * @return string
     */
    public function getDescripcion(): string
    {
        // TODO implement here
        return "";
    }

    /**
     * @param string $value
     */
    public function setDescripcion(string $value)
    {
        // TODO implement here
    }

}
