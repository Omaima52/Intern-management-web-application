<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>


<?php  

    ?>
    
<?php  ?>






 <?php if ($_SESSION["idRole"] != 1) { ?>
    
    <script>
        window.location = "view_mes_demandes.php";
    </script>
<?php } ?>









<div class="page-wrapper">
    <!--  for role admin principal!-->

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">Bonjour <?php echo $_SESSION["login"]; ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-primary p-20">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-bag f-s-40"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <?php $sql = "SELECT COUNT(*) FROM `compte`";
                            $res = $conn->query($sql);
                            $row = mysqli_fetch_array($res); ?>
                            <h2 class="color-white"><?php echo $row[0]; ?></h2>
                            <p class="m-b-0">Total Comptes</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-pink p-20">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-vector f-s-40"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <?php $sql = "SELECT COUNT(*) FROM `role`";
                            $res = $conn->query($sql);
                            $row = mysqli_fetch_array($res); ?>
                            <h2 class="color-white"><?php echo $row[0]; ?></h2>
                            <p class="m-b-0">Total Des Chefs des Postes</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-danger p-20">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-comment f-s-40"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <?php //$sql="SELECT COUNT(*) FROM `demande` WHERE  date_fin BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE() ";
                            $sql = "SELECT COUNT(*) FROM `demande` WHERE (`date_fin` between date(now()) and date(now() + interval 7 day)) and `etat` = 'en cours' ";
                            $res = $conn->query($sql);
                            // if (!$res) {
                            //     printf("Error: %s\n", $conn->error);
                            //     exit();
                            // }
                            $row = mysqli_fetch_array($res); ?>
                            <h2 class="color-white"><?php echo $row[0]; ?></h2>
                            <p class="m-b-0">Total des Stagiers dont la période de stage sera terminé dans 7 jours</p>
                        </div>

                    </div>
                </div>
            </div>
            <!-- <div class="col-md-4">
                <div class="card bg-warning p-20">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-location-pin f-s-40"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                             <?php $sql = "SELECT COUNT(*) FROM `module`";
                                $res = $conn->query($sql);
                                $row = mysqli_fetch_array($res); ?>
                            <h2 class="color-white"><?php echo $row[0]; ?></h2>
                            <p class="m-b-0">Total Modules</p>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-md-4">
                <div class="card bg-info p-20">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-location-pin f-s-40"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                             <?php $sql = "SELECT COUNT(*) FROM `module`";
                                $res = $conn->query($sql);
                                $row = mysqli_fetch_array($res); ?>
                            <h2 class="color-white"><?php echo $row[0]; ?></h2>
                            <p class="m-b-0">Total Elements</p>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-md-4">
                <div class="card bg-success p-20">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-location-pin f-s-40"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                             <?php $sql = "SELECT COUNT(*) FROM `module`";
                                $res = $conn->query($sql);
                                $row = mysqli_fetch_array($res); ?>
                            <h2 class="color-white"><?php echo $row[0]; ?></h2>
                            <p class="m-b-0">Total coordonnateurs</p>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- <div class="col-md-4">
                <div class="card bg-danger p-20">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-vector f-s-40"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <?php $sql = "SELECT COUNT(*) FROM `filiere`";
                            $res = $conn->query($sql);
                            $row = mysqli_fetch_array($res); ?>
                            <h2 class="color-white"><?php echo $row[0]; ?></h2>
                            <p class="m-b-0">Total Filières</p>
                        </div>
                    </div>
                </div>
            </div> -->


            <!-- <div class="col-md-4">
                <div class="card bg-pink p-20">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-comment f-s-40"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                        <?php $sql = "SELECT COUNT(*) FROM `absence`";
                        $res = $conn->query($sql);
                        $row = mysqli_fetch_array($res); ?>
                            <h2 class="color-white"><?php echo $row[0]; ?></h2>
                            <p class="m-b-0">Total Absences</p>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-md-4">
                <div class="card bg-primary p-20">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-bag f-s-40"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <?php $sql = "SELECT COUNT(*) FROM `compte`";
                            $res = $conn->query($sql);
                            $row = mysqli_fetch_array($res); ?>
                            <h2 class="color-white"><?php echo $row[0]; ?></h2>
                            <p class="m-b-0">Total Comptes</p>
                        </div>
                    </div>
                </div>
            </div> -->

        </div>


    </div>


    <?php include('footer.php'); ?>