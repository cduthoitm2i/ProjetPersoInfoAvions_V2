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

      

      $lsSQLMaxLength1 = "SELECT MAX(CHAR_LENGTH(numero_serie_avion)) FROM avion";
      $lsSQLMaxLength2 = "SELECT MAX(CHAR_LENGTH(modele_avion)) FROM avion";
      $lsSQLMaxLength3 = "SELECT MAX(CHAR_LENGTH(nom_compagnie)) FROM avion";
      $lsSQLMaxLength4 = "SELECT MAX(CHAR_LENGTH(date_premier_vol_avion)) FROM avion";
      $lsSQLMaxLength5 = "SELECT MAX(CHAR_LENGTH(immatriculation_compagnie_avion)) FROM avion";
      $lsSQLMaxLength6 = "SELECT MAX(CHAR_LENGTH(statut_avion)) FROM avion";
      
      
      
      
      $curseur1 = $pdo->query($lsSQLMaxLength1);
      $record2 = $curseur1->fetch();
      $curseur2 = $pdo->query($lsSQLMaxLength2);
      $record2 = $curseur2->fetch();
      $curseur3 = $pdo->query($lsSQLMaxLength3);
      $record3 = $curseur3->fetch();
      $curseur4 = $pdo->query($lsSQLMaxLength4);
      $record4 = $curseur4->fetch();
      $curseur5 = $pdo->query($lsSQLMaxLength5);
      $record5 = $curseur5->fetch();
      $curseur6 = $pdo->query($lsSQLMaxLength6);
      $record6 = $curseur6->fetch();

      $length1 = $record['numero_serie_avion'];
      $length2 = $record['modele_avion'];
      $length3 = $record['nom_compagnie'];
      $length4 = $record['date_premier_vol_avion'];
      $length5 = $record['immatriculation_compagnie_avion'];
      $length6 = $record['statut_avion'];

      $string1 = str_repeat("O", $length1 + 4);
      $string2 = str_repeat("O", $length2 + 4);
      $string3 = str_repeat("O", $length3 + 4);
      $string4 = str_repeat("O", $length4 + 4);
      $string5 = str_repeat("O", $length5 + 4);
      $string6 = str_repeat("O", $length6 + 4);

      $liMM1 = $pdf->getStringWidth($string1);
      $liMM2 = $pdf->getStringWidth($string2);
      $liMM3 = $pdf->getStringWidth($string3);
      $liMM4 = $pdf->getStringWidth($string4);
      $liMM5 = $pdf->getStringWidth($string5);
      $liMM6 = $pdf->getStringWidth($string6);

      $sql = "SELECT numero_serie_avion, modele_avion, nom_compagnie, date_premier_vol_avion, immatriculation_compagnie_avion, statut_avion FROM `avion`";
      $curseur = $pdo->query($sql);

         // Création de la tétière du tableau
         // --- Cell(largeur, hauteur, texte, bord, placement, alignement, remplissage, lien)
         $pdf->Cell($liMM1, $hauteurEntete, "MSN", 1, 0, 'C', 1);
         $pdf->Cell($liMM2, $hauteurEntete, "Type", 1, 0, 'C', 1);
         $pdf->Cell($liMM3, $hauteurEntete, iconv('UTF-8', 'windows-1252', "Opérateur"), 1, 0, 'C', 1);
         $pdf->Cell($liMM4, $hauteurEntete, "Premier vol", 1, 0, 'C', 1);
         $pdf->Cell($liMM5, $hauteurEntete, "Immatriculation", 1, 0, 'C', 1);
         $pdf->Cell($liMM6, $hauteurEntete, "Statut", 1, 1, 'C', 1);


      $lignes = 1; // initialisation du compteur de lignes

      foreach($curseur as $enregistrement) {
         // Création de la tétière du tableau qui sera répétée à partir de la page 2
          if($lignes % $nombreDeLignes == 0) { // si on a atteint la limite de 45 lignes (format A4), on ajoute une nouvelle page
              $pdf->AddPage();
              $pdf->SetFont('Arial','',12);
              $pdf->SetMargins(10,$hauteurMarge);
              $pdf->Cell($liMM1, $hauteurEntete, "MSN", 1, 0, 'C', 1);
              $pdf->Cell($liMM2, $hauteurEntete, "Type", 1, 0, 'C', 1);
              $pdf->Cell($liMM3, $hauteurEntete, iconv('UTF-8', 'windows-1252', "Opérateur"), 1, 0, 'C', 1);
              $pdf->Cell($liMM4, $hauteurEntete, "Premier vol", 1, 0, 'C', 1);
              $pdf->Cell($liMM5, $hauteurEntete, "Immatriculation", 1, 0, 'C', 1);
              $pdf->Cell($liMM6, $hauteurEntete, "Statut", 1, 1, 'C', 1);
            //   $lignes = 0; // réinitialisation du compteur de lignes
          }
      
          // Cell(Largeur, Hauteur, Texte, [Bords, RC , Alignement, Remplissage, Lien])
          $pdf->Cell($liMM1, $hauteurLigne, mb_convert_encoding($enregistrement['numero_serie_avion'], "ISO-8859-1"), 1 , 0, 'C', 0);
          $pdf->Cell($liMM2, $hauteurLigne, mb_convert_encoding($enregistrement['modele_avion'], "ISO-8859-1"), 1 , 0, 'L', 0);
          $pdf->Cell($liMM3, $hauteurLigne, mb_convert_encoding($enregistrement['nom_compagnie'], "ISO-8859-1"), 1 , 0, 'L', 0);
          $pdf->Cell($liMM4, $hauteurLigne, mb_convert_encoding($enregistrement['date_premier_vol_avion'], "ISO-8859-1"), 1 , 0, 'L', 0);
          $pdf->Cell($liMM5, $hauteurLigne, mb_convert_encoding($enregistrement['immatriculation_compagnie_avion'], "ISO-8859-1"), 1 , 0, 'L', 0);
          $pdf->Cell($liMM6, $hauteurLigne, mb_convert_encoding($enregistrement['statut_avion'], "ISO-8859-1"), 1 , 1, 'L', 0);
          
          $lignes++; // incrémentation du compteur de lignes
      }
      $curseur->closeCursor();

      // --- Sauvegarde vers un fichier
      $pdf->Output('D', 'liste.pdf', true);

      // --- Redirection vers le disque
//      $pdf->Output("F", "../outputs/villes.pdf");
//      echo "Fichier cr&eacute;&eacute; sur le disque";
   }

   catch(PDOException $e) {
      echo "Echec de l'exécution : " . $e->getMessage();
   }

   $pdo = null;
