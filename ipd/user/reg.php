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
                    <h4 class="page-title">Registration</h4>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">OPD</li>
                                <li class="breadcrumb-item active" aria-current="page">Registration </li>
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
                            <form novalidate method="POST" action="">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <h5>Admission Ref. No.</h5>
                                            <div class="controls">
                                                <?php
                                                $sql = "SELECT TOP 1 refno FROM AdmitCard2324 ORDER BY id DESC";
                                                $stmt = sqlsrv_query($conn, $sql);
                                                if ($stmt === false) {
                                                    die(print_r(sqlsrv_errors(), true));
                                                } else {
                                                    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
                                                    $last_refno = $row['refno'];
                                                    if ($last_refno == '') {
                                                        $next_refno = "3923";
                                                    } else {
                                                        $next_refno = strval(intval($last_refno) + 1);
                                                    }
                                                }
                                                ?>

                                                <input type="text" name="refno" placeholder="3923" class="form-control"
                                                    required value="<?php echo $next_refno; ?>"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <h5>Reg. No. <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <?php
                                                $sql = "SELECT TOP 1 regno FROM AdmitCard2324 ORDER BY id DESC";
                                                $stmt = sqlsrv_query($conn, $sql);
                                                if ($stmt === false) {
                                                    die(print_r(sqlsrv_errors(), true));
                                                } else {
                                                    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
                                                    $last_regno = $row['regno'];
                                                    if ($last_regno == '') {
                                                        $next_regno = "237495";
                                                    } else {
                                                        $next_regno = strval(intval($last_regno) + 1);
                                                    }
                                                }
                                                ?>
                                                <input type="text" name="regno" placeholder="3923" class="form-control"
                                                    required value="<?php echo $next_regno; ?>"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5> <span class="text-danger">*</span></h5>
                                                <input type="text" name="se" class="form-control"
                                                    placeholder="2024-2025" required value="2024-2025" readonly
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <h5>Reg. Date <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" class="form-control" required name="pdate"
                                                    value="<?php echo date('Y-m-d'); ?>"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Mediclaim <span class="text-danger">*</span></h5>
                                            <select class="form-select select2" name="mediclaim">
                                                <option value="AIRPORT AUTHORITY">AIRPORT AUTHORITY</option>
                                                <option value="ECHS">ECHS</option>
                                                <option value="ECHS BANGDUBI">ECHS BANGDUBI</option>
                                                <option value="ECHS KOLKATA">ECHS KOLKATA</option>
                                                <option value="ECHS GUWAHATI">ECHS GUWAHATI</option>
                                                <option value="GENERAL">GENERAL</option>
                                                <option value="GENERAL (P)">GENERAL (P)</option>
                                                <option value="NHPC">NHPC</option>
                                            </select>
                                        </div>
                                    </div>

                                    <h3 for="">Personal Details</h3>
                                    <hr class="mb-4">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <h5>Salutation <span class="text-danger">*</span></h5>
                                            <select class="form-select select2" name="ptitle">
                                                <?php
                                                $sql = "SELECT title FROM titlemaster";
                                                $stmt = sqlsrv_query($conn, $sql);
                                                if ($stmt === false) {
                                                    die(print_r(sqlsrv_errors(), true));
                                                } else {
                                                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                                        $title = $row['title'];
                                                        echo '<option value="' . $title . '">' . $title . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>First Name <span class="text-danger">*</span></h5>
                                                <input type="text" class="form-control" required name="pname"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Middle Name</h5>
                                                <input type="text" class="form-control" name="pmname">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Last Name <span class="text-danger">*</span></h5>
                                                <input type="text" class="form-control" required name="plname"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Gender <span class="text-danger">*</span></h5>
                                            <select class="form-select" name="psex">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Age (Years) <span class="text-danger">*</span></h5>
                                                <input type="text" class="form-control" required name="page"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Nationality </h5>
                                                <select class="form-select select2" name="pnat">
                                                    <option value="India">India</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="Nepal">Nepal</option>
                                                    <option value="Bhutan">Bhutan</option>
                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Occupation </h5>
                                                <select class="form-select" name="poccu">
                                                    <option>Select</option>
                                                    <option value="Student">Student</option>
                                                    <option value="Engineer">Engineer</option>
                                                    <option value="Doctor">Doctor</option>
                                                    <option value="Teacher">Teacher</option>
                                                    <option value="Business Owner">Business Owner</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Marital Status</h5>
                                                <select class="form-select" name="pmar">
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Divorced">Divorced</option>
                                                    <option value="Widowed">Widowed</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Religion</h5>
                                                <select class="form-select" name="prel">
                                                    <option value="Hinduism">Hinduism</option>
                                                    <option value="Buddhism">Buddhism</option>
                                                    <option value="Sikhism">Sikhism</option>
                                                    <option value="Christianity">Christianity</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Judaism">Judaism</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>ID Proof</h5>
                                            <select class="form-select" name="RIDPROOF">
                                                <option>Select</option>
                                                <option value="Voter Card">Voter Id</option>
                                                <option value="Aadhar Card">Aadhar Card</option>
                                                <option value="Pan Card">Pan Card</option>
                                                <option value="Driving Licence">Driving Licence</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5 class="mt-4"><span class="text-danger"></span></h5>
                                                <input type="text" class="form-control" name="RIDNO">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>F/H/S/D/W <span class="text-danger">*</span></h5>
                                                <input type="text" class="form-control" required name="pdiag"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Address <span class="text-danger">*</span></h5>

                                                <input type="text" class="form-control" required name="padd"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>City <span class="text-danger">*</span></h5>
                                            <select class="form-select select2" id="ppo" name="ppo">
                                                <?php
                                                $sql = "SELECT Cityname FROM citymaster";
                                                $stmt = sqlsrv_query($conn, $sql);
                                                if ($stmt === false) {
                                                    die(print_r(sqlsrv_errors(), true));
                                                } else {
                                                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                                        $Cityname = $row['Cityname'];
                                                        echo '<option value="' . $Cityname . '">' . $Cityname . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>P.S. <span class="text-danger">*</span></h5>
                                                <input type="text" class="form-control" required name="pps"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>District <span class="text-danger">*</span></h5>
                                            <input type="text" name="pdist" class="form-control" required
                                                data-validation-required-message="This field is required">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>State <span class="text-danger">*</span></h5>
                                            <input type="text" name="rstate" class="form-control" required
                                                data-validation-required-message="This field is required">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Country <span class="text-danger">*</span></h5>
                                            <input type="text" name="rcountry" class="form-control" required
                                                data-validation-required-message="This field is required">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Pin. <span class="text-danger">*</span></h5>
                                                <input type="text" class="form-control" required name="RPINCODE"
                                                    maxlength="6" minlength="6"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Ph. No. <span class="text-danger">*</span></h5>
                                                <input type="text" class="form-control" required name="pphone"
                                                    id="rraceInput" maxlength="10" minlength="10"
                                                    data-validation-required-message="This field is required"
                                                    onblur="checkPhoneNumber()">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Bed Group <span class="text-danger">*</span></h5>
                                            <select class="form-select select2" name="bedno" id="bedno"
                                                onchange="getBed_no(this.value)">
                                                <?php
                                                $sql = "SELECT dept FROM bedmaster GROUP BY dept";
                                                $res = sqlsrv_query($conn, $sql);
                                                while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
                                                    $beddept = $row['dept'];
                                                    echo '<option value="' . $beddept . '">' . $beddept . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Bed <span class="text-danger">*</span></h5>
                                            <select class="form-select select2" name="doca" id="doca">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>

                                    <h3 class="mt-4">Guardian Details</h3>
                                    <hr class="mb-4">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Guardian Name <span class="text-danger">*</span></h5>
                                                <input type="text" class="form-control" required name="pgname"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Relationship <span class="text-danger">*</span></h5>
                                            <select class="form-select" name="pgrel">
                                                <option value="Father">Father</option>
                                                <option value="Mother">Mother</option>
                                                <option value="Father in Law">Father in Law</option>
                                                <option value="Mother in Law">Mother in Law</option>
                                                <option value="Brother">Brother</option>
                                                <option value="Daughter">Daughter</option>
                                                <option value="Friend">Friend</option>
                                                <option value="Aunty">Aunty</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Address <span class="text-danger">*</span></h5>

                                                <input type="text" class="form-control" required name="pgadd"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>City <span class="text-danger">*</span></h5>
                                            <select class="form-select select2" id="ppo" name="pgpo">
                                                <?php
                                                $sql = "SELECT Cityname FROM citymaster";
                                                $stmt = sqlsrv_query($conn, $sql);
                                                if ($stmt === false) {
                                                    die(print_r(sqlsrv_errors(), true));
                                                } else {
                                                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                                        $Cityname = $row['Cityname'];
                                                        echo '<option value="' . $Cityname . '">' . $Cityname . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>P.S. <span class="text-danger">*</span></h5>
                                                <input type="text" class="form-control" required name="pgps"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>District <span class="text-danger">*</span></h5>
                                            <input type="text" name="pgdist" class="form-control" required
                                                data-validation-required-message="This field is required">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Ph. No. <span class="text-danger">*</span></h5>
                                                <input type="text" class="form-control" required name="pgphone"
                                                    id="rraceInput2" maxlength="10" minlength="10"
                                                    data-validation-required-message="This field is required"
                                                    onblur="checkPhoneNumber()">
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Patient Adm Status</h5>
                                            <select class="form-select" name="AdmStatus">
                                                <option value="OT">OT</option>
                                                <option value="RTA">RTA</option>
                                                <option value="Work In">Work In</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Cons Doctor </h5>
                                            <select class="form-select select2" name="pcons"
                                                onchange="getDocname(this.value)">
                                                <option selected disabled>Select Doctor</option>
                                                <?php
                                                $sql = "SELECT docName FROM docmaster";
                                                $stmt = sqlsrv_query($conn, $sql);
                                                if ($stmt === false) {
                                                    die(print_r(sqlsrv_errors(), true));
                                                } else {
                                                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                                        $docName = $row['docName'];
                                                        $fee = $row['fee'];
                                                        echo '<option value="' . $docName . '">' . $docName . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Cons Doctor</h5>
                                            <select class="form-select select2" name="pcons1"
                                                onchange="getDocname(this.value)">
                                                <option selected disabled>Select Doctor</option>
                                                <?php
                                                $sql = "SELECT docName FROM docmaster";
                                                $stmt = sqlsrv_query($conn, $sql);
                                                if ($stmt === false) {
                                                    die(print_r(sqlsrv_errors(), true));
                                                } else {
                                                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                                        $docName = $row['docName'];
                                                        $fee = $row['fee'];
                                                        echo '<option value="' . $docName . '">' . $docName . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Cons Doctor</h5>
                                            <select class="form-select select2" name="pcons2"
                                                onchange="getDocname(this.value)">
                                                <option selected disabled>Select Doctor</option>
                                                <?php
                                                $sql = "SELECT docName FROM docmaster";
                                                $stmt = sqlsrv_query($conn, $sql);
                                                if ($stmt === false) {
                                                    die(print_r(sqlsrv_errors(), true));
                                                } else {
                                                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                                        $docName = $row['docName'];
                                                        $fee = $row['fee'];
                                                        echo '<option value="' . $docName . '">' . $docName . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Cons Doctor</h5>
                                            <select class="form-select select2" name="pcons3"
                                                onchange="getDocname(this.value)">
                                                <option selected disabled>Select Doctor</option>
                                                <?php
                                                $sql = "SELECT docName FROM docmaster";
                                                $stmt = sqlsrv_query($conn, $sql);
                                                if ($stmt === false) {
                                                    die(print_r(sqlsrv_errors(), true));
                                                } else {
                                                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                                        $docName = $row['docName'];
                                                        $fee = $row['fee'];
                                                        echo '<option value="' . $docName . '">' . $docName . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Cons Doctor</h5>
                                            <select class="form-select select2" name="pcons4"
                                                onchange="getDocname(this.value)">
                                                <option selected disabled>Select Doctor</option>
                                                <?php
                                                $sql = "SELECT docName FROM docmaster";
                                                $stmt = sqlsrv_query($conn, $sql);
                                                if ($stmt === false) {
                                                    die(print_r(sqlsrv_errors(), true));
                                                } else {
                                                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                                        $docName = $row['docName'];
                                                        $fee = $row['fee'];
                                                        echo '<option value="' . $docName . '">' . $docName . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Ref. Doctor <span class="text-danger">*</span></h5>
                                            <select class="form-select select2" name="prefs">
                                                <option selected disabled>Select Doctor</option>
                                                <?php
                                                $sql = "SELECT docName FROM docmaster";
                                                $stmt = sqlsrv_query($conn, $sql);
                                                if ($stmt === false) {
                                                    die(print_r(sqlsrv_errors(), true));
                                                } else {
                                                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                                        $docName = $row['docName'];
                                                        $fee = $row['fee'];
                                                        echo '<option value="' . $docName . '">' . $docName . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Acct Head</h5>
                                            <select class="form-select select2" name="accthead">
                                                <option selected disabled>Select</option>
                                                <?php
                                                $sql = "SELECT dept FROM AcctHeadMAster";
                                                $res = sqlsrv_query($conn, $sql);
                                                while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
                                                    $dept = $row['dept'];
                                                    echo '<option value=' . $dept . '>' . $dept . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control" name="uname"
                                        value="<?php echo $login_username; ?>">
                                </div>
                        </div>
                        <center>
                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-info" name="save">SAVE</button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target=".bs-example-modal-lg">List of Register Patient</button>
                            </div>
                        </center>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    </section>
</div>
</div>

<?php
if (isset($_POST['save'])) {
    $refno = $_POST['refno'];
    $regno = $_POST['regno'];
    $doca = $_POST['doca'];
    $bedno = $_POST['bedno'];
    $mediclaim = $_POST['mediclaim'];
    $se = $_POST['se'];
    $pdate = $_POST['pdate'];
    $pdiag = $_POST['pdiag'];
    $ptitle = $_POST['ptitle'];
    $pname = $_POST['pname'];
    $pmname = $_POST['pmname'];
    $plname = $_POST['plname'];
    $psex = $_POST['psex'];
    $page = $_POST['page'];
    $ptime = date('H:i:s A');
    $padd = $_POST['padd'];
    $ppo = $_POST['ppo'];
    $pps = $_POST['pps'];
    $pdist = $_POST['pdist'];
    $rstate = $_POST['rstate'];
    $rcountry = $_POST['rcountry'];
    $RPINCODE = $_POST['RPINCODE'];
    $pphone = $_POST['pphone'];
    $pgname = $_POST['pgname'];
    $pgrel = $_POST['pgrel'];
    $pgadd = $_POST['pgadd'];
    $pgpo = $_POST['pgpo'];
    $pgps = $_POST['pgps'];
    $pgdist = $_POST['pgdist'];
    $pgphone = $_POST['pgphone'];
    $AdmStatus = $_POST['AdmStatus'];
    $pcons = $_POST['pcons'];
    $pcons1 = $_POST['pcons1'];
    $pcons2 = $_POST['pcons2'];
    $pcons3 = $_POST['pcons3'];
    $pcons4 = $_POST['pcons4'];
    $prefs = $_POST['prefs'];
    $prel = $_POST['prel'];
    $poccu = $_POST['poccu'];
    $pnat = $_POST['pnat'];
    $pmar = $_POST['pmar'];
    $RIDPROOF = $_POST['RIDPROOF'];
    $RIDNO = $_POST['RIDNO'];
    $accthead = $_POST['accthead'];
    $uname = $_POST['uname'];

    $sql = "INSERT INTO AdmitCard2324 (refno, regno, doca, bedno, mediclaim, se, pdate, ptitle, pname, pmname, plname, psex, page, ptime, padd, ppo, pps, pdist, rstate, rcountry, RPINCODE, pphone, pgname, pgrel, pgadd, pgpo, pgps, pgdist, pgphone, AdmStatus, pcons, pcons1, pcons2, pcons3, pcons4, prefs, prel, pdiag, poccu, pnat, pmar, RIDPROOF, RIDNO, accthead, uname)
    VALUES ('$refno', '$regno', '$doca', '$bedno', '$mediclaim', '$se', '$pdate', '$ptitle', '$pname', '$pmname', '$plname', '$psex', '$page', '$ptime', '$padd', '$ppo', '$pps', '$pdist', '$rstate', '$rcountry', '$RPINCODE', '$pphone', '$pgname', '$pgrel', '$pgadd', '$pgpo', '$pgps', '$pgdist', '$pgphone', '$AdmStatus', '$pcons', '$pcons1', '$pcons2', '$pcons3', '$pcons4', '$prefs', '$prel',  '$pdiag', '$poccu', '$pnat', '$pmar', '$RIDPROOF', '$RIDNO', '$accthead', '$uname')";

    $stmt = sqlsrv_query($conn, $sql);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo '<script>
                swal("Success!", "", "success");
                setTimeout(function(){
                    window.location.href = window.location.href;
                }, 1000);
            </script>';
    }
}

?>

<!-- List of register patient modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">List of Register Patient</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="example5" class="table nowrap margin-top-10 w-p100">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Reg. No.</th>
                                <th>Reg. Date Time.</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <!-- <th>F/H/S/D/W</th> -->
                                <th>Ph. No</th>
                                <th>City</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT TOP 900 id, rno, rdate, rtime, rfname, CONCAT(rfname, ' ', COALESCE(rmname, ''), ' ', rlname) AS fullname, rsex, rage, fname, rrace, radd1, rcity, rdist, wamt, uname
                                    FROM registration 
                                    ORDER BY id DESC";
                            $stmt = sqlsrv_query($conn, $sql);
                            if ($stmt === false) {
                                die(print_r(sqlsrv_errors(), true));
                            }
                            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                $rno = $row['rno'];
                                $id = $row['id'];
                                $rfname = $row['rfname'];
                                ?>
                                <tr>
                                    <td>
                                        <a href="?id=<?php echo $id; ?>&rno=<?php echo $rno; ?>"
                                            class="btn btn-sm btn-primary"><i class="fa-solid fa-file-invoice"></i></a>
                                    </td>
                                    <td>
                                        <?php echo $rno; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['rdate']->format('Y-m-d'); ?>
                                    </td>
                                    <td>
                                        <?php echo $row['fullname']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['rsex']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['rage']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['rrace']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['rcity']; ?>
                                    </td>

                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- /.content-wrapper -->
<script>
    function getDocname(docName) {
        $.ajax({
            url: "load/doc_fetch_price.php",
            type: "POST",
            data: { docName: docName },
            dataType: "json",
            success: function (data) {
                $("#wamt").val(data.fee);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }


    // Mobile number check
    function checkPhoneNumber() {
        var phoneNumber = document.getElementById('rraceInput').value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText === "exists") {
                    swal({
                        title: 'Phone number already registered!',
                        text: 'Please enter a different phone number.',
                        icon: 'warning',
                        button: 'OK',
                    });
                    document.getElementById('rraceInput').value = '';
                }
            }
        };
        xhttp.open("GET", "load/checkPhoneNumber.php?phoneNumber=" + phoneNumber, true);
        xhttp.send();
    }
</script>
<!-- City Dist Dependency Dropdown -->
<script>
    function populateDistricts() {
        console.log("Fetching districts..."); // Log message to check if the function is called
        var city = document.getElementById("rcity").value;
        var districtDropdown = document.getElementById("rdist");
        // Clear previous options
        districtDropdown.innerHTML = "";

        // Send AJAX request to fetch districts
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "load/get_districts.php?city=" + city, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                console.log("Received response"); // Log message to check if the response is received
                if (xhr.status == 200) {
                    var districts = JSON.parse(xhr.responseText);
                    // Populate district options
                    for (var i = 0; i < districts.length; i++) {
                        var option = document.createElement("option");
                        option.text = districts[i];
                        option.value = districts[i];
                        districtDropdown.add(option);
                    }
                } else {
                    console.log("Error: " + xhr.status); // Log message if there's an error in the response
                }
            }
        };
        xhr.send();
    }


    // Populate district dropdown initially
    populateDistricts();

    // Add change event listener to city dropdown
    document.getElementById("rcity").addEventListener("change", function () {
        populateDistricts();
    });

    // get bed no
    function getBed_no(bedno) {
        $.ajax({
            url: "load/bedno.php",
            type: "POST",
            data: { bedno: bedno },
            dataType: "json",
            success: function (data) {
                var bednoDropdown = $("#doca");
                bednoDropdown.empty().append('<option value="">--Select Bed --</option>');
                data.forEach(function (bedOption) {
                    bednoDropdown.append('<option value="' + bedOption + '">' + bedOption + '</option>');
                });
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
</script>

<?php
include ('footer.php');
?>