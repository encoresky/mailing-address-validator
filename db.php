<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// USPS Config
define("USPS_BASE_URL", "https://us-street.api.smartystreets.com/");
define("USPS_API", "street-address");
define("USPS_AUTH_ID", "ed764521-d73f-41dd-e8a6-ff74159fbc2e3434443");
define("USPS_AUTH_TOKEN", "bZoXjPoBFY2FOlA8ChIt333333");
define("USPS_LICENSE", "us-core-cloud-ddd");
define("USPS_CANDIDATES", "10");
define("USPS_MATCH", "enhanced");

// DB Config
define("DB_HOST", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "mailing_db");

$servername = DB_HOST;
$username = DB_USERNAME;
$password = DB_PASSWORD;
$dbname = DB_NAME;

$mysqli = new mysqli($servername, $username, $password, $dbname);
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}
?>