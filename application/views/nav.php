<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="<?php echo base_url() ?>">
            <img class="logo_img" src="<?php echo base_url(); ?>assets/img/album/logo_gauche.png" alt="">
            SenMask221
            <img class="logo_img" src="<?php echo base_url(); ?>assets/img/album/logo_droit.png" alt="">
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <?php
                    if ($this->session->userdata('logged_in')) { ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo base_url(); ?>index.php/Welcome/logout">Deconnexion</a></li>
                        <?php
                        if ($this->session->userdata('niveau') == 1) { ?>
                            <!-- Admin -->
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo base_url(); ?>index.php/Welcome/home_admin"> Espace admin</a></li>
                        <?php } else { ?>
                            <!-- initiateur -->
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo base_url(); ?>index.php/Welcome/home_init">Ma boutique</a></li>
                        <?php } ?>

                    <?php } else { ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo base_url(); ?>">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger text-primary" href="<?php echo base_url(); ?>index.php/Welcome/publier">S'inscrire</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger " href="<?php echo base_url(); ?>index.php/Welcome/connexion">Connexion</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</nav>