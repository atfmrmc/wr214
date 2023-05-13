<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <a href="gestion.php">retour au tableau de bord</a>
    <hr>
    <h1>gestion de nos albums</h1>
    <hr>

    <?php
    // recupérer dans l'url l'id de l'album à supprimer
    $numero = $_GET['num'];

    $mabd = new PDO('mysql:host=localhost;dbname=r214base;charset=UTF8;', 'r214user', 'tutu');
    $mabd->query('SET NAMES utf8;');

    // tapez ici la requete de suppression de l'album dont l'id est passé dans l'url
    $req = 'DELETE FROM bandes_dessinees WHERE bd_id=' . $numero . ';';

    // cette ligne sert juste pour le debug. à supprimer quand tout marche correctement  
    // echo $req;
    
    $resultat = $mabd->query($req);

    echo '<h2>vous venez de supprimer l\'album numéro ' . $numero . '</h2>';
    ?>

</body>

</html>