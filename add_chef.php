<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<?php
include('connect.php');
?>

<div class="page-wrapper">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Gestion des chef de services</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Ajouter un chef</li>
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
                            <form class="form-horizontal" method="POST" action="actions/save_chef.php" name="enseignantform" enctype="multipart/form-data">
                                <input type="hidden" name="currnt_date" class="form-control" value="">

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label text-sm-right">Nom</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="nom" class="form-control" placeholder="Saisir le nom" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label text-sm-right">Prénom</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="prenom" class="form-control" placeholder="Saisir le prénom" required="">
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label  text-sm-right">CIN</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="cin" class="form-control" placeholder="Saisir le CIN" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label  text-sm-right">Email</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label  text-sm-right">Télephone</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="telephone" class="form-control" placeholder="Saisir le N° Téléphone" id="tbNumbers" minlength="10" maxlength="10" onkeypress="javascript:return isNumber(event)" required="">
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label  text-sm-right">Spécialité</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="specialite" class="form-control" placeholder="Saisir la spécialité" required>
                                                </div>
                                            </div>
                                        </div> -->
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