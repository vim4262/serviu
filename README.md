# Servium - Site Web PHP MVC

Ce projet a été transformé d'un site HTML statique en une application PHP moderne utilisant l'architecture MVC (Modèle-Vue-Contrôleur).

## 📁 Structure du Projet

```
SERVIUM/
├── index.php                    # Point d'entrée principal
├── assets/                      # Assets statiques (CSS, JS, images)
├── mvc/                        # Application MVC
│   ├── config/
│   │   ├── config.php          # Configuration globale
│   │   └── database.php        # Configuration BDD
│   ├── controllers/            # Contrôleurs
│   │   ├── HomeController.php
│   │   ├── AboutController.php
│   │   ├── ContactController.php
│   │   ├── PublicationController.php
│   │   ├── ServiceController.php
│   │   └── ReservationController.php
│   ├── models/                 # Modèles
│   │   └── Reservation.php
│   ├── views/                  # Vues
│   │   ├── layouts/
│   │   │   ├── header.php
│   │   │   └── footer.php
│   │   ├── home/
│   │   ├── about/
│   │   ├── contact/
│   │   ├── publication/
│   │   ├── services/
│   │   ├── reservation/
│   │   └── errors/
│   ├── public/
│   │   └── index.php          # Point d'entrée MVC
│   ├── .htaccess              # Configuration Apache
│   └── database.sql           # Script de base de données
└── README.md                   # Documentation du projet
```

## 🛠️ Installation

### Prérequis
- PHP 7.4 ou supérieur
- MySQL 5.7 ou MariaDB 10.2 ou supérieur
- Serveur web (Apache/Nginx)
- Module mod_rewrite activé (Apache)

### Étapes d'installation

1. **Cloner ou télécharger le projet**
   ```bash
   cd /c/xampp/htdocs/SERVIUM
   ```

2. **Configurer la base de données**
   ```bash
   # Se connecter à MySQL
   mysql -u root -p
   
   # Exécuter le script SQL
   source mvc/database.sql
   ```

3. **Configurer l'application**
   - Ouvrir `mvc/config/config.php`
   - Modifier `APP_URL` selon votre configuration
   - Modifier les paramètres de base de données si nécessaire

4. **Configurer le serveur web**
   - S'assurer que mod_rewrite est activé
   - Le DocumentRoot doit pointer vers le dossier racine

5. **Tester l'installation**
   - Ouvrir `http://localhost/SERVIUM/` dans un navigateur
   - Vous devriez voir la page d'accueil

## 📋 Fonctionnalités

### ✅ Pages transformées
- **Accueil** (`index.php`) - Page d'accueil dynamique
- **À propos** (`index.php?page=about`) - Informations sur l'entreprise
- **Contact** (`index.php?page=contact`) - Formulaire de contact fonctionnel
- **Publications** (`index.php?page=publication`) - Articles et actualités
- **Services** (`index.php?page=services`) - Catalogue des services
- **Réservations** (`index.php?page=reservation`) - Système de réservation

### 🔧 Fonctionnalités techniques
- **Architecture MVC** - Séparation claire des responsabilités
- **Routage dynamique** - URLs propres et SEO-friendly
- **Validation des formulaires** - Côté client et serveur
- **Sécurité** - Protection CSRF, validation des entrées
- **Base de données** - Stockage des réservations
- **Responsive design** - Compatible mobile et desktop

## 🌐 URLs du site

- **Accueil** : `http://localhost/SERVIUM/`
- **À propos** : `http://localhost/SERVIUM/index.php?page=about`
- **Contact** : `http://localhost/SERVIUM/index.php?page=contact`
- **Publications** : `http://localhost/SERVIUM/index.php?page=publication`
- **Services** : `http://localhost/SERVIUM/index.php?page=services`
- **Réservations** : `http://localhost/SERVIUM/index.php?page=reservation`

## 🔒 Sécurité

### Mesures implémentées
- **Validation des entrées** - Côté client et serveur
- **Protection CSRF** - Tokens de sécurité
- **Échappement HTML** - Protection XSS
- **Requêtes préparées** - Protection SQL injection
- **Headers de sécurité** - CSP, X-Frame-Options, etc.

## 📝 Personnalisation

### Modifier le contenu
1. Éditer les contrôleurs dans `mvc/controllers/`
2. Modifier les vues dans `mvc/views/`
3. Ajouter des données dans `mvc/config/config.php`

### Modifier le design
1. Éditer `assets/css/style.css`
2. Modifier les templates dans `mvc/views/layouts/`

### Ajouter de nouvelles pages
1. Créer un nouveau contrôleur dans `mvc/controllers/`
2. Créer les vues correspondantes dans `mvc/views/`
3. Ajouter la route dans `mvc/public/index.php`

## 🐛 Dépannage

### Problèmes courants

1. **Erreur 404**
   - Vérifier que mod_rewrite est activé
   - Vérifier le fichier `.htaccess`

2. **Erreur de base de données**
   - Vérifier les paramètres dans `mvc/config/config.php`
   - S'assurer que MySQL est démarré

3. **Assets non chargés**
   - Vérifier les chemins dans les vues
   - S'assurer que le dossier `assets/` est accessible

## 📞 Support

Pour toute question ou problème :
- Email : contact@servium.com
- Documentation : Consulter les commentaires dans le code

## 📄 Licence

Ce projet est développé pour Servium. Tous droits réservés.

---

**Version** : 2.0.0 (PHP MVC - Migration terminée)  
**Dernière mise à jour** : Janvier 2025  
**Auteur** : Équipe Servium 
