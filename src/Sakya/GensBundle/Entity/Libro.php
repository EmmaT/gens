<?php

namespace Sakya\GensBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Libro
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Libro
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
     * @ORM\Column(name="libro", type="string", length=255)
     */
    private $libro;

    /**
     * @var string
     *
     * @ORM\Column(name="autor", type="string", length=255)
     */
    private $autor;

    /**
     * @var string
     *
     * @ORM\Column(name="prefacio", type="string", length=700)
     */
    private $prefacio;

    /**
     * @ORM\OneToMany(targetEntity="Capitulo", mappedBy="libro")
     */
    private $capitulo;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->capitulo = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set libro
     *
     * @param string $libro
     * @return Libro
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
     * Set autor
     *
     * @param string $autor
     * @return Libro
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get autor
     *
     * @return string 
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Add capitulo
     *
     * @param \Sakya\GensBundle\Entity\Capitulo $capitulo
     * @return Libro
     */
    public function addCapitulo(\Sakya\GensBundle\Entity\Capitulo $capitulo)
    {
        $this->capitulo[] = $capitulo;

        return $this;
    }

    /**
     * Remove capitulo
     *
     * @param \Sakya\GensBundle\Entity\Capitulo $capitulo
     */
    public function removeCapitulo(\Sakya\GensBundle\Entity\Capitulo $capitulo)
    {
        $this->capitulo->removeElement($capitulo);
    }

    /**
     * Get capitulo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCapitulo()
    {
        return $this->capitulo;
    }

    /**
     * Set prefacio
     *
     * @param string $prefacio
     * @return Libro
     */
    public function setPrefacio($prefacio)
    {
        $this->prefacio = $prefacio;

        return $this;
    }

    /**
     * Get prefacio
     *
     * @return string 
     */
    public function getPrefacio()
    {
        return $this->prefacio;
    }
}
