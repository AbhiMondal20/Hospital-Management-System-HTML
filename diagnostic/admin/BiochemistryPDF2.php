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
                    <h4 class="page-title">Biochemistry</h4>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Biochemistry</li>
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
                    <div class="page-header">
                        <center>
                            <h2 class="d-inline"><span class="fs-30">REPORT ON CLINICAL BIOCHEMISTRY</span></h2>
                        </center>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <?php
                $rno1 = isset($_GET['rno']) ? $_GET['rno'] : '';
                $modality = isset($_GET['modality']) ? $_GET['modality'] : '';
                $subgroup = isset($_GET['subgroup']) ? $_GET['subgroup'] : '';

                if (!empty($rno1)) {
                    $sql1 = "SELECT  CONCAT(rfname, ' ', COALESCE(rmname, ''), ' ', rlname) AS fullname , rdocname, rage, rsex from registration WHERE rno = ?";
                    $params1 = array($rno1);
                    $stmt1 = sqlsrv_query($conn, $sql1, $params1);

                    if ($stmt1 === false) {
                        die(print_r(sqlsrv_errors(), true));
                    }

                    if ($row = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC)) {
                        $pname = $row['fullname'];
                        $rdocname = $row['rdocname'];
                        $gender = $row['rsex'];
                        $age = $row['rage'];
                    } else {
                        echo "No data found for the provided rno and billno.";
                    }

                    sqlsrv_free_stmt($stmt1);
                }
                ?>

            <div class="row invoice-info">
                <div class="col-md-6 invoice-col">
                    <!-- <strong>From</strong> -->
                    <address>
                        <strong class="text-blue fs-16">Regd No :
                            <?php echo $rno1; ?>
                        </strong><br>
                        <strong class="text-blue fs-16">Name of Patient :
                            <?php echo $pname; ?>, Age :
                            <?php echo $age; ?>Y,
                            Gender : <?php echo $gender; ?>
                            
                        </strong><br>
                        <strong class="d-inline">Dr. :
                            <?php echo $rdocname; ?>
                        </strong><br>
                    </address>
                </div>
                <!-- /.col -->
                <!-- <div class="col-md-6 invoice-col text-end">
                    <address>
                        Date :
                    </address>
                </div> -->
            </div>
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Name of Test</th>
                               
                                <th>Result</th>
                                <th class="text-end">Unit</th>
                                <th class="text-end">Normal Reference</th>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <strong class="d-inline">
                                        <?php echo $subgroup; ?>
                                    </strong>
                                </td>
                            </tr>
                            <?php
                          $sql = "SELECT rno, servname, subtest, normrang, inval, unit, status FROM PathoReport WHERE rno = ? AND modality = ? AND subgroup = ?";                   
                          $params = array($rno1, $modality, $subgroup);
                          $stmt = sqlsrv_query($conn, $sql, $params);
                          $sno = 0;
                          if ($stmt === false) {
                              die(print_r(sqlsrv_errors(), true));
                          }
                          
                          while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                              $sno = $sno + 1;
                              $servname = $row['servname'];
                              $subtest = $row['subtest'];
                              $unit = $row['unit'];
                              $normrang = $row['normrang'];
                              $inval = $row['inval'];
                              $status = $row['status'];
                          ?>
                          
                          <tr>
                              <td>
                                  <?php echo $subtest; ?>
                              </td>
                              <td>: &nbsp;
                                
                              <?php 
                              if($status == 'High'){
                                echo "<strong>".$inval."*</strong>";
                              }else{
                                echo $inval; 
                              }
                                                           
                              
                              ?></td>
                              <td class="text-end"><?php echo $unit; ?></td>
                              <td class="text-end"><?php echo $normrang; ?></td>
                          </tr>
                          <?php } ?>
                          
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
        </section>
        <div class="col-12">
            <div class="bb-1 clearFix">
                <div class="text-center pb-15">
                    <button id="print2" class="btn btn-primary btn-lg" type="button"> <span><i class="fa fa-print"></i>
                            Print</span> </button>
                </div>
            </div>
        </div>

        <!-- /.content -->
    </div>
</div>
<?php
include ('footer.php');
?>