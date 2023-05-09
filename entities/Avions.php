<?php
    // Avions.php

    declare(strict_types = 1);
    
    class Avions {
        private int $idAvion;
        private string $numeroSerieAvion;
        private string $modeleAvion;
        private string $nomCompagnie;
        private string $datePremierVol;
        private string $immatriculationCompagnie;
        private string $statut;
        

        // Le constructeur

        // Méthode avec 7 paramètres initialisés qui ont des valeurs par défaut (et donc facultatif)
        public function __construct(int $idAvion = 0, string $numeroSerieAvion = "", string $modeleAvion= "", string $nomCompagnie= "", string $datePremierVol= "", string $immatriculationCompagnie= "", string $statut= "") {
            $this->idAvion = $idAvion;
            $this->numeroSerieAvion = $numeroSerieAvion;
            $this->modeleAvion = $modeleAvion;
            $this->nomCompagnie = $nomCompagnie;
            $this->datePremierVol = $datePremierVol;
            $this->immatriculationCompagnie = $immatriculationCompagnie;
            $this->statut = $statut;
        }
        // Autres méthodes
        public function setIdAvion(int $idAvion) : void { $this->idAvion = $idAvion; }
        public function getIdAvion() : int { return $this->idAvion; }

        public function setNumeroSerieAvion(string $numeroSerieAvion) : void { $this->numeroSerieAvion = $numeroSerieAvion; }
        public function getNumeroSerieAvion() : string { return $this->numeroSerieAvion; }

        public function setModeleAvion(string $modeleAvion) : void { $this->modeleAvion = $modeleAvion; }
        public function getModeleAvion() : string { return $this->modeleAvion; }

        public function setNomCompagnie(string $nomCompagnie) : void { $this->nomCompagnie = $nomCompagnie; }
        public function getNomCompagnie() : string { return $this->nomCompagnie; }

        public function setDatePremierVol(string $datePremierVol) : void { $this->datePremierVol = $datePremierVol; }
        public function getDatePremierVol() : string { return $this->datePremierVol; }

        public function setImmatriculationCompagnie(string $immatriculationCompagnie) : void { $this->immatriculationCompagnie = $immatriculationCompagnie; }
        public function getImmatriculationCompagnie() : string { return $this->immatriculationCompagnie; }

        public function setStatut(string $statut) : void { $this->statut = $statut; }
        public function getStatut() : string { return $this->statut; }
    }
