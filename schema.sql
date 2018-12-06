
CREATE DATABASE yeticave
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_lot INT,
    id_bet INT,
    reg_date DATE NOT NULL,
    email CHAR(128) NOT NULL,
    name CHAR(50) NOT NULL,
    password CHAR(50) NOT NULL,
    avatar CHAR(128),
    contact_info CHAR(50) NOT NULL
)

CREATE TABLE lots (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    id_winner INT,
<<<<<<< HEAD
    id_category INT,                             
    title CHAR(30) NOT NULL,
    discription CHAR(255),
    picture TEXT NOT NULL,
=======
    id_category INT,
    title CHAR(255) NOT NULL,
    discription TEXT,
    picture CHAR(128) NOT NULL,
>>>>>>> module4-task2
    start_price INT NOT NULL,
    final_price INT NOT NULL,
    finish_date DATE NOT NULL,
    bet_step INT
)

CREATE TABLE bets (
    id INT AUTO_INCREMENT PRIMARY KEY,       
    id_user INT,
    id_lot INT,
    date DATE NOT NULL,
    sum INT NOT NULL
)

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title CHAR(128) NOT NULL
)
