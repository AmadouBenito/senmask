<style>
    .galery {
        width: 100%
    }
</style>
<?php foreach ($promoteurs as $promoteur) { ?>
    <div class="modal fade bd-example-modal-lg" id="exampleModal<?php echo $promoteur->num_tel ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: lightseagreen;">
                    <h5 class="modal-title" style="color:white" id="exampleModalLabel">Galerie de <?php echo $promoteur->prom_init ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
</br>
                
                <div class="row" id="masks"  style="margin-left: 15% ; margin-right: 15% ;">
                <?php $nb= 0 ;?>
                <?php foreach($images as $image) {?>
                    <?php if($image->initiative_id_init == $promoteur->num_tel) {?>
                        <div class="col-lg-5 col-md-5 col-sm-12 mb-1 shadow container masque">
                            <div class="container" style="height: 60%; margin-top :5px 2%; margin-bottom :5px 2%;">
                                <img src="<?php echo base_url(); ?>assets/img/album/<?php echo $image->photo ?>" class="d-block w-100" alt="...">
                            </div>
                            <div class="container" style="margin-bottom: 3%; height: 40%;">
                                <h4 class="text-center" style="color: lightseagreen;"><?php echo $image->prix; ?> FCFA</h4>
                                <a href="<?php echo base_url('index.php/Welcome/deleteImage/'.$image->id); ?>" type="button" class="container btn btn-primary" style="border-radius: 25px ;"data-toggle="modal" data-target="#exampleModalCenter">
                                Commander
                                </a>
                            </div>
                        </div> 
                    <?php $nb++; }
                    } if($nb == 0) {?>
                        <div class ="card container shadow-lg" style="width: 80%;">
                             <h5 class="text-center">
                                 Ce promoteur n'a pas d'images de masques
                             </h5>
                        </div>
                    </br>
                    <?php } ?>
                </div>
                    </br>
                
              
                </div>
                
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
                    <div class="modal-header" style="background-color: lightseagreen;">
                        <h5 class="modal-title"style="color:white" id="exampleModalLongTitle">Formulaire de commande</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    </br>
                    <div class="input-group-prepend container MyIcons">
                        <span class="input-group-text" style="color: lightseagreen;"> <i class="fa fa-info"></i> </span>
                    </div>
                    <div class="container" style="width: 60%;">
                        <span class="text-center">Remplir le formulaire pour passer votre commande</span>
                    </div>
                    </br>

                    <div class="modal-body container" style="width: 80%;">
                    <?php echo form_open_multipart("/Welcome/commander/$promoteur->num_tel/$image->id"); ?>
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input required name="client" class="form-control" placeholder="Nom complet" type="text">
                            </div>
                        
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                </div>                
                                <select class="custom-select" style="max-width: 90px;">
                                    <option value="">+221</option>
                                </select>                         
                                <input required name="numero_tel" class="form-control" placeholder="Numéro de téléphone" type="number">
                            </div>
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-chart-line"></i> </span>
                                </div>
                                <input required name="nombre" class="form-control" placeholder="Nombre de Masques" type="number">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </div>
                            <?php echo form_close(); ?>
                    </div>
                    
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
