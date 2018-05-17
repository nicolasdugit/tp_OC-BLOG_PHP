<?php

use \OpenClassrooms\Blog\Model\PostManager;
use \OpenClassrooms\Blog\Model\CommentManager;
// Chargement des classes
require_once('../model/PostManager.php');
require_once('../model/CommentManager.php');

function adminPage()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('../view/backend/adminConnexionView.php');
}
