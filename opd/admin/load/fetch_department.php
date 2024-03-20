<?php
include('../../../db_conn.php');

// if (isset($_POST['service'])) {
    // Sanitize the input
    $selectedService = $_POST['service'];

    // Prepare and execute the SQL query
    $sql = "SELECT dept FROM servmaster WHERE servname = ?";
    $params = array($selectedService);
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Check if the query was successful
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Fetch the department from the result set
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    $department = $row['dept'];

    // Return the department as JSON
    echo json_encode(array('department' => $department));

    // Clean up
    sqlsrv_free_stmt($stmt);
// }
sqlsrv_close($conn);
?>
