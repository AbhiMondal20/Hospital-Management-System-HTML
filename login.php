<?php
session_start();
include ('db_conn.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="opd/images/favicon.ico">
    <title>Rhythm Healthcare - Log in </title>
    <!-- Vendors Style-->
    <link rel="stylesheet" href="opd/admin/css/vendors_css.css">
    <!-- Style-->
    <link rel="stylesheet" href="opd/admin/css/style.css">
    <link rel="stylesheet" href="opd/admin/css/skin_color.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body class="hold-transition theme-primary bg-img" style="background-image: url(opd/images/auth-bg/bg-1.jpg)">
    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">
            <div class="col-12">
                <div class="row justify-content-center g-0">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="bg-white rounded10 shadow-lg">
                            <div class="content-top-agile p-20 pb-0">
                                <h2 class="text-primary">Let's Get Started</h2>
                                <p class="mb-0">Sign in to continue to Rhythm Healthcare.</p>
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
                                        <div class="col-12 text-center">
                                            <input type="submit" name="login" class="btn btn-danger mt-10"
                                                value="LOG IN">
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
    <script src="opd/admin/js/vendors.min.js"></script>
    <script src="opd/admin/js/pages/chat-popup.js"></script>
    <script src="opd/admin/assets/icons/feather-icons/feather.min.js"></script>

</body>

</html>

<?php
if (isset ($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $tsql = "SELECT dUSERNAME, dPASSWORD FROM [dbo].[dba] WHERE dUSERNAME = ? AND dPASSWORD = ?";
    $params = array($username, $password);
    $stmt = sqlsrv_query($conn, $tsql, $params);
    if ($stmt === false) {
        die (print_r(sqlsrv_errors(), true));
    }
    if (sqlsrv_has_rows($stmt)) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
        header("Location: opd/admin/");
        exit;
    } else {

        echo '<script>
                swal("Invalid username or password!", "", "error");
            </script>';
    }
    sqlsrv_free_stmt($stmt);
}
?>