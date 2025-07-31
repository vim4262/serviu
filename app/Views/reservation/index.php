<?php require_once dirname(__DIR__) . '/../Views/layouts/header.php'; ?>

<!-- Section Réservation -->
<section class="reservation-section">
    <div class="container">
        <h1>Réservez votre prochaine aventure</h1>
        <p class="subtext">Chez <strong>Servium</strong>, nous transformons vos projets de voyage en réalité.
            Veuillez remplir le formulaire ci-dessous pour débuter votre aventure.</p>

        <?php if (isset($errors) && !empty($errors)): ?>
            <div class="error-messages">
                <?php foreach ($errors as $error): ?>
                    <div class="error"><?php echo htmlspecialchars($error); ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form id="reservationForm" class="reservation-form" novalidate>
            <div class="form-group">
                <label for="nom">Nom complet *</label>
                <input type="text" id="nom" name="nom" placeholder="Votre nom complet" required>
                <div class="error" id="nom-error"></div>
            </div>
            <div class="form-group">
                <label for="email">Adresse email *</label>
                <input type="email" id="email" name="email" placeholder="Votre adresse email" required>
                <div class="error" id="email-error"></div>
            </div>
            <div class="form-group">
                <label for="telephone">Numéro de téléphone *</label>
                <input type="tel" id="telephone" name="telephone" placeholder="Votre numéro de téléphone" required>
                <div class="error" id="telephone-error"></div>
            </div>
            <div class="form-group">
                <label for="pays_depart">Pays de résidence (pays de départ) *</label>
                <input type="text" id="pays_depart" name="pays_depart" placeholder="Pays de résidence" required>
                <div class="error" id="pays_depart-error"></div>
            </div>
            <div class="form-group">
                <label for="pays_arrivee">Pays d'accueil (pays d'arrivée) *</label>
                <input type="text" id="pays_arrivee" name="pays_arrivee" placeholder="Pays d'accueil" required>
                <div class="error" id="pays_arrivee-error"></div>
            </div>
            <div class="form-group">
                <label for="type_ticket">Type de ticket *</label>
                <select id="type_ticket" name="type_ticket" required>
                    <option value="" disabled selected>Type de ticket</option>
                    <option value="aller_simple">Aller simple</option>
                    <option value="aller_retour">Aller-retour</option>
                    <option value="multi_destinations">Multi-destinations</option>
                </select>
                <div class="error" id="type_ticket-error"></div>
            </div>
            <div class="form-group">
                <label for="moyen_transport">Moyen de transport *</label>
                <select id="moyen_transport" name="moyen_transport" required>
                    <option value="" disabled selected>Moyen de transport</option>
                    <option value="AVION">AVION</option>
                    <option value="BUS">BUS</option>
                    <option value="BATEAU">BATEAU</option>
                </select>
                <div class="error" id="moyen_transport-error"></div>
            </div>
            <div class="form-group">
                <label for="date_depart">Date de départ *</label>
                <input type="date" id="date_depart" name="date_depart" required>
                <div class="error" id="date_depart-error"></div>
            </div>
            <div class="form-group">
                <label for="message">Message ou besoin particulier (facultatif)</label>
                <textarea id="message" name="message" rows="5" placeholder="Message ou besoin particulier"></textarea>
            </div>
            <button type="submit" class="btn-submit" id="submitBtn">Réserver maintenant</button>
        </form>
        <div class="loading" id="loading">
            <div class="spinner"></div>
            <p>Traitement de votre réservation...</p>
        </div>
    </div>
</section>

<!-- Section Appel à l'action -->
<section class="cta">
    <div class="container">
        <h2>PRÊT À VOYAGER AVEC NOUS ?</h2>
        <p>Contactez notre équipe dès aujourd'hui et planifiez votre prochaine aventure en toute sérénité avec Servium.</p>
        <a href="index.php?page=contact" class="btn">Contactez-nous</a>
    </div>
</section>

<style>
    .error {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
    .success {
        color: #28a745;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
    .form-group {
        margin-bottom: 1rem;
    }
    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
    }
    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 1rem;
    }
    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    .btn-submit {
        background-color: #007bff;
        color: white;
        padding: 1rem 2rem;
        border: none;
        border-radius: 4px;
        font-size: 1.1rem;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .btn-submit:hover {
        background-color: #0056b3;
    }
    .btn-submit:disabled {
        background-color: #6c757d;
        cursor: not-allowed;
    }
    .loading {
        display: none;
        text-align: center;
        margin-top: 1rem;
    }
    .spinner {
        border: 4px solid #f3f3f3;
        border-top: 4px solid #007bff;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        animation: spin 1s linear infinite;
        margin: 0 auto;
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<script src="<?php echo asset('js/reservation.js'); ?>"></script>

<?php require_once dirname(__DIR__) . '/../Views/layouts/footer.php'; ?> 