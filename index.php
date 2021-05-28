<?php require_once('connexion.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>location</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
<a href="login.php" class="btn btn-primary">Login</a>
    <div id="entete">
        <video autoplay="autoplay" class="video_entete">
            <source src="images/loc.mkv" type="video/mp4" />
        </video>
        <p class="nomsite">LOCATION CAR</p>
        <div id="formauto">
            <form name="formauto" method="post" action="">
                <input id="motcle" type="text" name="motcle" placeholder="Recherche par marque..." />
                <input class="btfind" type="submit" name="btsubmit" value="Recherche" />
            </form>
        </div>
    </div>
    <div id="articles">
        <?php
      if(isset($_POST['btsubmit'])){
$mc=$_POST['motcle'];
$reponse = $connexion->query('SELECT * FROM automobile WHERE marque ="'.$mc.'" ');
        $reponse->execute();
        $info = $reponse->fetch();
        if($info){

        
        ?>
        <div id="auto">
        <img src="images/<?php echo $info['photo'] ?>" ><br />
        <?php echo $info['imm']; ?><br />
        <?php echo $info['marque']; ?><br />
        <?php echo $info['prix']; ?>

    </div>
    <?php
    }else{
        echo 'aucun resultat '.$mc;
    }
      }
      else{
          
        $reponse = $connexion->query('SELECT * FROM automobile');
        $reponse->execute();
        $infos = $reponse->fetchALl();
            
    
    foreach($infos as $info){

      ?>
    
        <div id="auto">
        <img src="images/<?php echo $info['photo'] ?>" ><br />
        <?php echo $info['imm']; ?><br />
        <?php echo $info['marque']; ?><br />
        <?php echo $info['prix']; ?>

    </div>
      
      <?php } } ?>
    </div>
</body>

</html>