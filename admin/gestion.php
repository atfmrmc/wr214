<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="../index.php">retour au site</a> 	
	<hr>
<h1>gestion de nos albums</h1>
<p>pensez a proteger le dossier admin avec un htaccess :-)</p>
<hr>
<h3>manipulation les plus courantes:</h3>
<a href="augmentation10.php"> augmenter toutes les BD de 10% </a> |
<a href="diminution15.php"> baisser  les BD de type SF de 15% </a> |
<br>
<a href="retourarriere10.php"> annuler l'augmentation de 10% </a> |
<a href="retourarrire15.php"> annuler la baisse de 15% des BD de SF </a> |

<hr>
<a href="ajouter.php">ajouter un album</a> |
 
<table border=1>
	<thead>
		<tr><td>titre</td><td>prix</td><td>nombre de page</td><td>supprimer</td><td>modifier</td><td>type</td></tr>
	</thead>
	<tbody>
<?php
$mabd = new PDO('mysql:host=localhost;dbname=r214base;charset=UTF8;', 'r214user', 'tutu');
$mabd->query('SET NAMES utf8;');
$req = "SELECT * FROM bandes_dessinees INNER JOIN types ON type_id_ = type_id ORDER BY bd_id";
$resultat = $mabd->query($req);

foreach ($resultat as $value) {
    echo '<tr>' ;
    echo '<td>'.$value['bd_titre'] . '</td>';
    echo '<td>' . $value['bd_prix'] . '</td>';
    echo '<td>' . $value['bd_nb_pages'] . '</td>';
    echo '<td>' . $value['type_nom'] . '</td>';
    echo '<td> <a href="album_delete.php?num='.$value['bd_id'].'" > supprimer </a> </td>';
    echo '<td> <a href="modifier.php?num='.$value['bd_id'].'" > modifier </a> </td>';

    echo '</tr>';
}
?>

</tbody>
</table>
</body>
</html>