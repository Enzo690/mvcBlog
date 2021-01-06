<?php $titre = "Mon Blog - " . $billet['titre']; ?>

<?php ob_start(); ?>
<article>
    <header>
        <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
        <time><?= $billet['date'] ?></time>
    </header>
    <p><?= $billet['contenu'] ?></p>
</article>
<form action="?action=delbillet" method="post">
    <button type="submit">Supprimer</button>
    <input name="id" type="hidden" value=<?= $billet['id'] ?>>
</form>
<hr />
<header>
    <h1 id="titreReponses">Réponses à <?= $billet['titre'] ?></h1>
</header>
<?php foreach ($commentaires as $commentaire): ?>
    <p><?= $commentaire['auteur'] ?> dit :</p>
    <p><?= $commentaire['contenu'] ?></p>
    <form action="?action=delcom" method="post">
        <button type="submit">Supprimer</button>
        <input name="id" type="hidden" value=<?= $commentaire['id'] ?>>
        <input name="idB" type="hidden" value=<?= $billet['id'] ?>>
    </form>
<?php endforeach; ?>
<br><br><br><br>
<form action="?action=insertcom" method="post">
    <textarea name="contenuCom"></textarea>
    <br>
    <button type="submit">Post</button>
    <input name="id_billet" type="hidden" value=<?= $billet['id'] ?>>
</form>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
