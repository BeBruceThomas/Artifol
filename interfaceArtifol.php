<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Interface de consultation</title>
    <link rel="stylesheet" href="interfaceArtifol.css">
  </head>
  <body>

    <div id="entete">
      <h1>Artifol</h1>
      <h2>Analyse de l'artificialisation des sols à partir des données Sentinel</h2>
    </div>

    <!-- Connexion à la base de données -->
    <?php
    	$host = "localhost"; // le nom ou l'adresse du host
      $port = "5432"
      $dbname = "Artifol"
    	$user = "admin"; // user de la base
    	$pass = ""; // mot de passe
    	$connexion = pg_connect($host,$user,$pass) or die('Erreur de connexion');

      $connexion = pg_connect('host=' . $connexion . ' port=' . $port . ' dbname=' . $dbname . ' user=' . $user . ' password=' . $pass);

    	$bdd = "Artifol"; // nom de la base de données
    	if (!mysql_select_db($bdd,$connexion))
    		return 0;
    	if (!$connexion)
    		return 0;



    	pg_close($connexion);	// Fermeture de la connexion, cela ne libère pas les résultats
    ?>


    <div id="traitement">
    <!-- Creation du formulaire de recherche -->
    <div id="formulaire">
      <form method="post" action="interface.php">
        <fieldset>
          <legend>Visualiser les résultats en :</legend>
          <p><input type="radio" name="visualisation" value="point" id="point" checked="checked"/>
              <label for="point">Rentrant les coordonnées du point Teruti-Lucas</label></p>
          <p><input type="radio" name="visualisation" value="carte" id="carte" checked="checked"/>
              <label for="carte">Sélectionnant l'emprise sur une carte</label></p>
        </fieldset>
        <p id="chargement"><input type="submit" name="Charger" value="Charger"  onclick="check();"></p>

    </div>


    <!-- Traitement du formulaire et selection du point Teruti-Lucas a traiter -->
    <div id="selection_point">
      <?php
        //Recuperation des donnees du formulaire
        $Preferance = $_POST['visualisation'];
        if ($Preferance == "point") {
          //Inserer formulaire pour rentrer la latitude et la longitude du point
          echo "POINT";
        }
        else {
          //Inserer une carte qui permettra de selectionner une zone
          echo "CARTE";
        }
       ?>
    </div>
    </div>


   <!-- Affichage des resultats souhaites -->
   <div id="resultats">
     <p>Resultats</p>

   </div>



   <div id="pied_de_page">
     <p>Projet Développement ING2 2016-2017 ENSG</p>
     <p>~ Réalisé par Mannaïg L'Haridon, Anthony Magnetti, Axel Orger & Bruce Thomas ~</p>
   </div>

  </body>
</html>
