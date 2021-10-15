CREATE TABLE students (
    id int AUTO_INCREMENT PRIMARY KEY,
    first_name varchar(255) NOT NULL,   
    middle_name varchar(255) NOT NULL,
    last_name varchar(255) NOT NULL,
    age int(100) NOT NULL,
    gender int(5) NOT NULL,
    contact_number varchar(255) NOT NULL,
    email_address varchar(255) NOT NULL,
    username varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    image_location varchar(255) NOT NULL
);