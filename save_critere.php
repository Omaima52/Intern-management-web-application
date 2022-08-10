<?php


include('../connect.php');

extract($_POST);

$nomCritere = $_POST['nomCritere'];
$sql = "ALTER TABLE `critere`
ADD COLUMN `$nomCritere`  INT(1) NOT NULL 
AFTER `idCritere`";

#    $result = $conn->query($sql) or die($conn->error);
if ($conn->query($sql) === TRUE) {
    $_SESSION['success'] = ' Critère ajoutée avec succés';
?>
    <script type="text/javascript">
        window.location = "../view_mes_demandes.php";
    </script>
<?php
} else {
    $_SESSION['error'] = 'Un problème est survenu lors de l\'ajout';
?>
    <script type="text/javascript">
        window.location = "../error.php";
    </script>
<?php } ?>