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
<form action="cataloguefiltre.php" method="get">
    <fieldset>
        
        <legend>filtrage</legend>

        <label>tri par titre</label>
        <input type="radio" name="tri" value="titreAsc">ascendant
        <input type="radio" name="tri" value="titreDesc">descendant
        <br>

        <label>bd pas chere (moins de 10 euro)</label>
        <input type="radio" name="tri" value="cheap">cheap
       
        <br>

        <label>tri par auteur</label>
        <input type="radio" name="tri" value="auteurAsc">ascendant
        <input type="radio" name="tri" value="auteurDes">descendant
        <br>
       
        <label>tri par prix</label>
        <input type="radio" name="tri" value="prixAsc">ascendant
        <input type="radio" name="tri" value="prixDesc">descendant
        <br>
        <label>tri par type de BD</label>
        <input type="radio" name="tri" value="typeAsc">ascendant
        <input type="radio" name="tri" value="typeDesc">descendant
        <br>


        <input type="submit" name="filtrer" >
    </fieldset> 

</body>
</html>