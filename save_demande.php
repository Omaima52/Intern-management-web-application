<?php
include('../connect.php');
mysqli_set_charset($conn, 'utf8');


$serviceNom = $_POST["serviceNom"];

// nombre des demandes dont le type de stage est observation
$obsSaisee = "SELECT 
COUNT(*) FROM `demande` where (`type`= 'Stage observation') and (`etat` = 'validé') and (`serviceNom`='" . $serviceNom . "') ";
//and (`serviceNom` = '" . $serviceNom . "'
$rs = $conn->query($obsSaisee) or die($conn->error);
$row1 = mysqli_fetch_array($rs);
$nbOBSexist = $row1[0];
echo $nbOBSexist;






$que12 = "SELECT * from  `service`d Join `utilisateur` s On d.idUtilisateur = s.idUtilisateur  where  `idService`='" . $serviceNom . "'";
$resultService = $conn->query($que12) or die($conn->error);


// les nombres des stages d'observations allouee dans la service
while ($row2 = $resultService->fetch_assoc()) {
  $nbOBSallouee = $row2['nbrStage_observation'];
}

echo "\n".$nbOBSallouee ;









$photo = $_FILES['photo']['name'];


$target = "../uploadImage/Profile/" . basename($photo);

if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {


?>



  <?php

} else {
  $msg = "Echec de chargement du photo";
}

$cv = $_FILES['cv']['name'];
$target = "../uploadCV/" . basename($cv);

if (move_uploaded_file($_FILES['cv']['tmp_name'], $target)) {
  $msg = "cv chargé avec succés";
} else {
  $msg = "Echec de chargement du cv";
}


$demandeEcole = $_FILES['demandeEcole']['name'];
$target = "../uploadDemande/" . basename($demandeEcole);

if (move_uploaded_file($_FILES['demandeEcole']['tmp_name'], $target)) {
  $msg = "Demande chargé avec succés";
  // echo $msg;
} else {
  $msg = "Echec de chargement du demande";
}


$convention = $_FILES['convention']['name'];
$target = "../uploadConvention/" . basename($convention);

if (move_uploaded_file($_FILES['convention']['tmp_name'], $target)) {
  $msg = "Convention chargé avec succés";
  // echo $msg;
} else {
  $msg = "Echec de chargement du Convention";
}




$nom = $_POST["nom"];
// echo $nom;
$prenom = $_POST["prenom"];
$date_debut = $_POST["date_debut"];
$date_fin = $_POST["date_fin"];
$cin = $_POST["cin"];
$type = $_POST["type"];
$serviceNom = $_POST["serviceNom"];
$niveau = $_POST["niveau"];
$etat = $_POST["etat"];
$etablissement = $_POST["etablissement"];
$ville = $_POST['ville'];
$sexe = $_POST["sexe"];
$filiere = $_POST["filiere"];
$adresse = $_POST["adresse"];
$date_naissance = $_POST["date_naissance"];
$telephone = $_POST["telephone"];

// function getNextCaseNumberId() {
//   include('../connect.php');

//   $date = date('Y-m-d');
//   $time = strtotime($date);

//   $year = date("Y", $time);
//   $sql = "SELECT * from `demande` WHERE `nombreIncrement` LIKE '%/{$year}' order by idDemande desc limit 1"; //Assuming your CS_ID is autoincrement
//   $query_result = $conn->query($sql) or die($conn->error);
//   $row = $query_result->fetch_assoc();
//   if ($row) {

//     $lastId=explode("/",$row["nombreIncrement"])[0];
//     return ($lastId+1)."/".$year; 


//   } else {
//     return "1/{$year}"; 
//   }
// }


//extract($_POST);
$count = 0;
$date = date('Y-m-d');
$time = strtotime($date);

$year = date("Y", $time);

// $test = DATE_FORMAT($time, '%y');


if ($nbOBSexist < $nbOBSallouee) {
  $sql = 'INSERT INTO `demande` (`nom`, `prenom`, `date_debut` , `date_fin`, `cin`, `photo`, `cv`, `demandeEcole`, `convention`,`type`, `serviceNom`, `etat`, `niveau`, `etablissement`,`ville`, `sexe`, `filiere`, `adresse`, `telephone`, `date_naissance`) VALUES ("' . $nom . '","' . $prenom . '","' . $date_debut . '", 
"' . $date_fin . '", 
"' . $cin . '", 
"' . $photo . '",
 "' . $cv . '", "' . $demandeEcole . '", "' . $convention . '","' . $type . '", "' . $serviceNom . '", "' . $etat . '", "' . $niveau . '", "' . $etablissement . '","' . $ville . '", "' . $sexe . '", "' . $filiere . '", "' . $adresse . '","' . $telephone . '", "' . $date_naissance . '")';


  if ($conn->query($sql)) {

    //$last_id = mysqli_insert_id($conn);

    // $sql1 = "INSERT INTO `stagier` (`idDemande`) Values ('$last_id')";
    // if ($conn->query($sql1) === TRUE) {
    //   $_SESSION['success'] = ' Stagier ajouté avec succés';
    // }


    $_SESSION['success'] = ' Stagier ajouté avec succés' ;
  ?>
    <script type="text/javascript">
      window.location = "../view_mes_demandes.php";
    </script>
  <?php
  } else {
    $_SESSION['error'] = 'Un problème est survenu lors de l\'ajout';
  ?>
    <script type="text/javascript">
      window.location = "../view_mes_demandes.php";
    </script>
<?php }
}

else {
  $_SESSION['error'] = 'Un problème est survenu lors de l\'ajout';
?>
  <script type="text/javascript">
    window.location = "../view_mes_demandes.php";
  </script>
<?php }










// }

?>