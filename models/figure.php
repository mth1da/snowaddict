<?php

final class Figure{
    private ?int $id; //ici id est une var
    private string $name;
    private string $description;
    private string $picturePath;
    private string $videoPath;
    private \DateTime $createdAt;  // antislash pour préciser que la classe DateTime vient de php
    private ?\DateTime $uploadedAt = null; // ? pour préciser que c'est optionnel
    private ?\DateTime $deletedAt = null;

    function __construct(){ //constructeur
        $this->createdAt = new \DateTime(); //date du jour automatiquement
    }

    public function getId(): ?int{
        return $this->id;  //ici id est un attribut de l'objet
    }

    public function setId(string $id): self{
        $this->id=$id; //this est l'instance sur laquelle on travaille
        return $this;
    }

    public function getName(): string{
        return $this->name;
    }

    public function setName(string $name): self{
        $this->name=$name; //this est l'instance sur laquelle on travaille
        return $this;
    }


    public function getDescription(): string{
        return $this->description;
    }

    public function setDescription(string $description): self {
        $this->description=$description; //this est l'instance sur laquelle on travaille
        return $this;
    }


    public function getPicturePath(): string{
        return $this->picturePath;
    }

    public function setPicturePath(string $picturePath) :self{
        $this->picturePath=$picturePath; //this est l'instance sur laquelle on travaille
        return $this;
    }


    public function getVideoPath(): string{
        return $this->videoPath;
    }

    public function setVideoPath(string $videoPath) :self{
        $this->videoPath=$videoPath; //this est l'instance sur laquelle on travaille
        return $this;
    }


    public function getCreatedAt(): string{
        return $this->createdAt->format('Y-m-d H:i:s');
    }

    public function setCreatedAt(\DateTime $createdAt) :self{
        $this->createdAt=$createdAt;
        return $this;
    }


    public function getUpdatedAt(): ?string{
        return $this->updatedAt !==null ? $this->updatedAt->format('Y-m-d H:i:s') : null; //ternaire
    }

    public function setUpdatedAt(?\DateTime $updatedAt) :self{
        $this->updatedAt=$updatedAt;
        return $this;
    }


    public function getDeletedAt(): ?string{
        return $this->deletedAt !==null ?  $this->deletedAt->format('Y-m-d H:i:s') : null;  //ternaire
    }

    public function setDeletedAt(?\DateTime $deletedAt) :self{
        $this->deletedAt=$deletedAt;
        return $this;
    }
}

?>