<?php
namespace EGit\Bundle\AAABundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Car
 *
 * @ORM\Table(name="car")
 * @ORM\Entity
 */
class Car
{

    /**
     *
     * @var string @ORM\Column(name="Make", type="string", length=255, nullable=false)
     */
    private $make;

    /**
     *
     * @var string @ORM\Column(name="Model", type="string", length=255, nullable=false)
     */
    private $model;

    /**
     *
     * @var integer @ORM\Column(name="Year", type="smallint", nullable=false)
     */
    private $year;

    /**
     *
     * @var integer @ORM\Column(name="Clock", type="integer", nullable=false)
     */
    private $clock;

    /**
     *
     * @var string @ORM\Column(name="Bodytype", type="string", length=255, nullable=false)
     */
    private $bodytype;

    /**
     *
     * @var float @ORM\Column(name="Price", type="float", precision=10, scale=0, nullable=false)
     */
    private $price;

    /**
     *
     * @var string @ORM\Column(name="Engine", type="string", length=255, nullable=false)
     */
    private $engine;

    /**
     *
     * @var integer @ORM\Column(name="ID", type="integer")
     *      @ORM\Id
     *      @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * Set make
     *
     * @param string $make            
     * @return Car
     */
    public function setMake($make)
    {
        $this->make = $make;
        
        return $this;
    }

    /**
     * Get make
     *
     * @return string
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * Set model
     *
     * @param string $model            
     * @return Car
     */
    public function setModel($model)
    {
        $this->model = $model;
        
        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set year
     *
     * @param integer $year            
     * @return Car
     */
    public function setYear($year)
    {
        $this->year = $year;
        
        return $this;
    }

    /**
     * Get year
     *
     * @return integer
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set clock
     *
     * @param integer $clock            
     * @return Car
     */
    public function setClock($clock)
    {
        $this->clock = $clock;
        
        return $this;
    }

    /**
     * Get clock
     *
     * @return integer
     */
    public function getClock()
    {
        return $this->clock;
    }

    /**
     * Set bodytype
     *
     * @param string $bodytype            
     * @return Car
     */
    public function setBodytype($bodytype)
    {
        $this->bodytype = $bodytype;
        
        return $this;
    }

    /**
     * Get bodytype
     *
     * @return string
     */
    public function getBodytype()
    {
        return $this->bodytype;
    }

    /**
     * Set price
     *
     * @param float $price            
     * @return Car
     */
    public function setPrice($price)
    {
        $this->price = $price;
        
        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set engine
     *
     * @param string $engine            
     * @return Car
     */
    public function setEngine($engine)
    {
        $this->engine = $engine;
        
        return $this;
    }

    /**
     * Get engine
     *
     * @return string
     */
    public function getEngine()
    {
        return $this->engine;
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
}
