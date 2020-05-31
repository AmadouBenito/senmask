<?php $this->load->view('head'); ?>

<!-- modal commandes debut -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header container" style="background-color: lightseagreen;">
        <h5 class="modal-title" style="color:white" id="exampleModalLabel">Liste des commandes </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
</br>
<div class="card container lg-light myTable" style="margin: 5%, 5%,5%,5% ;">
      <table class="table table-hover ">
  <thead>
    <tr>
      <th scope="col"  style="color: orange">Nom</th>
      <th scope="col"  style="color: orange">Telephone Client</th>
      <th scope="col"  style="color: orange">Nombre de masques</th>
      
      <th scope="col"  style="color: orange">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($commandes as $commande) {?>
    <tr>
      
      <th scope="row" ><?php echo $commande->nom_client ?></th>
      <td class="text-center"><?php echo $commande->num_tel ?></td>
      <td class="text-center"><?php echo $commande->nb_mask ?></td>
      
      <td>
        <button type="button" class="btn btn-danger">Décliner</button>
        <button type="button" class="btn btn-success">Valider</button>
      </td>
    </tr>
    <?php } ?>
    
  </tbody>
</table>
</div>
      
    </div>
  </div>
</div>
<!-- modal commandes fin -->

