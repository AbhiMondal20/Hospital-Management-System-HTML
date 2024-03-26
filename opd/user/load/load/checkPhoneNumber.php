<?php
include ('../../../db_conn.php');

$phoneNumber = $_GET['phoneNumber'];
$sql = "SELECT COUNT(*) as count FROM registration WHERE rrace = ?";
$stmt = sqlsrv_prepare($conn, $sql, array(&$phoneNumber));
if (sqlsrv_execute($stmt)) {
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    if ($row['count'] > 0) {
        echo "<script>
                alert('Already Registerd..');
              </script>";
    }
} else {
    echo "error";
}
?>
