<?php session_start();
 include('connect.php');
    if(!isset($_SESSION["login"])){
    ?>
    <script>
    window.location="login.php";
    </script>
    <?php

} else {


    ?>

    <div id="main-wrapper">

        <div class="header bg-white">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">

                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">

                         <?php
            //  $sql_header_logo = "select * from parametres";
            //  $result_header_logo = $conn->query($sql_header_logo);
            //  $row_header_logo = mysqli_fetch_array($result_header_logo);
             ?>
                        <!-- <b><img src="uploadImage/Logo/<?php echo $row_head_title['home_logo'];?>" alt="homepage" class="dark-logo" style="width:100%;height:auto;"/></b> -->
                    </a>
                </div>

                <div class="navbar-collapse">

                    <ul class="navbar-nav mr-auto mt-md-0">

                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>

                    </ul>

                    <ul class="navbar-nav my-lg-0">



                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                $sql = "select * from utilisateur where idUtilisateur = '".$_SESSION["idUtilisateur"]."'";
                                $query=$conn->query($sql);
                                while($row=mysqli_fetch_array($query))
                                    {

                                      extract($row);
                                      $nom = $row['nom'];
                                      $prenom = $row['prenom'];
                                      $email = $row['email'];
                                      $cin = $row['cin'];
                                      $photo = $row['photo'];
                                    }
                                                                    ?>
                            <img src="uploadImage/Profile/<?=$photo?>" alt="user" class="profile-pic" style="width:45px; height:45px"/></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="profile.php"><i class="ti-user"></i> Mon Profil</a></li>
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Se déconnecter</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <?php } ?>
