<?php

    require_once('controllers/homepageController.php');
    require_once('controllers/figureController.php');

    // define('HOMEPAGE_PATH', '/');
    // define('CONTACT_PATH', '/contact');

    const HOMEPAGE_PATH = '';
    const CONTACT_PATH = 'contact';
    const FIGURE_PATHS = 'figure';

    //var_dump($_GET);

    try {
        if (isset($_GET['action']) && ''!==$_GET['action']){
            $action = $_GET['action'];

            if ('figure' === $_GET['controller']){
                $figureController = new FigureController();

                if ('create' === $action){
                    $figureController->create();
                }

                elseif ('list' === $action){
                    if (array_key_exists('id', $_GET)){
                        $figureController->delete($_GET['id']);
                    }
                    else{
                        $figureController->list();
                    }
                }

                elseif('read' === $action){
                    if (!array_key_exists('id', $_GET)){
                        throw new \Exception ('ID parameter is mandatory');
                    }
                    $id=$_GET['id'];
                    $figureController->read($id);
                }

                elseif ('update' === $action){
                    if (!array_key_exists('id', $_GET)){
                        throw new \Exception ('ID parameter is mandatory');
                    }
                    $id=$_GET['id'];
                    $figureController->update($id);
                }
            }
        }

        else {
            (new HomepageController())->home(); //on instancie la classe HomepageController
        }
    }
    catch(\Exception $exception){
        throw new \Exception($exception->getMessage());
    }


    /*
    <==>
    require_once('views/layout.php');
    var_dump($_SERVER['REQUEST_URI']); //ou PATH_INFO à la place de REQUEST_URI

    $requestUri= explode('/', $_SERVER['REQUEST_URI']);

    switch($requestUri[array_key_last($requestUri)]) {
        case CONTACT_PATH:
            $controller='contact';
            $action='contact';
            echo 'CONTACT';
            break;
        default:
            $controller='homepage';
            $action='home';
            var_dump($requestUri);
            echo 'ACCUEIL';
    }

    require_once('controllers/'.$controller.'Controller.php');

    $controller = new ($controller.'Controller');
    echo $controller->{$action}('mathilde');

    */
    
    /*
    <==>
    if($_SERVER['REQUEST_URI'] === '/') {
        $controller='homepage';
        $action='home';
        echo 'ACCUEIL';
    } else if($_SERVER['REQUEST_URI'] === '/contact') {
        $controller='contact';
        $action='contact';
        echo 'CONTACT';
    }
    */
?>