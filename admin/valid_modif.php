<p>vous venez de modifier un album</p>
...
<?php
$titre=$_GET['....'];
$prix=....
...
$num =....;


$mabd = new PDO('mysql:host=localhost;dbname=r214base;charset=UTF8;', 'r214user', 'tutu');
$mabd->query('SET NAMES utf8;');

$req = '... .'. $titre . '...' . $prix . ' ... ' . ... .$num ;

echo 'juste pour le debug: '. $req;

// Décommenter une fois la simulation fait
//$resultat = $mabd->query($req);

?>