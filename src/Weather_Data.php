<?php
// src/User.php
/**
 * @Entity @Table(name="Weather_Data")
 */
class Weather_Data
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     */
    protected $id;
    /**
     * @Column(type="integer")
     * @var string
     */
    protected $Sonic;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}
