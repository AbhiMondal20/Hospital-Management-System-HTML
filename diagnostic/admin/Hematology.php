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
FROM billing AS b
INNER JOIN registration AS r ON b.rno = r.rno WHERE b.id = '$id' AND b.rno = '$rno'";
$res = sqlsrv_query($conn, $sql);
while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
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

        <!-- Test Reports -->
        <div class="col-xl-12 col-12 mt-2">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Reg. No: &nbsp;
                        <?php echo $rno ?>&nbsp;&nbsp;&nbsp;&nbsp;
                        OP Id: &nbsp;
                        <?php echo $opid ?>
                        Name: &nbsp;
                        <?php echo $pname ?>&nbsp;/
                        <?php echo $age ?>&nbsp;/
                        <?php echo $gender; ?>&nbsp;&nbsp;&nbsp;Doctor: &nbsp;
                        <?php echo $doc ?>&nbsp;&nbsp;<strong style="background-color: #22cab9;">Test Reports:
                            &nbsp;&nbsp;
                            <?php echo $servname; ?>
                        </strong>
                    </h4>
                    <ul class="box-controls pull-right">
                        <li><a class="box-btn-close" href="#"></a></li>
                        <li><a class="box-btn-slide" href="#"></a></li>
                        <li><a class="box-btn-fullscreen" href="#"></a></li>
                    </ul>
                </div>
                <div class="col-12" style="max-height: 450px; overflow-x: scroll;">
                    <div class="box">
                        <div class="box-body">
                            <h3 for="">Blood Analysis</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Name</label>
                                </div>
                                <div class="col-md-2">
                                    Unit
                                </div>
                                <div class="col-md-2">
                                    Reference Range
                                </div>
                                <div class="col-md-2">
                                    Result
                                </div>
                                <div class="col-md-2">
                                    Status
                                </div>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">

                                    <input class="form-control" type="hidden" name="rno" value="<?php echo $rno; ?>">
                                    <input class="form-control" type="hidden" name="pname"
                                        value="<?php echo $pname; ?>">
                                    <input class="form-control" type="hidden" name="opid" value="<?php echo $opid; ?>">
                                    <input class="form-control" type="hidden" name="servname"
                                        value="<?php echo $servname; ?>">
                                    <input class="form-control" type="hidden" name="modality" value="Hematology">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest[]" value="Heamoglobin"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit[]" value="gm/dl" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang[]" readonly
                                            value="Men- 13.5-18.0 gm/dl.">
                                        <input class="form-control" type="text" name="normrang2[]" readonly
                                            value="Women- 11.5-16.4 gm/dl.">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="v1[]" tabindex="1">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="status[]">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest" value="E.S.R." readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit" value="MM/1st hr" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="esr2" class="form-control" value="Westergren">
                                        <input type="text" name="esr3" class="form-control" value="00-10 mm /1st  hr.">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="v2" tabindex="2">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="status">
                                    </div>
                                </div>
                                <h3 for="">Total Count</h3>
                                <hr>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest" value="R.B.C Count"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang"
                                            value="4.0-6.5 X 10^6   /cmm" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="v3" tabindex="3">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="status">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest" value="W.B.C Count"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang" value="4000-11000 /cmm"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="v4" tabindex="4">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="status">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest" value="Platelet Count"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit" y>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang"
                                            value="1.5-4.0 X 10^5   /cmm" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="v5" tabindex="5">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="status">
                                    </div>
                                </div>
                                <h3 for="">Absoluate Value</h3>
                                <hr>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest" value="PCV" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit" value="%" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang" value="35-45 %"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="v6" tabindex="6">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="status">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest" value="MCV" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit" value="fl" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang" value="76-96 fl"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="v7" tabindex="7">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="status">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest" value="MCH" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit" value="pg" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang" value="27-33 pg"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="v8" tabindex="8">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="status">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest" value="MCHC" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit" value="%" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang" value="30-35  mg./dl."
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="v9" tabindex="9">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="status">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest" value="Bleeding Time"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="v10" tabindex="10">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="status">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest" value="Minutes" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang" value="1 - 5 mins"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="v11" tabindex="11">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="status">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest" value="Coagulation Time"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="v11" tabindex="11">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="status">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest" value="Minutes" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="v12" tabindex="12">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="status">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest" value="Seconds">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="v13" tabindex="13">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="status">
                                    </div>
                                </div>

                                <h3 for="">DIFFERENCIAL COUNT</h3>
                                <hr>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest" value="Neutrophil" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit" value="%" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang" value="40-74 %"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="v6" tabindex="6">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="status">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest" value="Lymphocyte" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit" value="%" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang" value="20-45 %"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="v7" tabindex="7">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="status">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest" value="Eosinophil" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit" value="%" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang" value="01-06 %"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="v8" tabindex="8">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="status">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest" value="Monocyte" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit" value="%" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang" value="00-10 %"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="v9" tabindex="9">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="status">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest" value="Basophil"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit" value="%" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang" value="00-01 %" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="v10" tabindex="10">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="status">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest" value="Band Cell" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit" value="%" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang" value="0 - 5 %"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="v11" tabindex="11">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="status">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest" value="Promyelocytes"
                                            readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="v11" tabindex="11">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="status">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest" value="Reticulocyte Count" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit" value="%" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="v12" tabindex="12">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="status">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest" value="Myelocytes">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit" value="%" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="v13" tabindex="13">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="status">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest" value="Blast Cell">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit" value="%" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="v13" tabindex="13">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="status">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest" value="Metamyelocytes">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit" value="%" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="v13" tabindex="13">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="status">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="subtest" value="Micro Filaria">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="unit" value="%" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="normrang" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="v13" tabindex="13">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="status">
                                    </div>
                                </div>
                                <h3>PERIPHERAL BLOOD SMEAR</h3>
                                <hr>
                                <div class="form-group row mt-3">
                                    <div class="col-md-10">
                                        <label for="">RCB</label>
                                        <select name="" id="">
                                            <option selected disabled>select</option>
                                            <?php
                                                $sql = "select type, admname from stoolpara where admname = 'RCB'";
                                                $res = sqlsrv_query($conn, $sql);
                                                while ($rows = sqlsrv_fetch_assoc($res, )) {
                                                    
                                                }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-10">
                                        <label for="">WCB</label>
                                        <input class="form-control" type="text" name="subtest" value="Basophil"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-10">
                                        <label for="">PLATELET</label>
                                        <input class="form-control" type="text" name="subtest" value="Basophil"
                                            readonly>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <div class="col-md-12">
                                        <textarea name="" id="editor" rows="10" placeholder="Notes"
                                            name="notes"></textarea>
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
                        <li><a class="box-btn-close" href="#"></a></li>
                        <li><a class="box-btn-slide" href="#"></a></li>
                        <li><a class="box-btn-fullscreen" href="#"></a></li>
                    </ul>
                </div>

                <div class="box-body">
                    <!-- Main content -->
                    <section class="content">
                        <div class="box">
                            <div class="box-body">
                                <form action="#" class="dropzone">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])) {
    $sql = "INSERT INTO PathoReport (rno, pname, opid, servname, subtest, unit, normrang, inval, status, addedBy, notes, modality) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$rno, &$pname, &$opid, &$servname, &$subtest, &$unit, &$normrang, &$inval, &$status, &$login_username, &$notes, &$modality));

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

            if (!sqlsrv_execute($stmt)) {
                die("Statement execution failed: " . print_r(sqlsrv_errors(), true));
            } else {
                echo '<script>
                    swal("Success!", "", "success");
                    setTimeout(function(){
                        window.location.href = "BiochemistryPdf.php?rno=' . $rno . '&id=' . $id . '&modality=' . $modality . '";
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