CREATE DATABASE IF NOT EXISTS student_records;
USE student_records;

CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    age INT,
    email VARCHAR(100)
);

INSERT INTO students (name, age, email) VALUES
('Angel Musomba', 20, 'angel@example.com'),
('Brian Kiggundu', 22, 'brian@example.com'),
('Cynthia Lee', 19, 'cynthia@example.com');
