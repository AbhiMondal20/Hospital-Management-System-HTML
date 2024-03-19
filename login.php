<?php
session_start();
include ('db_conn.php');

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $tsql = "SELECT * FROM [dbo].[dba] WHERE dUSERNAME = ? AND dPASSWORD = ?";
    $params = array($username, $password);
    $stmt = sqlsrv_query($conn, $tsql, $params);

    if($stmt === false) {
        // Handle query execution error
        die( print_r( sqlsrv_errors(), true));
    }
    // Check if there is at least one row returned
    if(sqlsrv_has_rows($stmt)){
        // Redirect to welcome page
        header("Location: main/index");
        exit; // Stop further execution
    } else {
        echo "<script> alert('Invalid username or password') </script>";
    }

    // Free the statement resources
    sqlsrv_free_stmt($stmt);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://rhythm-admin-template.multipurposethemes.com/images/favicon.ico">
    <title>Paramount Hospitals - Log in </title>
    <!-- Vendors Style-->
    <link rel="stylesheet" href="main/css/vendors_css.css">
    <!-- Style-->
    <link rel="stylesheet" href="main/css/style.css">
    <link rel="stylesheet" href="main/css/skin_color.css">
</head>

<body class="hold-transition theme-primary bg-img" style="background-image: url(main/../images/auth-bg/bg-1.jpg)">
    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">
            <div class="col-12">
                <div class="row justify-content-center g-0">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="bg-white rounded10 shadow-lg">
                            <div class="content-top-agile p-20 pb-0">
                                <h2 class="text-primary">Let's Get Started</h2>
                                <p class="mb-0">Sign in to continue to PHPL.</p>
                            </div>
                            <div class="p-40">
                                <form method="POST" action="">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                                            <input type="text" class="form-control ps-15 bg-transparent" required=""
                                                placeholder="Username" name="username">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text  bg-transparent"><i
                                                    class="ti-lock"></i></span>
                                            <input type="password" class="form-control ps-15 bg-transparent" required=""
                                                placeholder="Password" name="password">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="checkbox">
                                                <input type="checkbox" id="basic_checkbox_1">
                                                <label for="basic_checkbox_1">Remember Me</label>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center">
                                            <input type="submit" name="login" class="btn btn-danger mt-10" value="LOG IN">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS -->
    <script src="main/js/vendors.min.js"></script>
    <script src="main/js/pages/chat-popup.js"></script>
    <script src="main/../assets/icons/feather-icons/feather.min.js"></script>

</body>

</html>

