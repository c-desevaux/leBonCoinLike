DROP TABLE IF EXISTS Picture;
DROP TABLE IF EXISTS Ad;
DROP TABLE IF EXISTS User_;

CREATE TABLE User_(
   idUser INT AUTO_INCREMENT,
   pseudUser VARCHAR(50)  NOT NULL,
   emailUser VARCHAR(50)  NOT NULL,
   dateUser DATETIME NOT NULL,
   pwUser VARCHAR(50)  NOT NULL,
   PRIMARY KEY(idUser),
   UNIQUE(emailUser)
);

CREATE TABLE Ad(
   idAd INT AUTO_INCREMENT,
   titleAd VARCHAR(50)  NOT NULL,
   txtAd VARCHAR(500)  NOT NULL,
   dateAd DATETIME NOT NULL,
   priceAd DECIMAL(15,2)  NOT NULL,
   idUser INT NOT NULL,
   PRIMARY KEY(idAd),
   FOREIGN KEY(idUser) REFERENCES User_(idUser) ON DELETE CASCADE
);

CREATE TABLE Picture(
   idPic INT AUTO_INCREMENT,
   idAd INT NOT NULL,
   PRIMARY KEY(idPic),
   FOREIGN KEY(idAd) REFERENCES Ad(idAd) ON DELETE CASCADE
);


------------------------------------------- Jeu de donné -----------------------------------------------


------ Users ------

INSERT INTO User_ (pseudUser, emailUser, dateUser, pwUser)
VALUES
('Bernard', 'bernard@example.com', '2025-12-23 10:00:00', 'azerty123'),
('Bob', 'bob@example.com', '2025-12-22 14:30:00', 'wvcxnvb654'),
('Charlie', 'charlie@example.com', '2025-12-20 09:15:00', 'lmkjgh789'),
('Julie', 'julie@example.com', '2025-12-21 18:45:00', 'qsdgfgh852');

('Marie', 'marie@example.com', '2025-12-21 18:45:00', 'fdsfdsq564645');


------Annonces-------


INSERT INTO Ad (titleAd, txtAd, dateAd, priceAd, idUser)
VALUES
('Velo de ville',
"Solide et agile vélo de Ville parmi plusieurs - 7 vitesses - Il conviendra à des personnes jusqu'à 175 cm.",
'2025-12-25 18:45:00',
320, 2)





