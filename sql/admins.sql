CREATE TABLE admins (
    id int AUTO_INCREMENT PRIMARY KEY,
    username varchar(255) NOT NULL, 
    password varchar(255) NOT NULL,
    type int(10) NOT NULL
);

INSERT INTO admins (username, password, type) VALUES ('root', '$2y$10$.qslK2Jg5eU9AG71zqemuOkcQr0Cj/jJm0NRxP2B3vV5a83PDbl4K', 1);