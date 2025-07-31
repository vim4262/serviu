-- Base de données Servium - Agence de voyage
CREATE DATABASE IF NOT EXISTS `servium_db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `servium_db`;

-- Table des réservations
CREATE TABLE `reservations` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(100) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `telephone` VARCHAR(20) NOT NULL,
    `pays_depart` VARCHAR(100) NOT NULL,
    `pays_arrivee` VARCHAR(100) NOT NULL,
    `type_ticket` ENUM('aller_simple', 'aller_retour', 'multi_destinations') NOT NULL,
    `moyen_transport` ENUM('avion', 'train', 'bus', 'voiture', 'bateau') NOT NULL,
    `date_depart` DATE NOT NULL,
    `message` TEXT NULL,
    `statut` ENUM('en_attente', 'confirmee', 'annulee') DEFAULT 'en_attente',
    `date_creation` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `date_modification` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `idx_email` (`email`),
    INDEX `idx_date_depart` (`date_depart`),
    INDEX `idx_statut` (`statut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table des services
CREATE TABLE `services` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `titre` VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL,
    `contenu` LONGTEXT NULL,
    `image` VARCHAR(255) NULL,
    `lien` VARCHAR(100) NOT NULL UNIQUE,
    `prix_min` DECIMAL(10,2) NULL,
    `prix_max` DECIMAL(10,2) NULL,
    `actif` BOOLEAN DEFAULT TRUE,
    `ordre_affichage` INT(11) DEFAULT 0,
    `date_creation` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `date_modification` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `idx_lien` (`lien`),
    INDEX `idx_actif` (`actif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table des fonctionnalités des services
CREATE TABLE `service_features` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `service_id` INT(11) NOT NULL,
    `feature` VARCHAR(255) NOT NULL,
    `ordre` INT(11) DEFAULT 0,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`service_id`) REFERENCES `services`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table des publications
CREATE TABLE `publications` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `titre` VARCHAR(255) NOT NULL,
    `contenu` LONGTEXT NOT NULL,
    `extrait` TEXT NULL,
    `image` VARCHAR(255) NULL,
    `alt_image` VARCHAR(255) NULL,
    `auteur` VARCHAR(100) NOT NULL,
    `lien` VARCHAR(100) NOT NULL UNIQUE,
    `date_publication` DATE NOT NULL,
    `publie` BOOLEAN DEFAULT TRUE,
    `ordre_affichage` INT(11) DEFAULT 0,
    `date_creation` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `date_modification` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `idx_lien` (`lien`),
    INDEX `idx_publie` (`publie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table des contacts
CREATE TABLE `contacts` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(100) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `sujet` VARCHAR(255) NOT NULL,
    `message` TEXT NOT NULL,
    `lu` BOOLEAN DEFAULT FALSE,
    `repondu` BOOLEAN DEFAULT FALSE,
    `date_creation` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `date_lecture` TIMESTAMP NULL,
    PRIMARY KEY (`id`),
    INDEX `idx_email` (`email`),
    INDEX `idx_lu` (`lu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table des paramètres
CREATE TABLE `parametres` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `cle` VARCHAR(100) NOT NULL UNIQUE,
    `valeur` TEXT NOT NULL,
    `description` VARCHAR(255) NULL,
    `date_modification` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insertion des données de base
INSERT INTO `services` (`titre`, `description`, `contenu`, `image`, `lien`, `prix_min`, `prix_max`, `ordre_affichage`) VALUES
('Visa Touristique', 'Obtenez votre visa touristique en toute simplicité', 'Accompagnement personnalisé pour l\'obtention de votre visa', 'images/visa.jpg', 'visa-touristique', 50.00, 200.00, 1),
('Réservation de Billets', 'Réservation de billets d\'avion, train, bus', 'Meilleurs tarifs pour vos déplacements', 'images/billets.jpg', 'reservation-billets', 100.00, 1500.00, 2),
('Hébergement', 'Trouvez l\'hébergement parfait', 'Hôtels, appartements, maisons d\'hôtes', 'images/hebergement.jpg', 'hebergement', 80.00, 800.00, 3),
('Assurance Voyage', 'Protégez votre voyage', 'Assurance complète pour voyager en toute sérénité', 'images/assurance.jpg', 'assurance-voyage', 30.00, 150.00, 4);

INSERT INTO `service_features` (`service_id`, `feature`, `ordre`) VALUES
(1, 'Accompagnement personnalisé', 1),
(1, 'Dossier complet préparé', 2),
(1, 'Suivi jusqu\'à obtention', 3),
(2, 'Comparaison de prix', 1),
(2, 'Réservation sécurisée', 2),
(2, 'Conseils personnalisés', 3),
(3, 'Sélection d\'hébergements', 1),
(3, 'Réservation garantie', 2),
(3, 'Support 24/7', 3),
(4, 'Couverture complète', 1),
(4, 'Assistance 24/7', 2),
(4, 'Remboursement rapide', 3);

INSERT INTO `publications` (`titre`, `contenu`, `extrait`, `image`, `alt_image`, `auteur`, `lien`, `date_publication`, `ordre_affichage`) VALUES
('Visa Touristique : Guide Complet', 'Guide complet pour obtenir votre visa touristique', 'Guide complet pour obtenir votre visa touristique en toute simplicité', 'images/visa-guide.jpg', 'Guide visa touristique', 'Équipe Servium', 'visa-touristique-guide', '2024-01-15', 1),
('Meilleures Destinations 2024', 'Découvrez les destinations les plus populaires', 'Découvrez les destinations les plus populaires pour 2024', 'images/destinations-2024.jpg', 'Destinations 2024', 'Équipe Servium', 'destinations-2024', '2024-01-10', 2),
('Conseils Voyage Réussi', 'Nos conseils pour organiser un voyage parfait', 'Nos conseils pour organiser un voyage parfait', 'images/conseils-voyage.jpg', 'Conseils voyage', 'Équipe Servium', 'conseils-voyage', '2024-01-05', 3);

INSERT INTO `parametres` (`cle`, `valeur`, `description`) VALUES
('site_nom', 'Servium', 'Nom du site'),
('contact_email', 'contact@servium.com', 'Email de contact'),
('contact_telephone', '+33 1 23 45 67 89', 'Téléphone de contact'),
('contact_adresse', '123 Rue de la Paix, 75001 Paris, France', 'Adresse de l\'agence'); 