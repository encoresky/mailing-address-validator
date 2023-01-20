<?php

require_once "db.php";

$street = $_REQUEST['street'];
$street2 = $_REQUEST['street2'];
$city = $_REQUEST['city'];
$state = $_REQUEST['state'];
$zipcode = $_REQUEST['zipcode'];

$url = USPS_BASE_URL . "" . USPS_API . "?auth-id=" . USPS_AUTH_ID . "&auth-token=" . USPS_AUTH_TOKEN . "&license=" . USPS_LICENSE . "&candidates=" . USPS_CANDIDATES . "&match=" . USPS_MATCH;

$query_string = "&street=" . urlencode($street) . "&street2=" . urlencode($street2) . "&city=" . urlencode($city) . "&state=" . urlencode($state) . "&zipcode=" . urlencode($zipcode);

$apiurl = $url . "" . $query_string;

$curl = curl_init();
curl_setopt_array($curl, array(
    // CURLOPT_URL => $urls,
    CURLOPT_URL => $apiurl,
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