<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Explorateur</title>
</head>
<body>
    <?php
    $nb_fichier = 0;
    echo '<ul>' ;

    if($dossier = opendir('test'))
    {
        while(false !== ($fichier = readdir($dossier)))
        {
            if($fichier != '.' && $fichier != '..' && $fichier != 'index.php')
            {
                $nb_fichier++;
                echo'<li><a href="test' . $fichier . '">'  .$fichier . '</a></li>';
            }
        }
        echo '</ul><br />';
        echo 'Il y a ' . $nb_fichier .' fichier(s) dans le dossier';

        closedir($dossier);

    }

    else 
    echo 'Le dossier n\' a pas pu être ouvert';
    ?>
</body>
</html>