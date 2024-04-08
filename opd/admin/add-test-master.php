<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    $login_username = $_SESSION['username'];
} else {
    echo "<script>location.href='../../login';</script>";
}
include ('header.php');



?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h4 class="page-title">Test Master</h4>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href=""><i class="mdi mdi-home-outline"></i></a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Test</li>
                                <li class="breadcrumb-item active" aria-current="page">Master</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <!-- Basic Forms -->
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form novalidate method="POST">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Department<span class="text-danger">*</span></h5>
                                            <select name="dept" class="form-control select2" required
                                                data-validation-required-message="This field is required">
                                                <option disabled selected>select</option>
                                                <?php
                                                $sql = "SELECT dept FROM deptmaster";
                                                $stmt = sqlsrv_query($conn, $sql);
                                                if ($stmt === false) {
                                                    die(print_r(sqlsrv_errors(), true));
                                                }
                                                while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                                    $dept = $row['dept'];
                                                    echo "<option value='$dept'>" . $dept . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Test Name<span class="text-danger">*</span></h5>
                                            <input type="text" name="servname" placeholder="" class="form-control"
                                                required data-validation-required-message="This field is required">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Modality</h5>
                                            <input type="text" name="modality" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Price<span class="text-danger">*</span></h5>
                                            <input type="text" name="servrate" placeholder="" class="form-control"
                                                required data-validation-required-message="This field is required">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>status<span class="text-danger">*</span></h5>
                                            <select name="ServFlag" class="form-control" required>
                                                <option value="Y">Active</option>
                                                <option value="N">Deactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <center>
                        <div class="text-xs-right">
                            <button type="submit" class="btn btn-info" name="save">SAVE</button>
                        </div>
                    </center>
                    </form>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.box -->
        <!-- upload CSV -->
        <section class="content">
            <!-- Basic Forms -->
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form novalidate method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <h5>Doctor (Upload CSV File)<span
                                                    class="text-danger">*</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a href="upload/DoctorFormat.csv" Download>
                                                    <i class="fa-solid fa-download"></i> Download Format</a>
                                            </h5>
                                            <input type="file" name="docName" placeholder="Upload CSV File"
                                                class="form-control" required
                                                data-validation-required-message="This field is required">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-info" name="uploadCSV">SAVE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->


<?php
if (isset($_POST['save'])) {
    $dept = $_POST['dept'];
    $servname = $_POST['servname'];
    $servrate = $_POST['servrate'];
    $modality = $_POST['modality'];
    $ServFlag = $_POST['ServFlag'];
    $date = date('Y-m-d H:i:s');

    // Check if the servname already exists
    $check_sql = "SELECT COUNT(*) AS count FROM servmaster WHERE servname = ?";
    $check_params = array($servname);
    $check_stmt = sqlsrv_query($conn, $check_sql, $check_params);
    if ($check_stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    $row = sqlsrv_fetch_array($check_stmt, SQLSRV_FETCH_ASSOC);
    $count = $row['count'];

    if ($count > 0) {
        echo '<script>
                swal("Error", "The service name already exists!", "error");
              </script>';
    } else {
        // Insert the new servname
        $sql = "INSERT INTO servmaster (dept, modality, servname, servrate, ServFlag, added_by, date) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $params = array($dept, $modality, $servname, $servrate, $ServFlag, $login_username, $date);
        
        $stmt = sqlsrv_query($conn, $sql, $params);
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        } else {
            echo '<script>
                    swal("Success!", "Service added successfully.", "success");
                    setTimeout(function(){
                        window.location.href = window.location.href;
                    }, 1000);
                  </script>';
        }
    }
}


// CSV Upload 
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["uploadCSV"])) {
//     if (isset($_FILES["docName"]) && $_FILES["docName"]["error"] == UPLOAD_ERR_OK) {
//         $csvFile = $_FILES["docName"]["tmp_name"];
//         $fileHandle = fopen($csvFile, "r");
//         fgetcsv($fileHandle);
//         $sql = "INSERT INTO docmaster (docName, sp, fee, docregno, dept, addedBy) VALUES (?, ?, ?, ?, ?, ?)";
//         $stmt = sqlsrv_prepare($conn, $sql, array(&$docName, &$sp, &$fee, &$docregno, &$dept, &$addedBy));

//         $addedBy = $login_username;
//         while (($data = fgetcsv($fileHandle, 1000, ",")) !== false) {
//             $docName = $data[0];
//             $sp = $data[1];
//             $fee = $data[2];
//             $docregno = $data[3];
//             $dept = $data[4];
//             if (!sqlsrv_execute($stmt)) {
//                 echo "Error inserting data.\n";
//                 die(print_r(sqlsrv_errors(), true));
//             }
//         }
//         fclose($fileHandle);
//         sqlsrv_close($conn);
//         echo '<script>
//                 swal("Success!", "", "success");
//             </script>';
//     } else {
//         echo '<script>
//                 swal("No file uploaded!", "", "error");
//             </script>';
//     }
// }

include ('footer.php');
?>