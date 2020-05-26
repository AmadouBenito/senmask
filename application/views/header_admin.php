<!-- Entete-->

<header class="masthead" style="height: auto; min-height: auto; padding-top: 10rem">
    <?php
    $message = $this->session->flashdata('message');
    if ($message == "wrong") { ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="alert fade alert-simple alert-danger alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show">
                    <button type="button" class="close font__size-18" data-dismiss="alert">
                        <span aria-hidden="true"><a href="#">
                                <i class="fa fa-times greencross"></i>
                            </a></span>
                        <span class="sr-only">Close</span>
                    </button>
                    <i class="start-icon far fa-check-circle faa-tada animated"></i>
                    <strong class="font__weight-semibold">Informations non valables!</strong>
                    Veillez verifier les informations entrées
                </div>
            </div>
        </div>
    <?php } ?>
    <?php
    if ($message == "update_succes") { ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="alert fade alert-simple alert-success alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show">
                    <button type="button" class="close font__size-18" data-dismiss="alert">
                        <span aria-hidden="true"><a href="#">
                                <i class="fa fa-times greencross"></i>
                            </a></span>
                        <span class="sr-only">Close</span>
                    </button>
                    <i class="start-icon far fa-check-circle faa-tada animated"></i>
                    <strong class="font__weight-semibold">Certification avec succès</strong>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php
    if ($message == "archive_succes") { ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="alert fade alert-simple alert-success alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show">
                    <button type="button" class="close font__size-18" data-dismiss="alert">
                        <span aria-hidden="true"><a href="#">
                                <i class="fa fa-times greencross"></i>
                            </a></span>
                        <span class="sr-only">Close</span>
                    </button>
                    <i class="start-icon far fa-check-circle faa-tada animated"></i>
                    <strong class="font__weight-semibold">Archivage avec succès</strong>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php
    if ($message == "succes") { ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="alert fade alert-simple alert-success alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show">
                    <button type="button" class="close font__size-18" data-dismiss="alert">
                        <span aria-hidden="true"><a href="#">
                                <i class="fa fa-times greencross"></i>
                            </a></span>
                        <span class="sr-only">Close</span>
                    </button>
                    <i class="start-icon far fa-check-circle faa-tada animated"></i>
                    <strong class="font__weight-semibold">Bienvenue
                        <?php echo $this->session->userdata('user_name') ?>
                    </strong>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end">
                <?php if ($this->session->userdata('logged_in')) { ?>
                    <?php if ($this->session->userdata('niveau') == 1) { ?>
                    <h1 class="text-uppercase text-white font-weight-bold">
                        Espace d'<span style="color: #f4623a">administration</span><br>
                    </h1>
                    <?php } elseif ($this->session->userdata('niveau') == 0) { ?>
                        <h1 class="text-uppercase text-white font-weight-bold">
                            Espace de gestion des stocks et des commandes de<br><span style="color: #f4623a"><?php echo $this->session->userdata('user_name'); ?></span><br>
                        </h1>
                    <?php } ?>
                <?php } else{ ?>
                    <h1 class="text-uppercase text-white font-weight-bold">
                        Bienvenue dans votre espace de <br><span style="color: #f4623a">connexion</span><br>
                    </h1>
                <?php } ?>
                <hr class="divider my-4" />
            </div>
        </div>
    </div>
</header>