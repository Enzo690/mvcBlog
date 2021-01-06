<?php

require 'Controleur/Controleur.php';

try {
    if (isset($_GET['action'])) {

        switch ($_GET['action']) {
            case 'billet':
                if (isset($_GET['id'])) {
                    $idBillet = intval($_GET['id']);
                    if ($idBillet != 0) {
                        billet($idBillet);
                    }
                    else
                        throw new Exception("Identifiant de billet non valide");
                }
                else
                    throw new Exception("Identifiant de billet non défini");
                break;
            case 'insertcom':
                try {
                    $id = intval($_POST['id_billet']);
                    if (isset($_POST['contenuCom']) && !empty($_POST['contenuCom'])){
                        insertC($_POST['contenuCom'],$id);
                        header('Location:' . $_SERVER['PHP_SELF'] . '?action=billet&id='.$id);
                    }
                }
                catch (Exception $e) {
                    $msgErreur = $e->getMessage();
                }
                break;
            case 'delcom':
                try {

                    if (isset($_POST['id'])) {
                        // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                        $id = intval($_POST['id']);
                        $idB = intval($_POST['idB']);
                        if ($id != 0) {
                            delCommentaire($id);
                            header("Location:?action=billet&id=".$idB);
                        } else
                            throw new Exception("Identifiant de billet incorrect");
                    } else
                        throw new Exception("Aucun identifiant de billet");
                } catch (Exception $e) {
                    $msgErreur = $e->getMessage();
                }
                break;

            case 'insertb':
                try {
                    if (isset($_POST['title']) && isset($_POST['contenu']) && !empty($_POST['title']) && !empty($_POST['contenu'])){
                        insertB($_POST['title'], $_POST['contenu']);
                    }
                }
                catch (Exception $e) {
                    $msgErreur = $e->getMessage();
                }
                break;

            case 'goinsert':
               require 'Vue/vueInsert.php';
                break;

            case 'delbillet':
                try {

                    if (isset($_POST['id'])) {
                        // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                        $id = intval($_POST['id']);
                        if ($id != 0) {
                            delBillet($id);
                            header('Location: ?iks=e');
                        } else
                            throw new Exception("Identifiant de billet incorrect");
                    } else
                        throw new Exception("Aucun identifiant de billet");
                }
                catch (Exception $e) {
                    $msgErreur = $e->getMessage();
                }
                break;

            case 'login':
                try {

                    if (isset($_POST['id']) isset($_POST['id']) isset($_POST['id'])) {
                        // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                        $id = intval($_POST['id']);
                        if ($id != 0) {
                            delBillet($id);
                            header('Location: ?iks=e');
                        } else
                            throw new Exception("Identifiant de billet incorrect");
                    }else
                        throw new Exception("Aucun identifiant de billet");
                }
                catch (Exception $e) {
                    $msgErreur = $e->getMessage();
                }
                break;

            case 'goinsert':
                require 'Vue/vueInsert.php';
                break;

            case 'gologin':
                require 'Vue/vueLogin.php';
                break;

            default :
                throw new Exception("Action non valide");
        }

    }
    else {  // aucune action définie : affichage de l'accueil
        accueil();
    }
}
catch (Exception $e) {
    erreur($e->getMessage());
}