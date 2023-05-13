<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <a href="gestion.php">retour au tableau de bord</a>
    <hr>
    <h1>gestion de nos albums</h1>
    <p>modifier ici l'album.....</p>

    <?php
	$num = $_GET['num'];
	$mabd = new PDO('mysql:host=localhost;dbname=r214base;charset=UTF8;', 'r214user', 'tutu');
	$mabd->query('SET NAMES utf8;');
	$req = 'SELECT * FROM  bandes_dessinees WHERE bd_id = ' . $num; // on restreint la requete a l'album dont l'id est $num
	$resultat = $mabd->query($req);
	$album = $resultat->fetch(); // dans $album on a les infos de l'album dont l'id est $num
	

	?>

    <hr>
    <form action="valid_modif.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="num" value="<?php echo $album['bd_id'] ?>">

        titre:<input type="text" name="titre" value="<?php echo $album['bd_titre'] ?>"><br>
        prix:<input type="text" name="prix" value="<?php echo $album['bd_prix'] ?>"><br>
        nombre de pages:<input type="text" name="nbpages" value="<?php echo $album['bd_nb_pages'] ?>"><br>

        Photo :
        <input type="file" name="photo" />
        <!-- (la gestion de la photo n est pas traité dans cette correction -->
        <br />

        auteur:
        <select name="numauteur">
            <?php
			$mabd = new PDO('mysql:host=localhost;dbname=r214base;charset=UTF8;', 'r214user', 'tutu');
			$mabd->query('SET NAMES utf8;');
			$req = "SELECT * FROM  auteurs "; // selectionner les auteurs (dans la table auteurs)
			$resultat = $mabd->query($req);

			// afficher les auteurs dans une liste déroulante avec le prénom (auteur_prenom) et le nom (auteur_nom). le code étant auteur_id, on va utiliser ce code pour l'envoyer dans la requete de valid_ajout.php
			foreach ($resultat as $value)
			{

				$selection = "";

				if ($album['_auteur_id'] == $value['auteur_id'])
					$selection = "selected";

				echo '<option ' . $selection . ' value="' . $value['auteur_id'] . '">' . $value['auteur_prenom'] . ' ' . $value['auteur_nom'] . '</option>';
			}

			?>
        </select>
        <br>
        type:
        <select name="numtype">
            <?php
			$mabd = new PDO('mysql:host=localhost;dbname=r214base;charset=UTF8;', 'r214user', 'tutu');
			$mabd->query('SET NAMES utf8;');
			$req = "SELECT * FROM  type_de_bd "; // selectionner les auteurs (dans la table auteurs)
			$resultat = $mabd->query($req);

			// afficher les auteurs dans une liste déroulante avec le prénom (auteur_prenom) et le nom (auteur_nom). le code étant auteur_id, on va utiliser ce code pour l'envoyer dans la requete de valid_ajout.php
			foreach ($resultat as $value)
			{

				$selection = "";

				if ($album['_type_id'] == $value['type_id'])
					$selection = "selected";

				echo '<option ' . $selection . ' value="' . $value['type_id'] . '">' . $value['type_nom'] . '</option>';
			}

			?>
        </select>
        <br>
        <br>
        <input type="submit" name="">
    </form>

    </tbody>
    </table>
</body>

</html>