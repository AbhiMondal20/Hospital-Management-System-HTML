<?php
include ('header.php');
$regno = $_GET['regno'];
$refno = $_GET['refno'];

$sql = "SELECT regno, pname, plname, page, psex, refno, pdate, pcons, padd FROM AdmitCard2324 
INNER JOIN discharge ON AdmitCard2324.regno = discharge.regno
WHERE regno = '$regno' OR refno = '$refno'";
$stmt = sqlsrv_query($conn, $sql);
if ($stmt === false) {
    die (print_r(sqlsrv_errors(), true));
}
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $regno = $row['regno'];
    $refno = $row['refno'];
    $pname = $row['pname'];
    $plname = $row['plname'];
    $age = $row['page'];
    $gender = $row['psex'];
    // $pdate = $row['pdate']; 
    $pdate = $row['pdate']->format('Y-m-d');
    $con_doc = $row['pcons'];
    $padd = $row['padd'];
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h4 class="page-title">Discharge</h4>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Discharge</li>
                                <li class="breadcrumb-item active" aria-current="page">Discharge <?php echo $dis_type; ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <!-- Main content -->
        <section class="invoice printableArea">
            <div class="row">
                <div class="col-12">
                    <div class="bb-1 clearFix">
                        <div class="text-end pb-15">
                            <button class="btn btn-success" type="button"> <span><i class="fa fa-print"></i> Save</span>
                            </button>
                            <button id="print2" class="btn btn-warning" type="button"> <span><i class="fa fa-print"></i>
                                    Print</span> </button>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="page-header">
                        <h2 class="d-inline"><span class="fs-30">Invoice Sample</span></h2>
                        <div class="pull-right text-end">
                            <h3>22 April 2018</h3>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <div class="row invoice-info">
                <div class="col-md-6 invoice-col">
                    <strong>From</strong>
                    <address>
                        <strong class="text-blue fs-24">Rhythm Admin</strong><br>
                        <strong class="d-inline">124 Lorem Ipsum, Suite 478, Dummuy, USA 123456</strong><br>
                        <strong>Phone: (00) 123-456-7890 &nbsp;&nbsp;&nbsp;&nbsp; Email: info@example.com</strong>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-md-6 invoice-col text-end">
                    <strong>To</strong>
                    <address>
                        <strong class="text-blue fs-24">Doe Shina</strong><br>
                        124 Lorem Ipsum, Suite 478, Dummuy, USA 123456<br>
                        <strong>Phone: (00) 789-456-1230 &nbsp;&nbsp;&nbsp;&nbsp; Email: conatct@example.com</strong>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-12 invoice-col mb-15">
                    <div class="invoice-details row no-margin">
                        <div class="col-md-6 col-lg-3"><b>Invoice </b>#0154879</div>
                        <div class="col-md-6 col-lg-3"><b>Order ID:</b> FC12548</div>
                        <div class="col-md-6 col-lg-3"><b>Payment Due:</b> 14/08/2018</div>
                        <div class="col-md-6 col-lg-3"><b>Account:</b> 00215487541296</div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Description</th>
                                <th>Serial #</th>
                                <th class="text-end">Quantity</th>
                                <th class="text-end">Unit Cost</th>
                                <th class="text-end">Subtotal</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Milk Powder</td>
                                <td>12345678912514</td>
                                <td class="text-end">2</td>
                                <td class="text-end">$26.00</td>
                                <td class="text-end">$52.00</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Air Conditioner</td>
                                <td>12345678912514</td>
                                <td class="text-end">1</td>
                                <td class="text-end">$1500.00</td>
                                <td class="text-end">$1500.00</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>TV</td>
                                <td>12345678912514</td>
                                <td class="text-end">2</td>
                                <td class="text-end">$540.00</td>
                                <td class="text-end">$1080.00</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Mobile</td>
                                <td>12345678912514</td>
                                <td class="text-end">3</td>
                                <td class="text-end">$320.00</td>
                                <td class="text-end">$960.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="col-12 text-end">
                    <p class="lead"><b>Payment Due</b><span class="text-danger"> 14/08/2018 </span></p>
                    <div>
                        <p>Sub - Total amount : $3,592.00</p>
                        <p>Tax (18%) : $646.56</p>
                        <p>Shipping : $110.44</p>
                    </div>
                    <div class="total-payment">
                        <h3><b>Total :</b> $4,349.00</h3>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <div class="row no-print">
                <div class="col-12">
                    <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit
                        Payment
                    </button>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>
<?php
include ('footer.php');
?>