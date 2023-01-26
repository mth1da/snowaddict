<?php

require_once('models/figure.php');
require_once('lib/database.php');
require_once('repositories/figureRepository.php');

final class FigureController {

    private FigureRepository $figureRepository;

    /*
    function __construct(){ //on initialise ici pour éviter de faire appel aux 2 lignes à chaque fois
        $this->$figureRepository = new FigureRepository();
        $this->$figureRepository->setConnection((new DatabaseConnection())->getConnection());
    }*/

    //CRUD
    function create(): void{
        $isSent = false;
        if ('POST' === $_SERVER['REQUEST_METHOD']){
            //var_dump($_POST);
            $isSent = true;

            $figure = new Figure();
            $figure->setName($_POST['name']);
            $figure->setDescription($_POST['description']);
            $figure->setPicturePath($_POST['picture']);
            $figure->setVideoPath($_POST['video']);

            $figureRepository = new FigureRepository();
            $figureRepository->setConnection((new DatabaseConnection())->getConnection());
            
            $figureRepository->create($figure);

            //var_dump($figure);die;

        }
        require_once('views/pages/figure/create.php');
    }

    function read(int $id){
        $figureRepository = new FigureRepository();
        $figureRepository->setConnection((new DatabaseConnection())->getConnection());
        $figure = $figureRepository->getFigureById($id); //on stocke le resultat dans $figure pour pouvoir l'utiliser dans read.php
        require_once('views/pages/figure/read.php');
    }

    function update(int $id){
        $isSent = false;
        if ('POST' === $_SERVER['REQUEST_METHOD']){
            //var_dump($_POST);
            $isSent = true;

            $figure = new Figure();
            $figure->setId($id);
            $figure->setName($_POST['name']);
            $figure->setDescription($_POST['description']);
            $figure->setPicturePath($_POST['picture']);
            $figure->setVideoPath($_POST['video']);
            $figure->setUpdatedAt(new \DateTime());
            
            $figureRepository = new FigureRepository();
            $figureRepository->setConnection((new DatabaseConnection())->getConnection());

            $figureRepository->update($figure,$id);

            //var_dump($figure);die;
        }
        else{
            $figureRepository = new FigureRepository();
            $figureRepository->setConnection((new DatabaseConnection())->getConnection());
            
            $figure = $figureRepository->getFigureById($id);
        }
        require_once('views/pages/figure/update.php');
    }

    function delete(int $id){
        $figureRepository = new FigureRepository();
        $figureRepository->setConnection((new DatabaseConnection())->getConnection());

        $figureRepository->delete($id);

        $isDeleted = true;

        $figureRepository = new FigureRepository();
        $figureRepository->setConnection((new DatabaseConnection())->getConnection());
        $tabFigures = $figureRepository->list();
        require_once('views/pages/figure/list.php');
    }

    function list():void{
        //$isDeleted = false;
        $figureRepository = new FigureRepository();
        $figureRepository->setConnection((new DatabaseConnection())->getConnection());
        $tabFigures = $figureRepository->list();
        require_once('views/pages/figure/list.php');

    }
}
