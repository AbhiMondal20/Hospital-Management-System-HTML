<?php
include('header.php');
?>
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Patient List</h3>
                            <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                            <!-- table-bordered  table-hover -->
                                <table id="example" class="table display nowrap margin-top-10 w-p100">
                                    <thead>
                                        <tr>
                                            <th>P. Code</th>
                                            <th>ADM. REF.</th>
                                            <th>ADM. DATE</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Age</th>
                                            <th>Consultant</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM ua4";
                                            $stmt = sqlsrv_query($conn, $sql);
                                            if ($stmt === false) {
                                                die(print_r(sqlsrv_errors(), true));
                                            }
                                            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                                $p_code = $row['CODE'];
                                                $name = $row['NAME'];
                                                $age = $row['AGE'];
                                                $gender = $row['SEX'];
                                                $refno = $row['refno'];
                                                $adm_date = $row['DATE1'];
                                                $con_doc = $row['doc'];
                                                $con_doc = $row['doc'];

                                            
                                        ?>
                                        <tr>
                                            <a href="#">
                                                <td><?php echo $p_code; ?></td>
                                                <td><?php echo $refno; ?></td>
                                                <td><?php echo $adm_date ?></td>
                                                <td><?php echo $name ?></td>
                                                <td><?php echo $gender ?></td>
                                                <td><?php echo $age ?></td>
                                                <td><?php echo $con_doc ?></td>
                                                <td><?php echo $p_code ?></td>
                                            </a>
                                        </tr>
                                        <?php  }
                                            sqlsrv_free_stmt($stmt);
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php
include('footer.php');
?>