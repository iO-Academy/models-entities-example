<?php
declare(strict_types = 1);

require_once 'src/DatabaseConnector.php';
require_once 'src/Models/PostsModel.php';
require_once 'src/Services/PostsDisplayService.php';


$db = DatabaseConnector::connect();

$postsModel = new PostsModel($db);

$posts = $postsModel->getAllPosts();

echo PostsDisplayService::displayAllPosts($posts);