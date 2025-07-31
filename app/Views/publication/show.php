<?php require_once dirname(__DIR__) . '/../Views/layouts/header.php'; ?>

<section class="article-page">
    <div class="container">
        <article class="article-full">
            <header class="article-header">
                <h1><?php echo htmlspecialchars($data['article']['title']); ?></h1>
                <div class="article-meta">
                    <span class="author">Par <?php echo htmlspecialchars($data['article']['author']); ?></span>
                    <span class="date"><?php echo htmlspecialchars($data['article']['date']); ?></span>
                </div>
            </header>
            <div class="article-image">
                <img src="<?php echo asset(str_replace('Public/assets/', '', $data['article']['image'])); ?>" alt="<?php echo htmlspecialchars($data['article']['title']); ?>">
            </div>
            <div class="article-content">
                <p><?php echo nl2br(htmlspecialchars($data['article']['content'])); ?></p>
            </div>
            <footer class="article-footer">
                <a href="<?php echo url('publication'); ?>" class="btn">← Retour aux articles</a>
            </footer>
        </article>
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