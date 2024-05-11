-- Create the P2User table
CREATE TABLE IF NOT EXISTS P2User (
    Login VARCHAR(15) PRIMARY KEY,
    FirstName VARCHAR(25),
    LastName VARCHAR(60),
    Passwd VARCHAR(60),
    Email VARCHAR(40),
    NewsLetter VARCHAR(4)
);

-- Create the P2Shipping table
CREATE TABLE IF NOT EXISTS P2Shipping (
    ShippingID VARCHAR(30),
    Login VARCHAR(15),
    Name VARCHAR(50),
    Address VARCHAR(30),
    City VARCHAR(30),
    State VARCHAR(20),
    Zip VARCHAR(10),
    FOREIGN KEY (Login) REFERENCES P2User(Login)
);

-- Create the P2Billing table
CREATE TABLE IF NOT EXISTS P2Billing (
    BillingID VARCHAR(30),
    Login VARCHAR(15),
    BillName VARCHAR(50),
    BillAddress VARCHAR(30),
    BillCity VARCHAR(30),
    BillState VARCHAR(20),
    BillZip VARCHAR(10),
    CardType VARCHAR(16),
    CardNumber VARCHAR(16),
    ExpDate VARCHAR(5),
    FOREIGN KEY (Login) REFERENCES P2User(Login)
);
