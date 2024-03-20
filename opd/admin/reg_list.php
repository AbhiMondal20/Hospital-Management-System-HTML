<?php
include ('header.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h4 class="page-title">OPD Registration List</h4>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">OPD</li>
                                <li class="breadcrumb-item active" aria-current="page">Registration List</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
        <section class="content">
            <div class="row">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example"
                                class="table table-hover display nowrap margin-top-10 w-p100">
                                <thead>
                                    <tr>
                                        <th>Reg. No.</th>
                                        <th>Reg. Date Time.</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                        <th>F/H/S/D/W</th>
                                        <th>Ph. No</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Dist</th>
                                        <th>Fee</th>
                                        <th>User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT TOP 900 rno, rdate, rtime, CONCAT(rfname, ' ', COALESCE(rmname, ''), ' ', rlname) AS fullname, rsex, rage, fname, rrace, radd1, rcity, rdist, wamt, uname
                                    FROM registration 
                                    ORDER BY id DESC";
                                    $stmt = sqlsrv_query($conn, $sql);
                                    if ($stmt === false) {
                                        die (print_r(sqlsrv_errors(), true));
                                    }
                                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {

                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $row['rno']; ?>
                                            </td>
                                            <td>
                                            <?php echo $row['rdate']->format('Y-m-d'); ?>
                                            <?php echo $row['rtime']; ?>
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
                                                <?php echo $row['fname']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['rrace']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['radd1']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['rcity']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['rdist']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['wamt']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['uname']; ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.col -->
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
</div>

<?php
include ('footer.php');

?>