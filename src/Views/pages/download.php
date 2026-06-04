<h1>Téléchargement</h1>

<?php if (!empty($error)): ?>

    <p style="color:red;">
        <?= \App\Core\View::escape($error) ?>
    </p>

<?php elseif (!empty($file)): ?>

    <p>
        Téléchargement du fichier :
        <strong><?= \App\Core\View::escape($file) ?></strong>
    </p>

    <a class="btn btn-primary"
       href="/download/file?file=<?= urlencode($file) ?>">
        Télécharger
    </a>

<?php else: ?>

    <p>Aucun fichier spécifié pour le téléchargement.</p>

<?php endif; ?>
