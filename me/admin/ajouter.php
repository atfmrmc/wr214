<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <a href="gestion.php">retour au tableau de bord</a>
    <hr>
    <h1>gestion de nos albums</h1>
    <p>ajouter ici un album</p>
    <hr>
    <form method="POST" action="valid_ajout.php" enctype="multipart/form-data">
        titre:<input type="text" name="titre"><br>
        Photo : <input type="file" name="photo" required /><br />
        prix:<input type="text" name="prix"><br>
        nombre de pages:<input type="text" name="nbpages"><br>
        auteur:
        <select name="numauteur">
            <?php
            $mabd = new PDO('mysql:host=localhost;dbname=r214base;charset=UTF8;', 'r214user', 'tutu');
            $mabd->query('SET NAMES utf8;');
            $req = "SELECT * FROM  auteurs ";
            $resultat = $mabd->query($req);

            foreach ($resultat as $value)
            {
                echo '<option value=" ' . $value['auteur_id'] . ' "> ' . $value['auteur_nom'] . ' ' . $value['auteur_prenom'] . '</option>';
            }
            ?>
        </select><br>
        <input type="submit" name="ajouter">
    </form>

    </tbody>
    </table>
</body>

</html>