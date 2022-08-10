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



    // $sql2 = 'DESCRIBE critere';
    // $result = $conn->query($sql2);

    // $rows = array();
    // while ($row = mysqli_fetch_assoc($result)) {
    //     $rows[] = $row['Field'];
    // }
    // # Insert this array
    // $removed = array_shift($rows);

    // function addQuotes($str)
    // {
    //     return "`$str`";
    // }

    // # Surround values by 
    // foreach ($rows as $key => &$value) {
    //     $value = addQuotes($value);
    // }


    
    // # get the post elements
    // $columnsPost = implode(",", array_values($_POST));
    // $columnsPost .= $_GET['idDemande'];
    // // substr($columnsPost, 4);// remove the ,
    // $columnsPost = ltrim($columnsPost, $columnsPost[0]);
    

    // #get the coloumns names of critere
    // $valuess = implode(",", array_values($rows));





    // $queryy = "INSERT INTO `critere` (  $valuess ) VALUES (  $columnsPost  )";
    

    
    // $resulttt = $conn->query($queryy) or die($conn->error);



    $q1 = "UPDATE demande SET `nom`='$nom',`prenom`='$prenom', `cin`='$cin', `date_debut`='$date_debut', `date_fin`='$date_fin',
    `photo`= '$photo', `cv`='$cv', `demandeEcole`='$demandeEcole', `convention`= '$convention',
    `type`= '$type',
    `serviceNom`= '$serviceNom',
    `etat` = '$etat',
    `niveau` = '$niveau',
    `etablissement` = '$etablissement',
    `ville` = '$ville',
    `adresse` = '$adresse',
    `sexe` = '$sexe',
    `filiere` = '$filiere',
    `date_naissance` = '$date_naissance',
    `telephone` = '$telephone'
     WHERE `idDemande`='" . $_GET['idDemande'] . "'";
    //$q2="UPDATE etudiant SET `cne`='$cne',`dateNaissance`='$dateNaissance' WHERE `idUtilisateur`='".$_GET['idUtilisateur']."'";


    // `cin`='".$cin."', `date_debut`='".$date_debut."'
    // ,`date_fin`='".$date_fin."',`photo`='".$photo."', `cv`='".$cv."', `demandeEcole`='".$demandeEcole."',
    // `convention`='".$convention."', `type`='".$type."', `service`='".$service."', `etat`='".$etat."'
    if ($conn->query($q1) === TRUE) {

        $_SESSION['success'] = ' Demande modifié avec succés';

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



<?php
$que = "SELECT * from  `demande` d Join `service` s On d.serviceNom = s.idService  where  `idDemande`='" . $_GET['idDemande'] . "'";
$query = $conn->query($que) or die ($conn->error);
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
    $serviceNom = $row['nomService'];

    $serviceID = $row['idService'];
    $nameOfService = $row['nomService'] ;
    $etat = $row['etat'];

    $etablissement = $row['etablissement'];
    $sexe = $row['sexe'];
    $adresse = $row['adresse'];
    $ville = $row['ville'];
    $filiere = $row['filiere'];
    $date_naissance = $row['date_naissance'];
    $telephone = $row['telephone'];

}


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
                            <form class="form-horizontal" method="POST" name="demandeform" enctype="multipart/form-data">
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
                                            <input type="date" name="date_debut" class="form-control" placeholder="Saisir la date de début" required value="<?php echo $date_debut; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label  text-sm-right">Date Fin</label>
                                        <div class="col-sm-8">
                                            <input type="date" name="date_fin" class="form-control" placeholder="Saisir la date de fin" required value="<?php echo $date_fin; ?>">
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label  text-sm-right">Etablissement</label>
                                        <div class="col-sm-8 image">
                                            <input type="text" class="form-control" name="etablissement" placeholder="Saisir l'établissement" required value="<?php echo $etablissement; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label  text-sm-right">Ville etablissement </label>
                                        <div class="col-sm-8 image">
                                            <input type="text" class="form-control" name="ville" placeholder="Saisir l'établissement" required value="<?php echo $ville; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label  text-sm-right">Filière</label>
                                        <div class="col-sm-8 image">
                                            <input type="text" class="form-control" name="filiere" placeholder="Saisir la filière" required value="<?php echo $filiere; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label  text-sm-right">Adresse</label>
                                        <div class="col-sm-8 image">
                                            <input type="text" class="form-control" name="adresse" placeholder="Saisir l'adresse" required value="<?php echo $adresse; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label  text-sm-right">Date de naissance</label>
                                        <div class="col-sm-8 image">
                                            <input type="date" class="form-control" name="date_naissance" placeholder="Saisir la date de naissance" required value="<?php echo $date_naissance; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label  text-sm-right">Téléphone</label>
                                        <div class="col-sm-8 image">
                                            <input type="text" class="form-control" name="telephone" placeholder="Saisir le téléphone" required value="<?php echo $telephone; ?>">
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
                                                <option ><?php echo $etat ;
                                                ?></option>
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
                                            <option  value="<?php echo $serviceID ?> "><?php echo $serviceNom ;?></option>
                                            
                                            <?php
                                                $s1 = "SELECT * FROM `service`";
                                                $result = $conn->query($s1);

                                                if ($result->num_rows > 0) {
                                                    while ($row = mysqli_fetch_array($result)) { ?>
                                                        <option value="<?php echo $row['idService']; ?> "  >
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
                                            
                                            <option ><?php echo $niveau ;?></option>
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
                                            <option ><?php echo $type ;
                                                ?></option>
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
                                            
                                            <option ><?php echo $sexe ;
                                                ?></option>
                                                <option>F</option>
                                                <option>M</option>
                                                

                                            </select>
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