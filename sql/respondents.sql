CREATE TABLE respondents (
    id int AUTO_INCREMENT PRIMARY KEY,
    survey_id int NOT NULL,
    name varchar(255) NOT NULL,
    course_year varchar(255) NOT NULL,  
    school_year_id varchar(255) NOT NULL
);