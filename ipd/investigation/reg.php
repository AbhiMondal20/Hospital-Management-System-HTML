<?php
session_start();
if (isset ($_SESSION['login']) && $_SESSION['login'] == true) {
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
                                            <h5>OPD / IPD <span class="text-danger">*</span></h5>
                                            <select class="form-select" name="rstatus">
                                                <option value="OPD">OPD</option>
                                                <option value="IPD">IPD</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Reg. No. <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <?php
                                                $sql = "SELECT TOP 1 rno FROM registration ORDER BY id DESC";
                                                $stmt = sqlsrv_query($conn, $sql);
                                                if ($stmt === false) {
                                                    die (print_r(sqlsrv_errors(), true));
                                                } else {
                                                    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
                                                    $last_rno = $row['rno'];
                                                    if ($last_rno == '') {
                                                        $next_rno = "237495";
                                                    } else {
                                                        $next_rno = strval(intval($last_rno) + 1);
                                                    }
                                                }
                                                ?>

                                                <input type="text" name="rno" placeholder="237495" class="form-control"
                                                    required value="<?php echo $next_rno; ?>" readonly
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5> <span class="text-danger">*</span></h5>
                                                <input type="text" name="se" class="form-control"
                                                    placeholder="2024-2025" required value="2024-2025" readonly
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Reg. Date <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" class="form-control" required name="rdate" value="<?php echo date('Y-m-d'); ?>" data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Salutation <span class="text-danger">*</span></h5>
                                            <select class="form-select select2" name="rtitle">
                                                <?php
                                                $sql = "SELECT title FROM titlemaster";
                                                $stmt = sqlsrv_query($conn, $sql);
                                                if ($stmt === false) {
                                                    die (print_r(sqlsrv_errors(), true));
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
                                                <input type="text" class="form-control" required name="rfname"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Middle Name</h5>
                                                <input type="text" class="form-control" name="rmname">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Last Name <span class="text-danger">*</span></h5>
                                                <input type="text" class="form-control" required name="rlname"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Gender <span class="text-danger">*</span></h5>
                                            <select class="form-select" name="rsex">
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
                                                <input type="text" class="form-control" required name="rage"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Month </h5>
                                                <input type="text" class="form-control" name="month">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Days </h5>
                                                <input type="text" class="form-control" name="days">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>F/H/S/D/W <span class="text-danger">*</span></h5>

                                                <input type="text" class="form-control" required name="fname"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Address <span class="text-danger">*</span></h5>
                                                <input type="text" class="form-control" required name="radd1"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Address <span class="text-danger">*</span></h5>
                                                <input type="text" class="form-control" required name="radd2"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>City <span class="text-danger">*</span></h5>
                                            <select class="form-select select2" id="rcity" name="rcity">
                                                <?php
                                                $sql = "SELECT Cityname FROM citymaster";
                                                $stmt = sqlsrv_query($conn, $sql);
                                                if ($stmt === false) {
                                                    die (print_r(sqlsrv_errors(), true));
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
                                            <h5>District <span class="text-danger">*</span></h5>
                                            <input type="text" name="rdist" class="form-control" required
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Ph. No. <span class="text-danger">*</span></h5>
                                                <input type="text" class="form-control" required name="rrace" id="rraceInput" maxlength="10" minlength="10" data-validation-required-message="This field is required" onblur="checkPhoneNumber()">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Ref. Doctor <span class="text-danger">*</span></h5>
                                            <select class="form-select select2" name="rdoc"
                                                onchange="getDocname(this.value)">
                                                <option selected disabled>Select Doctor</option>
                                                <?php
                                                $sql = "SELECT docName FROM docmaster";
                                                $stmt = sqlsrv_query($conn, $sql);
                                                if ($stmt === false) {
                                                    die (print_r(sqlsrv_errors(), true));
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
                                            <div class="controls">
                                                <h5>Fee</h5>
                                                <input type="text" class="form-control" name="wamt" id="wamt">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control" name="uname"
                                        value="<?php echo $login_username; ?>">
                                </div>
                        </div>
                        <center>
                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-info" name="save">SAVE</button>
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
</script>

<?php
if (isset ($_POST['save'])) {
    $rno = $_POST['rno'];
    $se = $_POST['se'];
    $rdate = $_POST['rdate'];
    $rtime = date('H:i:s A');
    $rstatus = $_POST['rstatus'];
    $rtitle = $_POST['rtitle'];
    $rfname = $_POST['rfname'];
    $rmname = $_POST['rmname'];
    $rlname = $_POST['rlname'];
    $rsex = $_POST['rsex'];
    $rage = $_POST['rage'];
    $month = $_POST['month'];
    $days = $_POST['days'];
    $fname = $_POST['fname'];
    $radd1 = $_POST['radd1'];
    $radd2 = $_POST['radd2'];
    $rcity = $_POST['rcity'];
    $rdist = $_POST['rdist'];
    $rstate = $_POST['rstate'];
    $rcity = $_POST['rcity'];
    $rrace = $_POST['rrace'];
    $rdoc = $_POST['rdoc'];
    $wamt = $_POST['wamt'];
    $rcountry = $_POST['rcountry'];
    $uname = $_POST['uname'];

    $sql = "INSERT INTO registration (id, rno, se, rdate, rtime, rstatus, rtitle, rfname, rmname, uname, rlname, rsex, rage, fname, radd1, radd2, rcity, rdist, rstate, rrace, rdoc, wamt, rcountry) 
    VALUES ('$rno','$rno', '$se', '$rdate', '$rtime', '$rstatus' ,'$rtitle', '$rfname', '$rmname', '$uname', '$rlname', '$rsex', '$rage', '$fname', '$radd1', '$radd2', '$rcity', '$rdist', '$rstate', '$rrace', '$rdoc', '$wamt', '$rcountry')";

    $stmt = sqlsrv_query($conn, $sql);
    if ($stmt === false) {
        die (print_r(sqlsrv_errors(), true));
    } else {
        echo '<script>
                swal("Success!", "", "success");
                setTimeout(function(){
                    window.location.href = window.location.href;
                }, 1000);
            </script>';
    }
}



include ('footer.php');

?>