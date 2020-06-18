<?php
//Démarrage de la session me permettant d'effectué un test sur les variables de celle-ci
session_start();

include('fonctions_php/co.php');
include('fonctions_php/fonctions.php');

//Test pour savoir si l'utilisateur est connecté, si non, ferme la session
if(!isset($_SESSION['idUtilisateur'])){
  session_destroy();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index_fo.css">
</head>
<body>
    <?php include('static/header.php')?>
    
    <div class="containerArticleFo">
      <?php $array = tableauArticles($_SESSION['raisonSociale']);
      if(!empty($array[0]['nArticle'])){
        for($i=0; $i<sizeof($array); $i++){?>
          <form action="pages/modifArticle.php" method="post" class="articleFo">
            <input type="hidden" name="nArticle" value="<?php echo $array[$i]['nArticle']; ?>">
            <span class="nomArticle"><?php echo ucfirst(strtolower($array[$i]['nomArticle'])); ?></span>
            <div class="infos">
              <span class="prix">Prix : <?php echo $array[$i]['prix'] ?></span>
              <span class="qte"> Stock : <?php echo $array[$i]['stock']?></span>
            </div>
            <button type="submit" name="btnModif" class="btnModif">Modifier</button>
          </form>
      <?php }
      }else{
        echo "Vous n'avez ajouté aucun article";
       } 
      ?>
    </div>
    
</body>
</html>