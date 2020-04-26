<?php $this->load->view('head'); ?>

<body id="page-top">
    <!-- Navigation-->
    <?php $this->load->view('nav'); ?>
    <?php $this->load->view('header_pub'); ?>
    <div class="container">
        <br>
        <div class="card bg-light">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title mt-3 text-center">Si vous avez une fois publié, mettez le même numéro téléphone pour mettre à jour vos informations</h4>
                <p class="divider-text"></p>
                <?php echo form_open_multipart('/Welcome/doPublier'); ?>
                <!-- Utilisateur -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input required name="promoteur" class="form-control" placeholder="Nom complet" type="text">
                </div>
                <!-- Numero de telephone -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                    </div>
                    <select class="custom-select" style="max-width: 90px;">
                        <option value="">+221</option>
                    </select>
                    <input required name="numero_tel" class="form-control" placeholder="Numéro de téléphone" type="number">
                </div>
                <!--Region -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-map-marked"></i> </span>
                    </div>
                    <select id="region" name="region" class="form-control" required>
                        <option value=""> Sélectionnez votre région</option>
                        <?php foreach ($regions as $region) {
                            echo "<option value='" . $region->coderegion . "'>" . $region->nomregion . "</option>";
                        } ?>
                    </select>
                </div>
                <!--Departement -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-map-marked"></i> </span>
                    </div>
                    <select id="departement" name="departement" class="form-control" required>
                        <option value=""> Sélectionnez une region d'abord</option>

                    </select>
                </div>
                <!-- Commune -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-map-marked"></i> </span>
                    </div>
                    <select id="commune" name="commune" class="form-control" required>
                        <option value=""> Sélectionnez un département d'abord</option>
                    </select>
                </div>
                <!-- Quartier -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-map-marked"></i> </span>
                    </div>
                    <select id="quartier" name="quartier" class="form-control" required>
                        <option value=""> Sélectionnez une commune d'abord</option>
                    </select>
                </div>
                <!--Capacité de production -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-chart-line"></i> </span>
                    </div>
                    <input required name="capacite" class="form-control" placeholder="Capacité de production de masques" type="number">
                </div>
                <!-- Prix -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-money-bill"></i> </span>
                    </div>
                    <select class="custom-select" style="max-width: 90px;">
                        <option value="">CFA</option>
                    </select>
                    <input required name="prix" class="form-control" placeholder="Prix unitaire" type="number">
                </div>
                <!-- Image profile -->
                <div class="form-group input-group" style="margin: unset">
                    <input class="form-control" placeholder="Une photo de masque" disabled type="text" style="border: none !important; background: unset; padding: unset !important">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-image"></i> </span>
                    </div>
                    <input name="userfile" id="userfile" class="form-control"  type="file">
                </div>
                <!-- Image certificas -->
                <div class="form-group input-group" style="margin: unset">
                    <input class="form-control" placeholder="Photo de certificat(Pas obligatoire)" disabled type="text" style="border: none !important; background: unset; padding: unset !important">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-image"></i> </span>
                    </div>
                    <input name="certificat" id="certificat" class="form-control" type="file">
                </div>
                <!--Button -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Publier </button>
                </div>
                <?php echo form_close(); ?>
            </article>
        </div> <!-- card.// -->
    </div>
    <!--container end.//-->
    <?php $this->load->view('footer'); ?>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#region').change(function() {
            var coderegion = $('#region').val();
            console.log(coderegion)

            if (coderegion != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/welcome/fetch_dep/" + coderegion,
                    method: "POST",
                    data: {
                        coderegion: coderegion
                    },
                    success: function(data) {
                        $('#departement').html(data);
                        $('#commune').html('<option value="">Selectionez une commune</option>');
                    }
                });
            } else {
                $('#departement').html('<option value="">Selectionnez un departement</option>');
                $('#commune').html('<option value="">Selectionnez une commune</option>');
            }
        });

        $('#departement').change(function() {
            var codedepartement = $('#departement').val();
            if (codedepartement != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/welcome/fetch_com/" + codedepartement,
                    method: "POST",
                    data: {
                        codedepartement: codedepartement
                    },
                    success: function(data) {
                        $('#commune').html(data);
                        $('#quartier').html('<option value="">Selectionnez un quartier/village </option>');
                    }
                });
            } else {
                $('#commune').html('<option value="">Selectionnez une commune</option>');
                $('#quartier').html('<option value="">Selectionnez un quartier/village </option>');
            }
        });

        $('#commune').change(function() {
            var codecommune = $('#commune').val();
            if (codecommune != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/welcome/fetch_qrt/" + codecommune,
                    method: "POST",
                    data: {
                        codecommune: codecommune
                    },
                    success: function(data) {
                        $('#quartier').html(data);
                    }
                });
            } else {
                $('#quartier').html('<option value="">Selectionnez un quartier/village </option>');
            }
        });
    });
</script>