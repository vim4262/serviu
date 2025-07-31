<?php
require_once __DIR__ . '/../../Config/config.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo isset($data['title']) ? htmlspecialchars($data['title']) : 'Servium'; ?></title>
    <meta name="description" content="<?php echo isset($data['description']) ? htmlspecialchars($data['description']) : 'Chez Servium, nous vous accompagnons dans tous vos projets de voyage avec expertise, passion et fiabilité.'; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo asset('css/style.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container header-container">
            <a href="<?php echo url('home'); ?>">
                <img src="<?php echo asset('images/logo 1.png'); ?>" alt="Logo Servium" class="logo" />
            </a>
            <nav class="navbar">
                <ul class="nav-links">
                    <li><a href="<?php echo url('home'); ?>" <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' && (!isset($_GET['page']) || $_GET['page'] == 'home') ? 'class="active"' : ''; ?>>Accueil</a></li>
                    <li><a href="<?php echo url('about'); ?>" <?php echo isset($_GET['page']) && $_GET['page'] == 'about' ? 'class="active"' : ''; ?>>À propos</a></li>
                    <li><a href="<?php echo url('reservation'); ?>" <?php echo isset($_GET['page']) && $_GET['page'] == 'reservation' ? 'class="active"' : ''; ?>>Réservations</a></li>
                    <li><a href="<?php echo url('publication'); ?>" <?php echo isset($_GET['page']) && $_GET['page'] == 'publication' ? 'class="active"' : ''; ?>>Publication&Actualités</a></li>
                    <li><a href="<?php echo url('contact'); ?>" <?php echo isset($_GET['page']) && $_GET['page'] == 'contact' ? 'class="active"' : ''; ?>>Contact</a></li>
                    <li><a href="#">FR</a> / <a href="#">EN</a></li>
                </ul>
            </nav>
        </div>
    </header> 