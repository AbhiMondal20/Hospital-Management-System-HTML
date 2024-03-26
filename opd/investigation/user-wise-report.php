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
                    <h4 class="page-title">User Wise Reports</h4>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">OPD</li>
                                <li class="breadcrumb-item active" aria-current="page">User Wise Reports</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <section class="content1">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form novalidate method="POST" action="">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Username <span class="text-danger">*</span></h5>
                                            <!-- <input type="text" name="username" placeholder="Reg. No" class="form-control"> -->
                                            <select class="form-select" name="username">
                                                <?php
                                                $sql = "SELECT dUSERNAME FROM dba";
                                                $res = sqlsrv_query($conn, $sql);
                                                if ($res === false) {
                                                    // Handle SQL error
                                                    die (print_r(sqlsrv_errors(), true));
                                                }
                                                while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
                                                    $username = $row['dUSERNAME'];
                                                    echo "<option value='$username'>$username</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Form Date <span class="text-danger">*</span></h5>
                                                <input type="date" name="form" placeholder="DD-MM-YYYY"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>To Date <span class="text-danger">*</span></h5>
                                                <input type="date" name="to" placeholder="DD-MM-YYYY"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="controls mt-4">
                                                <h5><span class="text-danger"></span></h5>
                                                <button type="submit" name="search"
                                                    class="btn btn-primary btn-md">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-hover display nowrap margin-top-10 w-p100">
                                <thead>
                                    <tr>
                                        <th>Reg. No.</th>
                                        <th>Reg. Date Time.</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                        <!-- <th>F/H/S/D/W</th> -->
                                        <th>Ph. No</th>
                                        <th>City</th>
                                        <th>Doctor</th>
                                        <th>Fee</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if (isset ($_POST['search'])) {
                                        $username = $_POST['username'];
                                        $to = $_POST['to'];
                                        $form = $_POST['form'];
                                        $sql = "SELECT MAX(b.servname) AS servname, MAX(b.billdate) AS billdate, MAX(b.billno) AS billno, MAX(b.pname) AS pname, MAX(b.id) AS id, MAX(b.rno) AS rno, MAX(r.rage) AS age, MAX(r.rsex) AS sex, MAX(bd.rdocname) AS docname, MAX(bd.uname) AS uname
                                        FROM billing AS b
                                        INNER JOIN registration AS r ON b.rno = r.rno
                                        INNER JOIN billingDetails AS bd ON r.rno = bd.rno
                                        WHERE b.billdate BETWEEN ? AND ?";
                                        if (!empty ($rno)) {
                                            $sql .= " OR b.uname = ?";
                                        }
                                        $sql .= " GROUP BY b.servname";
                                        $sql .= " ORDER BY MAX(b.id) DESC";
                                        if (!empty ($rno)) {
                                            $stmt = sqlsrv_query($conn, $sql, array(&$form, &$to, &$username));
                                        } else {
                                            $stmt = sqlsrv_query($conn, $sql, array(&$form, &$to));
                                        }
                                        if ($stmt === false) {
                                            die (print_r(sqlsrv_errors(), true));
                                        }
                                        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                            $rno = $row['rno'];
                                            $id = $row['id'];
                                            $billno = $row['billno'];
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $rno; ?>
                                                </td>
                                                <td>
                                                    <?php echo $billno; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['billdate']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['pname']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['age']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['sex']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['servname']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['docname']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['uname']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="heamatology-1?id=<?php echo $id ?>&rno=<?php echo $rno; ?>&billno=<?php echo $billno; ?>"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="fa fa-file-text"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
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