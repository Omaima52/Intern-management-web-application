
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');

if(isset($_GET['idFiliere']))
{ ?>
<div class="popup popup--icon -question js_question-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Confirmation
    </h1>
    <p>Voulez-vous supprimer cette service?</p>
    <p>
      <a href="del_service.php?idService=<?php echo $_GET['idService']; ?>" class="button button--success" data-for="js_success-popup">Oui</a>
      <a href="view_service.php" class="button button--error" data-for="js_success-popup">Non</a>
    </p>
  </div>
</div>
<?php } ?>


        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Consulter les services</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Consulter les services</li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid">

                 <div class="card">
                            <div class="card-body">
                            <a href="add_service.php"><button class="btn btn-primary">Ajouter une service</button></a>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            
                                    
                                                <th>Nom</th>
                                                <th>Chef de service</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                    include 'connect.php';
                                  $sql1 = "SELECT * FROM  `service`d Join `utilisateur` s On d.idUtilisateur = s.idUtilisateur";
                                   $result1 = $conn->query($sql1);
                                   while($row = $result1->fetch_assoc()) {
                                      ?>
                                            <tr>
                                                <td><?php echo $row['nomService']; ?></td>
                                                <td><?php echo $row['nom']." " .$row['prenom'] ; ?></td>
                                            
                                        
                                                <td class="text-center">
                                                <a href="edit_service.php?idFiliere=<?=$row['idService'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-edit"></i></button></a>

                                                
                                                </td>
                                            </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



<?php include('footer.php');?>

<link rel="stylesheet" href="css/popup_style.css">
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Succès
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Fermer</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
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
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>
