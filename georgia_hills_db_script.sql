
-- Step 1: Create Database
CREATE DATABASE GeorgiaHillsDB;
GO

-- Step 2: Use the database
USE GeorgiaHillsDB;
GO

-- Step 3: Create Users Table
CREATE TABLE users (
    id INT PRIMARY KEY IDENTITY(1,1),
    username NVARCHAR(50) NOT NULL,
    email NVARCHAR(100) NOT NULL UNIQUE,
    password NVARCHAR(255) NOT NULL
);
GO

-- Step 4: Create Uploads Table
CREATE TABLE uploads (
    id INT PRIMARY KEY IDENTITY(1,1),
    user_id INT NOT NULL,
    filename NVARCHAR(255) NOT NULL,
    uploaded_at DATETIME DEFAULT GETDATE(),
    FOREIGN KEY (user_id) REFERENCES users(id)
);
GO

-- Step 5: Create SQL Login and User
CREATE LOGIN phpuser WITH PASSWORD = 'Jojododo102009!';
GO

USE GeorgiaHillsDB;
GO

CREATE USER phpuser FOR LOGIN phpuser;
GO

EXEC sp_addrolemember 'db_owner', 'phpuser';
GO
