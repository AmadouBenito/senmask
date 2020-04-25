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
                        <option value=""> Sélectionnez votre département</option>

                    </select>
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
                                            // $('#city').html('<option value="">Select City</option>');
                                        }
                                    });
                                } else {
                                    $('#departement').html('<option value="">Select departement</option>');
                                    //$('#city').html('<option value="">Select City</option>');
                                }
                            });

                            /* $('#state').change(function() {
                                var state_id = $('#state').val();
                                if (state_id != '') {
                                    $.ajax({
                                        url: "<?php echo base_url(); ?>dynamic_dependent/fetch_city",
                                        method: "POST",
                                        data: {
                                            state_id: state_id
                                        },
                                        success: function(data) {
                                            $('#city').html(data);
                                        }
                                    });
                                } else {
                                    $('#city').html('<option value="">Select City</option>');
                                }
                            }); */

                        });
                    </script>
                </div>
                <!--Localité -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-map-marked"></i> </span>
                    </div>
                    <input name="localite" class="form-control" placeholder="Votre localité (Pas obligatoire)" type="text">
                </div>
                <!--Capacité de production -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-chart-line"></i> </span>
                    </div>
                    <input required name="capacite" class="form-control" placeholder="Capacité de production de masques" type="number">
                </div>

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-money-bill"></i> </span>
                    </div>
                    <select class="custom-select" style="max-width: 90px;">
                        <option value="">CFA</option>
                    </select>
                    <input required name="prix" class="form-control" placeholder="Prix unitaire" type="number">
                </div>
                <!-- Image -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-image"></i> </span>
                    </div>
                    <input name="userfile" id="userfile" class="form-control" placeholder="Photo de masque" type="file">
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