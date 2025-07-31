<?php require_once dirname(__DIR__) . '/../Views/layouts/header.php'; ?>

<section class="service-page">
    <div class="container">
        <div class="service-full">
            <header class="service-header">
                <h1><?php echo htmlspecialchars($data['service']['title']); ?></h1>
                <p class="service-description"><?php echo htmlspecialchars($data['service']['description']); ?></p>
            </header>
            <div class="service-image">
                <img src="<?php echo asset(str_replace('Public/assets/', '', $data['service']['image'])); ?>" alt="<?php echo htmlspecialchars($data['service']['title']); ?>">
            </div>
            <div class="service-content">
                <p><?php echo nl2br(htmlspecialchars($data['service']['content'])); ?></p>
                <h2>Nos prestations</h2>
                <ul class="service-features">
                    <?php foreach ($data['service']['features'] as $feature): ?>
                        <li><?php echo htmlspecialchars($feature); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <footer class="service-footer">
                <a href="index.php?page=services" class="btn">← Retour aux services</a>
                <a href="index.php?page=reservation" class="btn btn-primary">Demander un devis</a>
            </footer>
        </div>
    </div>
</section>

<section class="cta">
    <div class="container">
        <h2>PRÊT À COMMENCER VOTRE AVENTURE ?</h2>
        <p>Contactez-nous pour discuter de vos besoins et obtenir un devis personnalisé.</p>
        <a href="index.php?page=contact" class="btn">Contactez-nous</a>
    </div>
</section>

<?php require_once dirname(__DIR__) . '/../Views/layouts/footer.php'; ?> 