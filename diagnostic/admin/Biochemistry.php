<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    $login_username = $_SESSION['username'];
} else {
    echo "<script>location.href='../../login';</script>";
}
include ('header.php');

$id = $_GET['id'];
$rno = $_GET['rno'];

$sql = "SELECT b.id, b.rno, b.opid, b.billdate, b.billno, b.pname, b.uname, b.servname, b.servrate, r.rsex, r.rage, r.rdoc
FROM billing AS b INNER JOIN registration AS r ON b.rno = r.rno WHERE b.id = '$id' AND b.rno = '$rno'";
$res = sqlsrv_query($conn, $sql);
while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
    $id = $row['id'];
    $opid = $row['opid'];
    $pname = $row['pname'];
    $servname = $row['servname'];
    $age = $row['rage'];
    $gender = $row['rsex'];
    $doc = $row['rdoc'];
}
?>
<div class="content-wrapper">
    <div class="container-full">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h4 class="page-title">Medical Reports</h4>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Medical</li>
                                <li class="breadcrumb-item active" aria-current="page">Reports</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- LFT Test Reports -->
        <div class="col-xl-12 col-12 mt-2">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Reg. No: &nbsp;
                        <?php echo $rno ?>&nbsp;&nbsp;&nbsp;
                        OP Id: &nbsp;
                        <?php echo $opid ?>
                        &nbsp;&nbsp;&nbsp;Name: &nbsp;&nbsp;&nbsp;
                        <?php echo $pname ?>&nbsp;/
                        <?php echo $age ?>&nbsp;/
                        <?php echo $gender; ?>&nbsp;&nbsp;&nbsp;Doctor: &nbsp;
                        <?php echo $doc ?>&nbsp;&nbsp;<strong style="background-color: #22cab9;">Test Reports:
                            &nbsp;&nbsp;
                            <?php echo $servname; ?>
                        </strong>
                    </h4>
                    <ul class="box-controls pull-right">
                        <li><a class="box-btn-slide" href="#"></a></li>
                        <li><a class="box-btn-fullscreen" href="#"></a></li>
                    </ul>
                </div>
                <div class="col-12" style="max-height: 450px; overflow-x: scroll;">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Name</label>
                                </div>
                                <div class="col-md-2">
                                    Result
                                </div>
                                <div class="col-md-2">
                                    Severity
                                </div>
                                <div class="col-md-2">
                                    Unit
                                </div>
                                <div class="col-md-2">
                                    Reference Range
                                </div>
                            </div>
                            <form method="POST" enctype="multipart/form-data">
                                <h3 for="">LIVER FUNCTION TEST</h3>
                                <div class="form-group row">
                                    <input class="form-control" type="hidden" name="rno" value="<?php echo $rno; ?>">
                                    <input class="form-control" type="hidden" name="pname"
                                        value="<?php echo $pname; ?>">
                                    <input class="form-control" type="hidden" name="opid" value="<?php echo $opid; ?>">
                                    <input class="form-control" type="hidden" name="subgroup"
                                        value="LIVER FUNCTION TEST">
                                    <input class="form-control" type="hidden" name="servname"
                                        value="<?php echo $servname; ?>">
                                    <input class="form-control" type="hidden" value="Biochemistry" name="modality">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]"
                                            value="Serum Bilirubin (T)" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="1">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="mg/dl" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]"
                                            value=" 0.3 - 1.0 mg/dL" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]" value="Conjugated"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="2">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="mg/dl" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]"
                                            value="0.1 - 0.3 mg/dL" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]" value="Unconjugated"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="3">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="mg/dl." readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]"
                                            value="0.2 - 0.7 mg/dl." readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]" value="Serum GOT"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="4">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="U/L" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]"
                                            value="10-35(M),10-31(F) U/L" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]" value="Serum GPT"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="5">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="U/L" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]"
                                            value="09-43(M),09-33(F) U/L" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]"
                                            value="Serum Alkaline Phosphatase" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="6">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="U/L. " readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]" value="< 258 U/L. "
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]" value="Total Protein"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="7">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="mg/dl." readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]"
                                            value=" 5.5 - 8.0 mg/dl." readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]" value="Albumin"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="8">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="gm/dl." readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]"
                                            value="3.5 - 5.5 gm/dl." readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]" value="Globulin"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="9">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="gm/dl." readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]"
                                            value=" 2.8 - 3.5 Ratio" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]" value="AG Ratio"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="10">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" readonly value="Ratio">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]" value="1.1 and 2.5"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]" value="Serum GGT"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="11">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="U/L." readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]" value="00  - 50"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-12">
                                        <textarea id="editor" rows="10" placeholder="Notes" name="notes"></textarea>
                                    </div>
                                </div>
                                <center>
                                    <button class="btn btn-md btn-primary" type="submit" name="LFTsave"
                                        tabindex="38">SAVE</button>
                                </center>
                            </form>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>

        <!-- ELECTROLYTES Test Reports -->
        <div class="col-xl-12 col-12 mt-2">
            <div class="box box-slided-up">
                <div class="box-header with-border">
                    <h4 class="box-title">ELECTROLYTES</h4>
                    <ul class="box-controls pull-right">
                        <li><a class="box-btn-slide" href="#"></a></li>
                        <li><a class="box-btn-fullscreen" href="#"></a></li>
                    </ul>
                </div>
                <div class="col-12" style="max-height: 450px; overflow-x: scroll;">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Name</label>
                                </div>
                                <div class="col-md-2">
                                    Result
                                </div>
                                <div class="col-md-2">
                                    Severity
                                </div>
                                <div class="col-md-2">
                                    Unit
                                </div>
                                <div class="col-md-2">
                                    Reference Range
                                </div>
                            </div>
                            <form method="POST" enctype="multipart/form-data">
                                <input class="form-control" type="hidden" name="rno" value="<?php echo $rno; ?>">
                                <input class="form-control" type="hidden" name="pname" value="<?php echo $pname; ?>">
                                <input class="form-control" type="hidden" name="opid" value="<?php echo $opid; ?>">
                                <input class="form-control" type="hidden" name="subgroup" value="ELECTROLYTES">
                                <input class="form-control" type="hidden" name="servname"
                                    value="<?php echo $servname; ?>">
                                <input class="form-control" type="hidden" value="Biochemistry" name="modality">
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]" value="Serum Sodium"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="12">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option value="">--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="mEq/L" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]"
                                            value="136 - 145 mEq/L" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]" value="Serum Potassium"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="13">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option value="">--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="mEq/L" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]"
                                            value="3.5 - 5.0 mEq/L" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]" value="Serum Chloride"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="14">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option value="">--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="mEq/L" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]" value="98 - 106 mEq/L"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]"
                                            value="Serum Bicarbonate" readonly>
                                    </div>

                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="15">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option value="">--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="mEq/L" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]" value="22 - 30 mEq/L"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-12">
                                        <textarea id="editor1" rows="10" placeholder="Notes" name="notes"></textarea>
                                    </div>
                                </div>
                                <center>
                                    <button class="btn btn-md btn-primary" type="submit" name="ELEsave"
                                        tabindex="38">SAVE</button>
                                </center>
                            </form>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>

        <!-- LIPID PROFILE TEST Reports -->
        <div class="col-xl-12 col-12 mt-2">
            <div class="box box-slided-up">
                <div class="box-header with-border">
                    <h4 class="box-title">LIPID PROFILE TEST</h4>
                    <ul class="box-controls pull-right">
                        <li><a class="box-btn-slide" href="#"></a></li>
                        <li><a class="box-btn-fullscreen" href="#"></a></li>
                    </ul>
                </div>
                <div class="col-12" style="max-height: 450px; overflow-x: scroll;">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Name</label>
                                </div>
                                <div class="col-md-2">
                                    Result
                                </div>
                                <div class="col-md-2">
                                    Severity
                                </div>
                                <div class="col-md-2">
                                    Unit
                                </div>
                                <div class="col-md-2">
                                    Reference Range
                                </div>
                            </div>
                            <form method="POST" enctype="multipart/form-data">
                                <input class="form-control" type="hidden" name="rno" value="<?php echo $rno; ?>">
                                <input class="form-control" type="hidden" name="pname" value="<?php echo $pname; ?>">
                                <input class="form-control" type="hidden" name="opid" value="<?php echo $opid; ?>">
                                <input class="form-control" type="hidden" name="subgroup" value="LIPID PROFILE TEST">
                                <input class="form-control" type="hidden" name="servname"
                                    value="<?php echo $servname; ?>">
                                <input class="form-control" type="hidden" value="Biochemistry" name="modality">
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]"
                                            value="Serum Cholestrol" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="16">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="mg./dl." readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]"
                                            value="150-260 mg./dl." readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]"
                                            value="Serum Triglycerides" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="17">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="mg./dl." readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]"
                                            value="65-170 mg./dl. " readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]"
                                            value="Serum H.D.L. Cholesterol" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="18">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="mg./dl." readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]"
                                            value="35-80(M),42-88(F)" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]"
                                            value="Serum L.D.L. Cholesterol" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="19">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="gm/dl." readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]"
                                            value="Desirable <130 " readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]"
                                            value="Serum V.L.D.L. Cholesterol" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="20">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="gm/dl." readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]"
                                            value="Serum Cholesterol /HDL ratio" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="21">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]"
                                            value="<3 in low,  3-5 in avg , >5 in high risk" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]"
                                            value="Serum LDL/HDL ratio" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="22">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]" value="(1.5 - 3.5 )"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]"
                                            value="Serum Triglycerides" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="23">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="mg./dl." readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]" value="65-170"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-12">
                                        <textarea id="editor2" rows="10" placeholder="Notes" name="notes"></textarea>
                                    </div>
                                </div>
                                <center>
                                    <button class="btn btn-md btn-primary" type="submit" name="LIPIDsave"
                                        tabindex="38">SAVE</button>
                                </center>
                            </form>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>

        <!-- UREA/CALCIUM/URIC ACID/CPK TEST Reports -->
        <div class="col-xl-12 col-12 mt-2">
            <div class="box box-slided-up">
                <div class="box-header with-border">
                    <h4 class="box-title">UREA/CALCIUM/URIC ACID/CPK</h4>
                    <ul class="box-controls pull-right">
                        <li><a class="box-btn-slide" href="#"></a></li>
                        <li><a class="box-btn-fullscreen" href="#"></a></li>
                    </ul>
                </div>
                <div class="col-12" style="max-height: 450px; overflow-x: scroll;">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Name</label>
                                </div>
                                <div class="col-md-2">
                                    Result
                                </div>
                                <div class="col-md-2">
                                    Severity
                                </div>
                                <div class="col-md-2">
                                    Unit
                                </div>
                                <div class="col-md-2">
                                    Reference Range
                                </div>
                            </div>
                            <form method="POST" enctype="multipart/form-data">
                                <input class="form-control" type="hidden" name="rno" value="<?php echo $rno; ?>">
                                <input class="form-control" type="hidden" name="pname" value="<?php echo $pname; ?>">
                                <input class="form-control" type="hidden" name="opid" value="<?php echo $opid; ?>">
                                <input class="form-control" type="hidden" name="subgroup" value="UREA/CALCIUM/URIC ACID/CPK">
                                <input class="form-control" type="hidden" name="servname" value="<?php echo $servname; ?>">
                                <input class="form-control" type="hidden" value="Biochemistry" name="modality">

                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]" value="Serum Urea"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="24">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="mg./dl." readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]" value="12 - 40 "
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]"
                                            value="Serum Creatinine" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="25">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="mg./dl." readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]" value="Upto 1.5 "
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]" value="Serum Calcium"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="26">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="mg./dl." readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]" value="8.5-11.0"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]"
                                            value="Serum Phosphorous" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="28">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="gm/dl." readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]" value="2.5-4.8 ">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]"
                                            value="Serum  Amylase (37 C)" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="29">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" name="IU/L.">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]" value="Upto  86 "
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]"
                                            value="Serum  Lipase  (37 C)" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="30">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" name="U/L.">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]" value="Upto  60 "
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]" value="LDH" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="31">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="U/L." readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]" value="230 - 460"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]" value="Serum CPK"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="32">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="IU/L." readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]" value="25 - 200"
                                            readonly>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]" value="Serum Uric Acid"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="33">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="mg/dl." readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]"
                                            value="3.4 - 7.0(M),2.4 - 5.7(F)" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]" value="G-6-PD"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="34">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="U/gm Hb" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]" value="6.4 - 18.7"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]" value="(HbA1C) Glyco"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="35">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="%" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]" value="BUN" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="36">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="mg/dl." readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]" value="6 - 20 "
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]" value="NPN" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="inval[]" tabindex="37">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status[]" class="form-control">
                                            <option disabled selected>--Select--</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value=" mg/dl." readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]" value="21 - 44 "
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-12">
                                        <textarea id="editor3" rows="10" placeholder="Notes"
                                            name="UREAnotes"></textarea>
                                    </div>
                                </div>
                                <center>
                                    <button class="btn btn-md btn-primary" type="submit" name="save"
                                        tabindex="38">SAVE</button>
                                </center>
                            </form>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>

        <!-- Upload Reports -->
        <div class="col-xl-12 col-12 mt-2">
            <div class="box box-slided-up">
                <div class="box-header with-border">
                    <h4 class="box-title"><strong>Upload Reports</strong></h4>
                    <ul class="box-controls pull-right">
                        <li><a class="box-btn-slide" href="#"></a></li>
                        <li><a class="box-btn-fullscreen" href="#"></a></li>
                    </ul>
                </div>

                <div class="box-body">
                    <!-- Main content -->
                    <section class="content">
                        <div class="box">
                            <div class="box-body">
                                <form method="POST" enctype="multipart/form-data">
                                    <input class="form-control" type="hidden" name="rno" value="<?php echo $rno; ?>">
                                    <input class="form-control" type="hidden" name="pname" value="<?php echo $pname; ?>">
                                    <input class="form-control" type="hidden" name="opid" value="<?php echo $opid; ?>">
                                    <input class="form-control" type="hidden" name="servname" value="<?php echo $servname; ?>">
                                    <input class="form-control" type="hidden" value="Biochemistry" name="modality">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input name="file" type="file" multiple />
                                        </div>
                                    </div>
                                    <center>
                                        <button class="btn btn-md btn-primary" type="submit" name="Filesave"
                                            tabindex="38">SAVE</button>
                                    </center>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

    </div>
</div>

<?php

// File Upload Code
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Filesave'])) {
    // Check if files are uploaded
    if (isset($_FILES['file']['name']) && count($_FILES['file']['name']) > 0) {
        // Prepare SQL statement
        $sql = "INSERT INTO PathoReport (rno, pname, opid, servname, modality, uploadReport) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = sqlsrv_prepare($conn, $sql, array(&$rno, &$pname, &$opid, &$servname, &$modality, &$uploadReport));

        if (!$stmt) {
            die("Statement preparation failed: " . print_r(sqlsrv_errors(), true));
        }

        // Get file details
        $fileCount = count($_FILES['file']['name']);
        $uploadReport = [];

        // Loop through each file
        for ($i = 0; $i < $fileCount; $i++) {
            $fileName = $_FILES['file']['name'][$i];
            $fileTmpName = $_FILES['file']['tmp_name'][$i];
            $fileSize = $_FILES['file']['size'][$i];

            // Check if file is uploaded successfully
            if ($fileSize > 0 && is_uploaded_file($fileTmpName)) {
                // Move uploaded file to destination directory
                $destination = "uploads/" . $fileName;
                if (move_uploaded_file($fileTmpName, $destination)) {
                    $uploadReport[] = $destination; // Add file path to array
                }
            }
        }

        // Bind parameters and execute SQL statement for each file
        foreach ($uploadReport as $file) {
            $rno = isset($_POST['rno']) ? $_POST['rno'] : '';
            $pname = isset($_POST['pname']) ? $_POST['pname'] : '';
            $opid = isset($_POST['opid']) ? $_POST['opid'] : '';
            $servname = isset($_POST['servname']) ? $_POST['servname'] : '';
            $modality = isset($_POST['modality']) ? $_POST['modality'] : '';

            // Bind the uploadReport parameter to the file path
            $uploadReport = $file;

            if (!sqlsrv_execute($stmt)) {
                die("Statement execution failed: " . print_r(sqlsrv_errors(), true));
            }
        }

        echo '<script>
                swal("Success!", "", "success");
                setTimeout(function(){
                    window.location.href = window.location.href;
                }, 1000);
            </script>';
    } else {
        echo "No files uploaded.";
    }
}

// LFT Code
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['LFTsave'])) {
    $sql = "INSERT INTO PathoReport (rno, pname, opid, servname, subtest, unit, normrang, inval, status, addedBy, notes, modality, subgroup) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$rno, &$pname, &$opid, &$servname, &$subtest, &$unit, &$normrang, &$inval, &$status, &$login_username, &$notes, &$modality, &$subgroup));

    if (!$stmt) {
        die("Statement preparation failed: " . print_r(sqlsrv_errors(), true));
    }

    foreach ($_POST['inval'] as $i => $inval) {
        if (!empty($inval)) {
            $rno = isset($_POST['rno']) ? $_POST['rno'] : '';
            $pname = isset($_POST['pname']) ? $_POST['pname'] : '';
            $opid = isset($_POST['opid']) ? $_POST['opid'] : '';
            $servname = isset($_POST['servname']) ? $_POST['servname'] : '';
            $subtest = isset($_POST['subtest'][$i]) ? $_POST['subtest'][$i] : '';
            $unit = isset($_POST['unit'][$i]) ? $_POST['unit'][$i] : '';
            $normrang = isset($_POST['normrang'][$i]) ? $_POST['normrang'][$i] : '';
            $status = isset($_POST['status'][$i]) ? $_POST['status'][$i] : '';
            $notes = isset($_POST['notes']) ? $_POST['notes'] : '';
            $modality = isset($_POST['modality']) ? $_POST['modality'] : '';
            $subgroup = isset($_POST['subgroup']) ? $_POST['subgroup'] : '';

            if (!sqlsrv_execute($stmt)) {
                die("Statement execution failed: " . print_r(sqlsrv_errors(), true));
            } else {
                echo '<script>
                    swal("Success!", "", "success");
                    setTimeout(function(){
                        window.location.href = "BiochemistryPdf2?rno=' . $rno . '&id=' . $id . '&modality=' . $modality . '&subgroup=' . $subgroup . '";
                    }, 1000);
                </script>';
            }
        }
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}

// ELECTROLYTES
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ELEsave'])) {
    $sql = "INSERT INTO PathoReport (rno, pname, opid, servname, subtest, unit, normrang, inval, status, addedBy, notes, modality, subgroup) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$rno, &$pname, &$opid, &$servname, &$subtest, &$unit, &$normrang, &$inval, &$status, &$login_username, &$notes, &$modality, &$subgroup));

    if (!$stmt) {
        die("Statement preparation failed: " . print_r(sqlsrv_errors(), true));
    }

    foreach ($_POST['inval'] as $i => $inval) {
        if (!empty($inval)) {
            $rno = isset($_POST['rno']) ? $_POST['rno'] : '';
            $pname = isset($_POST['pname']) ? $_POST['pname'] : '';
            $opid = isset($_POST['opid']) ? $_POST['opid'] : '';
            $servname = isset($_POST['servname']) ? $_POST['servname'] : '';
            $subtest = isset($_POST['subtest'][$i]) ? $_POST['subtest'][$i] : '';
            $unit = isset($_POST['unit'][$i]) ? $_POST['unit'][$i] : '';
            $normrang = isset($_POST['normrang'][$i]) ? $_POST['normrang'][$i] : '';
            $status = isset($_POST['status'][$i]) ? $_POST['status'][$i] : '';
            $notes = isset($_POST['notes']) ? $_POST['notes'] : '';
            $modality = isset($_POST['modality']) ? $_POST['modality'] : '';
            $subgroup = isset($_POST['subgroup']) ? $_POST['subgroup'] : '';

            if (!sqlsrv_execute($stmt)) {
                die("Statement execution failed: " . print_r(sqlsrv_errors(), true));
            } else {
                echo '<script>
                    swal("Success!", "", "success");
                    setTimeout(function(){
                        window.location.href = "BiochemistryPdf2?rno=' . $rno . '&id=' . $id . '&modality=' . $modality . '&subgroup=' . $subgroup . '";
                    }, 1000);
                </script>';
            }
        }
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}

// LIPID PROFILE TEST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['LIPIDsave'])) {
    $sql = "INSERT INTO PathoReport (rno, pname, opid, servname, subtest, unit, normrang, inval, status, addedBy, notes, modality, subgroup) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$rno, &$pname, &$opid, &$servname, &$subtest, &$unit, &$normrang, &$inval, &$status, &$login_username, &$notes, &$modality, &$subgroup));

    if (!$stmt) {
        die("Statement preparation failed: " . print_r(sqlsrv_errors(), true));
    }

    foreach ($_POST['inval'] as $i => $inval) {
        if (!empty($inval)) {
            $rno = isset($_POST['rno']) ? $_POST['rno'] : '';
            $pname = isset($_POST['pname']) ? $_POST['pname'] : '';
            $opid = isset($_POST['opid']) ? $_POST['opid'] : '';
            $servname = isset($_POST['servname']) ? $_POST['servname'] : '';
            $subtest = isset($_POST['subtest'][$i]) ? $_POST['subtest'][$i] : '';
            $unit = isset($_POST['unit'][$i]) ? $_POST['unit'][$i] : '';
            $normrang = isset($_POST['normrang'][$i]) ? $_POST['normrang'][$i] : '';
            $status = isset($_POST['status'][$i]) ? $_POST['status'][$i] : '';
            $notes = isset($_POST['notes']) ? $_POST['notes'] : '';
            $modality = isset($_POST['modality']) ? $_POST['modality'] : '';
            $subgroup = isset($_POST['subgroup']) ? $_POST['subgroup'] : '';

            if (!sqlsrv_execute($stmt)) {
                die("Statement execution failed: " . print_r(sqlsrv_errors(), true));
            } else {
                echo '<script>
                    swal("Success!", "", "success");
                    setTimeout(function(){
                        window.location.href = "BiochemistryPdf2?rno=' . $rno . '&id=' . $id . '&modality=' . $modality . '&subgroup=' . $subgroup . '";
                    }, 1000);
                </script>';
            }
        }
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}

// UREA/CALCIUM/URIC ACID/CPK PROFILE TEST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['UREAnotes'])) {
    $sql = "INSERT INTO PathoReport (rno, pname, opid, servname, subtest, unit, normrang, inval, status, addedBy, notes, modality, subgroup) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$rno, &$pname, &$opid, &$servname, &$subtest, &$unit, &$normrang, &$inval, &$status, &$login_username, &$notes, &$modality, &$subgroup));

    if (!$stmt) {
        die("Statement preparation failed: " . print_r(sqlsrv_errors(), true));
    }

    foreach ($_POST['inval'] as $i => $inval) {
        if (!empty($inval)) {
            $rno = isset($_POST['rno']) ? $_POST['rno'] : '';
            $pname = isset($_POST['pname']) ? $_POST['pname'] : '';
            $opid = isset($_POST['opid']) ? $_POST['opid'] : '';
            $servname = isset($_POST['servname']) ? $_POST['servname'] : '';
            $subtest = isset($_POST['subtest'][$i]) ? $_POST['subtest'][$i] : '';
            $unit = isset($_POST['unit'][$i]) ? $_POST['unit'][$i] : '';
            $normrang = isset($_POST['normrang'][$i]) ? $_POST['normrang'][$i] : '';
            $status = isset($_POST['status'][$i]) ? $_POST['status'][$i] : '';
            $notes = isset($_POST['notes']) ? $_POST['notes'] : '';
            $modality = isset($_POST['modality']) ? $_POST['modality'] : '';
            $subgroup = isset($_POST['subgroup']) ? $_POST['subgroup'] : '';

            if (!sqlsrv_execute($stmt)) {
                die("Statement execution failed: " . print_r(sqlsrv_errors(), true));
            } else {
                echo '<script>
                    swal("Success!", "", "success");
                    setTimeout(function(){
                        window.location.href = "BiochemistryPdf2?rno=' . $rno . '&id=' . $id . '&modality=' . $modality . '&subgroup=' . $subgroup . '";
                    }, 1000);
                </script>';
            }
        }
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}

include ('footer.php');

?>