CREATE TABLE Slider 
(
ID int,
Caption TEXT,
Title varchar(255),
Photo varchar(255)
);

CREATE TABLE Post 
(
ID int NOT NULL AUTO_INCREMENT,
Title varchar(255),
PostDate DATE,
Content TEXT,
PRIMARY KEY (ID)
);

CREATE TABLE Program
(
ID int NOT NULL AUTO_INCREMENT,
Title varchar(255),
Description TEXT,
PRIMARY KEY (ID)
);

CREATE TABLE Contact
(
AreaCode varchar(4),
Phone varchar(10),
Extension varchar(10),
Email varchar(255),
Address varchar(255),
City varchar(255),
Province varchar(255),
PostalCode varchar(255)
);