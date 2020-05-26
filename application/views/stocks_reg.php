<?php $this->load->view('head'); ?>

<body id="page-top">
    <!-- Navigation-->
    <?php $this->load->view('nav'); ?>
    <?php $this->load->view('header_reg'); ?>

    <section class="page-section bg-dark" id="contact" style="padding-top: 10px">
        <div style="padding: 26px">
            <div class="pcss3t pcss3t-effect-scale pcss3t-theme-1">
                <?php
                $i = 0;
                foreach ($departements as $dep) {
                    $i++ ?>
                    <input type="radio" <?php if ($i == 1) { ?> checked <?php } ?> name="pcss3t" id="tab<?php echo $i ?>" class="tab-content-<?php echo $i ?>">
                    <label for="tab<?php echo $i ?>"><?php echo $dep->nomdepartement ?></label>
                <?php } ?>
                <ul>
                    <?php
                    $i = 0;
                    foreach ($departements as $dep) {
                        $j = 0; ?>
                        <li class="tab-content tab-content-<?php echo ++$i;
                                                            if ($i != 1) { ?> typography <?php } ?> ">
                            <div class="container">
                               <!-- <div class="row">
                                    <?php foreach ($promoteurs as $promoteur) { ?>
                                        <?php if ($promoteur->id_departement == $dep->codedepartement) {
                                            $j++ ?>
                                            <div class="col-md-4">
                                                <div class="contact-box center-version">
                                                    <a href="#profile.html">
                                                        <img alt="image" class="img-circle" src="<?php echo base_url(); ?>assets/img/album/<?php echo $promoteur->photo ?>">
                                                        <h3 class="m-b-xs"><strong style="color: #f4623a"><?php echo $promoteur->prom_init ?></strong></h3>
                                                        <?php if ($promoteur->certifié) { ?>
                                                            <h5 class="m-b-xs"><strong style="color: green"><i class="fa fa-check-circle"></i>Certifié</strong></h5>
                                                        <?php } ?>
                                                        <h6 style="color: #343a40"><i class="fa fa-map-marked"></i>Commune/Quartier</h6>
                                                        <h5 style="color: #f4623a; text-transform: lowercase">
                                                            <?php
                                                            foreach ($communes as $commune) {
                                                                if ($commune->codecommune == substr($promoteur->codeqrt, 0, 8)) {
                                                                    echo $commune->nomcommune;
                                                                } ?>
                                                            <?php }
                                                            ?>
                                                            /
                                                            <?php
                                                            foreach ($quartiers as $quartier) {
                                                                if ($quartier->codequartier == $promoteur->codeqrt) {
                                                                    echo $quartier->nomquartier;
                                                                } ?>
                                                            <?php }
                                                            ?>
                                                        </h5>
                                                        <h6 style="color: #343a40"><i class="fas fa-bookmark"></i> Capacité de production</h6>
                                                        <h5 style="color: #f4623a"><?php echo $promoteur->cap_prod ?></h5>
                                                        <h6 style="color: #343a40"><i class="fas fa-comment-dollar"></i> Prix unitaire
                                                            <span style="color: #f4623a"><?php echo $promoteur->prix ?> FCFA</span>
                                                        </h6><br>
                                                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal<?php echo $promoteur->num_tel ?>">
                                                            Voir les masques
                                                        </button>


                                                    </a>
                                                    <div class="contact-box-footer">
                                                        <div class=" btn-group">
                                                            <a class="btn btn-xs btn-white font-weight-bolder ">
                                                                <i class="fa fa-phone"></i>
                                                                <?php echo $promoteur->num_tel ?>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if ($j == 0) { ?>
                                        <img src="<?php echo base_url(); ?>assets/img/album/no_dist.png" style="width: -webkit-fill-available;">
                                    <?php } ?>
                                </div>-->
                                <br>
                                <div class="card bg-light">
                                <?php if ($j != 0) { ?>
                                    <h4 class="card-title mt-3 text-center">Liste des distributeurs de <?php echo $dep->nomdepartement ?>  </h4>
                                   <?php } ?>
                                    <p class="divider-text"></p>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Prénom Nom</th>
                                                <th scope="col">Commune / Quartier</th>
                                                <th scope="col">Details</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                        <?php foreach ($promoteurs as $promoteur) { ?>
                                        <?php if ($promoteur->id_departement == $dep->codedepartement) {
                                            $j++ ?>
                                            <tr>
                                                 <th scope="row"><?php echo $promoteur->prom_init ?></th>
                                                 <th>
                                                 <?php
                                                            foreach ($communes as $commune) {
                                                                if ($commune->codecommune == substr($promoteur->codeqrt, 0, 8)) {
                                                                    echo $commune->nomcommune;
                                                                } ?>
                                                            <?php }
                                                            ?>
                                                            /
                                                            <?php
                                                            foreach ($quartiers as $quartier) {
                                                                if ($quartier->codequartier == $promoteur->codeqrt) {
                                                                    echo $quartier->nomquartier;
                                                                } ?>
                                                            <?php }
                                                            ?>
                                                 </th>
                                                 <th>
                                                 <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal<?php echo $promoteur->num_tel ?>">
                                                    <i class=" fa fa-eye"></i>
                                                </button>
                                                 </th>
                                            </tr>
                                            
                                        <?php }?>
                                        <?php }?>
                                        <?php if ($j == 0) { ?>
                                        <img src="<?php echo base_url(); ?>assets/img/album/no_dist.png" style="width: -webkit-fill-available;">
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </li>

                    <?php } ?>
                    <li class="tab-content tab-content-last typography">

                    </li>
                </ul>
            </div>
           
        </div>
        
    </section>
    <?php $this->load->view('footer'); ?>
</body>
<?php
foreach ($promoteurs as $promoteur) {
    $this->load->view('galery');
}
?>

</html>