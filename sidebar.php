<div class="left-sidebar" style="background: #02756a;">

    <div class="scroll-sidebar">

        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <?php if (($_SESSION["idRole"] == 1)) { ?>
                    <li class="nav-label  mt-2">Stats</li>
                    <li> <a href="index.php" aria-expanded="false"><i class="fa fa-tachometer"></i>Dashboard</a>
                    </li>
                    <li class="nav-label  mt-2">Pédagogie</li>
                    <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-folder-open"></i><span class="hide-menu">Gestion des Services</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="add_service.php">Ajouter une service</a></li>
                            <li><a href="view_service.php">Consulter les services</a></li>
                        </ul>
                    </li>
                    <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-map-signs"></i><span class="hide-menu">Gestion des Critères</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="add_critere.php">Ajouter un critère</a></li>
                            <li><a href="view_critere.php">Consulter les critères</a></li>
                        </ul>
                    </li>




                <?php } ?>







                <?php if ($_SESSION["idRole"] == 1) { ?>
                    <li class="nav-label  mt-2">COMPTES & USERS</li>

                    <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Gestion des Chefs des postes</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="add_chef.php">Ajouter un chef</a></li>
                            <li><a href="view_chef.php">Consulter les chefs</a></li>
                        </ul>
                    </li>
                    <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-lock"></i><span class="hide-menu">Gestion des roles</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="add_role.php">Ajouter un role</a></li>
                            <li><a href="view_role.php">Consulter les roles</a></li>

                        </ul>

                    </li>

                    <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-lock"></i><span class="hide-menu">Gestion des comptes</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="add_compte.php">Ajouter un compte</a></li>
                            <li><a href="view_compte.php">Consulter les comptes</a></li>

                        </ul>

                    </li>

                    <!-- <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Gestion des Stagieres</span></a>

                        <ul aria-expanded="false" class="collapse">
                            <li><a href="add_etudiant.php">Ajouter un stagiere</a></li>
                            <li><a href="view_etudiant.php">Consulter les stagiers</a></li>
                        </ul>
                    </li> -->
                    <li class="nav-label mt-2">Demande</li>

                    <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-calendar"></i><span class="hide-menu">Gestion des demandes</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="add_demande.php">Ajouter une demande</a></li>
                            <li><a href="view_mes_demandes.php">Consulter les demandes</a></li>


                        </ul>
                    </li>

                <?php } ?>


                <!-- if chef de post logged -->
                <?php if ($_SESSION["idRole"] != 1) { ?>
                    <li class="nav-label mt-2">Demande</li>

                    <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-calendar"></i><span class="hide-menu">Gestion des demandes</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <!-- <li><a href="add_demande.php">Ajouter une demande</a></li> -->
                            <li><a href="view_mes_demandes.php">Consulter les demandes</a></li>


                        </ul>
                    </li>

                <?php } ?>





        </nav>
    </div>

</div>