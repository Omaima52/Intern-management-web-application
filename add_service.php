<?php
//Tache EDDARRAJI OMAIMA

include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<?php
include('connect.php');
?>

<div class="page-wrapper">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Gestion des Services</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Ajouter une service</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-8" style="margin-left: 10%;">
                <div class="card">

                    <div class="card-body">
                        <div class="input-states">
                            <form class="form-horizontal" method="POST" action="actions/save_service.php" name="Niveauform" enctype="multipart/form-data">

                                <input type="hidden" name="currnt_date" class="form-control" value="">

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label text-right">Nom du Service</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="nomService" class="form-control" placeholder="Saisir le nom de la service" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label text-right">Nombre des stages d'observation</label>
                                        <div class="col-sm-8">
                                            <input type="number" name="nbrStage_observation" class="form-control" placeholder="Saisir le nombre autorisé" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label text-right">Nombre des stages professionnel</label>
                                        <div class="col-sm-8">
                                            <input type="number" name="nbrStage_pro" class="form-control" placeholder="Saisir le nombre autorisé" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label text-right">Chef de Service</label>
                                        <div class="col-sm-8 image">
                                            <select name="idUtilisateur" class="form-control" required>

                                                <option>--Choisir un chef de service--</option>
                                                <?php
                                                $s1 = "SELECT * FROM `utilisateur`";
                                                $result = $conn->query($s1);

                                                if ($result->num_rows > 0) {
                                                    while ($row = mysqli_fetch_array($result)) { ?>
                                                        <option value="<?php echo $row['idUtilisateur']; ?>">
                                                            <?php echo $row['nom']." ". $row['prenom']; ?>
                                                        </option>
                                                <?php
                                                    }
                                                } else {
                                                    echo "aucun Service trouvé";
                                                }
                                                ?>

                                                <!-- <option>Mécanique</option>
                                                <option>Electrique</option>
                                                <option>Industriel</option>
                                                <option>Physique/Chimique</option> -->

                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <button type="submit" name="btn_save" class="btn btn-primary btn-flat m-b-30 m-t-30 float-right">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php include('footer.php'); ?>