<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\SchemaTool;

require_once __DIR__."/../vendor/autoload.php";

Class DatabaseHandler{

  function __construct() {
    // Create a simple "default" Doctrine ORM configuration for Annotations
    $isDevMode = true;
    $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/../src"), $isDevMode);

    $conn = array(
      'driver' => 'pdo_mysql',
      'host' => 'localhost',
      'port' => '3306',
      'dbname' => 'test',
      'user' => 'root',
      'password' => '',
    );

    // obtaining the entity manager
    $entityManager = EntityManager::create($conn, $config_db);
    $schemaTool = new \Doctrine\ORM\Tools\SchemaTool($entityManager);
    $this->setSchematool($schemaTool);
    $this->setEntityManager($entityManager);
  }

  private function createClassMetadata()
  {
    $classes = array(
      $this->getEntityManager()->getClassMetadata($this->getClassName()),
    );

    return $classes;
  }

  public function dropSchema()
  {
    $classes = $this->createClassMetadata($this->getClassName());

    $this->getSchematool()->dropSchema($classes);

    // var_dump($this->getSchematool()->dropSchema());

      echo "Dropped Schema for Table " . $this->getClassName();
  }

  public function createSchema()
  {
    $classes = $this->createClassMetadata($this->getClassName());

    $this->getSchematool()->createSchema($classes);
  }

  public function createSchemaOverwrite()
  {
    $this->dropSchema($this->getClassName());
    echo "\n";
    $this->createSchema($this->getClassName());
  }

  public function updateSchema()
  {
    $classes = $this->createClassMetadata($this->getClassName());
    $this->getSchematool()->updateSchema($classes);
  }

  public function getSchematool()
  {
        return $this->schematool;
  }

  public function setSchematool($value)
  {
        $this->schematool = $value;
  }

  public function getEntityManager()
  {
        return $this->entityManager;
  }

  public function setEntityManager($value)
  {
        $this->entityManager = $value;
  }

}
