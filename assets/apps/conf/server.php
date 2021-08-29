<?php
session_start();
ini_set("display_errors","0");
include_once "conf.php";

$google_key = $_SESSION["GOOGLE_KEY"];

$return = null;
$return->server = $traccar_host;
$return->googlekey = $google_key;

echo json_encode($return);

?>
