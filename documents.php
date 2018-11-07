<?php
require_once 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, array(
    'cache' => false,
));


$nb_fichier = 0;
    $listefichier = array();

    if($dossier = opendir('test/documents'))
    {
        while(false !== ($fichier = readdir($dossier)))
        {
            if($fichier != '.' && $fichier != '..' && $fichier != 'index.php')
            {
                $nb_fichier++;
                $listefichier[] = $fichier;
            }
        }  
        closedir($dossier);
    }
$template = $twig->load('explorateur.twig');
echo $template->render(array("listefichier"=>$listefichier)); 
 ?>