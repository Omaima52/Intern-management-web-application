
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');

if(isset($_POST["btn_update"]))
{
  extract($_POST);

  $photo1 = $_FILES['photo']['name'];
  $target = "uploadImage/Profile/".basename($photo1);

 if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
      $msg = "Photo modifiée avec succés";
    }else{
      $msg = "Echec lors de la modification du photo";
      $photo1 = $photo;
  }

   $q1="UPDATE `utilisateur` SET `email`='$email',`telephone`='$telephone',`photo`='$photo1' where idUtilisateur = '".$_SESSION["idUtilisateur"]."'";


    if ($conn->query($q1) === TRUE) {

      $_SESSION['success']='Utilisateur modifé avec succés';
      ?>
      <script type="text/javascript">
        window.location = "view_mes_demandes.php";
      </script>
      <?php

} else {

      $_SESSION['error']='Un problème est survenu lors de la modification';
}


  ?>
  <script>

  </script>
  <?php
}

?>

<?php
$que="select * from  utilisateur where idUtilisateur = '".$_SESSION["idUtilisateur"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{

  extract($row);
  $nom = $row['nom'];
  $prenom = $row['prenom'];
  $email = $row['email'];
  $cin = $row['cin'];
  $telephone = $row['telephone'];

}

?>


        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Mon Profil</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Mon Profil</li>
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
                                    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                      <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label text-right"></label>
                                            <div class="col-sm-8">
                              <image class="profile-img img-fluid responsive img-thumbnail" src="uploadImage/Profile/<?=$photo?>" style="height:170px;width:170px;">
                             <input type="hidden" value="<?=$photo?>" name="old_photo">
                             <input type="file" class="form-control m-t-10" name="photo">
                                            </div>
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label text-right">Nom</label>
                                                <div class="col-sm-8">
                                                    <input type="text"  value="<?php echo $nom;?>"  name="nom" class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label text-right">Prénom</label>
                                                <div class="col-sm-8">
                                                    <input type="text"  value="<?php echo $prenom;?>"  name="prenom" class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>

                                          <div class="form-group">
                                             <div class="row">
                                                 <label class="col-sm-4 control-label text-right">CIN</label>
                                                 <div class="col-sm-8">
                                                     <input type="text"  value="<?php echo $cin;?>"  name="cin" class="form-control" disabled>
                                                 </div>
                                             </div>
                                         </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label text-right">Email</label>
                                                <div class="col-sm-8">
                                                    <input type="text" value="<?php echo $email;?>"  name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"   class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                           <div class="row">
                                               <label class="col-sm-4 control-label text-right">Téléphone</label>
                                               <div class="col-sm-8">
                                                   <input type="text" value="<?php echo $telephone;?>"  name="telephone" class="form-control">
                                               </div>
                                           </div>
                                       </div>


                                        <button type="submit" name="btn_update" class="btn btn-primary btn-flat m-b-30 m-t-30 float-right">Modifier</button>
                                    </form>
                                </div>
                            </div>
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
      Suuccés
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
