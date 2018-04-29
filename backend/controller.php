<?php
include "Webhook.php";
HelperFunctions::log("request");
Webhook::doGet($_GET);
Webhook::doPost($_POST);
?>