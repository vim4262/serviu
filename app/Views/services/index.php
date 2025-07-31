<?php require_once dirname(__DIR__) . '/../Views/layouts/header.php'; ?>

<section class="services-page">
    <div class="container">
        <h1>Nos Services</h1>
        <p class="page-description"><?php echo htmlspecialchars($data['description']); ?></p>
        
        <div class="services-grid">
            <?php foreach ($data['services'] as $service): ?>
                <div class="service-card">
                    <div class="service-image">
                        <img src="<?php echo asset(str_replace('Public/assets/', '', $service['image'])); ?>" alt="<?php echo htmlspecialchars($service['title']); ?>">
                    </div>
                    <div class="service-content">
                        <h2><?php echo htmlspecialchars($service['title']); ?></h2>
                        <p class="service-description"><?php echo htmlspecialchars($service['description']); ?></p>
                        <ul class="service-features">
                            <?php foreach ($service['features'] as $feature): ?>
                                <li><?php echo htmlspecialchars($feature); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="<?php echo url('services', ['service' => $service['id']]); ?>" class="btn">En savoir plus</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="cta">
    <div class="container">
        <h2>PRÊT À COMMENCER VOTRE AVENTURE ?</h2>
        <p>Contactez-nous pour discuter de vos besoins et obtenir un devis personnalisé.</p>
        <a href="<?php echo url('reservation'); ?>" class="btn">Faire une réservation</a>
    </div>
</section>

<?php require_once dirname(__DIR__) . '/../Views/layouts/footer.php'; ?> 