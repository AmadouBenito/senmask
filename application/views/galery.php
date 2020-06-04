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
