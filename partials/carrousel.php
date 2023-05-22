<?php
$path = "./images/photos_recente/"; // chemin vers le dossier des images
$file_count = count(glob($path . "*.{png,jpg,jpeg,gif}", GLOB_BRACE));
if ($file_count > 0) {
    $fp = opendir($path);
    while ($file = readdir($fp)) {
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $ext_array = ['png', 'jpg', 'jpeg', 'gif'];
        if (in_array($ext, $ext_array)) {
            $file_path = $path . $file; ?>
            <div class="col-md-4 col-xs-6 mb-2">
                <a href="<?php echo $file_path; ?>" title="Dernières photos publiées" data-gallery><img src="<?php echo $file_path; ?>" class="rounded img-fluid" /></a>
            </div>
<?php }
    }
    closedir($fp);
} else {
    echo "Désolé! Pas d'images dans la galerie!!!";
}
?>