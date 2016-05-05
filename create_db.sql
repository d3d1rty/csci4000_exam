/* creates database */
DROP DATABASE IF EXISTS richard_davis_exam_db;
CREATE DATABASE richard_davis_exam_db;
USE richard_davis_exam_db;

/* creates table with fields */
CREATE TABLE coordinate3d (
  number      INT(11)       NOT NULL   AUTO_INCREMENT,
  x           DECIMAL(10,2)  NOT NULL,
  y           DECIMAL(10,2)  NOT NULL,
  z           DECIMAL(10,2)  NOT NULL,
  PRIMARY KEY (number)
);

/* creates user with privileges and credentials */
GRANT SELECT, INSERT, UPDATE, DELETE
ON richard_davis_exam_db.*
TO richardfinal@localhost
IDENTIFIED BY 'richardbread'
