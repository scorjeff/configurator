<?php
include 'fonctions.php';

// Paramètres
$images_dir = 'electric/images/';
$thumbs_dir = 'electric/images/';

// Largeur des miniatures
$thumbs_width = 20;

// Nombres de miniatures par ligne
$images_per_row = 6;

// Récupération de la liste des images
$image_files = get_files($images_dir);

// S'il y a au moins 1 image on rentre dans le script
if (count($image_files)) {
    $index = 0;

    // Traitement des images
    foreach ($image_files as $index => $file) {
        $index ++;
        $thumbnail_image = $thumbs_dir . $file;

        if (! file_exists($thumbnail_image)) {
            $extension = get_file_extension($thumbnail_image);

            // Si l'extension est reconnue alors on génère la miniature
            if ($extension) {
                make_thumb($images_dir . $file . $thumbnail_image . $thumbs_width);
            }
        }
        // Une fois que les miniatures ont été générées la boucle foreach prépare le code html pour chaque image
        echo '<a href="' . $images_dir . $file . '" class="photo-link smoothbox" rel="gallery"><img src="' . $thumbnail_image . '" /></a>';
        echo "\n";
    }
}
?>