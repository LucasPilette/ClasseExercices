<?php 

require_once(dirname(__FILE__).'/../config/PDO/PDO_init.php');

class Exercices{

    // DEFINITION ATTRIBUTS

    private int $_id;
    private string $_name;
    private string $_description;
    private int $_repetitions;
    private object $_pdo;


    // FONCTION CONSTRUCT

    public function __construct(string $name ='', string $description ='', int $repetitions = 0) {
        $this->_name = $name;
        $this->_description = $description;
        $this->_repetitions = $repetitions;
        $this->_pdo = DataBase::dbConnect();
    }

    // GETTERS

    public function getId():int{
        return $this->_id;
    }

    public function getName():string{
        return $this->_name;
    }

    public function getDescription():string{
        return $this->_description;
    }

    public function getRepetitions():int{
        return $this->_repetitions;
    }

    //SETTERS

    public function setId(int $id):void{
        $this->_id = $id;
    }

    public function setIName(string $name):void{
        $this->_name = $name;
    }

    public function setDescription(string $description):void{
        $this->_description = $description;
    }

    public function setRepetition(string $repetitions):void{
        $this->_repetitions = $repetitions;
    }

    // FONCTION PUB

    public function addExercice():int{
        try{
            $db = DataBase::dbConnect();
            $sth = $db->prepare('INSERT INTO `exercices`(`name`,`description`,`repetitions`) VALUES (:names,:descriptions,:repetitions)');
            $sth->bindValue(':names',$this->getName(),PDO::PARAM_STR);
            $sth->bindValue(':descriptions',$this->getDescription(),PDO::PARAM_STR);
            $sth->bindValue(':repetitions',$this->getRepetitions(),PDO::PARAM_INT);
            if($sth->execute()){
                $lastId = $db->lastInsertId();
            } 
            return $lastId;
        } catch (PDOException $e){
            return false;
        }
    }
}