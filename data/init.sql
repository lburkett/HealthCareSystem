/**
 * Database creation script
 */
DROP TABLE IF EXISTS patient;
CREATE TABLE patient (
    id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    fname VARCHAR NOT NULL,
    lname VARCHAR NOT NULL,
    phone VARCHAR NOT NULL,
    filledOutBy VARCHAR NOT NULL,
    doctorRequested VARCHAR, 

    /* SYMPTOMS */
    pain INTEGER NOT NULL,
    nausea INTEGER NOT NULL,
    depression INTEGER NOT NULL,
    anxiety INTEGER NOT NULL,
    drowsiness INTEGER NOT NULL,
    average REAL NOT NULL,

    resolved INTEGER NOT NULL /* 0 - FALSE, 1 - TRUE */
);

DROP TABLE IF EXISTS doctor;
CREATE TABLE doctor (
    id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    fname VARCHAR NOT NULL,
    lname VARCHAR NOT NULL,
    email VARCHAR NOT NULL,
    password VARCHAR NOT NULL,
);