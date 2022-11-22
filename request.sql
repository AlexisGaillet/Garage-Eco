CREATE DATABASE `garage-eco` character set 'UTF8';

USE `garage-eco`;

CREATE TABLE brands(
    Id_brands INT AUTO_INCREMENT,
    name VARCHAR(20),
    PRIMARY KEY(Id_brands)
);

CREATE TABLE models(
    Id_models INT AUTO_INCREMENT,
    name VARCHAR(20),
    car_year DATE,
    Id_brands INT NOT NULL,
    PRIMARY KEY(Id_models),
    FOREIGN KEY(Id_brands) REFERENCES brands(Id_brands)
);

CREATE TABLE users(
    Id_users INT AUTO_INCREMENT,
    firstname VARCHAR(30),
    lastname VARCHAR(30),
    mail VARCHAR(125),
    password VARCHAR(255),
    created_at DATETIME,
    valided_at DATETIME,
    PRIMARY KEY(Id_users)
);

CREATE TABLE problems(
    Id_problems INT AUTO_INCREMENT,
    title VARCHAR(50),
    PRIMARY KEY(Id_problems)
);

CREATE TABLE solutions(
    Id_solutions INT AUTO_INCREMENT,
    title VARCHAR(30),
    PRIMARY KEY(Id_solutions)
);

CREATE TABLE types(
    Id_types INT AUTO_INCREMENT,
    engine_type SMALLINT,
    PRIMARY KEY(Id_types)
);

CREATE TABLE steps(
    Id_steps INT AUTO_INCREMENT,
    title VARCHAR(20),
    description TEXT,
    PRIMARY KEY(Id_steps)
);

CREATE TABLE cars(
    Id_cars INT AUTO_INCREMENT,
    Id_users INT NOT NULL,
    Id_brands INT NOT NULL,
    Id_models INT NOT NULL,
    Id_types INT NOT NULL,
    PRIMARY KEY(Id_cars),
    FOREIGN KEY(Id_users) REFERENCES users(Id_users),
    FOREIGN KEY(Id_brands) REFERENCES brands(Id_brands),
    FOREIGN KEY(Id_models) REFERENCES models(Id_models),
    FOREIGN KEY(Id_types) REFERENCES types(Id_types)
);

CREATE TABLE cars_problems(
    Id_cars INT,
    Id_problems INT,
    PRIMARY KEY(Id_cars, Id_problems),
    FOREIGN KEY(Id_cars) REFERENCES cars(Id_cars),
    FOREIGN KEY(Id_problems) REFERENCES problems(Id_problems)
);

CREATE TABLE problems_solutions(
    Id_problems INT,
    Id_solutions INT,
    PRIMARY KEY(Id_problems, Id_solutions),
    FOREIGN KEY(Id_problems) REFERENCES problems(Id_problems),
    FOREIGN KEY(Id_solutions) REFERENCES solutions(Id_solutions)
);

CREATE TABLE models_types(
    Id_models INT,
    Id_types INT,
    PRIMARY KEY(Id_models, Id_types),
    FOREIGN KEY(Id_models) REFERENCES models(Id_models),
    FOREIGN KEY(Id_types) REFERENCES types(Id_types)
);

CREATE TABLE solutions_steps(
    Id_solutions INT,
    Id_steps INT,
    PRIMARY KEY(Id_solutions, Id_steps),
    FOREIGN KEY(Id_solutions) REFERENCES solutions(Id_solutions),
    FOREIGN KEY(Id_steps) REFERENCES steps(Id_steps)
);


    -- INITALISER LE CREATED_AT
-- Colonne users -> structure -> row created_at -> modifier -> default value : CURRENT_TIMESTAMP


    -- Rénitialiser les id à 1
-- ALTER TABLE `users` AUTO_INCREMENT=1