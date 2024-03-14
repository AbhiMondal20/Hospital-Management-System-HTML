select * from discharge
SELECT * FROM [dbo].[dba] WHERE dUSERNAME = 'Administrator' AND dPASSWORD = 'Para@012'
DROP TABLE discharge;

CREATE TABLE discharge (
    id INT PRIMARY KEY IDENTITY(1,1),
    final_diagnosis NVARCHAR(MAX),
    reason_for_admission NVARCHAR(MAX),
    chief_complaints NVARCHAR(MAX),
    history_of_present_illness NVARCHAR(MAX),
    personal_history NVARCHAR(MAX),
    past NVARCHAR(MAX),
    allergies NVARCHAR(MAX),
    date_of_procedure DATE,
    details_of_operation NVARCHAR(MAX),
    ot_finding NVARCHAR(MAX),
    general_examination NVARCHAR(MAX),
    systemic_examination NVARCHAR(MAX),
    course_during_hospital_stay NVARCHAR(MAX),
    lab_report NVARCHAR(MAX),
    condition_on_discharge NVARCHAR(MAX),
    transfusions NVARCHAR(MAX),
    discharge_advice NVARCHAR(MAX),
    follow_on NVARCHAR(MAX),
    when_how_to_obtain_urgent_care NVARCHAR(MAX),
    medication_during_hospital_course NVARCHAR(MAX)
);


INSERT INTO discharge (final_diagnosis, reason_for_admission, chief_complaints, history_of_present_illness, personal_history, past, allergies, date_of_procedure, details_of_operation, ot_finding, general_examination, systemic_examination, course_during_hospital_stay, lab_report, condition_on_discharge, transfusions, discharge_advice, follow_on, when_how_to_obtain_urgent_care, medication_during_hospital_course)
VALUES 
('Heart Disease', 'Chest pain', 'Shortness of breath', 'Patient presented with chest pain and shortness of breath.', 'No significant personal history', 'No significant past medical history', 'None', '2024-03-13', 'Coronary artery bypass grafting', 'Normal', 'Normal', 'Normal', 'Stable during hospital stay', 'Normal', 'Discharged in stable condition', 'None', 'Take rest and follow up with cardiologist', 'Follow up after 1 week', 'In case of emergency, visit the nearest ER', 'Aspirin, Clopidogrel');

INSERT INTO discharge (final_diagnosis, reason_for_admission, chief_complaints, history_of_present_illness, personal_history, past, allergies, date_of_procedure, details_of_operation, ot_finding, general_examination, systemic_examination, course_during_hospital_stay, lab_report, condition_on_discharge, transfusions, discharge_advice, follow_on, when_how_to_obtain_urgent_care, medication_during_hospital_course)
VALUES 
('Pneumonia', 'Fever and cough', 'Fever, Cough', 'Patient presented with fever and cough.', 'No significant personal history', 'No significant past medical history', 'Penicillin allergy', '2024-03-12', 'Bronchoscopy', 'Infection in right lung', 'Elevated temperature', 'Normal', 'Improved with antibiotics', 'Positive for bacterial infection', 'Discharged after improvement', 'None', 'Complete the course of antibiotics', 'Follow up after 2 weeks', 'In case of worsening symptoms, contact doctor', 'Antibiotics, Paracetamol');
