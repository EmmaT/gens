<?php

namespace Sakya\GensBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Capitulo
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Capitulo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="capitulo", type="string", length=255)
     */
    private $capitulo;

    /**
     * @var integer
     *
     * @ORM\Column(name="numerocapitulo", type="integer")
     */
    private $numerocapitulo;

    /**
     * @var string
     *
     * @ORM\Column(name="libro", type="string", length=255)
     */
    private $libro;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido", type="text")
     */
    private $contenido;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set capitulo
     *
     * @param string $capitulo
     * @return Capitulo
     */
    public function setCapitulo($capitulo)
    {
        $this->capitulo = $capitulo;

        return $this;
    }

    /**
     * Get capitulo
     *
     * @return string 
     */
    public function getCapitulo()
    {
        return $this->capitulo;
    }

    /**
     * Set numerocapitulo
     *
     * @param integer $numerocapitulo
     * @return Capitulo
     */
    public function setNumerocapitulo($numerocapitulo)
    {
        $this->numerocapitulo = $numerocapitulo;

        return $this;
    }

    /**
     * Get numerocapitulo
     *
     * @return integer 
     */
    public function getNumerocapitulo()
    {
        return $this->numerocapitulo;
    }

    /**
     * Set libro
     *
     * @param string $libro
     * @return Capitulo
     */
    public function setLibro($libro)
    {
        $this->libro = $libro;

        return $this;
    }

    /**
     * Get libro
     *
     * @return string 
     */
    public function getLibro()
    {
        return $this->libro;
    }

    /**
     * Set contenido
     *
     * @param string $contenido
     * @return Capitulo
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get contenido
     *
     * @return string 
     */
    public function getContenido()
    {
        return $this->contenido;
    }
}
