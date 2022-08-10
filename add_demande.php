<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>


<? include('connect.php');
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
                            <form class="form-horizontal" method="POST" action="rechercheCIN.php" name="demandeform" enctype="multipart/form-data">
                                <input type="hidden" name="currnt_date" class="form-control" value="">

                                <div class="form-group">
                                    <div class="row">
                                        <form method="POST" action="rechercheCIN.php" name="rechercheCINform" enctype="multipart/form-data">
                                            <label class="col-sm-4 control-label  text-sm-right">CIN</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="cin" class="form-control" placeholder="Saisir le CIN" required style="width: 75%;
                                            " required="">
                                                <button type="submit" name="btn_" class="btn btn-primary btn-flat m-b-30 m-t-30 float-right" style="
                                            margin-top: -40px!important;">Rechercher</button>
                                            </div>
                                        </form>


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
                                                        <option value="<?php echo $row['idService']; ?>">
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
                                            <select name="type" class="form-control" id="typeStage">
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