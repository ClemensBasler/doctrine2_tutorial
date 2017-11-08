<?php
// create_product.php <name>
require_once "../bootstrap.php";

$newBugName = $argv[1];

$bug = new Bug();
$bug->setName($newProductName);

$entityManager->persist($product);
$entityManager->flush();

echo "Created Product with ID " . $product->getId() . "\n";
