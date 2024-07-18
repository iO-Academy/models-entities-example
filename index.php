<?php
declare(strict_types = 1);

require_once 'src/DatabaseConnector.php';
require_once 'src/Models/PostsModel.php';



// DatabaseConnector.php
// The job of this class is simply to give us a database connection
// Because we declared the connect method as static, we don't need to instantiate the object
// :: is like -> but for static methods
$db = DatabaseConnector::connect();


// PostsModel.php
// The job of a model is handle all database interactions for a given table
// This model contains all the SQL queries we need to work with the posts db table

// When we need to run a query, we start by instantiating the model and giving it a DB connection
$postsModel = new PostsModel($db);

// We can then call the methods of the model to query the database for us
$postsModel->createPost('Testing models again', 'Does this work?', 'dog.jpg');
$posts = $postsModel->getAllPosts(); // Get all posts
$post = $postsModel->getPostById(1); // Get a single post

// Post.php
// The job of an entity is to represent a single row from a database table
// Our model returns the data in our entities
// They give us a much more reliable way to pass the data around than just using arrays
// We can now type hint functions/methods as taking a Post rather than just an Array
function displayPost(Post $post): string {
    return "<div>{$post->getTitle()}</div>";
}
