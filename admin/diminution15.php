<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="gestion.php">retour au tableau de bord</a> 	
	<hr>
<h1>gestion de nos albums</h1>
<h2>vous venez de diminuner de 15% les BD de SF</h2>
<hr>
<?php


$mabd = new PDO('mysql:host=localhost;dbname=r214base;charset=UTF8;', 'r214user', 'tutu');
$mabd->query('SET NAMES utf8;');

$req='UPDATE ...';
//echo $req;

$mabd->query($req);

?>
<h2> modification reussie </h2>
<a href="gestion.php">retour au tableau de bord</a>
</body>
</html>