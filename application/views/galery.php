<style>
    .galery {
        width: 100%
    }
</style>
<?php foreach ($promoteurs as $promoteur) { ?>
    <div class="modal fade bd-example-modal-lg" id="exampleModal<?php echo $promoteur->num_tel ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Galerie de <?php echo $promoteur->prom_init ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php $nb_image = 0 ;?>
                <?php foreach ($images as $image) {
                    if($image->initiative_id_init == $promoteur->num_tel )
                    $nb_image++;
                }?>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="color: orange;"> <i class="fa fa-image"></i> </span>
                    </div>
                    <h5> Photos de Masques <?php echo $nb_image ?></h5>
                </div>
                <div class="card w-80 container bg-light shadow-lg myslide">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                   <?php if($nb_image == 1) {?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <?php } ?>
                    <?php if($nb_image == 2) {?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <?php } ?>
                    <?php if($nb_image == 3) {?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <?php } ?>
                    <?php if($nb_image == 4) {?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    <?php } ?>  
                    <?php if($nb_image == 5) {?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    <?php } ?> 
                </ol>
                <?php foreach ($images as $image) {
                    if($image->initiative_id_init == $promoteur->num_tel ) {?>
                <div class="carousel-inner">
                    <div class="carousel-item active container">
                        <img src="<?php echo base_url(); ?>assets/img/album/<?php echo $image->photo ?>" class="container w-100 imageSlide" alt="...">
                        
                   
                </div>
                <?php } 
             } ?>
             <?php if($nb_image == 0) {?>
                <h3 style="color:red">ce fournisseurs n'a pas encore d'images de Masques</h3>
            <?php } ?>    
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
                </div>
</br>
                                
                  <!--  <?php if ($promoteur->photo) { ?>
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-md-8 col-sm-12">
                                <img class="galery" src="<?php echo base_url() ?>assets/img/album/<?php echo $promoteur->photo ?>" alt="">
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($promoteur->photo2) { ?>
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-md-8 col-sm-12">
                                <img class="galery" src="<?php echo base_url() ?>assets/img/album/<?php echo $promoteur->photo2 ?>" alt="">
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($promoteur->photo3) { ?>
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-md-8 col-sm-12">
                                <img class="galery" src="<?php echo base_url() ?>assets/img/album/<?php echo $promoteur->photo3 ?>" alt="">
                            </div>
                        </div>
                    <?php } ?>
                </div>-->
                
                <!-- Button trigger modal -->
               

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Formulaire de commande</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                        <label for="message-text" class="col-form-label">Numéro de téléphone</label>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                            </div>                
                            <select class="custom-select" style="max-width: 90px;">
                                <option value="">+221</option>
                            </select>                         
                            <input required name="numero_tel" class="form-control" placeholder="Numéro de téléphone" type="number">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Nombre de Masques</label>
                            <input required name="nombre" class="form-control" placeholder="Nombre de Masques" type="number">
                        </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-primary">Valider</button>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
