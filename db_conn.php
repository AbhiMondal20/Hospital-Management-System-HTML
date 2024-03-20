<?php
$serverName = "SERVER";
$connectionOptions = [
    "Database" => "CNHMS",
    "Uid" => "sa",
    "PWD" => "phadmin@123"
];
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    // echo "Connected successfully";
}

?>
