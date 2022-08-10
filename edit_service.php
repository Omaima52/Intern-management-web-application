<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<?php
include('connect.php');
date_default_timezone_set('Africa/Casablanca');
$current_date = date('d/m/Y');

if (isset($_POST["btn_update"])) {


    extract($_POST);

    $nomService = $_POST['nomService'];
    $idUtilisateur = $_POST['idUtilisateur'];
    $nbrStage_observation = $_POST['nbrStage_observation'];
    $nbrStage_pro = $_POST['nbrStage_pro'];
    


    
    


    $q1 = "UPDATE `service` SET `nomService`='$nomService',`idUtilisateur`='$idUtilisateur',
    `nbrStage_observation` = '$nbrStage_observation',
    `nbrStage_pro` = '$nbrStage_pro'
     WHERE `idService`='" . $_GET['idService'] . "'";
    //$test = $conn->query($q1) or die($conn->error);
    if ($conn->query($q1) === TRUE) {

        $_SESSION['success'] = ' Service modifié avec succés';

?>
        <script type="text/javascript">
            window.location = "view_service.php";
        </script>
    <?php

    } else {
        $_SESSION['error'] = 'Un problème est survenu lors de la modification';
    ?>
        <script type="text/javascript">
            window.location = "error.php";
        </script>
<?php
    }
}




?>

<?php
//To recover the data of the service we are about to modify
$que = "SELECT * from  `service`d Join `utilisateur` s On d.idUtilisateur = s.idUtilisateur  where  `idService`='" . $_GET['idService'] . "'";
$query = $conn->query($que) or die($conn->error);
while ($row = mysqli_fetch_array($query)) {

    extract($row);
    $nomService = $row['nomService'];
    $nomPrenom = $row['nom'] . " " . $row['prenom'];
    $nbrStage_observation = $row['nbrStage_observation'];
    $nbrStage_pro = $row['nbrStage_pro'];
    $idUtilisat = $row['idUtilisateur'];



?>

    <div class="page-wrapper">

        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">Gestion des Services</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Modifier une service</li>
                </ol>
            </div>
        </div>

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-8" style="margin-left: 10%;">
                    <div class="card">

                        <div class="card-body">
                            <div class="input-states">
                                <form class="form-horizontal" method="POST"  name="Niveauform" enctype="multipart/form-data">

                                    <input type="hidden" name="currnt_date" class="form-control" value="">

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label text-right">Nom du Service</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="nomService" class="form-control" placeholder="Saisir le nom de la service" required="" value="<?php echo $nomService; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label text-right">Chef de Service</label>
                                            <div class="col-sm-8 image">





                                                <select name="idUtilisateur" class="form-control">
                                                    <option value="<?php echo $idUtilisat?>"> <?php echo $nomPrenom; ?></option>
                                                <?php
                                                
                                            }
                                                ?>

                                                <?php
                                                $s1 = "SELECT * from  `service`d Join `utilisateur` s On d.idUtilisateur = s.idUtilisateur  ";
                                                $result = $conn->query($s1);

                                                if ($result->num_rows > 0) {
                                                    while ($row2 = mysqli_fetch_array($result)) { ?>
                                                        <option value="<?php echo $row['idUtilisateur']; ?> ">
                                                            <?php echo $row2['nom'] . ' ' . $row2['prenom']; ?>
                                                        </option>
                                                <?php
                                                    }
                                                } else {
                                                    echo "aucun Service trouvé";
                                                }
                                                ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label text-right">Nombre des stages d'observation</label>
                                            <div class="col-sm-8">
                                                <input type="number" name="nbrStage_observation" class="form-control"  required="" value="<?php echo $nbrStage_observation; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label text-right">Nombre des stages professionnel</label>
                                            <div class="col-sm-8">
                                                <input type="number" name="nbrStage_pro" class="form-control"  required="" value="<?php echo $nbrStage_observation; ?>">
                                            </div>
                                        </div>
                                    </div>






                                    <button type="submit" name="btn_update" class="btn btn-primary btn-flat m-b-30 m-t-30 float-right">Enregistrer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <?php include('footer.php'); ?>