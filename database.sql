CREATE DATABASE IF NOT EXISTS munawar;
USE munawar;

CREATE TABLE IF NOT EXISTS patients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_name VARCHAR(100) NOT NULL,
    age INT,
    gender VARCHAR(20),
    disease VARCHAR(255),
    symptoms TEXT,
    contact VARCHAR(20),
    email VARCHAR(100),
    form_type VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);