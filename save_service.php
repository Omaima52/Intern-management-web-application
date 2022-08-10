<?php


include('../connect.php');

extract($_POST);
$sql = "INSERT INTO `service` (`nomService`,`idUtilisateur`,`nbrStage_observation`, `nbrStage_pro`) 
VALUES ('" . $nomService . "','" . $idUtilisateur . "','" . $nbrStage_observation . "', '" . $nbrStage_pro . "')";
$stageOBSCount = "SELECT COUNT(*) FROM `demande` where `type`='Stage observation'";

$res = $conn->query($stageOBSCount);

$rowOBS = mysqli_fetch_array($res);

$countInsert = $row[0];
//    $result = $conn->query($sql) or die($conn->error);
if ($conn->query($sql) === TRUE) {
      $_SESSION['success'] = ' Service ajoutée avec succés';
?>
      <script type="text/javascript">
            window.location = "../view_service.php";
      </script>
<?php
} else {
      $_SESSION['error'] = 'Un problème est survenu lors de l\'ajout';
?>
      <script type="text/javascript">
            window.location = "../error.php";
      </script>
<?php } ?>