<?php
require_once 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, array(
    'cache' => false,
));

$chemin = $_GET ['chemin'];

$nb_fichier = 0;
    $listefichier = array();
    //Ouverture du dossier "test"
    if($dossier = opendir($chemin))
    {
        //On boucle tant que l'on trouve un dossier ou un fichier dans le dossier/chemin - test
        while(false !== ($fichier = readdir($dossier)))
        {
            //On ignore les fichiers . .. et index.php
            // if($fichier != '.' && $fichier != '..' && $fichier != 'index.php')
            // {
                //On incrémente la variable nb_fichier de +1
                $nb_fichier++;
                //On ajout le dossier ou le fichier trouvé dans un tableau multidimentionnel
                $listefichier[] = $fichier;
            // }
        }  
        //On ferme le dosser ouvert - test
        closedir($dossier);
    }

//On indique au moteur de templating le fichier html à ouvrir
$template = $twig->load('index.twig');


//On assigne les variables devant être affiché au fichier
echo $template->render(
    array(
        
        "listefichier"=>$listefichier,
        "chemin"=>$chemin
    )
); 
 ?>