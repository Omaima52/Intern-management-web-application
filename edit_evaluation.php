<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<?php
include('connect.php');
date_default_timezone_set('Africa/Casablanca');
$current_date = date('d/m/Y');







if (isset($_POST["btn_fiche"])) {


    extract($_POST);
    $columnsPost = implode(",", array_values($_POST));



    // get the table columns names
    $sql2 = 'DESCRIBE critere';
    $result = $conn->query($sql2);
    $rows = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row['Field'];
    }
    # remove the idCritere column
    $removed = array_shift($rows);
    array_pop($rows);



    foreach ($rows as $value) {
        
        if ($value !== 'idCritere' && $value !== 'idDemande') {
            $temp = $_POST["$value"];

            $q1 = "UPDATE critere SET `$value` = '$temp' WHERE `idDemande`='" . $_GET['idDemande'] . "'";
            $result_edit = $conn->query($q1) or die($conn->query);
        }
    }


    





    
    if ($conn->query($q1) === TRUE) {

        $_SESSION['success'] = 'Evaluation modifié avec succés '  ;

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

$que = "SELECT * from  critere where  `idDemande`='" . $_GET['idDemande'] . "'";
$query = $conn->query($que) or die($conn->error);
while ($row = mysqli_fetch_array($query)) {

    extract($row);
}


?>

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
                                <!-- <input type="hidden" name="currnt_date" class="form-control" value=""> -->

                                <!-- <div class="form-group">
                                    <div class="row">

                                        <label class="col-sm-4 control-label  text-sm-right">Fiche de notes</label>
                                        <div class="col-sm-8">
                                            <input type="file" name="fiche_note" class="form-control" placeholder="Fiche de notes" required>

                                        </div>



                                    </div>

                                </div> -->

                                <?php




                                $sqlCritere = "SELECT * FROM  `critere` WHERE `idDemande`='" . $_GET['idDemande'] . "'";
                                $result1 = $conn->query($sqlCritere);
                                while ($rowsss = $result1->fetch_assoc()) {

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
                                                            <option><?php echo $rowsss["$value"]; ?></option>
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