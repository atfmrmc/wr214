<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <a href="gestion.php">retour au tableau de bord</a>
    <hr>
    <h1>gestion de nos albums</h1>
    <h2>vous venez de modifier un article</h2>
    <hr>
    <?php
        $titre = $_POST['titre'];
        $prix = $_POST['prix'];
        $nbpages = $_POST['nbpages'];
        $numauteur = $_POST['numauteur'];
        $numtype = $_POST['numtype'];

        $num = $_POST['num'];

        $mabd = new PDO('mysql:host=localhost;dbname=r214base;charset=UTF8;', 'r214user', 'tutu');
        $mabd->query('SET NAMES utf8;');

        // exemple: UPDATE bandes_dessinees SET bd_titre="toto", bd_prix=10, bd_nb_pages=10, _auteur_id=1 WHERE bd_id=1
        $req = 'UPDATE bandes_dessinees 
        SET bd_titre="' . $titre . '", bd_prix=' . $prix .
                ',bd_nb_pages=' . $nbpages .
                ',_auteur_id=' . $numauteur .
                ',_type_id=' . $numtype .
                'WHERE bd_id=' . $num . '';
        //echo $req;
        
        $mabd->query($req);

        ?>
    <h2> modification reussie </h2>
    <a href="gestion.php">retour au tableau de bord</a>
</body>

</html>