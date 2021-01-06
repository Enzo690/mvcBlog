<?php

require 'Modele/Modele.php';

// Affiche la liste de tous les billets du blog
function accueil() {
    $billets = getBillets();
    require 'Vue/vueAccueil.php';
}

function register($username,$mdp,$perm) {
    insertUser($username,$mdp,$perm);
    require 'Vue/vueLogin.php';
}

// Affiche les détails sur un billet
function billet($idBillet) {
    $billet = getBillet($idBillet);
    $commentaires = getCommentaires($idBillet);
    require 'Vue/vueBillet.php';
}

function delCommentaire($idBillet){
    deleteCom($idBillet);
    require 'Vue/vueBillet.php';
}

function delBillet($idBillet){
    deleteBillet($idBillet);
    require 'Vue/vueBillet.php';
}

function insertC($title,$text){
    insertCom($title,$text);
    require 'Vue/vueBillet.php';
}

function insertB($postT,$postTe){
    insertBillet($postT,$postTe);
    require 'Vue/vueBillet.php';
}

// Affiche une erreur
function erreur($msgErreur) {
    require 'Vue/vueErreur.php';
}

