CREATE TABLE patient
(
  l_name VARCHAR(100) NOT NULL,
  email VARCHAR(75) NOT NULL,
  f_name VARCHAR(100) NOT NULL,
  age INT NOT NULL,
  password VARCHAR(50) NOT NULL,
  PRIMARY KEY (email)
);

CREATE TABLE available_time
(
  time_id INT NOT NULL,
  start_time DATE NOT NULL,
  date DATE NOT NULL,
  end_time DATE NOT NULL,
  PRIMARY KEY (time_id)
);

CREATE TABLE speciality
(
  spec_id INT NOT NULL,
  spec_name VARCHAR(100) NOT NULL,
  PRIMARY KEY (spec_id)
);

CREATE TABLE admin
(
  admin_id INT NOT NULL,
  username VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL,
  PRIMARY KEY (admin_id)
);

CREATE TABLE doctor
(
  doctor_id INT NOT NULL,
  f_name VARCHAR(100) NOT NULL,
  l_name VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL,
  spec_id INT NOT NULL,
  PRIMARY KEY (doctor_id),
  FOREIGN KEY (spec_id) REFERENCES speciality(spec_id)
);

CREATE TABLE appointment
(
  appointment_id INT NOT NULL,
  status INT NOT NULL,
  appointment_date DATE NOT NULL,
  start_time DATE NOT NULL,
  end_time DATE NOT NULL,
  doctor_id INT NOT NULL,
  email VARCHAR(75) NOT NULL,
  PRIMARY KEY (appointment_id),
  FOREIGN KEY (doctor_id) REFERENCES doctor(doctor_id),
  FOREIGN KEY (email) REFERENCES patient(email)
);

CREATE TABLE available
(
  #id INT NOT NULL,
  doctor_id INT NOT NULL,
  time_id INT NOT NULL,
  PRIMARY KEY (#id),
  FOREIGN KEY (doctor_id) REFERENCES doctor(doctor_id),
  FOREIGN KEY (time_id) REFERENCES available_time(time_id),
  UNIQUE (doctor_id, time_id)
);