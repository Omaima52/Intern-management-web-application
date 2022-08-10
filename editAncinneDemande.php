<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<?php
include('connect.php');
date_default_timezone_set('Africa/Casablanca');
$current_date = date('d/m/Y');

if (isset($_POST["btn_update"])) {


    extract($_POST);
    // PHOTO
    $photo = $_FILES['photo']['name'];
    $target = "uploadImage/Profile/" . basename($photo);

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
        @unlink("uploadImage/Profile/" . $_POST['old_photo']);
        $msg = "Photo chargée avec succés";
    } else {
        $msg = "Un problème est survenu lors de la mise à jour du photo.";
    }

    //CV
    $cv = $_FILES['cv']['name'];
    $targetCV = "uploadCV/" . basename($cv);
    if (move_uploaded_file($_FILES['cv']['tmp_name'], $targetCV)) {
        @unlink("uploadCV/" . $_POST['old_cv']);
        $msg = "Cv chargée avec succés";
    } else {
        $msg = "Un problème est survenu lors de la mise à jour du cv.";
    }

    //Demande de l'école
    $demandeEcole = $_FILES['demandeEcole']['name'];
    $targetDemande = "uploadDemande/" . basename($demandeEcole);
    if (move_uploaded_file($_FILES['demandeEcole']['tmp_name'], $targetDemande)) {
        @unlink("uploadDemande/" . $_POST['old_demandeEcole']);
        $msg = "demande chargée avec succés";
    } else {
        $msg = "Un problème est survenu lors de la mise à jour du demande.";
    }

    //Convention
    $convention = $_FILES['convention']['name'];
    $targetConvention = "upl/" . basename($demandeEcole);
    if (move_uploaded_file($_FILES['demandeEcole']['tmp_name'], $targetDemande)) {
        @unlink("uploadConvention/" . $_POST['old_convention']);
        $msg = "convention chargée avec succés";
    } else {
        $msg = "Un problème est survenu lors de la mise à jour du convention.";
    }















    $q1 = "UPDATE demande SET `nom`='$nom',`prenom`='$prenom', `cin`='$cin', `date_debut`='$date_debut', `date_fin`='$date_fin',
    `photo`= '$photo', `cv`='$cv', `demandeEcole`='$demandeEcole', `convention`= '$convention',
    `type`= '$type',
    `serviceNom`= '$serviceNom',
    `etat` = '$etat', `niveau` = '$niveau'
     WHERE `cin`='" . $_POST['cin'] . "'";
    //$q2="UPDATE etudiant SET `cne`='$cne',`dateNaissance`='$dateNaissance' WHERE `idUtilisateur`='".$_GET['idUtilisateur']."'";


    // `cin`='".$cin."', `date_debut`='".$date_debut."'
    // ,`date_fin`='".$date_fin."',`photo`='".$photo."', `cv`='".$cv."', `demandeEcole`='".$demandeEcole."',
    // `convention`='".$convention."', `type`='".$type."', `service`='".$service."', `etat`='".$etat."'
    if ($conn->query($q1) === TRUE) {

        $_SESSION['success'] = ' Demande modifié avec succés';

        

        if (($_SESSION["idRole"] == 3)) { ?>

            <script type="text/javascript">
                window.location = "IT_index.php";
            </script>
        <?php
        }

        if (($_SESSION["idRole"] == 4)) { ?>

            <script type="text/javascript">
                window.location = "mecanique_index.php";
            </script>
        <?php
        }


        ?>
        <script type="text/javascript">
            window.location = "view_mes_demandes.php";
        </script>
    <?php

    } else {
        $_SESSION['error'] = 'Un problème est survenu lors de la modification';
    ?>
        <script type="text/javascript">
            window.location = "view_mes_demandes.php";
        </script>
<?php
    }
}

?>



<!-- <?php
$que = "SELECT * from  demande where  `idDemande`='" . $_GET['idDemande'] . "'";
$query = $conn->query($que);
while ($row = mysqli_fetch_array($query)) {

    extract($row);
    $nom = $row['nom'];
    $prenom = $row['prenom'];
    $cin = $row['cin'];
    $date_debut = $row['date_debut'];
    $date_fin = $row['date_fin'];
    $photo = $row['photo'];
    $cv = $row['cv'];
    $demandeEcole = $row['demandeEcole'];
    $convention = $row['convention'];
    $type = $row['type'];
    $service = $row['service'];
    $etat = $row['etat'];
}


?> -->