CREATE TABLE admin
(
  admin_id INT NOT NULL AUTO_INCREMENT,
  username VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL,
  PRIMARY KEY (admin_id)
);

CREATE TABLE speciality
(
  spec_id INT NOT NULL AUTO_INCREMENT,
  spec_name VARCHAR(100) NOT NULL,
  created_at timestamp NOT NULL DEFAULT current_timestamp(),
  updated_at datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (spec_id)
);

CREATE TABLE patient
(
  lastname VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  patient_id INT NOT NULL AUTO_INCREMENT,
  firstname VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL,
  YOB DATE NOT NULL,
  updated_at datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  active int(2) NOT NULL DEFAULT 1,
  created_at timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (patient_id)
);

CREATE TABLE timeslot
(
  name VARCHAR(100) NOT NULL,
  slot_id INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (slot_id)
);

CREATE TABLE doctor
(
  doctor_id INT NOT NULL AUTO_INCREMENT,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL,
  firstname VARCHAR(100) NOT NULL,
  lastname VARCHAR(100) NOT NULL,
  active int(2) NOT NULL DEFAULT 1,
  created_at timestamp NOT NULL DEFAULT current_timestamp(),
  updated_at datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  spec_id INT NOT NULL,
  PRIMARY KEY (doctor_id),
  FOREIGN KEY (spec_id) REFERENCES speciality(spec_id)
);

CREATE TABLE appointment
(
  booking_id INT NOT NULL AUTO_INCREMENT,
  status INT(2) NOT NULL DEFAULT 1,
  patient_id INT NOT NULL,
  doctor_id INT NOT NULL,
  slot_id INT NOT NULL,
  PRIMARY KEY(booking_id),
  FOREIGN KEY (patient_id) REFERENCES patient(patient_id),
  FOREIGN KEY (doctor_id) REFERENCES doctor(doctor_id),
  FOREIGN KEY (slot_id) REFERENCES timeslot(slot_id)
);

CREATE TABLE allocate
(
  id INT NOT NULL AUTO_INCREMENT,
  doctor_id INT NOT NULL,
  slot_id INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (doctor_id) REFERENCES doctor(doctor_id),
  FOREIGN KEY (slot_id) REFERENCES timeslot(slot_id),
  UNIQUE (doctor_id, slot_id)
);