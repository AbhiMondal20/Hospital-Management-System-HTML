select * from dba;
select * from discharge
SELECT * FROM [dbo].[dba] WHERE dUSERNAME = 'Administrator' AND dPASSWORD = 'Para@012'
DROP TABLE discharge;

Select * FROM registration where rno = '237495'
Select * FROM citymaster
Select * FROM deptmaster
Select * FROM docmaster
Select * FROM titlemaster

select * from ba4 WHERE refno = 3844
Select * FROM AdmitCardCan2324 where regno = '237495'
Select * FROM InOpd2324
select * from AdmitCard2324 WHERE regno = '237245'
SELECT * FROM AdmitCard2324 WHERE regno IN (SELECT MAX(regno) FROM AdmitCard2324 GROUP BY regno);


CREATE TABLE discharge (
    id INT PRIMARY KEY IDENTITY(1,1),
    regno NVARCHAR(MAX),
    refno NVARCHAR(MAX),
    pname NVARCHAR(MAX),
	dis_type NVARCHAR(MAX),
    discharge_date NVARCHAR(MAX),
	presenting_complaints NVARCHAR(MAX),
    final_diagnosis NVARCHAR(MAX),
	past_history NVARCHAR(MAX),
    phy_examination NVARCHAR(MAX),
    systemic_examin NVARCHAR(MAX),
    summary_invest NVARCHAR(MAX),
    course_discussion NVARCHAR(MAX),
    condition_discharge NVARCHAR(MAX),
    advice_on_discharge NVARCHAR(MAX),
    username NVARCHAR(MAX),
	CurrentDate DATETIME DEFAULT GETDATE()
);


INSERT INTO discharge (final_diagnosis, reason_for_admission, chief_complaints, history_of_present_illness, personal_history, past, allergies, date_of_procedure, details_of_operation, ot_finding, general_examination, systemic_examination, course_during_hospital_stay, lab_report, condition_on_discharge, transfusions, discharge_advice, follow_on, when_how_to_obtain_urgent_care, medication_during_hospital_course)
VALUES 
('Heart Disease', 'Chest pain', 'Shortness of breath', 'Patient presented with chest pain and shortness of breath.', 'No significant personal history', 'No significant past medical history', 'None', '2024-03-13', 'Coronary artery bypass grafting', 'Normal', 'Normal', 'Normal', 'Stable during hospital stay', 'Normal', 'Discharged in stable condition', 'None', 'Take rest and follow up with cardiologist', 'Follow up after 1 week', 'In case of emergency, visit the nearest ER', 'Aspirin, Clopidogrel');

INSERT INTO discharge (final_diagnosis, reason_for_admission, chief_complaints, history_of_present_illness, personal_history, past, allergies, date_of_procedure, details_of_operation, ot_finding, general_examination, systemic_examination, course_during_hospital_stay, lab_report, condition_on_discharge, transfusions, discharge_advice, follow_on, when_how_to_obtain_urgent_care, medication_during_hospital_course)
VALUES 
('Pneumonia', 'Fever and cough', 'Fever, Cough', 'Patient presented with fever and cough.', 'No significant personal history', 'No significant past medical history', 'Penicillin allergy', '2024-03-12', 'Bronchoscopy', 'Infection in right lung', 'Elevated temperature', 'Normal', 'Improved with antibiotics', 'Positive for bacterial infection', 'Discharged after improvement', 'None', 'Complete the course of antibiotics', 'Follow up after 2 weeks', 'In case of worsening symptoms, contact doctor', 'Antibiotics, Paracetamol');
