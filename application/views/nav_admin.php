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
            <?php
            if ($this->session->userdata('logged_in')) { ?>
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo base_url(); ?>index.php/Welcome/logout">Déconnexion</a></li>
                </ul>
            <?php } ?>
        </div>
    </div>
</nav>