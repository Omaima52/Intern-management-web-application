
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');

if(isset($_GET['idUtilisateur']))
{ ?>
<div class="popup popup--icon -question js_question-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Confirmation
    </h1>
    <p>Voulez-vous supprimer cet enseignant?</p>
    <p>
      <a href="del_enseignant.php?idUtilisateur=<?php echo $_GET['idUtilisateur']; ?>" class="button button--success" data-for="js_success-popup">Oui</a>
      <a href="view_enseignant.php" class="button button--error" data-for="js_success-popup">Non</a>
    </p>
  </div>
</div>
<?php } ?>

        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Consulter les enseignants</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Consulter les enseignants</li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid">

                 <div class="card">
                            <div class="card-body">
                            <a href="add_chef.php"><button class="btn btn-primary">Ajouter un chef de service</button></a>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Photo</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                
                                                <th>CIN</th>
                                                <th>Email</th>
                                                <th>Téléphone</th>
                                                
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                    include 'connect.php';
                                    mysqli_set_charset($conn,'utf8');
                                  $sql1 = "SELECT * FROM  `utilisateur` ";
                                   $result1 = $conn->query($sql1);
                                   while($row = $result1->fetch_assoc()) {
                                      ?>
                                            <tr class="text-center">
                                                <td class="text-center">
                                                  <image class="profile-img img-fluid responsive" src="uploadImage/Profile/<?=$row['photo']?>" style="height:40px;width:40px;">
                                                </td>
                                                <td><?php echo $row['nom']; ?></td>
                                                <td><?php echo $row['prenom']; ?></td>
                                                
                                                <td><?php echo $row['cin']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['telephone']; ?></td>
                                                
                                                <td class="text-center">
                                                <a href="edit_chef.php?idUtilisateur=<?=$row['idUtilisateur'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-edit"></i></button></a>
                                                

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
