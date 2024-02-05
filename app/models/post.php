<?php

// JSON encode uses the getters defined for this class
class Post {
    public id;
    public cover;
    public title;
    public content;
    public author;
    public visibility;
    public datetime;

    public function __construct($_id, $_author, $_cover, $_title, $_content, $_visibility, $_datetime) 
    {
        $this->id = $_id;
        $this->cover = $_cover;
        $this->title = $_title;
        $this->content = $_content;
        $this->author = $_author;
        $this->visibility = $_visibility;
        $this->datetime = $_datetime;
    }

    public function getID() {
        return $this->id;
    }
    public function getTitle() {
        return $this->title;
    }
    public function getContent() {
        return $this->content;
    }
    public function getAuthor() {
        return $this->author;
    }
    public function getVisibility() {
        return $this->visibility;
    }
    public function getDateTime() {
        return $this->datetime;
    }
}

?>