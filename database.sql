CREATE TABLE User(
    pseudo VARCHAR(20) PRIMARY KEY UNIQUE NOT NULL,
    prenom VARCHAR(20) NOT NULL,
    nom VARCHAR(20) NOT NULL,
    mail VARCHAR(50) UNIQUE NOT NULL,
    motPasse VARCHAR(25) NOT NULL     
);

CREATE TABLE Administrateur(
    idAdmin INT NOT NULL,
    pseudo VARCHAR(20) NOT NULL,
    FOREIGN KEY (pseudo) REFERENCES User(pseudo)
);

CREATE TABLE Artiste(
    idArtiste INT PRIMARY KEY AUTO_INCREMENT,
    nomArtiste VARCHAR(30) NOT NULL,
    dateNaissance DATE,
    biographie VARCHAR(2500),
    membresGroupe VARCHAR(150),
    lienWiki VARCHAR(100)
);

CREATE TABLE Album(
    idAlbum INT PRIMARY KEY AUTO_INCREMENT,
    nomAlbum VARCHAR(30) NOT NULL,
    artiste VARCHAR(30) NOT NULL,
    FOREIGN KEY (artiste) REFERENCES Artiste(idArtiste),
    sortieAlbum DATE,
    lienYoutube VARCHAR(100),
    note INT
);

CREATE TABLE Chanson(
    artiste VARCHAR(30) PRIMARY KEY NOT NULL,
    FOREIGN KEY (artiste) REFERENCES Artiste(idArtiste),
    nomChanson VARCHAR(30) PRIMARY KEY NOT NULL,
    dureeChanson FLOAT,
    album VARCHAR(30),
    FOREIGN KEY (album) REFERENCES Album(idAlbum),
    lienYoutube VARCHAR(100)    
);

CREATE TABLE Commentaire(
    idCommentaire INT PRIMARY KEY AUTO_INCREMENT,
    pseudo VARCHAR(20) NOT NULL,
    FOREIGN KEY (pseudo) REFERENCES User(pseudo),
    album VARCHAR(30) NOT NULL,
    FOREIGN KEY (album) REFERENCES Album(idAlbum),
    note INT NOT NULL,
    commentaire VARCHAR(500)  
);

CREATE TABLE Groupe(
    idGroupe INT PRIMARY KEY AUTO_INCREMENT,
    nomGroupe VARCHAR(30),
    artiste VARCHAR(30) NOT NULL,
    FOREIGN KEY (artiste) REFERENCES Artiste(idArtiste),
);


