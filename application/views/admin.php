<?php $this->load->view('head'); ?>

<body id="page-top">
    <!-- Navigation-->
    <?php $this->load->view('nav'); ?>
    <?php $this->load->view('header_admin'); ?>
    <div class="container">
        <br>
        <div class="card bg-light">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title mt-3 text-center">Connexion</h4>
                <p class="divider-text"></p>
                <?php echo form_open_multipart('/Welcome/doLogin'); ?>
                <!-- Utilisateur -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input required name="login" class="form-control" placeholder="Votre login" type="text">
                </div>
                <!-- Utilisateur -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input required name="password" class="form-control" placeholder="Mot de passe" type="password">
                </div>

                <!--Button -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Se connecter</button>
                </div>
                <?php echo form_close(); ?>
            </article>
        </div> <!-- card.// -->
    </div>
    <!--container end.//-->
    <?php $this->load->view('footer'); ?>
</body>

</html>
