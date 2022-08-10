<?php
include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>



<?php
include('connect.php');

if (isset($_POST["btn_update"])) {
    //extract($_POST);
    // PHOTO

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
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

    $q1 = "UPDATE demande SET `nom`='$nom',`prenom`='$prenom', `date_debut`='$date_debut', `date_fin`='$date_fin',
    `photo`= '$photo', `cv`='$cv', `demandeEcole`='$demandeEcole', `convention`= '$convention',
    `type`= '$type',
    `service`= '$service',
    `etat` = '$etat'
     WHERE `cin`='" . $_GET['cin'] . "'";
    if ($conn->query($q1) === TRUE) {

        $_SESSION['success'] = 'Ancienne Demande a été modifié avec succés';



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

// extract($_POST);
$cin = $_POST['cin'];


// SQL Statement
$sql = "SELECT * FROM demande WHERE `cin` = '" . $_POST['cin'] . "'";

// Process the query
$results = $conn->query($sql);

// Fetch Associative array
//$row = $results->fetch_assoc();
$row = mysqli_fetch_array($results);
// Check if there is a result and response to  1 if email is existing
$ifExist = is_array($row) && count($row) > 0;
echo $ifExist;




$nom = $row[1];
$prenom = $row[2];
$cin = $row[3];
$date_debut = $row['date_debut'];
$date_fin = $row['date_fin'];
$photo = $row['photo'];
$cv = $row['cv'];
$demandeEcole = $row['demandeEcole'];
$convention = $row['convention'];
$type = $row['type'];
$serviceNom = $row['serviceNom'];
$niveau = $row['niveau'];
$etat = $row['etat'];



//$result = $conn->query($CINExists) or die ($conn->error);


if ($ifExist == 1) {

    $_SESSION['success'] = 'demande avec le meme cin déja exist!!';

    ?>



    <div class="page-wrapper">

        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">Gestion des demandes</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Modifier une demande</li>
                </ol>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8" style="margin-left: 10%;">
                    <div class="card">
                        <div class="card-title">

                        </div>
                        <div class="card-body">
                            <div class="input-states">
                                <form class="form-horizontal" method="POST" name="CINexistForm" enctype="multipart/form-data" action="editAncinneDemande.php">
                                    <input type="hidden" name="currnt_date" class="form-control" value="">

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label  text-sm-right">CIN</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="cin" class="form-control" placeholder="Saisir le CIN" required value="<?php echo $cin; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label text-sm-right">Nom</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="nom" class="form-control" placeholder="Saisir le nom" required="" value="<?php echo $nom; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class=" form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label text-sm-right">Prénom</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="prenom" class="form-control" placeholder="Saisir le prénom" required="" value="<?php echo $prenom; ?>">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label  text-sm-right">Date Debut</label>
                                            <div class="col-sm-8">
                                                <input type="date" name="date_debut" class="form-control" placeholder="Saisir la date de début" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label  text-sm-right">Date Fin</label>
                                            <div class="col-sm-8">
                                                <input type="date" name="date_fin" class="form-control" placeholder="Saisir la date de fin" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label  text-sm-right">Etablissement</label>
                                            <div class="col-sm-8 image">
                                                <input type="text" class="form-control" name="etablissement" placeholder="Saisir l'établissement" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label  text-sm-right">Ville etablissement </label>
                                            <div class="col-sm-8 image">
                                                <input type="text" class="form-control" name="ville" placeholder="Saisir l'établissement" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label  text-sm-right">Filière</label>
                                            <div class="col-sm-8 image">
                                                <input type="text" class="form-control" name="filiere" placeholder="Saisir la filière" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label  text-sm-right">Adresse</label>
                                            <div class="col-sm-8 image">
                                                <input type="text" class="form-control" name="adresse" placeholder="Saisir l'adresse" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label  text-sm-right">Date de naissance</label>
                                            <div class="col-sm-8 image">
                                                <input type="date" class="form-control" name="date_naissance" placeholder="Saisir la date de naissance" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label  text-sm-right">Téléphone</label>
                                            <div class="col-sm-8 image">
                                                <input type="text" class="form-control" name="telephone" placeholder="Saisir le téléphone" required>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label  text-sm-right">Photo</label>
                                            <div class="col-sm-8 image">
                                                <image class="profile-img profile-img img-fluid responsive img-thumbnail" src="uploadImage/Profile/<?= $photo ?>" style="width:35%;">
                                                    <input type="hidden" value="<?= $photo ?>" name="old_photo">
                                                    <input type="file" class="form-control" name="photo">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label  text-sm-right">CV</label>
                                            <div class="col-sm-8 image">
                                                <input type="hidden" value="<?= $cv ?>" name="old_cv">
                                                <input type="file" class="form-control" name="cv">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label  text-sm-right">Demande</label>
                                            <div class="col-sm-8 image">
                                                <input type="hidden" value="<?= $demandeEcole ?>" name="old_demandeEcole">
                                                <input type="file" class="form-control" name="demandeEcole">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label  text-sm-right">Convention</label>
                                            <div class="col-sm-8 image">
                                                <input type="hidden" value="<?= $convention ?>" name="old_convention">
                                                <input type="file" class="form-control" name="convention">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label  text-sm-right">Etat</label>
                                            <div class="col-sm-8 image">
                                                <select name="etat" class="form-control">
                                                    <option value="">--Choisir une etat--</option>
                                                    <option>en cours</option>
                                                    <option>en attante</option>
                                                    <option>rejeté</option>
                                                    <option>validé</option>
                                                    <option>terminé</option>


                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label  text-sm-right">Service</label>
                                            <div class="col-sm-8 image">
                                                <select name="serviceNom" class="form-control">
                                                    <option value="">--Choisir une service--</option>

                                                    <?php
                                                    $s1 = "SELECT * FROM `service`";
                                                    $result = $conn->query($s1);

                                                    if ($result->num_rows > 0) {
                                                        while ($row = mysqli_fetch_array($result)) { ?>
                                                            <option value="<?php echo $row['idService']; ?>">
                                                                <?php echo $row['nomService']; ?>
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
                                            <label class="col-sm-4 control-label  text-sm-right">Niveau</label>
                                            <div class="col-sm-8 image">
                                                <select name="niveau" class="form-control">
                                                    <option value="">--Choisir un niveau--</option>
                                                    <option>License</option>
                                                    <option>Master</option>
                                                    <option>Bac+4</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label  text-sm-right">Type de stage</label>
                                            <div class="col-sm-8 image">
                                                <select name="type" class="form-control">
                                                    <option value="">--Choisir le type de stage--</option>
                                                    <option>Stage observation</option>
                                                    <option>Stage professionel</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label  text-sm-right">Sexe</label>
                                            <div class="col-sm-8 image">
                                                <select name="sexe" class="form-control">

                                                    <option value="">--Choisir le sexe--</option>
                                                    <option>F</option>
                                                    <option>M</option>


                                                </select>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- <a href="rechercheCIN.php?idDemande=<?= $row['idDemande']; ?>"> -->
                                    <button type="submit" name="btn_update" class="btn btn-primary btn-flat m-b-30 m-t-30 float-right">Enregistrer</button></a>
                                    <!-- <button type="submit" name="btn_update" class="btn btn-primary btn-flat m-b-30 m-t-30 float-right">Enregistrer</button> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <?php include('footer.php'); ?>
            }<?php
            } else {
                $_SESSION['error'] = 'Aucune stagiaire exist avec ce CIN!!';




                ?>

            <div class="page-wrapper">

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-primary">Gestion des demandes</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Ajouter une demande</li>
                        </ol>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8" style="margin-left: 10%;">
                            <div class="card">
                                <div class="card-title">

                                </div>
                                <div class="card-body">
                                    <div class="input-states">
                                        <form class="form-horizontal" method="POST" action="actions/save_demande.php" name="demandeform" enctype="multipart/form-data">
                                            <input type="hidden" name="currnt_date" class="form-control" value="">

                                            <div class="form-group">
                                                <div class="row">

                                                    <label class="col-sm-4 control-label  text-sm-right">CIN</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="cin" class="form-control" placeholder="Saisir le CIN" required value="<?php echo $cin; ?>">
                                                    </div>



                                                </div>

                                            </div>



                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label text-sm-right">Nom</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="nom" class="form-control" placeholder="Saisir le nom" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label text-sm-right">Prénom</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="prenom" class="form-control" placeholder="Saisir le prénom" >
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label  text-sm-right">Date Debut</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" name="date_debut" class="form-control" placeholder="Saisir la date de début" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label  text-sm-right">Date Fin</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" name="date_fin" class="form-control" placeholder="Saisir la date de fin" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label  text-sm-right">Etablissement</label>
                                                    <div class="col-sm-8 image">
                                                        <input type="text" class="form-control" name="etablissement" placeholder="Saisir l'établissement" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label  text-sm-right">Ville etablissement </label>
                                                    <div class="col-sm-8 image">
                                                        <input type="text" class="form-control" name="ville" placeholder="Saisir l'établissement" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label  text-sm-right">Filière</label>
                                                    <div class="col-sm-8 image">
                                                        <input type="text" class="form-control" name="filiere" placeholder="Saisir la filière" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label  text-sm-right">Adresse</label>
                                                    <div class="col-sm-8 image">
                                                        <input type="text" class="form-control" name="adresse" placeholder="Saisir l'adresse" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label  text-sm-right">Date de naissance</label>
                                                    <div class="col-sm-8 image">
                                                        <input type="date" class="form-control" name="date_naissance" placeholder="Saisir la date de naissance" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label  text-sm-right">Téléphone</label>
                                                    <div class="col-sm-8 image">
                                                        <input type="text" class="form-control" name="telephone" placeholder="Saisir le téléphone" >
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label  text-sm-right">Photo</label>
                                                    <div class="col-sm-8 image">
                                                        <input type="file" class="form-control" name="photo">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label  text-sm-right">CV</label>
                                                    <div class="col-sm-8 image">
                                                        <input type="file" class="form-control" name="cv">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label  text-sm-right">Demande</label>
                                                    <div class="col-sm-8 image">
                                                        <input type="file" class="form-control" name="demandeEcole">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label  text-sm-right">Convention</label>
                                                    <div class="col-sm-8 image">
                                                        <input type="file" class="form-control" name="convention">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label  text-sm-right">Etat</label>
                                                    <div class="col-sm-8 image">
                                                        <select name="etat" class="form-control">

                                                            <option value="">--Choisir une etat--</option>
                                                            <option>en cours</option>
                                                            <option>en attante</option>
                                                            <option>rejeté</option>
                                                            <option>validé</option>
                                                            <option>terminé</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label  text-sm-right">Service</label>
                                                    <div class="col-sm-8 image">
                                                        <select name="serviceNom" class="form-control">

                                                            <option>--Choisir une service--</option>
                                                            <?php
                                                            $s1 = "SELECT * FROM `service`";
                                                            $result = $conn->query($s1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) { ?>
                                                                    <option value="<?php echo $row["idService"]; ?>">
                                                                        <?php echo $row['nomService']; ?>
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

                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label  text-sm-right">Niveau</label>
                                                    <div class="col-sm-8 image">
                                                        <select name="niveau" class="form-control">
                                                            <option value="">--Choisir un Niveau--</option>
                                                            <option>License</option>
                                                            <option>Master</option>
                                                            <option>Bac+4</option>


                                                        </select>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label  text-sm-right">Type de stage</label>
                                                    <div class="col-sm-8 image">
                                                        <select name="type" class="form-control">
                                                            <option value="">--Choisir un type de stage--</option>
                                                            <option>Stage observation</option>
                                                            <option>Stage professionel</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label  text-sm-right">Sexe</label>
                                                    <div class="col-sm-8 image">
                                                        <select name="sexe" class="form-control">

                                                            <option value="">--Choisir le sexe--</option>
                                                            <option>F</option>
                                                            <option>M</option>


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

                <?php }
                ?>
                <link rel="stylesheet" href="css/popup_style.css">
                <?php if (!empty($_SESSION['success'])) {  ?>
                    <div class="popup popup--icon -success js_success-popup popup--visible">
                        <div class="popup__background"></div>
                        <div class="popup__content">
                            <!-- <h3 class="popup__content__title">
                                <!-- Succés -->

                            <p><?php echo $_SESSION['success']; ?></p>
                            <p>
                                <button class="button button--success" data-for="js_success-popup">Fermer</button>
                            </p>
                        </div>
                    </div>
                <?php unset($_SESSION["success"]);
                } ?>

                <?php if (!empty($_SESSION['error'])) {  ?>
                    <div class="popup popup--icon -error js_error-popup popup--visible">
                        <div class="popup__background"></div>
                        <div class="popup__content">
                            <h3 class="popup__content__title">
                                
                                </h1>
                                <p><?php echo $_SESSION['error']; ?></p>
                                <p>
                                    <button class="button button--error" data-for="js_error-popup">Fermer</button>
                                </p>
                        </div>
                    </div>
                <?php unset($_SESSION["error"]);
                } ?>
                <script>
                    var addButtonTrigger = function addButtonTrigger(el) {
                        el.addEventListener('click', function() {
                            var popupEl = document.querySelector('.' + el.dataset.for);
                            popupEl.classList.toggle('popup--visible');
                        });
                    };

                    Array.from(document.querySelectorAll('button[data-for]')).
                    forEach(addButtonTrigger);
                </script>