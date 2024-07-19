<?php

require_once 'src/Entities/Post.php';

// Service pattern

// They are generic classes that perform logic or do a process for you
// You can create services to do 'odd jobs' that don't fit anywhere else

// Examples
// Code needed to display stuff
// Calculations
// Conversions
    // Currency conversion
    // time zone conversions
// Validation

// Each service you create should have a single responsibility
// You might create a PostsDisplayService that contains the methods
// you need to display blog posts

// Because services are really just collections of related functions
// We can often make their methods static so we don't have to
// instantiate an object to use them
class PostsDisplayService {
    public static function displaySinglePost(Post $post): string
    {
        $output = "
            <div>
                <h1>{$post->getTitle()}</h1>
                <img src='{$post->getImage()}' />
                <p>{$post->getCategory()}</p>
            </div>
        ";

        return $output;
    }

    /**
     * @param Post[] $posts
     */
    public static function displayAllPosts(array $posts): string
    {
        $output = '';

        foreach ($posts as $post) {
            $output .= "
                <div>
                    <h3>{$post->getTitle()}</h3>
                    <img src='{$post->getImage()}' />
                </div>
            ";
        }

        return $output;
    }
}
