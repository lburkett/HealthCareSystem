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
    drosiness INTEGER NOT NULL,
    average INTEGER NOT NULL, /* should be a double equivalent */

    resolved BOOLEAN NOT NULL,
);
