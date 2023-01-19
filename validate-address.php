<?php

require_once "db.php";

$street = $_REQUEST['street'];
$street2 = $_REQUEST['street2'];
$city = $_REQUEST['city'];
$state = $_REQUEST['state'];
$zipcode = $_REQUEST['zipcode'];

$url = "https://us-street.api.smartystreets.com/street-address?auth-id=ed764521-d73f-41dd-e8a6-ff74159fbc2e&auth-token=bZoXjPoBFY2FOlA8ChIt&license=us-core-cloud";

$query_string = "&candidates=10&match=enhanced&street=" . $street . "&street2=" . $street2 . "&city=" . $city . "&state=" . $state . "&zipcode=" . $zipcode;

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://us-street.api.smartystreets.com/street-address?auth-id=ed764521-d73f-41dd-e8a6-ff74159fbc2e&auth-token=bZoXjPoBFY2FOlA8ChIt&license=us-core-cloud&candidates=10&match=enhanced&street=222%20W%20Merchandise%20Mart%20plaza&street2=suite%201212&city=Chicago&state=IL&zipcode=60654',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'content-type: application/json'
  ),
));

$response = curl_exec($curl);
if (curl_errno($curl)) {
    $error_msg = curl_error($curl);
    $result = [
        "success" => false,
        "message" => "Server error"
    ];
    echo json_encode($result);
    die;
}
curl_close($curl);
$result = [
    "success" => true,
    "message" => "Success",
    "data" => json_decode($response)
];
echo json_encode($result);
die;
?>