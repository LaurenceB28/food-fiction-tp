CREATE TABLE users(
    id_users INT AUTO_INCREMENT,
    lastname VARCHAR(50),
    firstname VARCHAR(50),
    email VARCHAR(50),
    password VARCHAR(50),
    pseudo VARCHAR(50),
    picture VARCHAR(50),
    created_at DATETIME,
    validated_at DATETIME,
    updated_at DATETIME,
    deleted_at DATETIME,
    role INT,
    PRIMARY KEY(id_users)
);

CREATE TABLE genres(
    id_genres INT AUTO_INCREMENT,
    genre VARCHAR(50),
    PRIMARY KEY(id_genres)
);

CREATE TABLE types(
    id_types INT AUTO_INCREMENT,
    type VARCHAR(50),
    PRIMARY KEY(id_types)
);

CREATE TABLE medias(
    id_medias INT AUTO_INCREMENT,
    title VARCHAR(50),
    id_types INT NOT NULL,
    PRIMARY KEY(id_medias),
    FOREIGN KEY(id_types) REFERENCES types(id_types)
);

CREATE TABLE recipes(
    id_recipes INT AUTO_INCREMENT,
    title VARCHAR(150),
    ingredient VARCHAR(50),
    description VARCHAR(50),
    id_medias INT NOT NULL,
    PRIMARY KEY(id_recipes),
    FOREIGN KEY(id_medias) REFERENCES medias(id_medias)
);

CREATE TABLE medias_genres(
    id_genres INT,
    id_medias INT,
    PRIMARY KEY(id_genres, id_medias),
    FOREIGN KEY(id_genres) REFERENCES genres(id_genres),
    FOREIGN KEY(id_medias) REFERENCES medias(id_medias)
);

CREATE TABLE users_recipes(
    id_users INT,
    id_recipes INT,
    PRIMARY KEY(id_users, id_recipes),
    FOREIGN KEY(id_users) REFERENCES users(id_users),
    FOREIGN KEY(id_recipes) REFERENCES recipes(id_recipes)
);