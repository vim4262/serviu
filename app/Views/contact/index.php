<?php require_once dirname(__DIR__) . '/../Views/layouts/header.php'; ?>

<section class="contact-page">
    <div class="container">
        <h1>Contactez-nous</h1>
        
        <div class="contact-content">
            <div class="contact-info">
                <h2>Nos Coordonnées</h2>
                <div class="contact-details">
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <p>Email : <a href="mailto:<?php echo htmlspecialchars($data['contact_info']['email']); ?>"><?php echo htmlspecialchars($data['contact_info']['email']); ?></a></p>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <p>Téléphone : <a href="tel:<?php echo htmlspecialchars($data['contact_info']['phone']); ?>"><?php echo htmlspecialchars($data['contact_info']['phone']); ?></a></p>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <p>Adresse : <?php echo htmlspecialchars($data['contact_info']['address']); ?></p>
                    </div>
                </div>
                
                <div class="social-media">
                    <h3>Suivez-nous</h3>
                    <div class="social-links">
                        <a href="<?php echo htmlspecialchars($data['social_media']['facebook']); ?>"><i class="fab fa-facebook"></i></a>
                        <a href="<?php echo htmlspecialchars($data['social_media']['instagram']); ?>"><i class="fab fa-instagram"></i></a>
                        <a href="<?php echo htmlspecialchars($data['social_media']['linkedin']); ?>"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="contact-form">
                <h2>Envoyez-nous un message</h2>
                
                <?php if (isset($data['form_result']) && $data['form_result']['success']): ?>
                    <div class="success-message">
                        <p>Votre message a été envoyé avec succès ! Nous vous répondrons dans les plus brefs délais.</p>
                    </div>
                <?php endif; ?>
                
                <form method="POST" action="index.php?page=contact">
                    <div class="form-group">
                        <label for="nom">Nom complet *</label>
                        <input type="text" id="nom" name="nom" value="<?php echo isset($data['form_result']['data']['nom']) ? htmlspecialchars($data['form_result']['data']['nom']) : ''; ?>" required>
                        <?php if (isset($data['form_result']['errors']['nom'])): ?>
                            <span class="error"><?php echo htmlspecialchars($data['form_result']['errors']['nom']); ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" value="<?php echo isset($data['form_result']['data']['email']) ? htmlspecialchars($data['form_result']['data']['email']) : ''; ?>" required>
                        <?php if (isset($data['form_result']['errors']['email'])): ?>
                            <span class="error"><?php echo htmlspecialchars($data['form_result']['errors']['email']); ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="sujet">Sujet *</label>
                        <input type="text" id="sujet" name="sujet" value="<?php echo isset($data['form_result']['data']['sujet']) ? htmlspecialchars($data['form_result']['data']['sujet']) : ''; ?>" required>
                        <?php if (isset($data['form_result']['errors']['sujet'])): ?>
                            <span class="error"><?php echo htmlspecialchars($data['form_result']['errors']['sujet']); ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" rows="5" required><?php echo isset($data['form_result']['data']['message']) ? htmlspecialchars($data['form_result']['data']['message']) : ''; ?></textarea>
                        <?php if (isset($data['form_result']['errors']['message'])): ?>
                            <span class="error"><?php echo htmlspecialchars($data['form_result']['errors']['message']); ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <button type="submit" class="btn">Envoyer le message</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require_once dirname(__DIR__) . '/../Views/layouts/footer.php'; ?> 