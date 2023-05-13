<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style>
        .article {
            background: #FAA;
            width: 300px;
            margin: 10px;
        }

        .liste {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <a href="index.php">Accueil</a> | <a href="catalogue.php"> catalogue </a> | <a href="filtrage.php"> filtrage
        simple</a> | <a href="filtrage2.php"> filtrage avancé</a> | <a href="admin/gestion.php">admin</a>
    <hr>
    <h1>nos albums filtrés (simple)</h1>
    <hr>
    <div class="liste">
        <?php
        /* connexion à la base de données */
        $mabd = new PDO('mysql:host=localhost;dbname=r214base;charset=UTF8;', 'r214user', 'tutu');
        $mabd->query('SET NAMES utf8;');

        /* préparation de a requete */
        if ($_GET['tri'] == 'titreAsc')
        {
            $req = "SELECT * FROM bandes_dessinees 
    INNER JOIN auteurs ON bandes_dessinees._auteur_id = auteurs.auteur_id 
    INNER JOIN type_de_bd ON bandes_dessinees._type_id = type_de_bd.type_id
    ORDER BY bd_titre ASC";
        } else if ($_GET['tri'] == 'titreDesc')
        {
            $req = "SELECT * FROM bandes_dessinees 
            INNER JOIN auteurs ON bandes_dessinees._auteur_id = auteurs.auteur_id 
            INNER JOIN type_de_bd ON bandes_dessinees._type_id = type_de_bd.type_id
            ORDER BY bd_titre DESC";
        } else if ($_GET['tri'] == 'cheap')
        {
            $req = "SELECT * FROM bandes_dessinees 
            INNER JOIN auteurs ON bandes_dessinees._auteur_id = auteurs.auteur_id 
            INNER JOIN type_de_bd ON bandes_dessinees._type_id = type_de_bd.type_id
            WHERE bd_prix <= 10";
        } else if ($_GET['tri'] == 'auteurAsc')
        {
            $req = "SELECT * FROM bandes_dessinees 
            INNER JOIN auteurs ON bandes_dessinees._auteur_id = auteurs.auteur_id 
            INNER JOIN type_de_bd ON bandes_dessinees._type_id = type_de_bd.type_id
            ORDER BY auteur_nom ASC";
        } else if ($_GET['tri'] == 'auteurDesc')
        {
            $req = "SELECT * FROM bandes_dessinees 
            INNER JOIN auteurs ON bandes_dessinees._auteur_id = auteurs.auteur_id 
            INNER JOIN type_de_bd ON bandes_dessinees._type_id = type_de_bd.type_id
            ORDER BY auteur_nom DESC";
        } else if ($_GET['tri'] == 'prixAsc')
        {
            $req = "SELECT * FROM bandes_dessinees 
            INNER JOIN auteurs ON bandes_dessinees._auteur_id = auteurs.auteur_id 
            INNER JOIN type_de_bd ON bandes_dessinees._type_id = type_de_bd.type_id
            ORDER BY bd_prix ASC";
        } else if ($_GET['tri'] == 'prixDesc')
        {
            $req = "SELECT * FROM bandes_dessinees 
            INNER JOIN auteurs ON bandes_dessinees._auteur_id = auteurs.auteur_id 
            INNER JOIN type_de_bd ON bandes_dessinees._type_id = type_de_bd.type_id
            ORDER BY bd_prix DESC";
        } else if ($_GET['tri'] == 'typeAsc')
        {
            $req = "SELECT * FROM bandes_dessinees 
            INNER JOIN auteurs ON bandes_dessinees._auteur_id = auteurs.auteur_id 
            INNER JOIN type_de_bd ON bandes_dessinees._type_id = type_de_bd.type_id
            ORDER BY type_nom ASC";

        } else if ($_GET['tri'] == 'typeDesc')
        {
            $req = "SELECT * FROM bandes_dessinees 
            INNER JOIN auteurs ON bandes_dessinees._auteur_id = auteurs.auteur_id 
            INNER JOIN type_de_bd ON bandes_dessinees._type_id = type_de_bd.type_id
            ORDER BY type_nom DESC";
        } else
        {
            $req = "SELECT * FROM bandes_dessinees 
            INNER JOIN auteurs ON bandes_dessinees._auteur_id = auteurs.auteur_id 
            INNER JOIN type_de_bd ON bandes_dessinees._type_id = type_de_bd.type_id
            ORDER BY bd_titre ASC";
        }


        /* execution de la requete */
        $resultat = $mabd->query($req);

        foreach ($resultat as $value)
        {
            echo '<div class="article">';
            echo '<h3>' . $value['bd_titre'] . '</h3>';
            echo '<p>tarif: ' . $value['bd_prix'] . ' euro </p>';
            echo '<p>' . $value['bd_nb_pages'] . ' pages </p>';
            echo '<p> <img src="images/uploads/' . $value['bd_photo'] . '" width="150px"> </p>';
            echo '<p> auteur: ' . $value['auteur_nom'] . '</p>';
            echo '<p> type de Bd: ' . $value['type_nom'] . '</p>';

            echo '</div>';
        }
        ?>
    </div>
</body>

</html>