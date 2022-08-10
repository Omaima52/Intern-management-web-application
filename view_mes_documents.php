<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php');


?>
<!-- <?php
      if (isset($_GET['idDemande'])) {






      ?>  -->

<!-- <div class="popup popup--icon -question js_question-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Confirmation
    </h1>
    <p>Voulez-vous supprimer cette demande?</p>
    <p>
      <a href="del_demande.php?idDemande=<?php echo $_GET['idDemande']; ?>" class="button button--success" data-for="js_success-popup">Oui</a>
      <a href="view_mes_demandes.php" class="button button--error" data-for="js_success-popup">Non</a>
    </p>
  </div>
</div>-->
<?php } ?>"

<div class="page-wrapper">

  <div class="row page-titles">
    <div class="col-md-5 align-self-center">



      <h3 class="text-primary"> Consulter les documents</h3>
    </div>

    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active">Consulter les documents</li>
      </ol>
    </div>
  </div>

  <div class="container-fluid">

    <div class="card">
      <div class="card-body">
        <div class="table-responsive m-t-40">
          <table id="myTable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center">Photo</th>
                <th class="text-center">Cv</th>
                <th class="text-center">Demande</th>
                <th class="text-center">Convention</th>
                <th class="text-center">Fiche de note</th>

              </tr>
            </thead>
            <tbody>
              <?php
              include 'connect.php';
              mysqli_set_charset($conn, 'utf8');

              $sql1 = "SELECT * FROM  `demande` WHERE `idDemande`='" . $_GET['idDemande'] . "'";
              $result1 = $conn->query($sql1);
              while ($row = $result1->fetch_assoc()) {

              ?>
                <tr class="text-center">
                  <td class="text-center">
                    <a href="../Stagiaires/uploadImage/Profile/<?php echo $row['photo'] ?>">
                      <image class="profile-img img-fluid responsive" src="uploadImage/Profile/<?= $row['photo'] ?>" style="height:40px;width:40px;">
                  </td>

                  <td class="text-center">
                    <a href="../Stagiaires/uploadCV/<?php echo $row['cv'] ?>">cv</a>
                  </td>
                  <td class="text-center">
                    <a href="../Stagiaires/uploadDemande/<?php echo $row['demandeEcole'] ?>">demande</a>
                  </td>
                  <td class="text-center">
                    <a href="../Stagiaires/uploadConvention/<?php echo $row['convention'] ?>">convention</a>
                  </td>
                  <td class="text-center">
                    <a href="../Stagiaires/uploadFicheNote/<?php echo $row['fiche_note'] ?>">fiche de note</a>
                  </td>



                  </td>
                </tr>
                <?php








                // hooooooooooooooooooooooooooooo



                ?>
            </tbody>
          </table>
        </div>
      </div>





      <?php
                // while ($row = $result1->fetch_assoc()) {
                if ($row['etat'] == 'terminé') {




      ?>


        <div class="card-body">
          <div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-striped">
              <thead>
                <tr>

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
                      <th class="text-center"><?php echo $value; ?></th>



                    <?php
                    }
                  }

                  if ($_SESSION["idRole"] != 1) {
                    ?>


                    <th class="text-center">Actions</th>
                  <?php
                  }
                  ?>

                </tr>
              </thead>
              <tbody>
                <?php
                  include 'connect.php';
                  mysqli_set_charset($conn, 'utf8');

                  $sqlCritere = "SELECT * FROM  `critere` WHERE `idDemande`='" . $_GET['idDemande'] . "'";
                  $result1 = $conn->query($sqlCritere);
                  while ($row = $result1->fetch_assoc()) {

                ?>
                  <tr class="text-center">

                    <?php

                    foreach ($rows as $value) {
                      if ($value !== 'idCritere' && $value !== 'idDemande') {


                    ?>
                        <td class="text-center"><?php echo $row["$value"]; ?></td>

                      <?php
                      }
                    }

                    if ($_SESSION["idRole"] != 1) {
                      ?>


                      <td class="text-center">
                        <a href="edit_evaluation.php?idDemande=<?= $row['idDemande']; ?>">
                          <button type="button" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></button>
                        </a>
                      </td>
                    <?php
                    }
                    ?>
                  </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>

    <?php
                  //   }

                }
              }

    ?>











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