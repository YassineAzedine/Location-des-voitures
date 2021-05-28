<?php
require_once '../connexion.php';
$id_imm = $_GET['imm'];
$req = $connexion->prepare('DELETE FROM automobile WHERE imm="'.$id_imm.'" ');
$reqExec = $req->execute();

if ($reqExec) {
  header('location:../admin.php');
}