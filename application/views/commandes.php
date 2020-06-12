<div class="modal fade bd-example-modal-lg-commandes" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col"  style="color: orange">Artisans</th>
                    <th scope="col"  style="color: orange">Nom client</th>
                    <th scope="col"  style="color: orange">Téléphone Client</th>
                    <th scope="col"  style="color: orange">Nombre de masques</th>
                    <th scope="col"  style="color: orange">Etat</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($commandes as $commande) {?>
                    <tr>
                    <th scope="row" class="text-center" ><?php echo $commande->initiative_id_init ?></th>
                    <th class="text-center"><?php echo $commande->nom_client ?></th>
                    <th class="text-center"><?php echo $commande->num_tel ?></th>
                    <th class="text-center"><?php echo $commande->nb_mask ?></th>
                    
                    <?php if($commande->etat_id == 0){ ?>
                        <th class="text-center" style="color: orange">Aucune Action</th> 
                    <?php } else {
                        if($commande->etat_id == 1){?>
                        <th class="text-center" style="color: green"> Valider </th> 
                        <?php }
                        else { ?>
                        <th class="text-center" style="color: red"> Decliner </th>
                        <?php }
                        } ?>
                    </tr>

                <?php }?>
                
            </tbody>
            </table>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>