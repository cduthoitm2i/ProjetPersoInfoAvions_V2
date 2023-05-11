<?php
	// --- impPDF.php
	header("Content-Type: application/pdf;charset=UTF-8");

	// --- La bibliothèque
    require_once("./lib/fpdf185/fpdf.php");

	$pdf = new FPDF("L");
   // On défini les variables pour pouvoir répéter l'entête du tableau (on doit pour cela connaître le format de la page et le nombre de ligne à afficher par page)
   // Format de la page à la française
   //$hauteurPage = 290;
   // Format de la page à l'italienne
   // Déclaration des variables pour le format et les répétitions de l'entête du tableau
   $hauteurPage = 210;
   $hauteurMarge = 10;
   $hauteurLigne = 7;
   $hauteurEntete = 10;
   // 168 pour format à l'italienne
   $espaceDisponible = $hauteurPage - ($hauteurMarge + $hauteurMarge + $hauteurEntete + 12);
   $nombreDeLignes = floor($espaceDisponible / $hauteurLigne);

   $pdf->AddPage();
   $pdf->SetMargins(10,$hauteurMarge);
   $pdf->SetFont('Arial','',12);

   $pdf->SetDrawColor(0,0,0); // noir
   $pdf->SetFillColor(199,199,199); // gris
   $pdf->SetTextColor(0,0,0); // noir

   try {
      $pdo = new PDO("mysql:host=mysql-cduthoit59.alwaysdata.net;dbname=cduthoit59_bd_avions_airbus;port=3306", "308217", "Q7NxCwCkazcbUsj");
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // --- Si on utilise ceci il faut utiliser utf8_decode 
      // --- pour afficher plus bas les caractères accentués
      $pdo->exec("SET NAMES 'UTF8'");

      $sql = "SELECT numero_serie_avion, modele_avion, nom_compagnie, date_premier_vol_avion, immatriculation_compagnie_avion, statut_avion FROM `avion` WHERE nom_avion = 'A320'";
      $curseur = $pdo->query($sql);
      // Pour mettre en gras le texte de la tétière
      $pdf->SetFont('Arial','B',12);
      // Création de la tétière du tableau
      // --- Cell(largeur, hauteur, texte, bord, placement, alignement, remplissage, lien)
      $pdf->Cell(15, $hauteurEntete, "MSN", 1, 0, 'C', 1);
      $pdf->Cell(60, $hauteurEntete, "Type", 1, 0, 'C', 1);
      $pdf->Cell(80, $hauteurEntete, iconv('UTF-8', 'windows-1252', "Opérateur"), 1, 0, 'C', 1);
      $pdf->Cell(30, $hauteurEntete, "Premier vol", 1, 0, 'C', 1);
      $pdf->Cell(40, $hauteurEntete, "Immatriculation", 1, 0, 'C', 1);
      $pdf->Cell(35, $hauteurEntete, "Statut", 1, 1, 'C', 1);

      $lignes = 1; // initialisation du compteur de lignes

      foreach($curseur as $enregistrement) {
         // Création de la tétière du tableau qui sera répétée à partir de la page 2
          if($lignes % $nombreDeLignes == 0) { // si on a atteint la limite de 45 lignes (format A4), on ajoute une nouvelle page
              $pdf->AddPage();
              // Pour mettre en gras le texte de la tétière pour les pages suivantes
              $pdf->SetFont('Arial','B',12);
              $pdf->SetMargins(10,$hauteurMarge);
              $pdf->Cell(15, $hauteurEntete, "MSN", 1, 0, 'C', 1);
              $pdf->Cell(60, $hauteurEntete, "Type", 1, 0, 'C', 1);
              $pdf->Cell(80, $hauteurEntete, iconv('UTF-8', 'windows-1252', "Opérateur"), 1, 0, 'C', 1);
              $pdf->Cell(30, $hauteurEntete, "Premier vol", 1, 0, 'C', 1);
              $pdf->Cell(40, $hauteurEntete, "Immatriculation", 1, 0, 'C', 1);
              $pdf->Cell(35, $hauteurEntete, "Statut", 1, 1, 'C', 1);
            //   $lignes = 0; // réinitialisation du compteur de lignes
          }
          // On repasse en romain pour toutes les lignes du tableau hors tétière
          $pdf->SetFont('Arial','',12);
          // Cell(Largeur, Hauteur, Texte, [Bords, RC , Alignement, Remplissage, Lien])
          $pdf->Cell(15, $hauteurLigne, mb_convert_encoding($enregistrement['numero_serie_avion'], "ISO-8859-1"), 1 , 0, 'C', 0);
          $pdf->Cell(60, $hauteurLigne, mb_convert_encoding($enregistrement['modele_avion'], "ISO-8859-1"), 1 , 0, 'L', 0);
          $pdf->Cell(80, $hauteurLigne, mb_convert_encoding($enregistrement['nom_compagnie'], "ISO-8859-1"), 1 , 0, 'L', 0);
          $timestamp = strtotime($enregistrement['date_premier_vol_avion']);
          // On transforme la date au format dd/mm/YYYY 
          $newdatePremierVol = date("d/m/Y", $timestamp);   
          //$pdf->Cell(30, $hauteurLigne, mb_convert_encoding($enregistrement['date_premier_vol_avion'], "ISO-8859-1"), 1 , 0, 'L', 0);
          // On place la nouvelle variable pour le PDF
          $pdf->Cell(30, $hauteurLigne, mb_convert_encoding($newdatePremierVol, "ISO-8859-1"), 1 , 0, 'L', 0);
          $pdf->Cell(40, $hauteurLigne, mb_convert_encoding($enregistrement['immatriculation_compagnie_avion'], "ISO-8859-1"), 1 , 0, 'L', 0);
          $pdf->Cell(35, $hauteurLigne, mb_convert_encoding($enregistrement['statut_avion'], "ISO-8859-1"), 1 , 1, 'L', 0);
          
          $lignes++; // incrémentation du compteur de lignes
      }
      $curseur->closeCursor();

      // --- Sauvegarde vers un fichier
      $pdf->Output('D', 'liste_a320.pdf', true);
   }
   catch(PDOException $e) {
      echo "Echec de l'exécution : " . $e->getMessage();
   }
   $pdo = null;
