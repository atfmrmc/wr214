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
<form  action="valid_ajout.php"  method="POST" enctype="multipart/form-data">
    titre:<input type="text" name="titre"><br>
    prix:<input type="text" name="prix"><br>
    nombre de pages:<input type="text" name="nbpages"><br>
	Photo : <input type="file" name="photo" required /><br />

	
    numero de l' auteur:
	<select name="numauteur">
    	<?php
		$mabd = new PDO('mysql:host=localhost;dbname=r214base;charset=UTF8;', 'r214user', 'tutu');
		$mabd->query('SET NAMES utf8;');
		$req = "SELECT * FROM  auteurs "; // selectionner les auteurs (dans la table auteurs)
		$resultat = $mabd->query($req);

// afficher les auteurs dans une liste déroulante avec le prénom (auteur_prenom) et le nom (auteur_nom). le code étant auteur_id, on va utiliser ce code pour l'envoyer dans la requete de valid_ajout.php
		foreach ($resultat as $value) {
			echo '<option value="'.$value['auteur_id'].'">'.$value['auteur_prenom'].' '.$value['auteur_nom'].'</option>';
		}
	
?>
</select>
    

    <input type="submit" name="">
</form>

</tbody>
</table>
</body>
</html>