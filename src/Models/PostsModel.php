<?php

declare(strict_types=1);

require_once 'src/Entities/Post.php';

// A model is a class that contains database queries
// We usually make one model per database table
    // We name the models TableModel
// We would take all SQL queries that interact with the posts table, and put them
// into this model

// Could contain methods like:
// - getAllPosts
// - getPostById
// - createPost
// - editPost
// - deletePost

// Each model should only contain queries for it's respective DB table

// Nothing else should go in a model
// Only database queries - the single responsibility of a model is a handle DB queries for a given table
class PostsModel {
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllPosts(): array
    {
        $query = $this->db->prepare('SELECT `id`, `title`, `image` FROM `posts`;');
        $query->setFetchMode(PDO::FETCH_CLASS, Post::class);
        $query->execute();
        return $query->fetchAll();
    }

    public function getPostById(int $id): Post
    {
        $query = $this->db->prepare('SELECT `id`, `title`, `image` FROM `posts` WHERE `id` = :id');
        // Tells PDO to put the data into the Post entity class, rather than an assoc array
        $query->setFetchMode(PDO::FETCH_CLASS, Post::class);
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    public function createPost(string $title, string $content, string $image): bool
    {
        $query = $this->db->prepare('INSERT INTO `posts` (`title`, `content`, `image`) VALUES (:title, :content, :image);');
        return $query->execute([
            'title' => $title,
            'content' => $content,
            'image' => $image
        ]);
    }
}