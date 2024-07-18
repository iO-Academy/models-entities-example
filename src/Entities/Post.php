<?php

declare(strict_types=1);

// An entity is class that is used to represent a single row from our database
// Rather than dealing with arrays (which can contain anything) we pass the data around
// using entities

// Arrays can contain anything
// Objects cannot - we decide what an object contains by giving it properties

// We use private properties with getters to make this class readonly
// We can trust that the data in the entity has not been tampered with since getting it out of the DB

// Entities are sometimes called DTOs (data transfer objects)
// Allow us to reliably pass data around our program
// Arrays can contain anything, typehinting something as array is not that useful
// Objects can only contain the properties we define

// We are using this as a custom assoc array
// We're making our own custom datatype specific to the data we deal with

// The single responsibility of an entity is to represent a row of data from the database
// They shouldn't contain code to display the data
class Post {
    // Create properties for each column in the db
    // These property names must be the same as your db columns
    // They will also work with aliasing - if you have an alias in your query, the property here should
    // match the alias
    private int $id;
    private string $title;
    private string $image;

    // We don't need a constructor here because we're using PDO fetch_class
    // fetch_class does not want your class to have a constructor - it uses magic to inject the data
    // into the properties

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getImage(): string
    {
        return $this->image;
    }
}