<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$name = $_POST['name'];
$email = $_POST['email'];
$workshop = $_POST['workshop'];

$xml = new DOMDocument();
$xml->load("trainees.xml");

$root = $xml->getElementsByTagName("trainees")->item(0);

$trainee = $xml->createElement("trainee");
$trainee->appendChild($xml->createElement("name", $name));
$trainee->appendChild($xml->createElement("email", $email));
$trainee->appendChild($xml->createElement("workshop", $workshop));

$root->appendChild($trainee);
$xml->save("trainees.xml");
?>


