A simple login/signup application to test my skills.I used XAMPP for the server and database.

Script for the database table:
CREATE TABLE `simpledb`.`users` (`id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(25) NOT NULL , `email` VARCHAR(35) NOT NULL , `password` CHAR(255) NOT NULL , `reg_date` DATETIME on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`), UNIQUE (`username`, `email`)) ENGINE = InnoDB;

Links to the html and css files:
https://www.codingnepalweb.com/responsive-login-form-using-only-html-css/
https://www.codingnepalweb.com/registration-signup-form-template-html-css/
