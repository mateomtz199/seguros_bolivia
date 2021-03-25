<?php

declare(strict_types=1);

namespace modelos;

/**
 * @author Edgar
 */
class Asegurado
{

    /** @var int */
    private int $id;

    /** @var [object Object] */
    private Plan $plan;

    /** @var string */
    private string $nmbre;

    /** @var string */
    private string $apellidos;

    /** @var string */
    private string $direccion;

    /** @var string */
    private string $telefono;

    /** @var string */
    private string $foto_certificado_nacimiento;

    /** @var string */
    private string $foto_carnet_identidad;

    /** @var date */
    private date $create_at;

    /** @var [object Object] */
    private Dependiente $dependientes;

    /** @var [object Object] */
    private Plan $plan;

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
     * @return [object Object]
     */
    public function getPlan(): [object Object]
    {
        // TODO implement here
        return null;
    }

    /**
     * @param [object Object] $value
     */
    public function setPlan([object Object] $value)
    {
        // TODO implement here
    }

    /**
     * @return string
     */
    public function getNmbre(): string
    {
        // TODO implement here
        return "";
    }

    /**
     * @param string $value
     */
    public function setNmbre(string $value)
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
     * @return string
     */
    public function getDireccion(): string
    {
        // TODO implement here
        return "";
    }

    /**
     * @param string $value
     */
    public function setDireccion(string $value)
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

    /**
     * @return date
     */
    public function getCreate_at(): date
    {
        // TODO implement here
        return null;
    }

    /**
     * @param date $value
     */
    public function setCreate_at(date $value)
    {
        // TODO implement here
    }

    /**
     * @return [object Object]
     */
    public function getDependientes(): [object Object]
    {
        // TODO implement here
        return null;
    }

    /**
     * @param [object Object] $value
     */
    public function setDependientes([object Object] $value)
    {
        // TODO implement here
    }

    /**
     * @return [object Object]
     */
    public function getPlan(): [object Object]
    {
        // TODO implement here
        return null;
    }

    /**
     * @param [object Object] $value
     */
    public function setPlan([object Object] $value)
    {
        // TODO implement here
    }

}
