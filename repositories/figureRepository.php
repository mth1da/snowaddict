<?php

require_once('models/figure.php');
require_once('lib/database.php');

final class FigureRepository{

    public function setConnection(\PDO $databaseConnection): self{
        $this->databaseConnection = $databaseConnection;
        //var_dump("$this->databaseConnection);
        return $this;
    }


    //requete préparée plus rapide et plus safe que la requete normale
    public function create(Figure $figure): void{
        $query = $this->databaseConnection->prepare("INSERT INTO figure (name, description, picture, video, createdAt) VALUES (:name, :description, :picture, :video, :createdAt)");
        //pas besoin de mettre id dans le query pcq c'est auto increment

        $name = $figure->getName(); //<==> en java : string name = figure.getName()
        $description = $figure->getDescription();
        $picture = $figure->getPicturePath();
        $video = $figure->getVideoPath();
        $createdAt = $figure->getCreatedAt();

        $query->bindParam(':name', $name);
        $query->bindParam(':description', $description);
        $query->bindParam(':picture', $picture);
        $query->bindParam(':video', $video);
        $query->bindParam(':createdAt', $createdAt);

        $query->execute();
    }

    public function list(): array{
        $query = $this->databaseConnection->prepare("SELECT * FROM figure");
        $query->execute();
        $results=$query->fetchAll();

        $tabFigures=[];
        foreach($results as $result){
            $figure=new Figure();
            $figure->setId($result['id']);
            $figure->setName($result['name']);
            $figure->setDescription($result['description']);
            $figure->setPicturePath($result['picture']);
            $figure->setVideoPath($result['video']);
            $figure->setCreatedAt(new \DateTime($result['createdAt']));
            $figure->setUpdatedAt($result['updatedAt']!==null ? new \DateTime($result['updatedAt']) : null);

            $tabFigures[]=$figure; //au denier élement du tableau
        }

        //var_dump($tabFigures);
        return $tabFigures;

    }

    public function getFigureById(int $id): Figure{
        $query = $this->databaseConnection->prepare("SELECT * FROM figure where id=:id");

        $query->bindParam(':id', $id);
        $query->execute();
        $result=$query->fetch();

        $figure=new Figure();
            $figure->setId($result['id']);
            $figure->setName($result['name']);
            $figure->setDescription($result['description']);
            $figure->setPicturePath($result['picture']);
            $figure->setVideoPath($result['video']);
            //$figure->setCreatedAt(new \DateTime($result['createdAt']));
            //$figure->setUpdatedAt($result['updatedAt']!==null ? new \DateTime($result['updatedAt']) : null);

        return $figure;
    }

    public function update(Figure $figure, int $id):void{
        $query = $this->databaseConnection->prepare("UPDATE figure SET name = :name, description = :description, picture = :picture, video = :video, updatedAt = :updatedAt where id= :id");

        $id = $figure->getId();
        $name = $figure->getName();
        $description = $figure->getDescription();
        $picture = $figure->getPicturePath();
        $video = $figure->getVideoPath();
        $updatedAt = $figure->getUpdatedAt();

        $query->bindParam(':id', $id);
        $query->bindParam(':name', $name);
        $query->bindParam(':description', $description);
        $query->bindParam(':picture', $picture);
        $query->bindParam(':video', $video);
        $query->bindParam(':updatedAt', $updatedAt);

        $query->execute();

    }

    public function delete (int $id):void{
        $query = $this->databaseConnection->prepare("DELETE FROM figure where id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
    }
}

?>