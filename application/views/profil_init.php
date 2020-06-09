<?php $this->load->view('head'); ?>
<!-- modal profil debut-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header container" style="background-color: lightseagreen;">
        <h5 class="modal-title" style="color:white" id="exampleModalLabel">Mon Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
</br>
    <div class="input-group-prepend container MyIcons">
            <span class="input-group-text" style="color: lightseagreen;"> <i class="fa fa-info"></i> </span>
        </div>
      <div class="container" style="width: 60%;">
          <span class="text-center">Vous pouvez modifier certaines informations vous concernant</span>
        </div>
        </br>
      <div class="modal-body container" style="width: 70%;">
      
          <?php foreach($profil as $profile) {?>
            <?php echo form_open_multipart('/Welcome/updateProfile'); ?>
        <!-- Utilisateur -->
        <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="color: lightseagreen;"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input required name="promoteurName" value="<?php echo $profile->prom_init ?>" class="form-control" placeholder="Nom complet" type="text">
                </div>
                <!-- Numero de telephone -->
                <div class="form-group input-group">
                    <div class="input-group-prepend ">
                        <span class="input-group-text" style="color: lightseagreen;"> <i class="fa fa-phone"></i> </span>
                    </div>
                    <input required name="numero_tel" value="<?php echo $profile->num_tel  ?>" class="form-control" placeholder="Numéro de téléphone" type="number" disabled >
                </div>
                 <!--Capacité de production -->
                 <span class="container" style="color: lightseagreen ;">Capacité de production</span>
                 <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="color: lightseagreen;"> <i class="fa fa-chart-line"></i> </span>
                    </div>
                    <input required name="capacite" value="<?php echo $profile->cap_prod ?>" class="form-control" placeholder="Capacité de production de masques" type="number">
                </div>
                </br>
                <div class="container" style="width: 50% ;">
                      <button type="submit" style="border-radius: 25px ;" style="width: 100% ;" class="btn btn-primary">Mettre à jour</button>
                </div>
                <?php echo form_close(); ?>
          </br>
            <?php } ?>
      </div>
     
    </div>
  </div>
</div>
<!-- modal profil fin -->