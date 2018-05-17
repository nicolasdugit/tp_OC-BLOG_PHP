<?php
session_start();
require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment(htmlspecialchars($_GET['id']), htmlspecialchars($_POST['author']), htmlspecialchars($_POST['comment']));
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['action'] == 'selectComment') {
            if (isset($_GET['comId']) && $_GET['comId'] > 0) {
                if (isset($_GET['postId']) && $_GET['postId'] > 0) {
                    selectComment();
                }
                else{
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            }
            else{
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
        elseif ($_GET['action'] == 'updateComment') {
            if (isset($_GET['comId']) && $_GET['comId'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    updateComment(htmlspecialchars($_GET['comId']), htmlspecialchars($_POST['author']), htmlspecialchars($_POST['comment']), htmlspecialchars($_GET['postId']));
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
        elseif ($_GET['action'] == 'connectionPage') {
            connectionPage();
        }
        elseif ($_GET['action'] == 'connection') {
            if ($_POST['pseudo'] && $_POST['pass']) {
                connection(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['pass']));
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
        elseif ($_GET['action'] == 'deconnection') {
            if ($_SESSION['pseudo']) {
                deconnection();
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
        elseif ($_GET['action'] == 'inscriptionPage') {
            inscriptionPage();
        }
        elseif ($_GET['action'] == 'inscription') {
            if ($_POST['pseudo'] && $_POST['pass'] && $_POST['mail']) {

                if (($_POST['pass'] != $_POST['pass-confirm'])) {
                    throw new Exception('Les mot des passes doivent etre identiques');
                }
                else {
                    $_POST['mail'] = htmlspecialchars($_POST['mail']);
                    if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])) {
                        throw new Exception('Adresse mail non valide');
                    } else {
                        inscription(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['pass']), htmlspecialchars($_POST['mail']));  
                    }
                }
            }
            else {
                throw new Exception('Veuillez remplir tous les champs');
            }
        }
    }
    else {
        listPosts();
    }
}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/frontend/errorView.php');
}
