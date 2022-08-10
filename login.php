<?php session_start();?>
<?php include('head.php');?>
<link rel="stylesheet" href="css/popup_style.css">

   <?php
  include('connect.php');
if(isset($_POST['btn_login']))
{
$unm = $_POST['login'];
$passw = $_POST['password'];
//$passw = hash('sha256', $_POST['password']);

function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}
$salt = createSalt();
//$pass = hash('sha256', $salt . $passw);

 $sql = "SELECT * FROM compte WHERE login='" .$unm . "' and password = '". $passw."'";
    $result = mysqli_query($conn,$sql);
    $row  = mysqli_fetch_array($result);

     $_SESSION["idCompte"] = $row['idCompte'];
     $_SESSION["login"] = $row['login'];
     $_SESSION["password"] = $row['password'];
     $_SESSION["idRole"] = $row['idRole'];
     $_SESSION["idUtilisateur"] = $row['idUtilisateur'];


     $count=mysqli_num_rows($result);
     if($count==1 && isset($_SESSION["login"]) && isset($_SESSION["password"])) {
    {
        ?>
  <div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success
    </h1>
    <p>Login avec succés</p>
    <p>

     <?php echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>"; ?>
    </p>
  </div>
</div>

     <?php
    }
}
else {?>
     <div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Echec de connexion
    </h1>
    <p>Adresse electronique ou Mot de passe invalides</p>
    <p>
      <a href="login.php"><button class="button button--error" data-for="js_error-popup">Fermer</button></a>
    </p>
  </div>
</div>

        <?php

         }

    }
?>

    <div id="main-wrapper">
        <div class="unix-login">
             <!--?php
             $sql_login = "select * from manage_website";
             $result_login = $conn->query($sql_login);
             $row_login = mysqli_fetch_array($result_login);
             ?-->
             <!-- style="background-image:url('uploadImage/bg-login.jpg');background-position: center;background-size: cover;background-attachment: fixed; -->
            
            <div class="container-fluid"  style="background-image: url(uploadImage/bg-login.jpg) ;background-position: center;background-attachment: fixed;background-size: cover;
            ">
            <div class="row justify-content-center" >
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <center><img src="uploadImage/Logo/sonasid.jpg" style="width:85%; margin-bottom:20px"></center><br>
                                <!-- <center><h2>Login</h2></center> -->
                                <form method="POST">
                                    <div class="form-group">
                                        <label>Nom Utilisateur</label>
                                        <input type="text" name="login" class="form-control" placeholder="Saisir votre login..." required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Mot de passe</label>
                                        <input type="password" name="password" class="form-control" placeholder="Saisir votre  mot de passe..." required="">
                                    </div>
                                    <button type="submit" name="btn_login" class="btn btn-primary btn-flat m-b-30 m-t-30" style="background-color: #E85418;">Se connecter</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="js/lib/jquery/jquery.min.js"></script>

    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>

    <script src="js/jquery.slimscroll.js"></script>

    <script src="js/sidebarmenu.js"></script>

    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>

    <script src="js/custom.min.js"></script>

</body>

</html>
