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
    <h1>nos albums filtrés (avancé)</h1>
    <hr>
    <div class="liste">
        <?php
        /* connexion à la base de données */
        $mabd = new PDO('mysql:host=localhost;dbname=r214base;charset=UTF8;', 'r214user', 'tutu');
        $mabd->query('SET NAMES utf8;');

        /* préparation de a requete */
        if ($_GET['tri'] == 'prixMoyen')
        {
            $req = "SELECT auteur_nom, auteur_prenom, AVG(bd_prix) AS Moyen
            FROM bandes_dessinees 
            INNER JOIN auteurs ON bandes_dessinees._auteur_id = auteurs.auteur_id 
            GROUP BY auteur_nom, auteur_prenom;";
            /* execution de la requete */
            $resultat = $mabd->query($req);
            foreach ($resultat as $value)
            {
                echo '<div class="article">';
                echo '<h3>' . $value['auteur_nom'] . ' ' . $value['auteur_prenom'] . '</h3>';
                echo '<p>tarif moyen : ' . $value['Moyen'] . ' euro </p>';
                echo '</div>';
            }
        } else if ($_GET['tri'] == 'nbPages')
        {
            $req = "SELECT type_nom, COUNT(bd_id) AS nbBd FROM bandes_dessinees
            INNER JOIN auteurs ON bandes_dessinees._type_id = type_de_bd.type_id
            GROUP BY type_nom";
            /* execution de la requete */
            $resultat = $mabd->query($req);
            foreach ($resultat as $value)
            {
                echo '<div class="article">';
                echo '<h3>' . $value['type_nom'] . '</h3>';
                echo '<p>nombre de Bd  : ' . $value['nbBd'] . '  </p>';
                echo '</div>';
            }
        }
        ?>

    </div>
</body>

</html>