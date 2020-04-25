<?php $this->load->view('head'); ?>

<body id="page-top">
    <!-- Navigation-->
    <?php $this->load->view('nav');
    $this->load->view('header'); ?>

    <!-- Localité section-->
    <section class="page-section" id="localite" style="padding-bottom: 0px !important">
        <div class="container">
            <h2 class="text-center mt-0">Où trouver un masque? </h2>
            <hr class="divider my-4" />
            <div class="">
                <?php $this->load->view('sn_map'); ?>
            </div>
        </div>
    </section>
    <!-- Contact section-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mt-0">Vous avez un stock de masques à vendre ?</h2>
                    <a href="<?php echo base_url() ?>/index.php/Welcome/publier " class="btn btn-primary btn-xl js-scroll-trigger" href="#localite">
                        <i class="fas fa-upload "></i>
                        Publier le ici</a>
                    <hr class="divider my-4" />
                    <p class="text-muted mb-5"> Contactez nous rapidement!
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                    <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                    <div> (+221) 77 000 00 00</div>
                </div>
                <div class="col-lg-4 mr-auto text-center">
                    <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                    <a class="d-block" href="mailto:senmask@gmail.com">senmask@gmail.com</a>
                </div>
            </div>
        </div>
    </section>
    <?php $this->load->view('footer'); ?>
</body>

</html>