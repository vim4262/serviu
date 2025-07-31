<?php require_once dirname(__DIR__) . '/layouts/header.php'; ?>

<section class="success-page">
    <div class="container">
        <div class="success-content">
            <div class="success-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h1>Réservation confirmée !</h1>
            <p>Votre réservation a été enregistrée avec succès. Nous vous remercions pour votre confiance.</p>
            
            <div class="success-details">
                <h2>Prochaines étapes :</h2>
                <ul>
                    <li>Notre équipe va traiter votre demande dans les plus brefs délais</li>
                    <li>Vous recevrez un email de confirmation avec les détails</li>
                    <li>Un conseiller vous contactera pour finaliser les arrangements</li>
                </ul>
            </div>
            
            <div class="success-actions">
                <a href="<?php echo url('home'); ?>" class="btn">Retour à l'accueil</a>
                <a href="<?php echo url('contact'); ?>" class="btn btn-secondary">Nous contacter</a>
            </div>
        </div>
    </div>
</section>

<style>
    .success-page {
        padding: 4rem 0;
        text-align: center;
    }
    .success-content {
        max-width: 600px;
        margin: 0 auto;
    }
    .success-icon {
        font-size: 4rem;
        color: #28a745;
        margin-bottom: 2rem;
    }
    .success-details {
        text-align: left;
        margin: 2rem 0;
        padding: 2rem;
        background-color: #f8f9fa;
        border-radius: 8px;
    }
    .success-details ul {
        margin: 1rem 0;
        padding-left: 1.5rem;
    }
    .success-details li {
        margin-bottom: 0.5rem;
    }
    .success-actions {
        margin-top: 2rem;
    }
    .success-actions .btn {
        margin: 0 0.5rem;
    }
    .btn-secondary {
        background-color: #6c757d;
    }
    .btn-secondary:hover {
        background-color: #545b62;
    }
</style>

<?php require_once dirname(__DIR__) . '/layouts/footer.php'; ?> 