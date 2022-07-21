USE nzxt_db;


CREATE TABLE IF NOT EXISTS role(
    id INT AUTO_INCREMENT,
    name VARCHAR(255),
    PRIMARY KEY(id)
);


CREATE TABLE IF NOT EXISTS user(
    id INT AUTO_INCREMENT,
    username VARCHAR(255) UNIQUE NOT NULL ,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role_id INT DEFAULT 1,
    date_joined DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    CONSTRAINT fk_role_id FOREIGN KEY (role_id)
    REFERENCES role(id)
);

CREATE TABLE IF NOT EXISTS profile(
    user_id INT,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    gender ENUM('Male', 'Female', 'Others'),
    birth_date DATETIME NOT NULL,
    PRIMARY KEY (user_id),
    CONSTRAINT fk_user_id FOREIGN KEY (user_id)
    REFERENCES user(id)

);


INSERT INTO 
    role(name)
VALUES
    ('admin'),
    ('client');

INSERT INTO 
    user(username, email, password, role_id)
VALUES
    ('username123', 'username@gmail.com', '12345678', 2);