<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    $login_username = $_SESSION['username'];
} else {
    echo "<script>location.href='../../login';</script>";
}
include ('header.php');

$srno = $_GET['srno'];
$sql = "SELECT srno, dept, modality, servname, servrate, ServFlag FROM servmaster WHERE srno = '$srno'";
$stmt = sqlsrv_query($conn, $sql);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $srno = $row['srno'];
    $servname = $row['servname'];
    $servrate = number_format($row['servrate'], 2);
    $dept = $row['dept'];
    $modality = $row['modality'];
    $ServFlag = $row['ServFlag'];
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h4 class="page-title">Update Test Master</h4>
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
                                            <select name="dept" class="form-control select2" required data-validation-required-message="This field is required">
                                            <option disabled>select</option>
                                            <?php
                                            $sql = "SELECT dept FROM deptmaster";
                                            $stmt = sqlsrv_query($conn, $sql);
                                            if ($stmt === false) {
                                                die(print_r(sqlsrv_errors(), true));
                                            }
                                            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                                $deptOption = $row['dept'];
                                                $isSelected = ($deptOption == $dept) ? 'selected' : '';
                                                echo "<option value='$deptOption' $isSelected>" . $deptOption . "</option>";
                                            }
                                            ?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Test Name<span class="text-danger">*</span></h5>
                                            <input type="text" name="servname" placeholder="" class="form-control"
                                                required value="<?php echo $servname; ?>"
                                                data-validation-required-message="This field is required">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Modality</h5>
                                            <input type="text" name="modality" value="<?php echo $modality ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Price<span class="text-danger">*</span></h5>
                                            <input type="text" name="servrate" placeholder="" class="form-control"
                                                required value="<?php echo $servrate; ?>"
                                                data-validation-required-message="This field is required">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>status<span class="text-danger">*</span></h5>
                                            <select name="ServFlag" class="form-control" required
                                                value="<?php echo $ServFlag; ?>">
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
                            <button type="submit" class="btn btn-info" name="save">UPDATE</button>
                        </div>
                    </center>
                    </form>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </div>
    <!-- /.box-body -->
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
    $modality = $_POST['modality'];
    $servname = $_POST['servname'];
    $servrate = $_POST['servrate'];
    $ServFlag = $_POST['ServFlag'];
    $modify_date = date('Y-m-d H:i:s');
    $sql = "UPDATE servmaster SET dept = '$dept', modality = '$modality', servname = '$servname', servrate = '$servrate', ServFlag = '$ServFlag', modify_by = '$login_username',  modify_date = '$modify_date'  WHERE srno = '$srno'";

    $stmt = sqlsrv_query($conn, $sql);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo '<script>
                swal("Success!", "", "success");
                setTimeout(function(){
                    window.location.href = "test-master";
                }, 1000);
            </script>';
    }
}



include ('footer.php');

?>