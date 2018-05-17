<?php

use \OpenClassrooms\Blog\Model\PostManager;
use \OpenClassrooms\Blog\Model\CommentManager;
use \OpenClassrooms\Blog\Model\MembersManager;

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/MembersManager.php');


function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    if (!empty($post)) 
    {
        require('view/frontend/postView.php');
    }
    else
    {
        throw new Exception('Aucun message trouvé sur cette page');
    }
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) 
    {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else 
    {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function selectComment()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['postId']);
    $comment = $commentManager->getComment($_GET['comId']);

    require('view/frontend/editCommentView.php');
}

// Update du commentaire
function updateComment($commentId, $author, $comment, $postId)
{
    $commentManager = new CommentManager();

    $updatedLines = $commentManager->updateComment($commentId, $author, $comment);

    if ($updatedLines === false) 
    {
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else 
    {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

//connexion utilisateur
function connectionPage()
{
    require('view/frontend/members/connectionView.php');
}

function connection($pseudo, $pass)
{
    $membersManager = new MembersManager();

    $pass_hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    $passTest = $membersManager->connection($_POST['pseudo'], $pass_hash);

    $isPassCorrect = password_verify($_POST['pass'], $passTest['pass']);
  
    if (!$passTest)
    {
        throw new Exception('Mauvais identifiant ou mot de passe');
    }
    else
    {
        if ($isPassCorrect) {
            session_start();
            $_SESSION['id'] = $passTest['id'];
            $_SESSION['pseudo'] = $_POST['pseudo'];
            header('Location: index.php');
        }
        else {
            throw new Exception('Mauvais identifiant ou mot de passe');
        }
    } 
}

function deconnection ()
{
    $_SESSION = array();
    session_destroy();
     header('Location: index.php');
}

function inscriptionPage()
{
    require('view/frontend/members/inscriptionView.php');
}

function inscription($pseudo, $pass, $mail)
{
    $membersManager = new MembersManager();

    $pass_hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    $affectedLines = $membersManager->inscription($pseudo, $pass_hash, $mail);

    if ($affectedLines === false) 
    {
        echo "string";
        echo $affectedLines;
        throw new Exception('Impossible d\'ajouter votre compte !');
    }
    else 
    {
        header('Location: index.php');
    }
}