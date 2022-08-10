<?php

include 'connect.php';
session_start();



$sql1 = "DELETE FROM `demande` WHERE idDemande='".$_GET["idDemande"]."'";
//$sql2 = "DELETE FROM `etudiant` WHERE idUtilisateur='".$_GET["idUtilisateur"]."'";

$res = $conn->query($sql1) ; 
//$res2 = $conn->query($sql2) ;
 $_SESSION['success']=' Demande supprimé avec succés';
?>
<script>

window.location = "view_mes_demandes.php";
</script>
