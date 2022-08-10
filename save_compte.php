
<?php
include('../connect.php');

extract($_POST);
$pwd_cryp = md5($_POST["password"]);
$idRole = $_POST["idRole"];
$login = $_POST["login"];
$idUtilisateur = $_POST["idUtilisateur"];
   $sql = "INSERT INTO `compte` (`idRole`, `idUtilisateur`, `login`, `password`) VALUES ('$idRole', '$idUtilisateur', '$login', '$pwd_cryp')";

 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Compte ajoutée avec succés';
     ?>
<script type="text/javascript">
window.location="../view_compte.php";
</script>
<?php
} else {
      $_SESSION['error']='Un problème est survenu lors de l\'ajout';
?>
<script type="text/javascript">
window.location="../view_errors.php";
</script>
<?php } ?>
