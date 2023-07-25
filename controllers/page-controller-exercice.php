<?php

require_once(dirname(__FILE__).'/../models/Exercices.php');

include(dirname(__FILE__) . '/../views/templates/header.php');

if($_GET['id']){
    $id = trim(filter_input(INPUT_GET,'id',FILTER_SANITIZE_SPECIAL_CHARS));
    $exercice = Exercices::getOne($id);
    include(dirname(__FILE__) . '/../views/exercice.php');
} else {
    include(dirname(__FILE__) . '/../views/error.php');
}

include(dirname(__FILE__) . '/../views/templates/footer.php');
