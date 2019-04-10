<?php
$conn = mysqli_init();
mysqli_ssl_set($conn,NULL,NULL, "C:/ssl/wwwdigicertcom.crt", NULL, NULL) ;
mysqli_real_connect($conn, 'mysqldb7.mysql.database.azure.com', 'msaleh7', 'Msm@9810959', 'blogdb', 3306, MYSQLI_CLIENT_SSL);
if (mysqli_connect_errno($conn)) {
    die('Failed to connect: '.mysqli_connect_error());
}

?>