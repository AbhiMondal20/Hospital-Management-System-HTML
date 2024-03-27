<?php
include('../../../db_conn.php');

if (isset($_POST['bedno'])) {
    $bedno = $_POST['bedno'];

    $sql = "SELECT BedDesc FROM bedmaster WHERE dept = ?";
    $params = array($bedno);
    $res = sqlsrv_query($conn, $sql, $params);
    if ($res === false) {
        die(json_encode(array('error' => sqlsrv_errors())));
    }
    $bedOptions = array();
    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
        $bedOptions[] = $row['BedDesc'];
    }
    echo json_encode($bedOptions);
    exit;
}