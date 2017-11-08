<?php
// src/User.php
/**
 * @Entity @Table(name="users")
 **/
use Doctrine\Common\Collections\ArrayCollection;
class User
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     **/
    protected $id;

    /**
     * @Column(type="string")
     * @var string
     **/
    protected $name;

    /**
     * @OneToMany(targetEntity="Bug", mappedBy="reporter")
     * @var Bug[] An ArrayCollection of Bug objects.
     **/
    protected $reportedBugs = null;

    /**
     * @OneToMany(targetEntity="Bug", mappedBy="engineer")
     * @var Bug[] An ArrayCollection of Bug objects.
     **/
    protected $assignedBugs = null;

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

  public function __construct()
  {
    $this->reportedBugs = new ArrayCollection();
    $this->assignedBugs = new ArrayCollection();
  }

  // protected $reportedBugs;
  // protected $assignedBugs;

  public function addReportedBug(Bug $bug)
  {
    $this->reportedBugs[] = $bug;
  }

  public function assignedToBug(Bug $bug)
  {
    $this->assignedBugs[] = $bug;
  }
}
