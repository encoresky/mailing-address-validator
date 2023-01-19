<?php

require_once "db.php";

$address_type = $_REQUEST['address_type'];
$street = $_REQUEST['street'];
$street2 = $_REQUEST['street2'];
$city = $_REQUEST['city'];
$state = $_REQUEST['state'];
$zipcode = $_REQUEST['zipcode'];

$querySave = "INSERT INTO mailing_addresses (street, street2, city, state, zipcode, address_type) 
			VALUES ('" . $street . "', '" . $street2 . "', '" . $city . "', '" . $state . "', '" . $zipcode . "', '" . $address_type . "')";
$mysqli->query($querySave);
$mysqli->close();

$result = [
	"success" => true,
    "message" => "Address saved"
];
echo json_encode($result);
die;
?>