<?php
namespace App\Models;

class Products {

    private $id;

    private $name;

    private $description;

    private $prix;

    private $media_id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @return mixed
     */
    public function getMediaId()
    {
        return $this->media_id;
    }

    public function getExtrait(int $limit) {

        if (strlen($this->description) > $limit) {
            $text = substr($this->description,0,$limit);
            $lastSpace = strrpos($this->description,' ');
            $text = substr($text,0,$lastSpace);
        }

        return $text.'...';
    }





}
