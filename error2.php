<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php');








if (isset($_GET['idDemande'])) { ?>
  <div class="popup popup--icon -question js_question-popup popup--visible">
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
  </div>
<?php } ?>

<div class="page-wrapper">

  

  <div class="container-fluid">

    
      


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

    <script>
      var etat = document.getElementById("td").innerText;
      if (etat = "validé") {
        style.color = "red";
      }
    </script>