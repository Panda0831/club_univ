CREATE DATABASE IF NOT EXISTS gestion_clubs_simplifiee;
USE gestion_clubs_simplifiee;

-- Table UTILISATEUR
CREATE TABLE UTILISATEUR (
    id_utilisateur INT AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100),
    nie VARCHAR(20) UNIQUE NOT NULL,
    email VARCHAR(100) NOT NULL,
    filiere VARCHAR(100),
    niveau VARCHAR(50),
    mot_de_passe VARCHAR(255) NOT NULL,
    role ENUM('etudiant', 'responsable', 'superadmin') DEFAULT 'etudiant',
    CONSTRAINT PK_utilisateur PRIMARY KEY (id_utilisateur)
);

-- Table CLUB
CREATE TABLE CLUB (
    id_club INT AUTO_INCREMENT,
    nom_club VARCHAR(100) NOT NULL,
    domaine VARCHAR(100),
    description TEXT,
    CONSTRAINT PK_club PRIMARY KEY (id_club)
);

-- Table INSCRIPTION_CLUB
CREATE TABLE INSCRIPTION_CLUB (
    id_inscription INT AUTO_INCREMENT,
    utilisateur_id INT,
    club_id INT,
    CONSTRAINT PK_inscription_club PRIMARY KEY (id_inscription),
    CONSTRAINT FK_inscription_utilisateur FOREIGN KEY (utilisateur_id) REFERENCES UTILISATEUR(id_utilisateur) ON DELETE CASCADE,
    CONSTRAINT FK_inscription_club FOREIGN KEY (club_id) REFERENCES CLUB(id_club) ON DELETE CASCADE
);

-- Table ACTIVITE
CREATE TABLE ACTIVITE (
    id_activite INT AUTO_INCREMENT,
    nom_activite VARCHAR(100),
    type_activite VARCHAR(50),
    date_activite DATETIME,
    date_fin_inscription DATETIME,
    lieu VARCHAR(100),
    description TEXT,
    club_id INT,
    responsable_id INT DEFAULT NULL,
    participants_max INT,
    CONSTRAINT PK_activite PRIMARY KEY (id_activite),
    CONSTRAINT FK_activite_club FOREIGN KEY (club_id) REFERENCES CLUB(id_club) ON DELETE CASCADE,
    CONSTRAINT FK_activite_responsable FOREIGN KEY (responsable_id) REFERENCES UTILISATEUR(id_utilisateur) ON DELETE SET NULL
);

-- Table INSCRIPTION_ACTIVITE
CREATE TABLE INSCRIPTION_ACTIVITE (
    id_inscription_activite INT AUTO_INCREMENT,
    utilisateur_id INT,
    activite_id INT,
    CONSTRAINT PK_inscription_activite PRIMARY KEY (id_inscription_activite),
    CONSTRAINT FK_activite_utilisateur FOREIGN KEY (utilisateur_id) REFERENCES UTILISATEUR(id_utilisateur) ON DELETE CASCADE,
    CONSTRAINT FK_utilisateur_activite FOREIGN KEY (activite_id) REFERENCES ACTIVITE(id_activite) ON DELETE CASCADE
);

-- Table NOTIFICATION
CREATE TABLE NOTIFICATION (
    id_notification INT AUTO_INCREMENT,
    destinataire_id INT,
    objet VARCHAR(255),
    message TEXT,
    date_envoi DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT PK_notification PRIMARY KEY (id_notification),
    CONSTRAINT FK_notification_destinataire FOREIGN KEY (destinataire_id) REFERENCES UTILISATEUR(id_utilisateur) ON DELETE CASCADE
);

-- Table COMMENTAIRE_ACTIVITE
CREATE TABLE COMMENTAIRE_ACTIVITE (
    id_commentaire INT AUTO_INCREMENT,
    utilisateur_id INT,
    activite_id INT,
    contenu TEXT NOT NULL,
    date_commentaire DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT PK_commentaire_activite PRIMARY KEY (id_commentaire),
    CONSTRAINT FK_commentaire_utilisateur FOREIGN KEY (utilisateur_id) REFERENCES UTILISATEUR(id_utilisateur) ON DELETE CASCADE,
    CONSTRAINT FK_commentaire_activite FOREIGN KEY (activite_id) REFERENCES ACTIVITE(id_activite) ON DELETE CASCADE
);
