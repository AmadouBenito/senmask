<!-- Entete-->
<header class="masthead" style="height: auto; min-height: auto; padding-top: 10rem">
    <?php
    $message = $this->session->flashdata('message');
    if ($message == "insc_error") { ?>
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
                    <strong class="font__weight-semibold">Une erreur s'est produite!</strong>
                    Veillez réessayer 
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if ($message == "error_photo") { ?>
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
                    <strong class="font__weight-semibold">Photos trop grandes!</strong>
                    Veillez choisir des photos de plus petite taille
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end">
                <h1 class="text-uppercase text-white font-weight-bold">
                    Remplissez ce formulaire pour créer votre boutique <br><span style="color: #f4623a"> et ainsi faire la gestion de votre stock et de vos commandes</span><br>
                </h1>
                <hr class="divider my-4" />
            </div>
        </div>
    </div>
</header>
