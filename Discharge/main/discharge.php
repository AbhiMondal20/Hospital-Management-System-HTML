<?php
    session_start();
    include ('../db_conn.php'); 
    include ('header.php');

    if(isset($_POST['save'])){

        $final_diagnosis = $_POST['final_diagnosis'];
        $reason_for_admission = $_POST['reason_for_admission'];
        $chief_complaints = $_POST['chief_complaints'];
        $history_of_present_illness = $_POST['history_of_present_illness'];
        $personal_history = $_POST['personal_history'];
        $past = $_POST['past'];
        $allergies = $_POST['allergies'];
        $date_of_procedure = $_POST['date_of_procedure'];
        $details_of_operation = $_POST['details_of_operation'];
        $ot_finding = $_POST['ot_finding'];
        $general_examination = $_POST['general_examination'];
        $systemic_examination = $_POST['systemic_examination'];
        $course_during_hospital_stay = $_POST['course_during_hospital_stay'];
        $lab_report = $_POST['lab_report'];
        $condition_on_discharge = $_POST['condition_on_discharge'];
        $transfusions = $_POST['transfusions'];
        $discharge_advice = $_POST['discharge_advice'];
        $follow_on = $_POST['follow_on'];
        $when_how_to_obtain_urgent_care = $_POST['when_how_to_obtain_urgent_care'];
        $medication_during_hospital_course = $_POST['medication_during_hospital_course'];
    
        // Construct SQL query
        $sql ="INSERT INTO discharge (final_diagnosis, reason_for_admission, chief_complaints, history_of_present_illness, personal_history, past, allergies, date_of_procedure, details_of_operation, ot_finding, general_examination, systemic_examination, course_during_hospital_stay, lab_report, condition_on_discharge, transfusions, discharge_advice, follow_on, when_how_to_obtain_urgent_care, medication_during_hospital_course)
        VALUES 
        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        // Prepare the SQL statement
        $stmt = sqlsrv_prepare($conn, $sql, array(
            &$final_diagnosis,
            &$reason_for_admission,
            &$chief_complaints,
            &$history_of_present_illness,
            &$personal_history,
            &$past,
            &$allergies,
            &$date_of_procedure,
            &$details_of_operation,
            &$ot_finding,
            &$general_examination,
            &$systemic_examination,
            &$course_during_hospital_stay,
            &$lab_report,
            &$condition_on_discharge,
            &$transfusions,
            &$discharge_advice,
            &$follow_on,
            &$when_how_to_obtain_urgent_care,
            &$medication_during_hospital_course
        ));
    
        $res = sqlsrv_execute($stmt);
    
        if ($res === false) {
            echo "Error inserting data: " . print_r(sqlsrv_errors(), true);
        } else {
            echo "<script>alert('Data inserted successfully')</script>";
        }
    
        // Free statement resources
        sqlsrv_free_stmt($stmt);
    }    
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
                        <form class="form" method="POST">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">FINAL DIAGNOSIS</label>
                                        <textarea name="final_diagnosis" placeholder="FINAL DIAGNOSIS"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">REASON FOR ADMISSION</label>
                                            <textarea class="form-control" placeholder="REASON FOR ADMISSION" name="reason_for_admission"
                                                placeholder="REASON FOR ADMISSION"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">CHIEF COMPLAINTS</label>
                                            <textarea name="chief_complaints" class="form-control"
                                                placeholder="CHIEF COMPLAINTS"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">HISTORY OF PRESENT ILLNESS</label>
                                            <textarea class="form-control" placeholder="HISTORY OF PRESENT ILLNESS"
                                                name="history_of_present_illness"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">PERSONAL HISTORY</label>
                                    <textarea type="text" class="form-control" placeholder="PERSONAL HISTORY"
                                        name="personal_history"></textarea>
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">DATE OF PROCEDURE. / OPERATION</label>
                                            <input type="date" placeholder="DATE OF PROCEDURE. / OPERATION" name="date_of_procedure">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">DETAILS OF PROCEDURE / OPERATION</label>
                                            <textarea name="details_of_operation"
                                                placeholder="DETAILS OF PROCEDURE / OPERATION"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">OT FINDING</label>
                                            <textarea placeholder="OT FINDING" name="ot_finding"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">GENERAL EXAMINATION / VITAL SIGNS</label>
                                            <textarea name="general_examination"
                                                placeholder="GENERAL EXAMINATION / VITAL SIGNS"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">SYSTEMIC EXAMINATION</label>
                                            <textarea placeholder="SYSTEMIC EXAMINATION"
                                                name="systemic_examination"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">COURSE DURING HOSPITAL STAY</label>
                                            <textarea name="coourse_during_hospital_stay"
                                                placeholder="COURSE DURING HOSPITAL STAY"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">LAB REPORT</label>
                                            <textarea placeholder="LAB REPORT" name="lab_report"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">RADIOLOGY INVESTIGATION</label>
                                            <textarea name="radiology_investigation"
                                                placeholder="RADIOLOGY INVESTIGATION"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">CONDITION ON DISCHARGE</label>
                                            <textarea placeholder="CONDITION ON DISCHARGE"
                                                name="condition_on_discharge"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">TRANSFUSIONS</label>
                                            <textarea name="transfusions" placeholder="TRANSFUSIONS"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">DISCHARGE ADVICE</label>
                                            <textarea placeholder="DISCHARGE ADVICE" name="discharge_advice"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">FOLLOW ON</label>
                                            <textarea name="follow_on" placeholder="FOLLOW ON"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">WHEN AND HOW TO OBTAIN URGENT CARE</label>
                                            <textarea placeholder="WHEN AND HOW TO OBTAIN URGENT CARE"
                                                name="when_how_to_obtain_urgent_care"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Medication During Hospital Course</label>
                                            <textarea name="medication_during_hospital_course" placeholder="Medication During Hospital Course"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary" value="Save" name="save">
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