<?php


namespace App\DesignPatterns\Fundamental\PropertyContainer;


class BlogPost extends PropertyContainer
{
    private $title;

    private $category_id;

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }
    public function getCategoryId(){
        return $this->category_id;
    }

    public function setCategoryId($id){
        $this->category_id = $id;
    }

}