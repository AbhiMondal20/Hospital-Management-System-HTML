<?php
$serverName = "THE_DEVELOPER\SQLEXPRESS";
$connectionOptions = [
    "Database" => "CNHMS",
    "Uid" => "",
    "PWD" => ""
];
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    // echo "Connected successfully";
}

?>
