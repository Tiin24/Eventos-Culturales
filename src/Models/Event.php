<?php

class Event
{
    private $id;
    private $title;
    private $place;
    private $date;
    private $time;
    private $category;
    private $description;
    private $imageUrl;
    private $capacity;
    private $price;
    private $tags;

    public function __construct($id, $title, $place, $date, $time, Category $category, $description, $imageUrl, $capacity, $price, $tags)
    {
        $this->id = $id;
        $this->title = $title;
        $this->place = $place;
        $this->date = $date;
        $this->time = $time;
        $this->category = $category;
        $this->description = $description;
        $this->imageUrl = $imageUrl;
        $this->capacity = $capacity;
        $this->price = $price;
        $this->tags = $tags;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getPlace()
    {
        return $this->place;
    }

    public function getDate()
    {
        return $this->date;
    }
    public function getTime()
    {
        return $this->time;
    }
    public function getCategory()
    {
        return $this->category;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getImageUrl()
    {
        return $this->imageUrl;
    }
    public function getCapacity()
    {
        return $this->capacity;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getTags()
    {
        return $this->tags;
    }
}
