-- TA BORT DATABAS --
DROP DATABASE IF EXISTS a17marng_utvit;


-- SKAPA DATABAS --
CREATE DATABASE a17marng_utvit;


-- ANVÄND DATABAS --
USE a17marng_utvit;


CREATE TABLE patient(
	Pnr CHAR(11),
    ErpID VARCHAR(50), 
    Fornamn VARCHAR(30),
    Efternamn VARCHAR(30), 
    Postadress VARCHAR(30),
    Postnr CHAR(5),
    Ort VARCHAR(30),
    TeleNr VARCHAR(15),
    Epost VARCHAR(30),
    Nr VARCHAR(20),
    Primary key(Pnr)
)ENGINE=innodb;

CREATE TABLE mote(
	Patient VARCHAR(61),
    Vardgivare VARCHAR(30),
    Datum CHAR(10),
    Tid CHAR(5),
    Primary key(Patient)
)ENGINE =innodb;


insert into patient(Pnr, ErpID, Fornamn, Efternamn, Postadress, Postnr, Ort, TeleNr, Epost, Nr) values ('970118-2261', 'Arne Bengtsson',"Arne","Bengtsson","Jungfrugatan 1B","54168","Skövde","0500-456897","a17marng@student.his.se","HLC-PMR-2020-00001");
insert into patient(Pnr, ErpID, Fornamn, Efternamn, Postadress, Postnr, Ort, TeleNr, Epost) values ('970118-2262', 'Arne Bengtsson - 1',"Arne","Bengtsson","Akaciastigen 1","54186","Skövde","0762567891","a17marng@student.his.se");
insert into patient(Pnr, ErpID, Fornamn, Efternamn, Postadress, Postnr, Ort, TeleNr, Epost) values ('970118-2264', 'Elajsa Lif',"Elajsa","Lif","Käpplunda gränd 1","54134","Skövde","0500954544","a17marng@student.his.se","HLC-PMR-2020-00001");


SELECT * FROM patient;
