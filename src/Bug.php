<?php
// src/Bug.php
/**
 * @Entity @Table(name="bugs")
 **/
use Doctrine\Common\Collections\ArrayCollection;
class Bug
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     **/
    protected $id;
    /**
     * @Column(type="string")
     **/
    protected $description;
    /**
     * @Column(type="datetime")
     **/
    protected $created;
    /**
     * @Column(type="string")
     **/
    protected $status;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="assignedBugs")
     **/
    protected $engineer;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="reportedBugs")
     **/
    protected $reporter;

    /**
     * @ManyToMany(targetEntity="Product")
     **/
    protected $products;

    public function close()
    {
      $this->status = "CLOSE";
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setCreated(DateTime $created)
    {
        $this->created = $created;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    // protected $products;

    public function __construct()
    {
      $this->products = new ArrayCollection();
    }

    public function setEngineer(User $engineer)
    {
      $engineer->assignedToBug($this);
      $this->engineer = $engineer;
    }

    public function setReporter(User $reporter)
    {
      $reporter->addReportedBug($this);
      $this->reporter = $reporter;
    }

    public function getEngineer()
    {
      return $this->engineer;
    }

    public function getReporter()
    {
      return $this->reporter;
    }

    // protected $products = null;

    public function assignToProduct(Product $product)
    {
    $this->products[] = $product;
  }

    public function getProducts()
    {
      return $this->products;
    }


}
