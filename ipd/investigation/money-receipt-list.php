<?php
session_start();
if (isset ($_SESSION['login']) && $_SESSION['login'] == true) {
    $login_username = $_SESSION['username'];
} else {
    echo "<script>location.href='../../login';</script>";
}
include ('header.php');
?>
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h4 class="page-title">Money</h4>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Money</li>
                                <li class="breadcrumb-item active" aria-current="page">Money Receipt</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <section class="content">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example" class="table nowrap margin-top-10 w-p100">
                            <thead>
                                <tr>
                                    <th>Bill. No.</th>
                                    <th>Reg. No.</th>
                                    <th>Bill Date</th>
                                    <th>Name</th>
                                    <th>Total Amt.</th>
                                    <th>Disc.</th>
                                    <th>Paid Amt.</th>
                                    <th>Bill Amt.</th>
                                    <th>Ref. Doc</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 $sql = "SELECT TOP 500 bd.rstatus AS rstatus, 
                                 bd.pname AS pname,
                                 bd.id AS id,
                                 bd.rno AS rno,
                                 bd.billno AS billno,
                                 bd.rdocname AS rdocname,
                                 bd.billdate AS billdate, 
                                 bd.totalPrice AS totalPrice, 
                                 bd.totalAdj AS totalAdj, 
                                 bd.gst AS gst, 
                                 bd.billAmount AS billAmount, 
                                 bd.paidAmount AS paidAmount, 
                                 bd.balance AS balance, 
                                 bd.status AS status
                                 FROM billingDetails AS bd
                                 WHERE bd.rstatus = 'OPD'";
                                 $stmt = sqlsrv_query($conn, $sql);
                                 if ($stmt === false) {
                                     die (print_r(sqlsrv_errors(), true));
                                 }
                                 while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                     $id = $row['id'];
                                     $rno = $row['rno'];
                                     $billno = $row['billno'];
                                     $rstatus = $row['rstatus'];
                                     $pname = $row['pname'];
                                     $billdate = $row['billdate'];
                                     $totalPrice = $row['totalPrice'];
                                     $rdocname = $row['rdocname'];
                                     $totalAdj = $row['totalAdj'];
                                     $gst = $row['gst'];
                                     $billAmount = $row['billAmount'];
                                     $paidAmount = $row['paidAmount'];
                                     $balance = $row['balance'];
                                     $status = $row['status'];
                                 ?>
                                    <tr>
                                        
                                        <td>
                                            <?php
                                            echo "<a href='money-receipt-pdf?id=$id&rno=$rno'>$billno</a>";
                                            ?>
                                        </td>
                                        <td>
                                            <a href="money-receipt-pdf?id=<?php echo $id; ?>&rno=<?php echo $rno; ?>">
                                                <?php echo $rno; ?>
                                            </a>
                                        </td>
                                        <td>
                                            <?php echo $billdate; ?>
                                        </td>
                                        <td>
                                            <?php echo $pname; ?>
                                        </td>
                                        <td>
                                            <?php echo $totalPrice; ?>
                                        </td>
                                        <td>
                                            <?php echo $totalAdj; ?>
                                        </td>
                                        <td>
                                            <?php echo $paidAmount; ?>
                                        </td>
                                        <td>
                                            <?php echo $billAmount; ?>
                                        </td>
                                        <td>
                                            <?php echo $rdocname; ?>
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
        </section>
    </div>
</div>


<?php
include ('footer.php');
?>