<?php $titre = 'Mon Blog'; ?>

<?php ob_start(); ?>

<hr />

<form action="?action=insertb" method="post">
    <input type="text" name="title">
    <br>
    <br>
    <textarea name="contenu">dqz </textarea>
    <br>
    <br>
    <button type="submit">Post</button>
</form>

<?php $contenu = ob_get_clean(); ?>

<?php  require 'gabarit.php'; ?>


