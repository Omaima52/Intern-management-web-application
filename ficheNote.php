<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<?php
include('connect.php');
date_default_timezone_set('Africa/Casablanca');
$current_date = date('d/m/Y');

if (isset($_POST["btn_fiche"])) {


    extract($_POST);






    $fiche_note = $_FILES['fiche_note']['name'];
    $target = "uploadFicheNote/" . basename($fiche_note);

    if (move_uploaded_file($_FILES['fiche_note']['tmp_name'], $target)) {
        $msg = "fiche chargé avec succés";
?>

    <?php

    } else {
        $msg = "Echec de chargement du fiche";
    }



    $count = 0;
    $date = date('Y-m-d');
    $time = strtotime($date);

    $year = date("Y", $time);




    $sql = "UPDATE demande SET `fiche_note` = '$fiche_note' WHERE `idDemande`='" . $_GET['idDemande'] . "'";

    $sql2 = 'DESCRIBE critere';
    $result = $conn->query($sql2);

    $rows = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row['Field'];
    }
    # Insert this array
    $removed = array_shift($rows);

    function addQuotes($str)
    {
        return "`$str`";
    }

    # Surround values by 
    foreach ($rows as $key => &$value) {
        $value = addQuotes($value);
    }



    # get the post elements
    $columnsPost = implode(",", array_values($_POST));
    $columnsPost .= $_GET['idDemande']; // add 
    // substr($columnsPost, 4);// remove the ,
    $columnsPost = ltrim($columnsPost, $columnsPost[0]);


    #get the coloumns names of critere
    $valuess = implode(",", array_values($rows));





    $queryy = "INSERT INTO `critere` (  $valuess ) VALUES (  $columnsPost  )";


    $resulttt = $conn->query($queryy) or die($conn->error);

    if ($conn->query($sql)) {


        $_SESSION['success'] = ' Fiche de note est enregistré avec succés';
    ?>


        <script type="text/javascript">
            window.location = "view_mes_demandes.php";
        </script>
    <?php
    } else {
        $_SESSION['error'] = 'Un problème est survenu lors de l\'ajout.';
    ?>
        <script type="text/javascript">
            window.location = "error.php";
        </script>
<?php
    }
}

?>


<div class="page-wrapper">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Evaluation</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Evaluation</li>
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

                                        <label class="col-sm-4 control-label  text-sm-right">Fiche de notes</label>
                                        <div class="col-sm-8">
                                            <input type="file" name="fiche_note" class="form-control" placeholder="Fiche de notes" required>

                                        </div>



                                    </div>

                                </div>

                                <?php

                                $sql = 'DESCRIBE critere';
                                $result = $conn->query($sql);

                                $rows = array();
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $rows[] = $row['Field'];
                                }

                                foreach ($rows as $value) {
                                    if ($value !== 'idCritere' && $value !== 'idDemande') {


                                ?>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label text-sm-right"><?php echo $value; ?></label>
                                                <div class="col-sm-8">

                                                    <select name="<?php echo $value; ?>" class="form-control">
                                                        <?php
                                                        for ($i = 1; $i <= 10; $i++) {



                                                        ?>
                                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                        <?php

                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                <?php
                                    }
                                }

                                // for ($i=0; $i <$rows.length ; $i++) { 

                                // }








                                ?>









                                <button type="submit" name="btn_fiche" class="btn btn-primary btn-flat m-b-30 m-t-30 float-right">Enregistrer</button>
                                <!-- style="margin-top: -40px!important;" -->








                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <?php include('footer.php'); ?>
        