<?php

declare(strict_types=1);

namespace modelos;

/**
 * @author Edgar
 */
class Dependiente
{

    /** @var int */
    private int $id;

    /** @var string */
    private string $nombre;

    /** @var string */
    private string $apellidos;

    /** @var direccion */
    private direccion $direccion;

    /** @var string */
    private string $telefono;

    /** @var string */
    private string $foto_certificado_nacimiento;

    /** @var string */
    private string $foto_carnet_identidad;


    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        // TODO implement here
        return 0;
    }

    /**
     * @param int $value
     */
    public function setId(int $value)
    {
        // TODO implement here
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
     * @return string
     */
    public function getApellidos(): string
    {
        // TODO implement here
        return "";
    }

    /**
     * @param string $value
     */
    public function setApellidos(string $value)
    {
        // TODO implement here
    }

    /**
     * @return direccion
     */
    public function getDireccion(): direccion
    {
        // TODO implement here
        return null;
    }

    /**
     * @param direccion $value
     */
    public function setDireccion(direccion $value)
    {
        // TODO implement here
    }

    /**
     * @return string
     */
    public function getTelefono(): string
    {
        // TODO implement here
        return "";
    }

    /**
     * @param string $value
     */
    public function setTelefono(string $value)
    {
        // TODO implement here
    }

    /**
     * @return string
     */
    public function getFoto_certificado_nacimiento(): string
    {
        // TODO implement here
        return "";
    }

    /**
     * @param string $value
     */
    public function setFoto_certificado_nacimiento(string $value)
    {
        // TODO implement here
    }

    /**
     * @return string
     */
    public function getFoto_carnet_identidad(): string
    {
        // TODO implement here
        return "";
    }

    /**
     * @param string $value
     */
    public function setFoto_carnet_identidad(string $value)
    {
        // TODO implement here
    }

}
