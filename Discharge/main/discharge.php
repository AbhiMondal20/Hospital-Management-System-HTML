<?php
    include('header.php');
?>
<div class="content-wrapper">
	  <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Discharge Form</h4>
                        </div>
                        <form class="form">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">FINAL DIAGNOSIS</label>
                                        <textarea  name="final_diagnosis" placeholder="FINAL DIAGNOSIS"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">REASON FOR ADMISSION</label>
                                            <textarea class="form-control" placeholder="REASON FOR ADMISSION" name="reason_for_admission" placeholder="REASON FOR ADMISSION"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">CHIEF COMPLAINTS</label>
                                            <textarea name="chief_complaints" class="form-control" placeholder="CHIEF COMPLAINTS"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">HISTORY OF PRESENT ILLNESS</label>
                                            <textarea class="form-control" placeholder="HISTORY OF PRESENT ILLNESS" name="history_of_present_illness"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">PERSONAL HISTORY</label>
                                    <textarea type="text" class="form-control" placeholder="PERSONAL HISTORY" name="personal_history"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">PAST H/O/SURGICAL HISTORY</label>
                                           <textarea name="past" placeholder="PAST H/O/SURGICAL HISTORY"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">ALLERGIES</label>
                                            <textarea name="allergies" placeholder="ALLERGIES"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">DATE OF PROCEDURE. / OPERATION</label>
                                    <label class="file">
                                        <textarea placeholder="DATE OF PROCEDURE. / OPERATION" name="date_of_procedure"></textarea>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">DETAILS OF PROCEDURE / OPERATION</label>
                                    <textarea name="details_of_operation" placeholder="DETAILS OF PROCEDURE / OPERATION"></textarea>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="button" class="btn btn-warning me-1">
                                    <i class="ti-trash"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="ti-save-alt"></i> Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
      </div>
</div>

<?php
    include('footer.php');
?>