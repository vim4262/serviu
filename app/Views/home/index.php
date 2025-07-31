<?php require_once dirname(__DIR__) . '/../Views/layouts/header.php'; ?>

<!-- Section d'introduction -->
<section class="intro">
    <h1>Bienvenue chez Servium</h1>
    <p><?php echo htmlspecialchars($data['description']); ?></p>
</section>

<section class="about">
    <div class="container">
        <h1>Qui-sommes nous?</h1>
    </div>
    <p>
        Chez <strong>Servium</strong>, nous transformons vos envies d'évasion en expériences inoubliables.
        Que ce soit pour un voyage d'affaires, une escapade en famille ou une aventure personnelle,
        notre équipe vous accompagne avec professionnalisme, écoute et passion. Grâce à notre expertise du secteur,
        nous vous garantissons des prestations fiables, personnalisées et au meilleur rapport qualité-prix. Explorez
        le monde en toute sérénité avec Servium.
    </p>
</section>

<!-- Section Services -->
<section class="services">
    <div class="container">
        <h1>Nos Services</h1>
        <div class="card-grid">
            <?php foreach ($data['services'] as $service): ?>
                <a href="<?php echo url('services', ['service' => $service['link']]); ?>" class="card">
                    <h3><?php echo htmlspecialchars($service['title']); ?></h3>
                    <p><?php echo htmlspecialchars($service['description']); ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Blog Posts Section -->
<section class="banner">
    <div class="container1">
    </div>
</section>

<section class="blog-posts-section">
    <div class="container">
        <h1 class="section-title">Nos Derniers Articles</h1>
        <div class="blog-posts">
            <?php foreach ($data['articles'] as $article): ?>
                <div class="blog-post-card">
                    <img src="<?php echo asset(str_replace('Public/assets/', '', $article['image'])); ?>" alt="<?php echo htmlspecialchars($article['alt']); ?>" />
                    <div class="post-details">
                        <h3><a href="<?php echo url('publication', ['article' => str_replace('#', '', $article['link'])]); ?>"><?php echo htmlspecialchars($article['title']); ?></a></h3>
                        <p class="author">Par <?php echo htmlspecialchars($article['author']); ?> | <?php echo htmlspecialchars($article['date']); ?></p>
                        <a href="<?php echo url('publication', ['article' => str_replace('#', '', $article['link'])]); ?>" class="read-more">Lire l'article</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Section Appel à l'action -->
<section class="cta">
    <div class="container">
        <h2>PRÊT À VOYAGER AVEC NOUS ?</h2>
        <p>Contactez notre équipe dès aujourd'hui et planifiez votre prochaine aventure en toute sérénité avec Servium.</p>
        <a href="<?php echo url('contact'); ?>" class="btn">Contactez-nous</a>
    </div>
</section>

<?php require_once dirname(__DIR__) . '/../Views/layouts/footer.php'; ?> 