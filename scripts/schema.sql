CREATE DATABASE IF NOT EXISTS hotelx;

USE hotelx;

CREATE TABLE Price
(
  Room_Type INT NOT NULL,
  Room_Info VARCHAR(30) NOT NULL,
  Room_Rate INT NOT NULL,
  PRIMARY KEY (Room_Type)
);


CREATE TABLE Guest
(
  Guest_ID INT NOT NULL AUTO_INCREMENT,
  Photo VARCHAR(300) NULL,
  Lname VARCHAR(30) NOT NULL,
  Fname VARCHAR(30) NOT NULL,
  Phone_Number VARCHAR(15) NULL,
  Address VARCHAR(300) NULL,
  Email VARCHAR(100) NULL,
  ID_Info VARCHAR(30) NULL,
  Vehicle VARCHAR(100) NULL,
  License_Plate VARCHAR(30) NULL,
  PRIMARY KEY (Guest_ID)
);

CREATE TABLE Booking
(
  BookingID INT NOT NULL AUTO_INCREMENT,
  Guest_ID INT NOT NULL,
  Date_Made DATE NOT NULL,
  Website_Reservation INT NOT NULL,
  PRIMARY KEY (BookingID),
  FOREIGN KEY (Guest_ID) REFERENCES Guest(Guest_ID)
);

CREATE TABLE Record_Status
(
  Record_Status_Code INT NOT NULL,
  Record_Status_Info VARCHAR(30) NOT NULL,
  PRIMARY KEY (Record_Status_Code)
);

CREATE TABLE Housekeeping_Equip_Status
(
  Equip_Status_ID INT NOT NULL,
  Equip_Status_Info VARCHAR(30) NOT NULL,
  PRIMARY KEY (Equip_Status_ID)
);

CREATE TABLE Room_Status
(
  Room_Status_ID INT NOT NULL,
  Room_Status_Info VARCHAR(30) NOT NULL,
  PRIMARY KEY (Room_Status_ID)
);

CREATE TABLE Housekeeper
(
  HID INT NOT NULL AUTO_INCREMENT,
  Name VARCHAR(30) NOT NULL,
  PRIMARY KEY (HID)
);

CREATE TABLE Room
(
  Room_Number INT NOT NULL,
  Room_Type INT NOT NULL,
  Room_Status_ID INT NOT NULL,
  PRIMARY KEY (Room_Number),
  FOREIGN KEY (Room_Type) REFERENCES Price(Room_Type),
  FOREIGN KEY (Room_Status_ID) REFERENCES Room_Status(Room_Status_ID)
);

CREATE TABLE Invoice
(
  Invoice_ID INT NOT NULL AUTO_INCREMENT,
  Date_Checked_In DATETIME NOT NULL,
  Date_Checkout DATETIME NOT NULL,
  Payment_Made INT NOT NULL,
  Total_Charge INT NOT NULL,
  Completed INT NOT NULL,
  Guest_ID INT NOT NULL,
  Booking_ID INT NOT NULL,      
  PRIMARY KEY (Invoice_ID),
  FOREIGN KEY (Guest_ID) REFERENCES Guest(Guest_ID),
  FOREIGN KEY (Booking_ID) REFERENCES Booking(BookingID)
);



CREATE TABLE Record
(
  Date DATE NOT NULL,
  Room_Number INT NOT NULL,
  BookingID INT NOT NULL,
  Record_Status_Code INT NOT NULL,
  PRIMARY KEY (Date, Room_Number),
  FOREIGN KEY (Room_Number) REFERENCES Room(Room_Number),
  FOREIGN KEY (BookingID) REFERENCES Booking(BookingID),
  FOREIGN KEY (Record_Status_Code) REFERENCES Record_Status(Record_Status_Code)
);

CREATE TABLE Housekeeping
(
  Bathroom INT NOT NULL,
  Towels INT NOT NULL,
  Bed_Sheets INT NOT NULL,
  Vacuum INT NOT NULL,
  Dusting INT NOT NULL,
  Electronics INT NOT NULL,
  Room_Number INT NOT NULL,
  HID INT NOT NULL,
  PRIMARY KEY (Room_Number),
  FOREIGN KEY (Room_Number) REFERENCES Room(Room_Number),
  FOREIGN KEY (HID) REFERENCES Housekeeper(HID)
);


CREATE TABLE Invoice_Rooms
(
  Invoice_ID INT NOT NULL,
  Room_Number INT NOT NULL,
  PRIMARY KEY (Invoice_ID, Room_Number),
  FOREIGN KEY (Invoice_ID) REFERENCES Invoice(Invoice_ID),
  FOREIGN KEY (Room_Number) REFERENCES Room(Room_Number)
);


INSERT INTO `Housekeeper` (`HID`, `Name`) VALUES 
(NULL, 'Olivia'),
(NULL, 'Alex'),
(NULL, 'Peter'),
(NULL, 'Emma'),
(NULL, 'Mia');

INSERT INTO `Record_Status` (`Record_Status_Code`, `Record_Status_Info`) VALUES
(0, 'Reserved'),
(1, 'Checked In'),
(2, 'Checkout');

INSERT INTO `Price` (`Room_Type`, `Room_Info`, `Room_Rate`) VALUES
(0, 'King (K)', 200),
(1, 'Double Queen (DQ)', 400),
(2, 'Double Queen with Kitchen (DQK', 600),
(3, 'Suite (S)', 800);

INSERT INTO `Housekeeping_Equip_Status` (`Equip_Status_ID`, `Equip_Status_Info`) VALUES
(0, 'Uncheck (Not Clean)'),
(1, 'Checked (Cleaned)'),
(2, 'Checked (Bad, Replacing)');

INSERT INTO `Room_Status` (`Room_Status_ID`, `Room_Status_Info`) VALUES
(0, 'Available'),
(1, 'Occupied'),
(2, 'Maintenance'),
(3, 'Dirty');


INSERT INTO `Room` (`Room_Number`, `Room_Type`, `Room_Status_ID`) VALUES
(101, 0, 0),
(102, 1, 0),
(103, 2, 0),
(104, 3, 0),
(105, 3, 0),
(201, 0, 0),
(202, 1, 0),
(203, 2, 0),
(204, 1, 0),
(205, 3, 0),
(301, 0, 0),
(302, 1, 0),
(303, 2, 0),
(304, 2, 0),
(305, 3, 0),
(401, 0, 0),
(402, 1, 0),
(403, 2, 0),
(404, 0, 0),
(405, 3, 0),
(501, 0, 0),
(502, 1, 0),
(503, 2, 0),
(504, 3, 0),
(505, 0, 0);

INSERT INTO `Housekeeping` (`Room_Number`, `Bathroom`, `Towels`, `Bed_Sheets`, `Vacuum`, `Dusting`, `Electronics`, `HID`) VALUES 
('101', '1', '1', '1', '1', '1', '1','1'),
('102', '1', '1', '1', '1', '1', '1','1'),
('103', '1', '1', '1', '1', '1', '1','1'),
('104', '1', '1', '1', '1', '1', '1','1'),
('105', '1', '1', '1', '1', '1', '1','1'),
('201', '1', '1', '1', '1', '1', '1','2'),
('202', '1', '1', '1', '1', '1', '1','2'),
('203', '1', '1', '1', '1', '1', '1','2'),
('204', '1', '1', '1', '1', '1', '1','2'),
('205', '1', '1', '1', '1', '1', '1','2'),
('301', '1', '1', '1', '1', '1', '1','3'),
('302', '1', '1', '1', '1', '1', '1','3'),
('303', '1', '1', '1', '1', '1', '1','3'),
('304', '1', '1', '1', '1', '1', '1','3'),
('305', '1', '1', '1', '1', '1', '1','3'),
('401', '1', '1', '1', '1', '1', '1','4'),
('402', '1', '1', '1', '1', '1', '1','4'),
('403', '1', '1', '1', '1', '1', '1','4'),
('404', '1', '1', '1', '1', '1', '1','4'),
('405', '1', '1', '1', '1', '1', '1','4'),
('501', '1', '1', '1', '1', '1', '1','5'),
('502', '1', '1', '1', '1', '1', '1','5'),
('503', '1', '1', '1', '1', '1', '1','5'),
('504', '1', '1', '1', '1', '1', '1','5'),
('505', '1', '1', '1', '1', '1', '1','5');

INSERT INTO `Guest` (`Guest_ID`, `Photo`, `Lname`, `Fname`, `Phone_Number`, `Address`, `Email`, `ID_Info`, `Vehicle`, `License_Plate`) VALUES 
(NULL, 'https://cdn.bleacherreport.net/images_root/slides/photos/000/948/623/633879_original.jpg', 'Suker', 'Davor ', '1234567890', '12345 Coast Dr, Long Beach, CA 12345', '123456789@gmail.com', '123456789', 'CA D12456789', '7C12345'),
(NULL, 'https://cdn.bleacherreport.net/images_root/slides/photos/000/968/560/56594393_original.jpg', 'Kluivert', 'Patrick', '1234567890', '12345 Coast Dr, Long Beach, CA 12345', '123456789@gmail.com', '123456789', 'CA D12456789', '7C12345'),
(NULL, 'https://cdn.bleacherreport.net/images_root/slides/photos/000/948/627/56716733_original.jpg', 'Conti', 'Bruno', '1234567890', '12345 Coast Dr, Long Beach, CA 12345', '123456789@gmail.com', '123456789', 'CA D12456789', '7C12345'),
(NULL, 'https://cdn.bleacherreport.net/images_root/slides/photos/000/968/554/hector-pedro-scarone_original.jpg', 'Scarone', 'Hector', '1234567890', '12345 Coast Dr, Long Beach, CA 12345', '123456789@gmail.com', '123456789', 'CA D12456789', '7C12345'),
(NULL, 'https://cdn.bleacherreport.net/images_root/slides/photos/000/948/664/682652_original.jpg', 'Batistuta', 'Gabriel', '1234567890', '12345 Coast Dr, Long Beach, CA 12345', '123456789@gmail.com', '123456789', 'CA D12456789', '7C12345'),
(NULL, 'https://cdn.bleacherreport.net/images_root/slides/photos/000/948/634/1032056_original.jpg', 'Taffarel', 'Claudio', '1234567890', '12345 Coast Dr, Long Beach, CA 12345', '123456789@gmail.com', '123456789', 'CA D12456789', '7C12345'),
(NULL, 'https://cdn.bleacherreport.net/images_root/slides/photos/000/948/639/1110911_original.jpg', 'Gascoigne', 'Paul', '1234567890', '12345 Coast Dr, Long Beach, CA 12345', '123456789@gmail.com', '123456789', 'CA D12456789', '7C12345'),
(NULL, 'https://cdn.bleacherreport.net/images_root/slides/photos/000/948/641/84964499_original.jpg', 'Nedved', 'Pavel', '1234567890', '12345 Coast Dr, Long Beach, CA 12345', '123456789@gmail.com', '123456789', 'CA D12456789', '7C12345'),
(NULL, 'https://cdn.bleacherreport.net/images_root/slides/photos/000/948/637/57077387_original.jpg', 'Costa', 'Rui', '1234567890', '12345 Coast Dr, Long Beach, CA 12345', '123456789@gmail.com', '123456789', 'CA D12456789', '7C12345'),
(NULL, 'https://cdn.bleacherreport.net/images_root/slides/photos/000/948/625/79592554_original.jpg', 'Gullit', 'Ruud', '1234567890', '12345 Coast Dr, Long Beach, CA 12345', '123456789@gmail.com', '123456789', 'CA D12456789', '7C12345');

INSERT INTO `Booking` (`BookingID`, `Guest_ID`, `Date_Made`, `Website_Reservation`) VALUES 
(NULL, '1', '2020-11-10', '1'),
(NULL, '2', '2020-11-10', '1'),
(NULL, '3', '2020-11-10', '1'),
(NULL, '4', '2020-11-10', '1'),
(NULL, '5', '2020-11-10', '1'),
(NULL, '6', '2020-11-10', '1'),
(NULL, '7', '2020-11-11', '1'),
(NULL, '8', '2020-11-11', '1'),
(NULL, '9', '2020-11-11', '1'),
(NULL, '10', '2020-11-11', '1'),
(NULL, '7', '2020-11-12', '1');

INSERT INTO `Record` (`Date`, `Room_Number`, `BookingID`, `Record_Status_Code`) VALUES 
('2020-12-23', '101', '1', '0'),
('2020-12-24', '101', '1', '0'),
('2020-12-25', '101', '1', '0'),
('2020-12-20', '201', '2', '0'),
('2020-12-21', '201', '2', '0'),
('2020-12-22', '201', '2', '0'),
('2020-11-15', '301', '5', '2'),
('2020-11-16', '301', '5', '2'),
('2020-11-17', '301', '5', '2'),
('2020-11-14', '302', '6', '2'),
('2020-11-15', '302', '6', '2'),
('2020-11-11', '501', '7', '2'),
('2020-11-12', '501', '7', '2'),
('2020-11-13', '501', '7', '2'),
('2020-11-09', '502', '8', '2'),
('2020-11-10', '502', '8', '2'),
('2020-12-26', '404', '9', '0'),
('2020-12-24', '505', '10', '0'),
('2020-12-25', '505', '10', '0'),
('2020-11-17', '102', '3', '1'),
('2020-11-18', '102', '3', '1'),
('2020-11-19', '102', '3', '1'),
('2020-11-20', '102', '3', '1'),
('2020-11-21', '102', '3', '1'),
('2020-11-22', '102', '3', '1'),
('2020-11-23', '102', '3', '1'),
('2020-11-24', '102', '3', '1'),
('2020-11-25', '102', '3', '1'),
('2020-11-26', '102', '3', '1'),
('2020-11-27', '102', '3', '1'),
('2020-11-28', '102', '3', '1'),
('2020-11-29', '102', '3', '1'),
('2020-11-30', '102', '3', '1'),
('2020-12-01', '102', '3', '1'),
('2020-12-02', '102', '3', '1'),
('2020-12-03', '102', '3', '1'),
('2020-12-04', '102', '3', '1'),
('2020-12-05', '102', '3', '1'),
('2020-12-06', '102', '3', '1'),
('2020-12-07', '102', '3', '1'),
('2020-12-08', '102', '3', '1'),
('2020-12-09', '102', '3', '1'),
('2020-12-10', '102', '3', '1'),
('2020-12-11', '102', '3', '1'),
('2020-12-12', '102', '3', '1'),
('2020-12-13', '102', '3', '1'),
('2020-12-14', '102', '3', '1'),
('2020-12-15', '102', '3', '1'),
('2020-12-16', '102', '3', '1'),
('2020-12-17', '102', '3', '1'),
('2020-12-18', '102', '3', '1'),
('2020-12-19', '102', '3', '1'),
('2020-12-20', '102', '3', '1'),
('2020-12-21', '102', '3', '1'),
('2020-12-22', '102', '3', '1'),
('2020-12-23', '102', '3', '1'),
('2020-12-24', '102', '3', '1'),
('2020-12-25', '102', '3', '1'),
('2020-11-18', '202', '4', '1'),
('2020-11-19', '202', '4', '1'),
('2020-11-20', '202', '4', '1'),
('2020-11-21', '202', '4', '1'),
('2020-11-22', '202', '4', '1'),
('2020-11-23', '202', '4', '1'),
('2020-11-24', '202', '4', '1'),
('2020-11-25', '202', '4', '1'),
('2020-11-26', '202', '4', '1'),
('2020-11-27', '202', '4', '1'),
('2020-11-28', '202', '4', '1'),
('2020-11-29', '202', '4', '1'),
('2020-11-30', '202', '4', '1'),
('2020-12-01', '202', '4', '1'),
('2020-12-02', '202', '4', '1'),
('2020-12-03', '202', '4', '1'),
('2020-12-04', '202', '4', '1'),
('2020-12-05', '202', '4', '1'),
('2020-12-06', '202', '4', '1'),
('2020-12-07', '202', '4', '1'),
('2020-12-08', '202', '4', '1'),
('2020-12-09', '202', '4', '1'),
('2020-12-10', '202', '4', '1'),
('2020-12-11', '202', '4', '1'),
('2020-12-12', '202', '4', '1'),
('2020-12-13', '202', '4', '1'),
('2020-12-14', '202', '4', '1'),
('2020-12-15', '202', '4', '1'),
('2020-12-16', '202', '4', '1'),
('2020-12-17', '202', '4', '1'),
('2020-12-18', '202', '4', '1'),
('2020-12-19', '202', '4', '1'),
('2020-12-20', '202', '4', '1'),
('2020-12-21', '202', '4', '1'),
('2020-12-22', '202', '4', '1'),
('2020-12-23', '202', '4', '1');

INSERT INTO `Invoice` (`Invoice_ID`, `Date_Checked_In`, `Date_Checkout`, `Payment_Made`, `Total_Charge`, `Completed`, `Guest_ID`, `Booking_ID`) VALUES 
(NULL, '2020-11-15 14:02:29', '2020-11-18 09:54:29', '600', '600', '1', '5', '5'),
(NULL, '2020-11-14 14:02:29', '2020-11-16 09:54:29', '800', '800', '1', '6', '6'),
(NULL, '2020-11-11 14:02:29', '2020-11-14 09:54:29', '600', '600', '1', '7', '7'),
(NULL, '2020-11-09 14:02:29', '2020-11-11 09:54:29', '800', '800', '1', '8', '8'),
(NULL, '2020-11-17 14:02:29', '2020-12-26 09:54:29', '11000', '15600', '0', '3', '3'),
(NULL, '2020-11-18 14:02:29', '2020-12-24 09:54:29', '10000', '14400', '0', '4', '4'),
(NULL, '2020-11-17 14:02:29', '2020-12-25 09:54:29', '7000', '76000', '0', '9', '11');



INSERT INTO `Invoice_Rooms` (`Invoice_ID`, `Room_Number`) VALUES 
('1', '301'), 
('2', '302'),
('3', '501'), 
('4', '502'),
('5', '102'), 
('6', '202');

UPDATE `Housekeeping` SET `Bathroom` = '0', `Towels` = '0', `Bed_Sheets` = '0', `Vacuum` = '0', `Dusting` = '0', `Electronics` = '0' WHERE `Housekeeping`.`Room_Number` = 102; UPDATE `Housekeeping` SET `Bathroom` = '0', `Towels` = '0', `Bed_Sheets` = '0', `Vacuum` = '0', `Dusting` = '0', `Electronics` = '0' WHERE `Housekeeping`.`Room_Number` = 202;

UPDATE `Room` SET `Room_Status_ID` = '1' WHERE `Room`.`Room_Number` = 102; UPDATE `Room` SET `Room_Status_ID` = '1' WHERE `Room`.`Room_Number` = 202;


INSERT INTO `Record` (`Date`, `Room_Number`, `BookingID`, `Record_Status_Code`) VALUES 
('2020-11-17', '501', '11', '1'),
('2020-11-18', '501', '11', '1'),
('2020-11-19', '501', '11', '1'),
('2020-11-20', '501', '11', '1'),
('2020-11-21', '501', '11', '1'),
('2020-11-22', '501', '11', '1'),
('2020-11-23', '501', '11', '1'),
('2020-11-24', '501', '11', '1'),
('2020-11-25', '501', '11', '1'),
('2020-11-26', '501', '11', '1'),
('2020-11-27', '501', '11', '1'),
('2020-11-28', '501', '11', '1'),
('2020-11-29', '501', '11', '1'),
('2020-11-30', '501', '11', '1'),
('2020-12-01', '501', '11', '1'),
('2020-12-02', '501', '11', '1'),
('2020-12-03', '501', '11', '1'),
('2020-12-04', '501', '11', '1'),
('2020-12-05', '501', '11', '1'),
('2020-12-06', '501', '11', '1'),
('2020-12-07', '501', '11', '1'),
('2020-12-08', '501', '11', '1'),
('2020-12-09', '501', '11', '1'),
('2020-12-10', '501', '11', '1'),
('2020-12-11', '501', '11', '1'),
('2020-12-12', '501', '11', '1'),
('2020-12-13', '501', '11', '1'),
('2020-12-14', '501', '11', '1'),
('2020-12-15', '501', '11', '1'),
('2020-12-16', '501', '11', '1'),
('2020-12-17', '501', '11', '1'),
('2020-12-18', '501', '11', '1'),
('2020-12-19', '501', '11', '1'),
('2020-12-20', '501', '11', '1'),
('2020-12-21', '501', '11', '1'),
('2020-12-22', '501', '11', '1'),
('2020-12-23', '501', '11', '1'),
('2020-12-24', '501', '11', '1');


UPDATE `Room` SET `Room_Status_ID` = '1' WHERE `Room`.`Room_Number` = 501;

UPDATE `Housekeeping` SET `Bathroom` = '0', `Towels` = '0', `Bed_Sheets` = '0', `Vacuum` = '0', `Dusting` = '0', `Electronics` = '0' WHERE `Housekeeping`.`Room_Number` = 501;

UPDATE `Room` SET `Room_Status_ID` = '3' WHERE `Room`.`Room_Number` = 301; 
UPDATE `Room` SET `Room_Status_ID` = '3' WHERE `Room`.`Room_Number` = 404; 
UPDATE `Room` SET `Room_Status_ID` = '2' WHERE `Room`.`Room_Number` = 204; 
UPDATE `Room` SET `Room_Status_ID` = '2' WHERE `Room`.`Room_Number` = 401; 

UPDATE `Guest` SET `Phone_Number` = '7143456789', `Address` = '6789 Hollywood Blvd, Los Angeles, CA 12345', `Email` = 'paul123456789@gmail.com', `ID_Info` = '888123456' WHERE `Guest`.`Guest_ID` = 7;


UPDATE `Housekeeping` SET `Bathroom` = '0', `Towels` = '0', `Bed_Sheets` = '0', `Vacuum` = '0', `Dusting` = '0', `Electronics` = '0' WHERE `Housekeeping`.`Room_Number` = 404;
UPDATE `Housekeeping` SET `Bathroom` = '0', `Towels` = '0', `Bed_Sheets` = '0', `Vacuum` = '0', `Dusting` = '0', `Electronics` = '0' WHERE `Housekeeping`.`Room_Number` = 301;
