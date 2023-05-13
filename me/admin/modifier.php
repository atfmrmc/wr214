<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <a href="gestion.php">retour au tableau de bord</a>
    <hr>
    <h1>gestion de nos albums</h1>
    <p>modification d'un album</p>
    <?php
    $num = $_GET['num'];
    $mabd = new PDO('mysql:host=localhost;dbname=r214base;charset=UTF8;', 'r214user', 'tutu');
    $mabd->query('SET NAMES utf8;');
    $req = "SELECT * FROM  bandes_dessinees WHERE bd_id = $num";
    $resultat = $mabd->query($req);
    $album = $resultat->fetch();
    echo $album['bd_titre'];
    echo $album['bd_prix'];
    ?>
    <hr>
    <form method="GET" action="valid_modif.php">
        <input type="hidden" type="text" name="num" value="<?php echo $album['bd_id']; ?>"><br>
        titre:<input type="text" name="titre" value="<?php echo $album['bd_titre'] ?>"><br>
        prix:<input type="text" name="prix" value="<?php echo $album['bd_prix'] ?>"><br>
        nombre de pages:<input type="text" name="nbpages" value="<?php echo $album['bd_nb_pages'] ?>"><br>
        auteur:<select name="numauteur">

            <?php
            $mabd = new PDO('mysql:host=localhost;dbname=r214base;charset=UTF8;', 'r214user', 'tutu');
            $mabd->query('SET NAMES utf8;');
            $req = "SELECT * FROM bandes_dessinees INNER JOIN auteurs ON bandes_dessinees._auteur_id = auteurs.auteur_id";
            $resultat = $mabd->query($req);

            foreach ($resultat as $value)
            {
                $selection = "";
                if ($album['_auteur_id'] == $value['auteur_id'])
                    $selection = "selected";
                echo '<option ' . $selection . ' value="' . $value['auteur_id'] . '"> ' . $value['auteur_nom'] . '</option>';
            }
            ?>

        </select>

        <br>
        <input type="submit" name="">
    </form>

</body>

</html>