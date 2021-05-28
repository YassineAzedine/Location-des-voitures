<?php
if (isset($_GET['imm'])) {
  $id_imm = $_GET['imm'];
  require_once 'connexion.php';
  $reponse = $connexion->query('SELECT * FROM automobile WHERE imm ="'.$id_imm.'" ');
  $reponse->execute();
  $info = $reponse->fetch();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <section class="Form container">
    <form action="crud/update.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $info['imm'] ?>">
      <p>
        <label for="titre">imm:</label>
        <input class="form-control" type="text" name="imm" id="titre" value="<?= $info['imm'] ?>" required>
      </p>
      <p>
        <label for="discription">marque:</label>
        <input class="form-control" type="text" name="marque" value="<?= $info['marque'] ?>" id="discription" required>
      </p>
      <p>
        <label for="image">image:</label>
        <input class="form-control-file" type="file" name="image" accept="image/png, image/jpeg" required>
      </p>
      <p>
        <label for="lien">prix:</label>
        <input class="form-control" type="text" value="<?= $info['prix'] ?>" name="prix" required>
      </p>
      <input type="submit" class="btn btn-primary" name='update' value="Modifier un projet">
    </form>
  </section>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>