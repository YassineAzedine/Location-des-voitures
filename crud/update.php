<?php
require_once '../connexion.php';
if (isset($_POST['update'])) {
    $imm = addslashes($_POST['imm']);
    $marque = addslashes($_POST['marque']);
    $image_name = $_FILES['image']['name'];
    $image_path = '../images/' . $image_name;
    $image_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp, $image_path);
    $prix = addslashes($_POST['prix']);
    $id = $_POST['id'];
    $req = $connexion->prepare('UPDATE automobile SET imm=:imm,marque=:marque,photo=:photo,prix=:prix WHERE imm="'.$id.'" ');
    $req->bindValue(':imm', $imm);
    $req->bindValue(':marque', $marque);
    $req->bindValue(':photo', $image_name);
    $req->bindValue(':prix', $prix);
    $reqExec = $req->execute();
    if ($reqExec) {
        header('location:../admin.php');
    }
};