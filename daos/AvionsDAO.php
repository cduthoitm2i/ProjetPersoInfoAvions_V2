<?php

/*
 * AvionsDAO.php
 */
// PHP 8 full
declare(strict_types = 1);

// On charge le fichier
require_once '../entities/Avions.php';

// Déclaration de la classe
class AvionDAO {

    // On déclare un attribut
    private PDO $pdo;

    // Le constructeur qui a comme paramètre un objet PDO et qui sera exécuté automatiquement quand on va instancier l'objet
    function __construct(PDO $pdo) {
        // On affecte la valeur du paramètre à l'attribut
        $this->pdo = $pdo;
    }

    /**
     * Déclaration de la méthode INSERT :: input : un objet pays , output : un numérique entier
     * @param Avion $avion
     * @return int
     */
    public function insert(Avion $avion): int {
        // Déclaration d'une variable qui servira pour le retour
        $affected = 0;

        try {
            // Compilation ...
            $cmd = $this->pdo->prepare("INSERT INTO avion(id_avion, nom_avion) VALUES(?,?)");
            // Valorisation des paramètres (les ?) avec le résultat de la sollicitation de la méthode GETTER de l'objet Pays
            $cmd->bindValue(1, $avion->getIdAvion());
            $cmd->bindValue(2, $avion->getNomAvion());
            // On exécute la requête
            $cmd->execute();
            // Nombre de lignes affectées (0 ou 1)
            $affected = $cmd->rowCount();
        } catch (PDOException $e) {
            $affected = -1;
        }

        // Le retour de la méthode (l'output)
        return $affected;
    }
    public function update(Avion $avion): int {
        $affected=0;
        try{
    
        
        $sql = "UPDATE avion SET nom_avion = ? WHERE id_avion=?";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(1, $avion->getNomAvion());
        $cmd->bindValue(2, $avion->getIdAvion());
         // On exécute la requête
        $cmd->execute();
        $affected = $cmd->rowCount();
    } catch (PDOException $e) {
        $affected = -1;
    }
    
        return $affected;
    
     }

    public function delete (Avion $avion):int {
        $affected=0;
        $sql = "DELETE FROM avion WHERE id_avion=?";
        try {
            $cmd = $this->pdo->prepare($sql);
            $cmd->bindValue(1, $avion->getIdAvion());
            $cmd->execute();

            $affected = $cmd->rowCount();
        } catch (PDOException $e) {
            $affected= -1;
            //throw $th;
        }
        return $affected;
    }
    /* 
    * le selectOne a comme input la PK de la table
    * et comme output un objet correspondant à la table
    */
    public function selectOne (string $pk): Avion {
        // On instancie un objet Pays
        $pays= new Avion();
        // Ordre SQL select en fonction de la PK
        $sql = "SELECT FROM avion WHERE id_avion=?";
        try {
          // on compile l'ordre SQL
          $cursor = $this->pdo->prepare($sql);
          // on valorise la premier paramètre (le point d'interrogation de id_pays dans le SELECT SQL)
          $cursor->bindValue(1, $pk);
          // On exécute l'ordre SQL
          $cursor->execute();
          // extrait la ligne courant du curseur
          $record = $cursor->fetch();
          // si le curseur est vide
          if ($record === FALSE){
            // on valorise via les setter les attributs de l'objet Pays
            $pays->setIdAvion("0");
            $pays->setNomAvion("Introuvable");
          }  else {
            // on valorise via les setter les attributs de l'objet Pays
            $pays->setIdAvion("$pk");
            $pays->setNomAvion($record["nom_pays"]);    

          }
        } catch (PDOException $e) {
            // on valorise via les setter les attributs de l'objet Pays
            $pays->setIdAvion("-1");
            $pays->setNomAvion($e->getMessage());
        }
        return $pays;
    }


}
