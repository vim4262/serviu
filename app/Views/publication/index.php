<?php require_once dirname(__DIR__) . '/../Views/layouts/header.php'; ?>

<section class="publication-page">
    <div class="container">
        <h1>Publications & Actualités</h1>
        <p class="page-description"><?php echo htmlspecialchars($data['description']); ?></p>
        
        <div class="articles-grid">
            <?php foreach ($data['articles'] as $article): ?>
                <article class="article-card">
                    <div class="article-image">
                        <img src="<?php echo asset(str_replace('Public/assets/', '', $article['image'])); ?>" alt="<?php echo htmlspecialchars($article['alt']); ?>">
                    </div>
                    <div class="article-content">
                        <h2><a href="<?php echo url('publication', ['article' => $article['id']]); ?>"><?php echo htmlspecialchars($article['title']); ?></a></h2>
                        <div class="article-meta">
                            <span class="author">Par <?php echo htmlspecialchars($article['author']); ?></span>
                            <span class="date"><?php echo htmlspecialchars($article['date']); ?></span>
                        </div>
                        <p class="article-excerpt"><?php echo htmlspecialchars($article['excerpt']); ?></p>
                        <a href="<?php echo url('publication', ['article' => $article['id']]); ?>" class="read-more">Lire l'article complet</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="cta">
    <div class="container">
        <h2>BESOIN D'AIDE POUR VOTRE VOYAGE ?</h2>
        <p>Nos experts sont là pour vous accompagner dans tous vos projets de voyage.</p>
        <a href="<?php echo url('contact'); ?>" class="btn">Contactez-nous</a>
    </div>
</section>

<?php require_once dirname(__DIR__) . '/../Views/layouts/footer.php'; ?> 