



<?php


$conn = new mysqli();
$conn->init();

// below contains certificate path required in azure
$conn->ssl_set(NULL,NULL, "BaltimoreCyberTrustRoot.crt.pem", NULL, NULL); // set SSL options

$conn->real_connect('mysqldb7.mysql.database.azure.com', 'msaleh7', 'Msm@9810959', 'mysqldb7', 3306, MYSQLI_CLIENT_SSL); // actually establish connection via port 3306 using ssl

if ($conn->connect_error) {
    die ("Could not connect. ".$conn->connect_error);
}


?>



