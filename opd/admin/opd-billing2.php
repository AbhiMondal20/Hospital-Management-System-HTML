<?php
include ('header.php');

$rno = "";
$id = "";
if (isset ($_GET['id']) && isset ($_GET['rno'])) {
    $id = $_GET['id'];
    $rno = $_GET['rno'];
}
$rdate = "";
$rtitle = "";
$rtime = "";
$se = "";
$rfname = "";
$rmname = "";
$rlname = "";
$rstatus = "";
$fname = "";
$rsex = "";
$rage = "";
$fname = "";
$rrace = "";
$radd1 = "";
$radd2 = "";
$rcity = "";
$rdoc = "";
$rdist = "";
$rstate = "";
$rcountry = "";
$wamt = "";
$sql = "SELECT id, rno, rdate, rtime, rstatus,rtitle, se, rdoc, rfname, rmname, rlname, fname, rsex, rage, fname, rrace, radd1, radd2, rcity, rdist, rstate, rcountry, wamt
FROM registration WHERE rno = '$rno' AND id = '$id'";
$stmt = sqlsrv_query($conn, $sql);
if ($stmt === false) {
    die (print_r(sqlsrv_errors(), true));
}
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $rstatus = $row['rstatus'];
    $rno = $row['rno'];
    $rdate = $row['rdate']->format('Y-m-d');
    $rtitle = $row['rtitle'];
    $rtime = $row['rtime'];
    $se = $row['se'];
    $rfname = $row['rfname'];
    $rmname = $row['rmname'];
    $rlname = $row['rlname'];
    $fname = $row['fname'];
    $rsex = $row['rsex'];
    $rage = $row['rage'];
    $fname = $row['fname'];
    $rrace = $row['rrace'];
    $radd1 = $row['radd1'];
    $radd2 = $row['radd2'];
    $rcity = $row['rcity'];
    $rdoc = $row['rdoc'];
    $rdist = $row['rdist'];
    $rstate = $row['rstate'];
    $rcountry = $row['rcountry'];
    $wamt = $row['wamt'];
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h4 class="page-title">OPD Billing</h4>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="reg-list"><i class="mdi mdi-home-outline"></i></a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">OPD</li>
                                <li class="breadcrumb-item active" aria-current="page">Billing</li>
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
                        <div class="col-lg-12">
                            <form novalidate method="POST" action="">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <h5>OPD / IPD <span class="text-danger">*</span></h5>
                                            <select class="form-select" name="rstatus[]">
                                                <option value="OPD" <?php if ($rstatus == 'OPD')
                                                    echo ' selected'; ?>>OPD
                                                </option>
                                                <option value="IPD" <?php if ($rstatus == 'IPD')
                                                    echo ' selected'; ?>>IPD
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Reg. No. <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="rno[]" placeholder="Reg. No"
                                                    class="form-control" required value="<?php echo $rno; ?>" readonly
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5> <span class="text-danger">*</span></h5>
                                                <input type="text" name="se[]" class="form-control"
                                                    placeholder="Session" required value="<?php echo $se; ?>" readonly
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Reg. Date <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" value="<?php echo $rdate; ?>" class="form-control"
                                                    required name="serdate[]"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Salutation <span class="text-danger">*</span></h5>
                                            <select class="form-select select2" name="rtitle[]">
                                                <?php
                                                $sql = "SELECT * FROM titlemaster";
                                                $stmt = sqlsrv_query($conn, $sql);
                                                if ($stmt === false) {
                                                    die (print_r(sqlsrv_errors(), true));
                                                } else {
                                                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                                        $title = $row['title'];
                                                        echo '<option value="' . $title . '"';
                                                        if ($title == $rtitle) {
                                                            echo ' selected';
                                                        }
                                                        echo '>' . $title . '</option>';
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
                                                <input type="text" class="form-control" required name="pname[]"
                                                    value="<?php echo $rfname; ?>"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Middle Name</h5>
                                                <input type="text" class="form-control" name="rmname[]"
                                                    value="<?php echo $rmname; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Last Name <span class="text-danger">*</span></h5>
                                                <input type="text" class="form-control" required name="rlname[]"
                                                    value="<?php echo $rlname; ?>"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Gender <span class="text-danger">*</span></h5>
                                            <select class="form-select" name="st2[]">
                                                <option value="Male" <?php if ($rsex == 'Male')
                                                    echo 'selected'; ?>>Male
                                                </option>
                                                <option value="Female" <?php if ($rsex == 'Female')
                                                    echo 'selected'; ?>>
                                                    Female</option>
                                                <option value="Others" <?php if ($rsex == 'Others')
                                                    echo 'selected'; ?>>
                                                    Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Age (Years) <span class="text-danger">*</span></h5>
                                                <input type="text" class="form-control" required name="st1[]"
                                                    value="<?php echo $rage; ?>"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Month </h5>
                                                <input type="text" class="form-control" name="month[]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Days </h5>
                                                <input type="text" class="form-control" name="days[]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>F/H/S/D/W <span class="text-danger">*</span></h5>
                                                <input type="text" class="form-control" name="fname[]"
                                                    value="<?php echo $fname; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Address <span class="text-danger">*</span></h5>

                                                <input type="text" class="form-control" name="radd1[]"
                                                    value="<?php echo $radd1; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Address <span class="text-danger">*</span></h5>
                                                <input type="text" class="form-control" name="radd2[]"
                                                    value="<?php echo $radd2; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Pin Code <span class="text-danger">*</span></h5>
                                                <input type="text" class="form-control" name="rrace[]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>City <span class="text-danger">*</span></h5>
                                            <select class="form-select select2" id="rcity" name="rcity[]">
                                                <?php
                                                $sql = "SELECT Cityname FROM citymaster";
                                                $stmt = sqlsrv_query($conn, $sql);
                                                if ($stmt === false) {
                                                    die (print_r(sqlsrv_errors(), true));
                                                } else {
                                                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                                        $Cityname = $row['Cityname'];
                                                        echo '<option value="' . $Cityname . '"';
                                                        if ($rcity == $Cityname) {
                                                            echo ' selected';
                                                        }
                                                        echo '>' . $Cityname . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>District <span class="text-danger">*</span></h5>
                                            <input type="text" name="rdist[]" class="form-control" required
                                                value="<?php echo $rdist; ?>"
                                                data-validation-required-message="This field is required">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>State <span class="text-danger">*</span></h5>
                                            <input type="text" name="rstate[]" class="form-control"
                                                value="<?php echo $rstate; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Country <span class="text-danger">*</span></h5>
                                            <input type="text" name="rcountry[]" class="form-control"
                                                value="<?php echo $rcountry; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Ph. No. <span class="text-danger">*</span></h5>
                                                <input type="text" class="form-control" name="rrace[]"
                                                    value="<?php echo $rrace; ?>" maxlength="10">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Doctor <span class="text-danger">*</span></h5>
                                            <select class="form-select select2" name="rdocname[]">
                                                <?php
                                                $sql = "SELECT docName FROM docmaster";
                                                $stmt = sqlsrv_query($conn, $sql);
                                                if ($stmt === false) {
                                                    die (print_r(sqlsrv_errors(), true));
                                                } else {
                                                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                                        $docName = $row['docName'];
                                                        echo '<option value="' . $docName . '"';
                                                        if ($rdoc == $docName) {
                                                            echo ' selected';
                                                        }
                                                        echo '>' . $docName . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <label for="">Bill Details</label>
                                <hr>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Bill No: <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <?php
                                            $sql = "SELECT TOP 1 rcno FROM InPatho2324 ORDER BY id DESC";
                                            $stmt = sqlsrv_query($conn, $sql);
                                            if ($stmt === false) {
                                                die (print_r(sqlsrv_errors(), true));
                                            } else {
                                                $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
                                                $last_rcno = $row['rcno'];
                                                if ($last_rcno == '') {
                                                    $next_rcno = "237495";
                                                } else {
                                                    $next_rcno = strval(intval($last_rcno) + 1);
                                                }
                                            }
                                            ?>
                                            <input type="text" name="rcno[]" placeholder="237495" class="form-control"
                                                required value="<?php echo $next_rcno; ?>" readonly
                                                data-validation-required-message="This field is required">


                                        </div>
                                    </div>
                                </div>
                                <!-- <form> -->
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="Services">Services</label>
                                        <select class="form-select select2" name="servname[]" id="servname"
                                            onchange="getservname(this.value)">
                                            <option>Select Services</option>
                                            <?php
                                            $sql = "SELECT servname FROM servmaster";
                                            $stmt = sqlsrv_query($conn, $sql);
                                            if ($stmt === false) {
                                                die (print_r(sqlsrv_errors(), true));
                                            } else {
                                                while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                                    $servname = $row['servname'];
                                                    echo "<option value='$servname'>$servname</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="Price">Price</label>
                                        <select class="form-select select2" name="servrate[]" id="servrate">
                                            <option>Select Price</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="add"></label>
                                        <button type="button" id="addBtn"
                                            class="btn btn-md btn-primary mt-4">Add</button>
                                    </div>
                                </div>
                                <table
                                    class="table table-bordered table-hover display nowrap margin-top-10 w-p100 dataTable">
                                    <thead>
                                        <tr>
                                            <th>Services</th>
                                            <th>Price</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2">Total Amount:</td>
                                            <td><input type="text" class="form-control" placeholder="TOTAL Amount"
                                                    name="totalPrice[]" id="totalPrice"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Total Adjusted:</td>
                                            <td><input type="text" class="form-control" placeholder="Total Adjusted"
                                                    name="totalAdj[]" id="totalAdj"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">GST %:</td>
                                            <td><input type="text[]" class="form-control" placeholder="GST %" name="gst"
                                                    id="gst"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Bill Amount:</td>
                                            <td><input type="text[]" class="form-control" placeholder="Bill Amount"
                                                    name="billAmount" id="billAmount"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Paid Amount:</td>
                                            <td><input type="text" class="form-control" placeholder="Paid Amount"
                                                    name="paidAmount[]" id="paidAmount"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Balance:</td>
                                            <td><input type="text" class="form-control" placeholder="Balance"
                                                    name="balance[]" id="balance"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Payment Type:</td>
                                            <td>
                                                <select class="form-select select2" name="status[]" id="servrate">
                                                    <option selected disabled>Payment Type</option>
                                                    <option value="Cash">Cash</option>
                                                    <option value="Card">Card</option>
                                                    <option value="NEFT">NEFT</option>
                                                    <option value="Cheque">Cheque</option>
                                                    <option value="Credit">Credit</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                        </div>
                        <center>
                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-info" name="billSave">SAVE</button>
                            </div>
                        </center>
                        <div class="text-xs-right mt-4">
                            <!-- <button type="clear" class="btn btn-info">CLEAR</button> -->
                            <button type="button" class="btn btn-info">Total Collection</button>
                            <button type="button" class="btn btn-info">Delivery Report</button>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target=".bs-example-modal-lg">List of Register Patient</button>
                            <button type="button" class="btn btn-primary">List of Admitted Patient</button>
                            <button type="button" class="btn btn-info">Money Receipt</button>
                            <a href="index" class="btn btn-info"><i class="fa-solid fa-x"></i></a>
                        </div>
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

<script>
    const tbodyEl = document.querySelector("tbody");
    const tableEl = document.querySelector("table");
    const addBtn = document.getElementById("addBtn");
    const totalPriceEl = document.getElementById("totalPrice");
    const totalAdjEl = document.getElementById("totalAdj");
    const gstEl = document.getElementById("gst");
    const billAmountEl = document.getElementById("billAmount");
    const paidAmountEl = document.getElementById("paidAmount");
    const balanceEl = document.getElementById("balance");

    let prices = [];

    function calculateTotalPrice() {
        let totalPrice = 0;
        prices.forEach(price => {
            totalPrice += parseFloat(price) || 0;
        });

        const totalAdj = parseFloat(totalAdjEl.value) || 0;
        const gst = parseFloat(gstEl.value) || 0;

        const adjustedTotalPrice = totalPrice - totalAdj;
        const billAmount = adjustedTotalPrice + (adjustedTotalPrice * gst / 100);
        const balance = billAmount - (parseFloat(paidAmountEl.value) || 0);

        totalPriceEl.value = totalPrice.toFixed(2);
        billAmountEl.value = billAmount.toFixed(2);
        balanceEl.value = balance.toFixed(2);
    }

    // Event listeners for input fields to trigger calculation
    const inputs = document.querySelectorAll("#totalPrice, #totalAdj, #gst, #paidAmount");
    inputs.forEach(input => {
        input.addEventListener("input", calculateTotalPrice);
    });

    calculateTotalPrice();

    function onAddRow() {
        const servrate = document.getElementById("servrate").value.replace(/,/g, '');
        const servname = document.getElementById("servname").value;
        const newRow = `
        <tr>
            <td><input class="form-control" type="text" value="${servname}" name="servnames[]"></td>
            <td><input class="form-control" type="text" value="${servrate}" name="servrate[]"</td>
            <td><button class="deleteBtn btn-primary btn-md">Delete</button></td>
        </tr>
        `;
        tbodyEl.innerHTML += newRow;
        prices.push(parseFloat(servrate));
        calculateTotalPrice();
    }

    function onDeleteRow(e) {
        if (!e.target.classList.contains("deleteBtn")) {
            return;
        }
        const btn = e.target;
        const row = btn.closest("tr");
        const rowIndex = Array.from(row.parentNode.children).indexOf(row);
        prices.splice(rowIndex, 1);
        row.remove();
        calculateTotalPrice();
    }

    addBtn.addEventListener("click", onAddRow);
    tableEl.addEventListener("click", onDeleteRow);
</script>
<script>
    function getservname(servname) {
        console.log(servname);
        $.ajax({
            url: "load/fetch_price.php",
            type: "POST",
            data: { servname: servname },
            dataType: "json",
            success: function (data) {
                var servrateDropdown = $("#servrate");
                servrateDropdown.empty().append('<option value="">-- Price --</option>');
                $.each(data, function (index, servmaster) {
                    servrateDropdown.append('<option value="' + servmaster.servrate + '">' + servmaster.servrate + '</option>');
                });
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
</script>
<script>
    $(document).ready(function () {


        function getServiceRates(servname) {
            console.log(servname);
            $.ajax({
                url: "load/get_fetch_price.php",
                type: "POST",
                data: { servname: servname },
                dataType: "json",
                success: function (data) {
                    var servrateDropdown = $(".getservrate");
                    servrateDropdown.empty().append('<option value="">-- Price --</option>');
                    $.each(data, function (index, servmaster) {
                        servrateDropdown.append('<option value="' + servmaster.getservrate + '">' + servmaster.getservrate + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }



        $("#btn-add-row").click(function () {
            var row = "<tr><td><select class='form-select select2 getservname' required name='servname[]' onchange='getServiceRates(this.value)'><?php $sql = 'SELECT servname FROM servmaster';
            $stmt = sqlsrv_query($conn, $sql);
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $servname = $row['servname'];
                echo '<option value=' . $servname . '>' . $servname . '</option>';
            } ?></select></td><td><select class='form-select select2 getservrate' required name='servrate[]'><option>Select Price</option></select></td><td><input type='button' value='x' class='btn btn-danger btn-sm btn-row-remove'></td></tr>";
            $("#fees_tbody").append(row);
            getServiceRates(this.value);

        });
        // function grand_total() {
        //     var tot = 0;
        //     $(".total").each(function () {
        //         tot += Number($(this).val()) || 0;
        //         $("#total_fees").val(tot);
        //     });
        //     console.log("Grand total updated: " + tot);
        // }

        // Remove added services scripts
        $("body").on("click", ".btn-row-remove", function () {
            swal({
                title: "Are You Sure?",
                icon: "warning",
                buttons: ["Cancel", "Yes, delete it!"],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $(this).closest("tr").remove();
                    grand_total();
                }
            });
        });
    });

</script>


<?php
if (isset ($_POST['billSave'])) {
    for ($i = 0; $i < count($_POST['servname']); $i++) {
        $rstatus = $_POST['rstatus'][$i];
        $rno = $_POST['rno'][$i];
        $rcno = $_POST['rcno'][$i];
        $serdate = $_POST['serdate'][$i];
        $pname = $_POST['pname'][$i];
        $st2 = $_POST['st2'][$i];
        $st1 = $_POST['st1'][$i];
        $servname = $_POST['servname'][$i];
        $servrate = $_POST['servrate'][$i];

        $sql = "INSERT INTO InPatho2324 (rstatus, rno, rcno, serdate, pname, st2, st1, servname, servrate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = array($rstatus, $rno, $rcno, $serdate, $pname, $st2, $st1, $servname, $servrate);
        $stmt = sqlsrv_query($conn, $sql, $params);

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
                                die (print_r(sqlsrv_errors(), true));
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

    $sql = "UPDATE registration SET 
    rno = '$rno',
    se = '$se',
    rdate = '$rdate',
    rtime = '$rtime',
    rstatus = '$rstatus',
    rtitle = '$rtitle',
    rfname = '$rfname',
    rmname = '$rmname',
    rlname = '$rlname',
    rsex = '$rsex',
    rage = '$rage',
    fname = '$fname',
    radd1 = '$radd1',
    radd2 = '$radd2',
    rcity = '$rcity',
    rdist = '$rdist',
    rstate = '$rstate',
    rrace = '$rrace',
    rdoc = '$rdoc',
    wamt = '$wamt',
    rcountry = '$rcountry'
    WHERE rno = '$rno' AND id = '$id'";

    $stmt = sqlsrv_query($conn, $sql);
    if ($stmt === false) {
        die (print_r(sqlsrv_errors(), true));
    } else {
        echo '<script>
                swal("Success!", "", "success");
                setTimeout(function(){
                    window.location.href = "reg-list";
                }, 1000);
            </script>';
    }
}



include ('footer.php');

?>