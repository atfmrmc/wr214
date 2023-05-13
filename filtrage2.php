<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style> .article { background: #FAA; width: 300px; margin: 10px; } .liste{ display: flex; flex-wrap: wrap; justify-content: space-between; } </style>
</head>
<body>
<a href="index.php">Accueil</a> | <a href="catalogue.php"> catalogue </a> | <a href="filtrage.php"> filtrage simple</a> | <a href="filtrage2.php"> filtrage avancé</a> | <a href="admin/gestion.php">admin</a>	
	<hr>
<h1>recherches filtrées</h1>
<hr>
<!-- ici un formulaire avec des case à cocher proposant différents filtres: descandant ascendant, par nom d'auteur, par types de BD, par prix, par nombre de pages -->
<form action="cataloguefiltre2.php" method="get">
    <fieldset>
        
        <legend>filtrage avancé</legend>

   
        
        <br>
        <label>prix moyen des BDs par auteur</label>
        <input type="radio" name="tri" value="prixMoyen"> 
        <br>
        <label>nombre de  BDs dispo  par types</label>
        <input type="radio" name="tri" value="nbPages"> 
        <br>



        <input type="submit" name="filtrer" >
    </fieldset> 

</body>
</html>