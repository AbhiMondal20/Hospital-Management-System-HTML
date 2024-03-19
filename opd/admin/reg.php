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
                    <h4 class="page-title">Registration</h4>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">OPD</li>
                                <li class="breadcrumb-item active" aria-current="page">Registration</li>
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
                            <form novalidate>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Reg. No. <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="text" placeholder="237495" class="form-control" required name="regno"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5> <span class="text-danger">*</span></h5>
                                                <input type="text" name="text" class="form-control" placeholder="2024-2025" required
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Reg. Date <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="text" class="form-control" required name="pdate"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Salutation <span class="text-danger">*</span></h5>
                                            <select class="form-select">
                                                <option>Mr.</option>
                                                <option>Miss.</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>First Name <span class="text-danger">*</span></h5>

                                                <input type="text" name="text" class="form-control" required name="pname"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Middle Name <span class="text-danger">*</span></h5>

                                                <input type="text" name="text" class="form-control" required name="pmname"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Last Name <span class="text-danger">*</span></h5>

                                                <input type="text" name="text" class="form-control" required name="plname"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Gender <span class="text-danger">*</span></h5>
                                            <select class="form-select">
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Age (Years) <span class="text-danger">*</span></h5>

                                                <input type="text" name="text" class="form-control" required name="page"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Month </h5>

                                                <input type="text" name="text" class="form-control"  name="month"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Days </h5>

                                                <input type="text" name="text" class="form-control"  name="days"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>F/H/S/D/W <span class="text-danger">*</span></h5>

                                                <input type="text" name="text" class="form-control" required name="plname"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Address <span class="text-danger">*</span></h5>

                                                <input type="text" name="text" class="form-control" required name="pgadd"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Address <span class="text-danger">*</span></h5>
                                                <input type="text" name="text" class="form-control" required name="plname"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>City <span class="text-danger">*</span></h5>
                                            <select class="form-select">
                                                <option>Siliguri</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Dist <span class="text-danger">*</span></h5>
                                            <select class="form-select">
                                                <option>Darjeeling</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>State <span class="text-danger">*</span></h5>
                                            <select class="form-select">
                                                <option>West Bengal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Country <span class="text-danger">*</span></h5>
                                            <select class="form-select">
                                                <option>India</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Ph. No. <span class="text-danger">*</span></h5>
                                                <input type="text" name="text" class="form-control" required name="plname"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Ref. Doctor <span class="text-danger">*</span></h5>
                                                <input type="text" name="text" class="form-control" required name="plname"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Fee <span class="text-danger">*</span></h5>
                                                <input type="text" name="text" class="form-control" required name="plname"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    
                            </div>
                        </div>
                        <center>

                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-info" name="save">SAVE</button>
                            </div>
                        </center>
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

<?php
include ('footer.php');

?>