<?php require_once dirname(__DIR__) . '/../Views/layouts/header.php'; ?>

<section class="about-page">
    <div class="container">
        <h1>À propos de Servium</h1>
        
        <div class="about-content">
            <div class="mission-section">
                <h2>Notre Mission</h2>
                <p><?php echo htmlspecialchars($data['content']['mission']); ?></p>
            </div>
            
            <div class="description-section">
                <h2>Qui sommes-nous ?</h2>
                <p><?php echo htmlspecialchars($data['content']['description']); ?></p>
                <p><?php echo htmlspecialchars($data['content']['expertise']); ?></p>
                <p><strong><?php echo htmlspecialchars($data['content']['promise']); ?></strong></p>
            </div>
            
            <div class="team-section">
                <h2>Notre Équipe</h2>
                <?php foreach ($data['team'] as $member): ?>
                    <div class="team-member">
                        <h3><?php echo htmlspecialchars($member['name']); ?></h3>
                        <p class="role"><?php echo htmlspecialchars($member['role']); ?></p>
                        <p><?php echo htmlspecialchars($member['description']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section class="cta">
    <div class="container">
        <h2>ENVIE DE VOYAGER AVEC NOUS ?</h2>
        <p>Découvrez nos services et commencez à planifier votre prochaine aventure dès aujourd'hui.</p>
        <a href="index.php?page=reservation" class="btn">Faire une réservation</a>
    </div>
</section>

<?php require_once dirname(__DIR__) . '/../Views/layouts/footer.php'; ?> 