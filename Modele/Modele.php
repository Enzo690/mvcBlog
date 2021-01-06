<?php

// Renvoie la liste des billets du blog
function getBillets() {
    $bdd = getBdd();
    $billets = $bdd->query('select BIL_ID as id, BIL_DATE as date,'
            . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
            . ' order by BIL_ID desc');
    return $billets;
}

// Renvoie les informations sur un billet
function getBillet($idBillet) {
    $bdd = getBdd();
    $billet = $bdd->prepare('select BIL_ID as id, BIL_DATE as date,'
            . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
            . ' where BIL_ID=?');
    $billet->execute(array($idBillet));
    if ($billet->rowCount() == 1)
        return $billet->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
}

// Renvoie la liste des commentaires associés à un billet
function getCommentaires($idBillet) {
    $bdd = getBdd();
    $commentaires = $bdd->prepare('select COM_ID as id, COM_DATE as date,'
            . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
            . ' where BIL_ID=?');
    $commentaires->execute(array($idBillet));
    return $commentaires;
}

function insertCom($text,$bill) {
    setlocale (LC_TIME, 'fr_FR.utf8','fra');
    $bdd = getBdd();
    $insert = $bdd->prepare('insert into T_COMMENTAIRE (COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID) values (?,?,?,?)');
    $insert->execute(array(strftime("%A %d %B"),'Anonyme',$text,$bill));
}

function insertBillet($titre, $text) {
    setlocale (LC_TIME, 'fr_FR.utf8','fra');
    $bdd = getBdd();
    $insert = $bdd->prepare('INSERT INTO T_BILLET (BIL_DATE,BIL_TITRE,BIL_CONTENU) VALUES (?, ?, ?) ');
    $insert->execute(array(strftime("%A %d %B"),$titre,$text));
    header("Location: ?action=billet&id=". $bdd->lastInsertId());
}

function deleteBillet($idBillet) {
    $bdd = getBdd();
    $billetcom = $bdd->prepare('DELETE FROM t_commentaire WHERE BIL_ID=?');
    $billetcom->execute(array($idBillet));
    $billeto = $bdd->prepare('DELETE FROM t_billet WHERE BIL_ID=?');
    $billeto->execute(array($idBillet));
    header("Location: index.php");
}

function deleteCom($idCom) {
    $bdd = getBdd();
    $billetcom = $bdd->prepare('DELETE FROM t_commentaire WHERE COM_ID=?');
    $billetcom->execute(array($idCom));
}

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=blogmvc;charset=utf8', 'root',
            '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}