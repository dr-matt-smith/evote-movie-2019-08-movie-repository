<?php

namespace Mattsmithdev;


class MovieRepository
{
    private $movies = [];

    public function __construct()
    {
        $this->movies[] = [
            'id' => 1,
            'title' => 'Jaws',
            'price' => 10.00
        ];

        $this->movies[] = [
            'id' => 2,
            'title' => 'Aliene',
            'price' => 19.99
        ];

        $this->movies[] = [
            'id' => 3,
            'title' => 'Shrek',
            'price' => 10.00
        ];
    }

    public function findAll()
    {
        return $this->movies;
    }
}