<?php
include("lib/nusoap.php");
$client = new soapclient("http://172.27.2.107/Minotz/webservices/index.php?wsdl");
$result    =    $client->userLogin("admin","123456");
echo "<pre>";
print_r($result);
echo "</pre>";
?>