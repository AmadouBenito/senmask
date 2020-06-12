<div class="modal fade bd-example-modal-lg-artisans" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <br>
        <div class="container">
            <h4 class="card-title mt-3 text-center">Liste des Artisans </h4>
            <p class="divider-text"></p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Prénom Nom</th>
                        <th scope="col">Numéro tel</th>
                        <th scope="col">Region</th>
                        <th scope="col">Departement</th>
                        <th scope="col">Certifié</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($artisans as $art) { ?>
                        <tr>
                            <th scope="row"><?php echo $art->prom_init ?></th>
                            <th><?php echo $art->num_tel ?></th>
                            <th>
                                <?php
                                foreach ($regions as $region) {
                                    if ((substr($art->codeqrt, 0, 2)) == $region->coderegion) {
                                        echo $region->nomregion;
                                    }
                                }
                                ?>
                            </th>
                            <th>
                                <?php
                                foreach ($departements as $departement) {
                                    if ((substr($art->codeqrt, 0, 3)) == $departement->codedepartement) {
                                        echo $departement->nomdepartement;
                                    }
                                }
                                ?>
                            </th>
                            <th>
                                <?php
                                if ($art->certifié != 0) { ?>
                                    <span style="color: green">Certifié</span>
                                <?php } else { ?>
                                    <span style="color: orange">Non certifié</span>
                                <?php } ?>
                            </th>
                        </tr>
                    <?php } ?>   
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>