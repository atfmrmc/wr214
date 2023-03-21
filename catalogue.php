<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <a href="index.php">Accueil</a> |
    <a href="catalogue.php"> catalogue </a> |
    <a href="admin/gestion.php">admin</a>
    <hr>
    <h1>nos albums</h1>
    <hr>
    <?php
    $mabd = new PDO('mysql:host=localhost;dbname=r214base;charset=UTF8;', 'r214user', 'tutu');
    $mabd->query('SET NAMES utf8;');
    $req = "SELECT * FROM bandes_dessinees INNER JOIN auteurs ON bandes_dessinees._auteur_id = auteurs.auteur_id";
    $resultat = $mabd->query($req);

    foreach ($resultat as $value)
    {
        echo '<div>';
        echo '<h3>' . $value['bd_titre'] . '</h3>';
        echo '<p> Tarif: ' . $value['bd_prix'] . ' € </p>';
        echo '<p>' . $value['bd_nb_pages'] . ' pages </p>';
        echo '<p> Auteur: ' . $value['auteur_nom'] . '</p>';
        echo '</div><hr>';
    }
    ?>

</body>

</html>