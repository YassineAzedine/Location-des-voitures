<?php
include("connexion.php");
session_start();


if (isset($_POST['login-submit'])) {
  $query = $connexion->prepare("SELECT * FROM users WHERE name='" . $_POST['name'] . "' ");
  $query->execute();
  $fetch = $query->fetch();
  if ($fetch) {
    $_SESSION['login'] = $fetch['name'];
    $_SESSION['password'] = $fetch['user_pwd'];
    if ($fetch['user_pwd'] == $_POST['pwd']) {
      header('location:admin.php');
    }
  }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styl.css">
  <title>login</title>
</head>

<body>
  <div>
    <div class="form-login">
      <?php if (isset($_POST['login-submit'])) {
        if (!isset($_SESSION['login']) or !isset($_SESSION['pwd'])) {
      ?>
          <p>login ou mdp invalid</p>
      <?php }
      } ?>
      <!-- <form action="" class="login-form" method="post">
        <input type="text" name="name" placeholder="email" />
        <input type="password" name="pwd" placeholder="password" />
        <button type="submit" name="login-submit">login</button> -->
        <!---------------------------------------->
        <form action="" class="login-form" method="post">
        <h2>Login</h2>
  <div class="imgcontainer">
    <img src="images/walidwalid.jpg" alt="Avatar" class="avatar">
  </div>
  <div class="container">
    <label for="name"><b>name</b></label>
    <input type="text" placeholder="Name" name="name" required>
    <label for="pwd"><b>Password</b></label>
    <input type="password" placeholder="Enter mot de passe" name="pwd" required>
    <button type="submit" name="login-submit">Login</button>
  </div>
</form>
      <!-- </form> -->
    </div>
  </div>
</body>

</html>