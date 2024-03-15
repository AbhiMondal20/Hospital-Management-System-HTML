<?php
session_start();
include('header.php');

if (isset($_POST['save'])) {

    $date_of_procedure = $_POST['date_of_procedure'];
    $presenting_complaints = $_POST['presenting_complaints'];
    $final_diagnosis = $_POST['final_diagnosis'];
    $past_history = $_POST['past_history'];
    $phy_examination = $_POST['phy_examination'];
    $systemic_examin = $_POST['systemic_examin'];
    $summary_invest = $_POST['summary_invest'];
    $course_discussion = $_POST['course_discussion'];
    $condition_discharge = $_POST['condition_discharge'];
    $advice_on_discharge = $_POST['advice_on_discharge'];
    $summary_type = $_POST['summary_type'];


    $sql = "INSERT INTO discharge (final_diagnosis, reason_for_admission, chief_complaints, history_of_present_illness, personal_history, past, allergies, date_of_procedure, details_of_operation, ot_finding, general_examination, systemic_examination, course_during_hospital_stay, lab_report, condition_on_discharge, transfusions, discharge_advice, follow_on, when_how_to_obtain_urgent_care, medication_during_hospital_course)
        VALUES 
        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = sqlsrv_prepare(
        $conn,
        $sql,
        array(
            &
            $date_of_procedure,
            &
            $presenting_complaints,
            &
            $final_diagnosis,
            &
            $phy_examination,
            &
            $systemic_examin,
            &
            $summary_invest,
            &
            $course_discussion,
            &
            $condition_discharge,
            &
            $advice_on_discharge
        )
    );

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
                            <h4 class="box-title">Discharge Summary</h4>
                        </div>
                        <div class="box-body">
                            <div class="col-sm-12">
                                <table class="table border-no no-footer" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <!-- <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Patient ID: activate to sort column descending">Patient ID
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Date Check In: activate to sort column ascending">Date Check
                                                In</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Patient Name: activate to sort column ascending">Patient
                                                Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Doctor Assgined: activate to sort column ascending">Doctor
                                                Assgined</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Disease: activate to sort column ascending">
                                                Disease</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Status: activate to sort column ascending">
                                                Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Room No: activate to sort column ascending">Room
                                                No</th>
                                        </tr> -->
                                    </thead>
                                    <tbody>
                                        <tr class="hover-primary odd" role="row">
                                            <td class="sorting_1"> ADM REF: &nbsp; #p245879</td>
                                            <td> ADM. DATE : &nbsp;14 April 2021, 10:30 AM</td>
                                            <td>Name:&nbsp; Aaliyah clark</td>
                                            <td>Consultant: &nbsp;Dr. Johen Doe</td>
                                            <td>Age: &nbsp; 79 YEARS</td>
                                            <td>GENDER: &nbsp; F</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <form class="form" method="POST">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Discharge Type</label>
                                            <select class="form-control select2" tabindex="-1" aria-hidden="true">
                                                <option selected="selected">Select Discharge Type</option>
                                                <option value="CASE SUMMARY">CASE SUMMARY</option>
                                                <option value="DEATH SUMMARY">DEATH SUMMARY</option>
                                                <option value="DISCHARGE ON REQUEST">DISCHARGE ON REQUEST</option>
                                                <option value="DISCHARGE SUMMARY">DISCHARGE SUMMARY</option>
                                                <option value="GAMA SUMMARY">GAMA SUMMARY</option>
                                                <option value="LAMA SUMMARY">LAMA SUMMARY</option>
                                                <option value="LEFT AGAINEST MEDICAL ADVICE">LEFT AGAINEST MEDICAL ADVICE</option>
                                                <option value="SURGICAL DISCHARGE SUMMARY">SURGICAL DISCHARGE SUMMARY</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">DATE OF PROCEDURE. / OPERATION</label>
                                            <input type="date" class="form-control" placeholder="DATE OF PROCEDURE. / OPERATION" id="date1" name="date_of_procedure">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <label class="form-label">PRESENTING COMPLAINTS AT THE TIME OF ADMISSION WITH
                                            DURATION:- </label>
                                        <textarea name="presenting_complaints"
                                            placeholder="PRESENTING COMPLAINTS AT THE TIME OF ADMISSION WITH DURATION"
                                            required=""></textarea>
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <label class="form-label">FINAL DIAGNOSIS AT THE TIME OF DISCHARGE:-</label>
                                        <textarea name="final_diagnosis"
                                            placeholder="FINAL DIAGNOSIS AT THE TIME OF DISCHARGE:-"
                                            required=""></textarea>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <div class="form-group">
                                            <label class="form-label">PAST MEDICAL / SURGICAL HISTORY IF ANY:- </label>
                                            <textarea class="form-control"
                                                placeholder="PAST MEDICAL / SURGICAL HISTORY IF ANY:- "
                                                name="past_history" required=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-4">
                                        <div class="form-group">
                                            <label class="form-label">PHYSICAL EXAMINATION ON ADMISSION:-</label>
                                            <textarea name="phy_examination" class="form-control"
                                                placeholder="PHYSICAL EXAMINATION ON ADMISSION:-"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <div class="form-group">
                                            <label class="form-label">SYSTEMIC EXAMINATION </label>
                                            <textarea class="form-control" placeholder="SYSTEMIC EXAMINATION "
                                                name="systemic_examin"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <div class="form-group">
                                        <label class="form-label">SUMMARY OF INVESTIGATION:-</label>
                                        <textarea type="text" class="form-control"
                                            placeholder="SUMMARY OF INVESTIGATION:-"
                                            name="summary_invest">Enclosed</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-4">
                                        <div class="form-group">
                                            <label class="form-label">COURSE & DISCUSSION INCLUDING
                                                COMPLICATION:-</label>
                                            <textarea name="course_discussion"
                                                placeholder="COURSE & DISCUSSION INCLUDING COMPLICATION:-"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <div class="form-group">
                                            <label class="form-label">CONDITION ON DISCHARGE –</label>
                                            <textarea name="condition_discharge"
                                                placeholder="CONDITION ON DISCHARGE –"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-4">
                                        <div class="form-group">
                                            <label class="form-label">ADVICE ON DISCHARGE </label>
                                            <textarea name="advice_on_discharge"
                                                placeholder="ADVICE ON DISCHARGE "></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <center><input type="submit" class="btn btn-primary" value="Save" name="save"></center>
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