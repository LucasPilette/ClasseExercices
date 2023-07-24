<?php 

require_once(dirname(__FILE__).'/../config/constForm.php');
require_once(dirname(__FILE__).'/../models/Exercices.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // NOM
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($name)) {
        $errors['name'] = 'Veuillez saisir le nom de l\'exercice';
    } else {
        $checkedName = filter_var(
            $name,
            FILTER_VALIDATE_REGEXP,
            array("options" => array("regexp" => '/' . REG_EXP_NAME . '/'))
        );
        if (!$checkedName) {
            $errors['name'] = 'Veuillez saisir un nom valide';
        }
    }

        // DESCRIPTION
        $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($description)) {
            $errors['description'] = 'Veuillez saisir une description pour l\'exercice';
        } else {
            $checkedDescription = filter_var(
                $description,
                FILTER_VALIDATE_REGEXP,
                array("options" => array("regexp" => '/' . REG_EXP_TEXT . '/'))
            );
            if (!$checkedDescription) {
                $errors['description'] = 'Veuillez saisir une description valide';
            }
        }

        // REPETITION
        $repetitions = trim(filter_input(INPUT_POST, 'repetitions', FILTER_SANITIZE_NUMBER_INT));
        if (empty($repetitions)) {
            $errors['repetitions'] = 'Veuillez saisir le nombre de répétitions';
        } else {
            $checkedRepetitions = filter_var(
                $repetitions,
                FILTER_VALIDATE_INT);
            if (!$checkedRepetitions) {
                $errors['repetitions'] = 'Veuillez saisir un nombre de répétitions valide';
            }
        }

        if(empty($errors)){
            $exercice = new Exercices($name,$description,$repetitions);
            $exercice->addExercice();
        }
    }

    



include(dirname(__FILE__) . '/../views/templates/header.php');

include(dirname(__FILE__) . '/../views/home.php');

include(dirname(__FILE__) . '/../views/templates/footer.php');

