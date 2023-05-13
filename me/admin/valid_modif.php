<p>vous venez de modifier un album</p>
<?php
$titre = $_GET['titre'];
$prix = $_GET['prix'];
$nbpages = $_GET['nbpages'];
$num = $_GET['num'];
$auteur = $_GET['numauteur'];

$mabd = new PDO('mysql:host=localhost;dbname=r214base;charset=UTF8;', 'r214user', 'tutu');
$mabd->query('SET NAMES utf8;');

$req = "UPDATE bandes_dessinees SET bd_titre='$titre', bd_prix=$prix , _auteur_id=$auteur WHERE bd_id=$num";

echo 'juste pour le debug: ' . $req;

$resultat = $mabd->query($req);

?>