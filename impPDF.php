<?php
	// --- impPDF.php
	header("Content-Type: application/pdf;charset=UTF-8");

	// --- La bibliothèque
    require_once("./lib/fpdf185/fpdf.php");


	$pdf = new FPDF();
   // On défini les variables pour pouvoir répéter l'entête du tableau (on doit pour cela connaître le format de la page et le nombre de ligne à afficher par page)
   $hauteurPage = 297;
   $hauteurMarge = 10;
   $hauteurLigne = 7;
   $hauteurEntete = 10;
   $espaceDisponible = $hauteurPage - ($hauteurMarge + $hauteurMarge + $hauteurEntete + 12);
   $nombreDeLignes = floor($espaceDisponible / $hauteurLigne);
   


   $pdf->AddPage();
   $pdf->SetMargins(10,$hauteurMarge);
   $pdf->SetFont('Courier','',12);

   $pdf->SetDrawColor(0,0,0); // noir
   $pdf->SetFillColor(199,199,199); // gris
   $pdf->SetTextColor(0,0,0); // noir

   // --- Cell(largeur, hauteur, texte, bord, placement, alignement, remplissage, lien)
   $pdf->Cell(10, $hauteurEntete, "MSN", 1, 0, 'C', 1);
   $pdf->Cell(20, $hauteurEntete, "Type", 1, 0, 'C', 1);
   $pdf->Cell(30, $hauteurEntete, "Opérateur", 1, 0, 'C', 1);
   $pdf->Cell(30, $hauteurEntete, "Premier vol", 1, 0, 'C', 1);
   $pdf->Cell(20, $hauteurEntete, "Immatriculation", 1, 0, 'C', 1);
   $pdf->Cell(20, $hauteurEntete, "Statut", 1, 1, 'C', 1);

   try {
      $pdo = new PDO("mysql:host=mysql-cduthoit59.alwaysdata.net;dbname=cduthoit59_bd_avions_airbus;port=3306", "308217", "Q7NxCwCkazcbUsj");
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // --- Si on utilise ceci il faut utiliser utf8_decode 
      // --- pour afficher plus bas les caractères accentués
      $pdo->exec("SET NAMES 'UTF8'");

      $sql = "SELECT numero_serie_avion, modele_avion, nom_compagnie, date_premier_vol_avion, immatriculation_compagnie_avion, statut_avion FROM `avion`";
      $curseur = $pdo->query($sql);

      $lignes = 1; // initialisation du compteur de lignes

      foreach($curseur as $enregistrement) {
          if($lignes % $nombreDeLignes == 0) { // si on a atteint la limite de 45 lignes, on ajoute une nouvelle page
              $pdf->AddPage();
              $pdf->SetFont('Courier','',12);
              $pdf->SetMargins(10,$hauteurMarge);
              $pdf->Cell(10, $hauteurEntete, "MSN", 1, 0, 'C', 1);
              $pdf->Cell(20, $hauteurEntete, "Type", 1, 1, 'C', 1);
              $pdf->Cell(30, $hauteurEntete, "Opérateur", 1, 0, 'C', 1);
              $pdf->Cell(30, $hauteurEntete, "Premier vol", 1, 0, 'C', 1);
              $pdf->Cell(20, $hauteurEntete, "Immatriculation", 1, 0, 'C', 1);
              $pdf->Cell(20, $hauteurEntete, "Statut", 1, 1, 'C', 1);
            //   $lignes = 0; // réinitialisation du compteur de lignes
          }
      
          // Cell(Largeur, Hauteur, Texte, [Bords, RC , Alignement, Remplissage, Lien])
          $pdf->Cell(10, $hauteurLigne, mb_convert_encoding($enregistrement['numero_serie_avion'], "ISO-8859-1"), 1 , 0, 'C', 0);
          $pdf->Cell(20, $hauteurLigne, mb_convert_encoding($enregistrement['modele_avion'], "ISO-8859-1"), 1 , 1, 'L', 0);
          $pdf->Cell(30, $hauteurLigne, mb_convert_encoding($enregistrement['nom_compagnie'], "ISO-8859-1"), 1 , 1, 'L', 0);
          $pdf->Cell(30, $hauteurLigne, mb_convert_encoding($enregistrement['date_premier_vol_avion'], "ISO-8859-1"), 1 , 1, 'L', 0);
          $pdf->Cell(20, $hauteurLigne, mb_convert_encoding($enregistrement['immatriculation_compagnie_avion'], "ISO-8859-1"), 1 , 1, 'L', 0);
          $pdf->Cell(20, $hauteurLigne, mb_convert_encoding($enregistrement['statut_avion'], "ISO-8859-1"), 1 , 1, 'L', 0);
          
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
?>