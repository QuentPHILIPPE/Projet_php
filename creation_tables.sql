CREATE TABLE User(
    adresseMail VARCHAR(50) PRIMARY KEY,
    nom VARCHAR(20) NOT NULL,
    prenom VARCHAR(20) NOT NULL,
    pseudo VARCHAR(20) NOT NULL,
    mdpUser VARCHAR(25) NOT NULL
);

CREATE TABLE Administrateur(
    idAdmin INT PRIMARY KEY NOT NULL,
    pseudo VARCHAR(20) NOT NULL,
    adresseMail VARCHAR(50)
);

CREATE TABLE Artiste(
    idArtiste INT PRIMARY KEY AUTO_INCREMENT,
    nomArtiste VARCHAR(30) NOT NULL,
    dateNaissance DATE,
    biographie VARCHAR(2000),
    lienWiki VARCHAR(100),
    groupe INT
);

CREATE TABLE Album(
    idAlbum INT PRIMARY KEY AUTO_INCREMENT,
    nomAlbum VARCHAR(30) NOT NULL,
    dateSortie DATE,
    note INT,
    lienYoutube VARCHAR(100),
    artiste INT NOT NULL
);

CREATE TABLE Morceaux(
    artiste INT NOT NULL,
    nomMorceau VARCHAR(30) NOT NULL,
    dureeChanson FLOAT,
    album INT,
    lienYoutube VARCHAR(100),
    PRIMARY KEY(artiste,nomMorceau)
);

CREATE TABLE Commentaire(
    idCommentaire INT PRIMARY KEY AUTO_INCREMENT,
    pseudo VARCHAR(20) NOT NULL,
    album INT NOT NULL,
    note INT NOT NULL,
    message VARCHAR(500),
    adresseMail VARCHAR(50),
    dateComm DATE
);


CREATE TABLE Groupe(
    idGroupe INT PRIMARY KEY AUTO_INCREMENT,
    nomGroupe VARCHAR(30),
    artiste INT NOT NULL,
    lienWiki VARCHAR(50)
);


ALTER TABLE Administrateur ADD FOREIGN KEY (adresseMail) REFERENCES User(adresseMail);
ALTER TABLE Album ADD FOREIGN KEY (artiste) REFERENCES Artiste(idartiste);
ALTER TABLE Morceaux ADD FOREIGN KEY (artiste) REFERENCES Artiste(idartiste);
ALTER TABLE Morceaux ADD FOREIGN KEY (album) REFERENCES Album(idAlbum);
ALTER TABLE Commentaire ADD FOREIGN KEY (adresseMail) REFERENCES User(adresseMail);
ALTER TABLE Commentaire ADD FOREIGN KEY (album) REFERENCES Album(idAlbum);
ALTER TABLE Groupe ADD FOREIGN KEY (artiste) REFERENCES Artiste(idartiste);
