<?php
if (!$this->session->userdata('logged_in')) {
    redirect('Welcome/admin');
}
?>
<?php $this->load->view('head'); ?>

<body id="page-top">
    <!-- Navigation-->
    <?php $this->load->view('nav_admin'); ?>
    <?php $this->load->view('header_admin'); ?>
    <div class="container">
        <br>
        <div class="card bg-light">
            <h4 class="card-title mt-3 text-center">Liste des distributeurs </h4>
            <p class="divider-text"></p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Prénom Nom</th>
                        <th scope="col">Numéro tel</th>
                        <th scope="col">Region</th>
                        <th scope="col">Departement</th>
                        <th scope="col">Certifié</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($prom_cert as $row) { ?>
                        <tr>
                            <th scope="row"><?php echo $row->prom_init ?></th>
                            <th><?php echo $row->num_tel ?></th>
                            <th>
                                <?php
                                foreach ($regions as $region) {
                                    if ((substr($row->codeqrt, 0, 2)) == $region->coderegion) {
                                        echo $region->nomregion;
                                    }
                                }
                                ?>
                            </th>
                            <th>
                                <?php
                                foreach ($departements as $departement) {
                                    if ((substr($row->codeqrt, 0, 3)) == $departement->codedepartement) {
                                        echo $departement->nomdepartement;
                                    }
                                }
                                ?>
                            </th>
                            <th>
                                <?php
                                if ($row->certifié != 0) { ?>
                                    <span style="color: green">Certifié</span>
                                <?php } else { ?>
                                    <span style="color: orange">Non certifié</span>
                                <?php } ?>
                            </th>
                            <th>
                                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal<?php echo $row->id_init ?>">
                                    <i class=" fa fa-eye"></i>
                                </button>
                                <a href="<?php echo base_url() ?>index.php/Welcome/certifier/<?php echo $row->id_init ?>">
                                    <button type="button" class="btn btn-success">
                                        <i class="fas fa-check-circle"></i>
                                    </button>
                                </a>
                                <a href="<?php echo base_url() ?>index.php/Welcome/archiver/<?php echo $row->id_init ?>">
                                    <button type="button" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </a>
                            </th>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>

        </div> <!-- card.// -->
    </div>
    <!--container end.//-->
    <?php $this->load->view('footer'); ?>
</body>
<?php
$this->load->view('certificats');
?>

</html>
