<?php
include('../../../db_conn.php');
if (isset($_POST['service'])) {
    // Sanitize the input
    $selectedService = $_POST['service'];

    // Prepare and execute the SQL query
    $sql = "SELECT servrate FROM servmaster WHERE servname = ?";
    $params = array($selectedService);
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Check if the query was successful
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Fetch the price from the result set
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    $price = $row['servrate'];

    // Return the price as JSON
    echo json_encode(array('price' => $price));

    // Clean up
    sqlsrv_free_stmt($stmt);
}

// Close the database connection if needed
sqlsrv_close($conn);
?>
