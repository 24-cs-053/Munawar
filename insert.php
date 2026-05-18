<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "munawar";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $form_type = $_POST['form_type'];
        $success = false;
        $error = "";

        if ($form_type == "patient_opd") {
            $patient_name = $conn->real_escape_string($_POST['patient_name']);
            $age = $conn->real_escape_string($_POST['age']);
            $gender = $conn->real_escape_string($_POST['gender']);
            $disease = $conn->real_escape_string($_POST['disease']);
            $symptoms = $conn->real_escape_string($_POST['symptoms']);
            $contact = $conn->real_escape_string($_POST['contact']);
            $email = $conn->real_escape_string($_POST['email']);
            $form_name = "Patient OPD";

            $sql = "INSERT INTO patients (patient_name, age, gender, disease, symptoms, contact, email, form_type) 
                    VALUES ('$patient_name', '$age', '$gender', '$disease', '$symptoms', '$contact', '$email', 'patient_opd')";
            $success = $conn->query($sql);
        } else if ($form_type == "doctor") {
            $doctor_name = $conn->real_escape_string($_POST['doctor_name']);
            $specialization = $conn->real_escape_string($_POST['specialization']);
            $experience = $conn->real_escape_string($_POST['experience']);
            $doc_contact = $conn->real_escape_string($_POST['doc_contact']);
            $doc_email = $conn->real_escape_string($_POST['doc_email']);
            $form_name = "Doctor";

            $sql = "INSERT INTO patients (patient_name, disease, symptoms, contact, email, form_type) 
                    VALUES ('$doctor_name', '$specialization', '$experience', '$doc_contact', '$doc_email', 'doctor')";
            $success = $conn->query($sql);
        } else if ($form_type == "appointment") {
            $app_patient = $conn->real_escape_string($_POST['app_patient']);
            $app_doctor = $conn->real_escape_string($_POST['app_doctor']);
            $app_date = $conn->real_escape_string($_POST['app_date']);
            $app_time = $conn->real_escape_string($_POST['app_time']);
            $visit_reason = $conn->real_escape_string($_POST['visit_reason']);
            $form_name = "Appointment";

            $sql = "INSERT INTO patients (patient_name, disease, symptoms, contact, email, form_type) 
                    VALUES ('$app_patient', 'Appointment with $app_doctor', '$visit_reason', '$app_date', '$app_time', 'appointment')";
            $success = $conn->query($sql);
        } else if ($form_type == "medicine") {
            $med_patient = $conn->real_escape_string($_POST['med_patient']);
            $med_doctor = $conn->real_escape_string($_POST['med_doctor']);
            $medicine_name = $conn->real_escape_string($_POST['medicine_name']);
            $dosage = $conn->real_escape_string($_POST['dosage']);
            $frequency = $conn->real_escape_string($_POST['frequency']);
            $duration = $conn->real_escape_string($_POST['duration']);
            $form_name = "Medicine";

            $sql = "INSERT INTO patients (patient_name, disease, symptoms, contact, email, form_type) 
                    VALUES ('$med_patient', '$medicine_name', '$dosage - $frequency - $duration days', '$med_doctor', 'medicine', 'medicine')";
            $success = $conn->query($sql);
        } else if ($form_type == "lab_test") {
            $lab_patient = $conn->real_escape_string($_POST['lab_patient']);
            $test_type = $conn->real_escape_string($_POST['test_type']);
            $test_date = $conn->real_escape_string($_POST['test_date']);
            $lab_doctor = $conn->real_escape_string($_POST['lab_doctor']);
            $form_name = "Lab Test";

            $sql = "INSERT INTO patients (patient_name, disease, symptoms, contact, email, form_type) 
                    VALUES ('$lab_patient', '$test_type', '$test_date', '$lab_doctor', 'lab_test', 'lab_test')";
            $success = $conn->query($sql);
        } else if ($form_type == "discharge") {
            $dis_patient = $conn->real_escape_string($_POST['dis_patient']);
            $admission_date = $conn->real_escape_string($_POST['admission_date']);
            $discharge_date = $conn->real_escape_string($_POST['discharge_date']);
            $diagnosis = $conn->real_escape_string($_POST['diagnosis']);
            $follow_up = $conn->real_escape_string($_POST['follow_up']);
            $form_name = "Discharge";

            $sql = "INSERT INTO patients (patient_name, disease, symptoms, contact, email, form_type) 
                    VALUES ('$dis_patient', '$diagnosis', '$follow_up', '$discharge_date', '$admission_date', 'discharge')";
            $success = $conn->query($sql);
        } else if ($form_type == "leave") {
            $leave_doctor = $conn->real_escape_string($_POST['leave_doctor']);
            $leave_from = $conn->real_escape_string($_POST['leave_from']);
            $leave_to = $conn->real_escape_string($_POST['leave_to']);
            $leave_reason = $conn->real_escape_string($_POST['leave_reason']);
            $form_name = "Leave";

            $sql = "INSERT INTO patients (patient_name, disease, symptoms, contact, email, form_type) 
                    VALUES ('$leave_doctor', '$leave_reason', '$leave_from to $leave_to', 'leave', 'request', 'leave')";
            $success = $conn->query($sql);
        } else if ($form_type == "room") {
            $room_patient = $conn->real_escape_string($_POST['room_patient']);
            $room_type = $conn->real_escape_string($_POST['room_type']);
            $room_number = $conn->real_escape_string($_POST['room_number']);
            $checkin_date = $conn->real_escape_string($_POST['checkin_date']);
            $checkout_date = $conn->real_escape_string($_POST['checkout_date']);
            $form_name = "Room";

            $sql = "INSERT INTO patients (patient_name, disease, symptoms, contact, email, form_type) 
                    VALUES ('$room_patient', 'Room $room_number', '$room_type', '$checkin_date', '$checkout_date', 'room')";
            $success = $conn->query($sql);
        } else if ($form_type == "billing") {
            $bill_patient = $conn->real_escape_string($_POST['bill_patient']);
            $treatment_cost = $conn->real_escape_string($_POST['treatment_cost']);
            $medicine_cost = $conn->real_escape_string($_POST['medicine_cost']);
            $room_cost = $conn->real_escape_string($_POST['room_cost']);
            $other_charges = $conn->real_escape_string($_POST['other_charges']);
            $payment_status = $conn->real_escape_string($_POST['payment_status']);
            $total = $treatment_cost + $medicine_cost + $room_cost + $other_charges;
            $form_name = "Billing";

            $sql = "INSERT INTO patients (patient_name, disease, symptoms, contact, email, form_type) 
                    VALUES ('$bill_patient', 'Total: $total', '$payment_status', 'billing', '', 'billing')";
            $success = $conn->query($sql);
        } else if ($form_type == "history") {
            $hist_patient = $conn->real_escape_string($_POST['hist_patient']);
            $prev_diseases = $conn->real_escape_string($_POST['prev_diseases']);
            $allergies = $conn->real_escape_string($_POST['allergies']);
            $current_meds = $conn->real_escape_string($_POST['current_meds']);
            $family_history = $conn->real_escape_string($_POST['family_history']);
            $form_name = "Medical History";

            $sql = "INSERT INTO patients (patient_name, disease, symptoms, contact, email, form_type) 
                    VALUES ('$hist_patient', '$prev_diseases', '$allergies - $current_meds - $family_history', 'history', '', 'history')";
            $success = $conn->query($sql);
        }

        if ($success) {
            $message = "$form_name registered successfully!";
        } else {
            $message = "Error: " . $conn->error;
        }
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status - Hospital Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="navbar">
            <h1 class="logo">MUNAWAR</h1>
        </div>

        <div class="message-container">
            <?php if (isset($success) && $success): ?>
                <div class="success-message">
                    <span class="message-icon">✓</span>
                    <h2>Success!</h2>
                    <p><?php echo $message; ?></p>
                    <div class="message-actions">
                        <a href="register.html" class="btn btn-primary">Register Another</a>
                        <a href="display.php" class="btn btn-secondary">View All</a>
                        <a href="home.html" class="btn btn-secondary">Back Home</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="error-message">
                    <span class="message-icon">✗</span>
                    <h2>Error!</h2>
                    <p><?php echo isset($message) ? $message : 'An error occurred'; ?></p>
                    <div class="message-actions">
                        <a href="register.html" class="btn btn-primary">Try Again</a>
                        <a href="home.html" class="btn btn-secondary">Back Home</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <footer>
            <p>&copy; 2026 Hospital Management System. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>