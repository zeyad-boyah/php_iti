CREATE TABLE users_iti( user_id INT NOT NULL AUTO_INCREMENT,
user_name VARCHAR(20) NOT NULL,
user_email  VARCHAR(50) NOT NULL,
user_gender ENUM("male", "female") NOT NULL,
mail_status BOOLEAN NOT NULL DEFAULT TRUE,
primary key ( user_id ))