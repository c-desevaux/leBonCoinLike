DROP TABLE IF EXISTS Picture;
DROP TABLE IF EXISTS Ad;
DROP TABLE IF EXISTS User_;

CREATE TABLE User_(
   idUser INT AUTO_INCREMENT,
   pseudUser VARCHAR(50)  NOT NULL,
   emailUser VARCHAR(50)  NOT NULL,
   dateUser DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   pwUser VARCHAR(255)  NOT NULL,
   PRIMARY KEY(idUser),
   UNIQUE(emailUser)
);

CREATE TABLE Ad(
   idAd INT AUTO_INCREMENT,
   titleAd VARCHAR(50)  NOT NULL,
   txtAd VARCHAR(500)  NOT NULL,
   dateAd DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   priceAd DECIMAL(15,2)  NOT NULL,
   idUser INT NOT NULL,
   PRIMARY KEY(idAd),
   FOREIGN KEY(idUser) REFERENCES User_(idUser) ON DELETE CASCADE
);

CREATE TABLE Picture(
   idPic INT AUTO_INCREMENT,
   namePic VARCHAR(50)  NOT NULL,
   idAd INT NOT NULL,
   PRIMARY KEY(idPic),
   UNIQUE(namePic),
   FOREIGN KEY(idAd) REFERENCES Ad(idAd) ON DELETE CASCADE
);

CREATE USER 'app_user'@'localhost'
IDENTIFIED BY 'mdpUser';

GRANT SELECT, INSERT, UPDATE, DELETE
ON lbcl.*
TO 'app_user'@'localhost';



------------------------------------------- Jeu de donné -----------------------------------------------


------ Users ------

INSERT INTO User_ (pseudUser, emailUser, dateUser, pwUser)
VALUES
('Bernard', 'bernard@example.com', '2025-12-23 10:00:00', 'Azerty123**'),
('Bob', 'bob@example.com', '2025-12-22 14:30:00', 'Wvcxnvb654++'),
('Charlie', 'charlie@example.com', '2025-12-20 09:15:00', 'Lmkjgh789**'),
('Julie', 'julie@example.com', '2025-12-21 18:45:00', 'Qsdgfgh852**');

INSERT INTO User_ (pseudUser, emailUser, pwUser)
VALUES
('Marie', 'marie27@example.com', 'Fdsfdsq564645**');


------Annonces-------


INSERT INTO Ad (titleAd, txtAd, dateAd, priceAd, idUser)
VALUES
('Velo de ville',
"Solide et agile vélo de Ville parmi plusieurs - 7 vitesses - Il conviendra à des personnes jusqu'à 175 cm.",
'2025-12-25 18:45:00',
320, 2)



INSERT INTO Ad (titleAd, txtAd, priceAd, idUser)
VALUES
('PS5',
"Tres bon état disponible sur Evreux",
420, 4)

--------Photos de base---------

INSERT INTO Picture (namePic, idAd)
VALUES
('velo.png' , 1)

INSERT INTO Picture (namePic, idAd)
VALUES
('ps5.png' , 2)

INSERT INTO Picture (namePic, idAd)
VALUES
('ps5-2.png' , 2)


----------Compte admin---------


id: admin@admin.com


