<?php $this->load->view('head'); ?>

<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header container" style="background-color: lightseagreen;">
        <h5 class="modal-title" style="color:white" id="exampleModalLabel">Mes Masques</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

</br>
        <div class="input-group-prepend container MyIcons">
            <span class="input-group-text" style="color: lightseagreen;"> <i class="fa fa-info"></i> </span>
        </div>
        <div class="container" style="width: 50%;">
            <span class="text-center">
               pouvez supprimer ou ajouter jusqu'à cinq (5) types de masques avec leur prix respectifs
            </span>
        </div>
        </br>
    <div class="container row" id="mask" >
        <?php $nb_img = 0;?>
        <?php foreach($images as $image) {?>
            <div class="col-md-5 shadow container masque">
                <div class="container" style="height: 60%; margin-top :2%; margin-bottom :2%;">
				          <img src="<?php echo base_url(); ?>assets/img/album/<?php echo $image->photo ?>" class="d-block w-100" alt="...">
                </div>
                <div class="container" style="margin-bottom: 3%; height: 40%;">
					          <h4 class="text-center" style="color: lightseagreen;"><?php echo $image->prix; ?> FCFA</h4>
				            <a href="<?php echo base_url('index.php/Welcome/deleteImage/'.$image->id); ?>" type="button" class="container btn btn-primary" style="border-radius: 25px ;">
			                Supprimer
                    </a>
                 </div>
		    </div> 
        <?php $nb_img++; } ?>
        <?php if( $nb_img < 5 ) {?>
            <div class="col-md-5 shadow container masque" type = "button" data-toggle="modal" data-target="#exampleModalLong">
                <div class="container" id="AddIcon">
                    <img src="<?php echo base_url(); ?>assets/img/addImage.png" class="d-block w-100" alt="...">
                </div>
		    </div> 
            <?php } ?>
        
    </div>
    </br>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>