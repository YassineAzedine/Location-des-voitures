<?php
session_start();
if (isset($_SESSION['login']) and isset($_SESSION['password'])) {
    require_once 'connexion.php';
    $reponse = $connexion->query('SELECT * FROM automobile');
    $reponse->execute();
    $infos = $reponse->fetchALl();
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <title>Admin</title>
  <style>
      img{
          max-width: 20rem;
          max-height: 15rem;
      }
  </style>
</head>

<body>
    <a href="logout.php" class="btn btn-primary">Logout</a>
  <section class="Form container">
  <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">imm</th>
                        <th scope="col">image</th>
                        <th scope="col">prix</th>
                        <th scope="col">marque</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($infos as $key => $info) { ?>
                        <tr>
                            <th scope="row"> <?= $key + 1 ?></th>
                            <td><?= $info['imm'] ?></td>
                            <td><img src="images/<?= $info['photo'] ?>" alt=""></td>
                            <td><?= $info['prix'] ?></td>
                            <td><?= $info['marque'] ?></td>
                            <td><a href="update.php?imm=<?= $info['imm'] ?>">update</a> </td>
                            <td><a href="crud/delete.php?imm=<?= $info['imm'] ?>">delete</a> </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="Add.php">
                <div class="btn btn-primary">Ajouter un projet</div>
            </a>

  </section>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>






    <?php
}else{ header('location:login.php');}
?>