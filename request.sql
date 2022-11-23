DROP DATABASE IF EXISTS `garage-eco`;

CREATE DATABASE `garage-eco` character set 'UTF8';

USE `garage-eco`;

CREATE TABLE brands(
    Id_brands INT AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    most_selled BOOLEAN NOT NULL,
    PRIMARY KEY(Id_brands)
);

CREATE TABLE models(
    Id_models INT AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    car_year VARCHAR(10) NOT NULL,
    Id_brands INT NOT NULL,
    PRIMARY KEY(Id_models),
    FOREIGN KEY(Id_brands) REFERENCES brands(Id_brands)
);

CREATE TABLE users(
    Id_users INT AUTO_INCREMENT,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    mail VARCHAR(125) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME,
    valided_at DATETIME,
    PRIMARY KEY(Id_users)
);

CREATE TABLE problems(
    Id_problems INT AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    description VARCHAR(150),
    PRIMARY KEY(Id_problems)
);

CREATE TABLE solutions(
    Id_solutions INT AUTO_INCREMENT,
    title VARCHAR(30) NOT NULL,
    PRIMARY KEY(Id_solutions)
);

CREATE TABLE types(
    Id_types INT AUTO_INCREMENT,
    engine_type INT NOT NULL,
    motorization SMALLINT NOT NULL,
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




INSERT INTO `brands` (`Id_brands`, `name`, `most_selled`)
VALUES (NULL, 'Audi', '1'),
(NULL, 'Mercedes-Benz', '1'),
(NULL, 'BMW', '1'),
(NULL, 'Bugatti', '0'),
(NULL, 'Dodge', '0');


INSERT INTO `users` (`Id_users`, `firstname`, `lastname`, `mail`, `password`, `created_at`, `valided_at`) VALUES (NULL, 'Alexis', 'Gaillet', 'alexisgaillet36@gmail.com', '$2y$10$DVi59IBra7c0eTTFXav5iOIMHLdWil85h.6Bx4/AWMhB2HZmkAnfO', NULL, NULL);





    -- INITALISER LE CREATED_AT
-- Colonne users -> structure -> row created_at -> modifier -> default value : CURRENT_TIMESTAMP


    -- Rénitialiser les id à 1
-- ALTER TABLE `users` AUTO_INCREMENT=1