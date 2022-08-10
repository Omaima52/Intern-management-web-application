
<?php


include('../connect.php');

extract($_POST);
   $sql = "INSERT INTO `role` (`nomRole`,`idUtilisateur`) 
   VALUES ('".$nomRole."','".$idUtilisateur."')";
//    $result = $conn->query($sql) or die($conn->error);
 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Role ajouté avec succés';
     ?>
<script type="text/javascript">
window.location="../view_role.php";
</script>
<?php
} else {
      $_SESSION['error']='Un problème est survenu lors de l\'ajout';
?>
<script type="text/javascript">
window.location="../error.php";
</script>
<?php } ?>



