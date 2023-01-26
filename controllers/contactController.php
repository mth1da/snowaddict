<?php

final class ContactController {
    function contact($name): string{
        echo "hello $name!";
        return "je suis sur la page de contact du controller de contact";
    }
}

