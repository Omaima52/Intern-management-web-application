<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php');

include('connect.php');
mysqli_set_charset($conn, 'utf8');



$etat = $_POST["etat"];
$startdate = $_POST['moisDebut'];
$enddate = $_POST['moisFin'];




if ($_SESSION["idRole"] != 1) {
  $roleSql = "SELECT * FROM  `role` d Join `utilisateur` s On d.idUtilisateur = s.idUtilisateur where `idRole`= '" . $_SESSION["idRole"] . "'";
  $res = $conn->query($roleSql);
  $row123 = mysqli_fetch_array($res);
  $sql1 = "SELECT * FROM  `demande` d Join `service` s On d.serviceNom = s.idService WHERE (`etat`= '" . $etat . "') and (`idUtilisateur`= '" . $row123['idUtilisateur'] . "') and (`date_debut` BETWEEN '$startdate' AND '$enddate') and (`date_fin` BETWEEN '$startdate' AND '$enddate') ";
} else {
  $sql1 = "SELECT * FROM  `demande` d Join `service` s On d.serviceNom = s.idService  where (`etat`='" . $etat . "') AND (`date_debut` BETWEEN '$startdate' AND '$enddate') and (`date_fin` BETWEEN '$startdate' AND '$enddate') ";
  
}




?>

<div class="page-wrapper">

  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h3 class="text-primary"> Consulter les demandes</h3>
    </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active">Consulter les demandes</li>
      </ol>
    </div>
  </div>

  <div class="container-fluid">


    <div class="card">
      <a href="add_demande.php"><button class="btn btn-primary">Ajouter une demande</button></a>
      <div class="row" style="position: absolute; left: 200px;top: 20px;">
        <form method="POST" name="Searchb" enctype="multipart/form-data" action="rechercheEtat.php">

          <div class="col-sm-8">
            <select name="etat" class="form-control" style="
                width: 160%; border-radius: 10px; height: 200%;">

              <option value="">recherche par état....</option>
              <option>en cours</option>
              <option>en attante</option>
              <option>rejeté</option>
              <option>validé</option>
              <option>terminé</option>

            </select>




            <input type="date" name="moisDebut" class="form-control" required style="
               width: 110%; border-radius: 10px; position: relative;  left: 190px;top: -35px;">
            <input type="date" name="moisFin" class="form-control" required style="
               width: 110%; border-radius: 10px; position: relative;  left: 310px;top: -78px; ">
            <button type="submit" name="btn_" class="btn btn-primary btn-flat m-b-30 m-t-30 float-right" style="position: absolute; left: 450px;
                top: -32px;"><i class="fa fa-search"></i></button>
          </div>
          <!-- <?php if ($etat == 'validé' || $etat == 'rejeté') { ?>

            <div class="col-sm-8" style="position: relative;  left: 50px;">

              <button type="submit" name="btn_mois" class="btn btn-primary btn-flat m-b-30 m-t-30 float-right" style="position: absolute; left: 120px;
               top: -27px;"><i class="fa fa-search"></i></button>
            </div>

          <?php } ?> -->

        </form>



      </div>
      <div class="card-body">

        <div class="table-responsive m-t-40">
          <table id="myTable" class="table table-bordered table-striped">
            <thead>
              <tr>


                <th>Nom</th>


                <th>Date début</th>
                <th>Date fin</th>
                <th>CIN</th>
                <td>Documents</td>

                <th>Type</th>
                <th>Service</th>
                <th>etat</th>

                <th>Action</th>
                <?php if ($etat == 'terminé') { ?>
                  <th>
                    Evaluation
                  </th>
                <?php } ?>
              </tr>
            </thead>
            <tbody>



              <?php
              include 'connect.php';
              mysqli_set_charset($conn, 'utf8');



              $result1 = $conn->query($sql1);
              while ($row = $result1->fetch_assoc()) {

              ?>

















                <tr class="text-center">

                  <td><?php echo $row['nom']; ?><?php echo " " . $row['prenom']; ?></td>

                  <td><?php echo date('d/m/Y', strtotime($row['date_debut'])); ?></td>
                  <td><?php echo date('d/m/Y', strtotime($row['date_fin'])); ?></td>
                  <td><?php echo $row['cin']; ?></td>
                  <td>
                    <a href="view_mes_documents.php?idDemande=<?= $row['idDemande']; ?>"><button type="button" class="btn btn-xs btn-primary"><i class="fa fa-file"></i></button></a>
                  </td>


                  <td><?php echo $row['type']; ?></td>
                  <td><?php echo $row['nomService']; ?></td>
                  <td>
                    <?php if ($row['etat'] == 'validé') { ?>
                      <span class="text-success"><?php echo $row['etat'] ?></span>
                    <?php } else if ($row['etat'] == 'rejeté') { ?>
                      <span class="text-danger"><?php echo $row['etat'] ?></span>
                    <?php } else if ($row['etat'] == 'en cours') { ?>
                      <span><?php echo $row['etat'] ?></span>
                    <?php } else if ($row['etat'] == 'en attante') { ?>
                      <span><?php echo $row['etat'] ?></span>
                    <?php } else if ($row['etat'] == 'terminé') { ?>
                      <span><?php echo $row['etat'] ?></span>
                    <?php } ?>
                  </td>


                  <td class="text-center">
                    <?php if ($row['etat'] == 'terminé') { ?>
                      <a href="fpdf/attestation.php?idDemande=<?= $row['idDemande']; ?>">
                        <button type="button" class="btn btn-xs btn-warning"><i class="fa fa-download"></i></button>
                      </a> <?php } ?>
                    <?php if ($row['etat'] == 'validé') { ?>
                      <a href="fpdf/autorisation.php?idDemande=<?= $row['idDemande']; ?>">
                        <button type="button" class="btn btn-xs btn-warning"><i class="fa fa-download"></i></button>
                      </a> <?php } ?>
                    <a href="edit_demande.php?idDemande=<?= $row['idDemande']; ?>"><button type="button" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></button></a>



                  </td>
                  <?php if ($row['etat'] == 'terminé') { ?>
                    <td class="text-center">
                    <a href="ficheNote.php?idDemande=<?= $row['idDemande']; ?>">
                        <button type="button" class="btn btn-xs btn-info"><i class="fa fa-location-arrow"></i></button>
                    </td>
                  <?php } ?>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>


    <?php include('footer.php'); ?>

    <link rel="stylesheet" href="css/popup_style.css">
    <?php if (!empty($_SESSION['success'])) {  ?>
      <div class="popup popup--icon -success js_success-popup popup--visible">
        <div class="popup__background"></div>
        <div class="popup__content">
          <h3 class="popup__content__title">
            Succés
            </h1>
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
            Erreur
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