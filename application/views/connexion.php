
<?php
    if ($this->session->userdata('logged_in')) {
        if ($this->session->userdata('niveau') == 1) {//Admin   
            redirect('Welcome/home_admin');
        }else {//initiateur
            $user = $this->session->userdata('user_num');
            redirect("Welcome/home_init/$user");
        }
    }
    $this->load->view('head'); ?>
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
                <?php echo form_open('/Welcome/doLogin'); ?>
                <!-- Utilisateur -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input required name="numero_tel" class="form-control" placeholder="Numéro de téléphone" type="text">
                </div>
                <!-- Mot de passe -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input required name="password" class="form-control" placeholder="Mot de passe" type="password">
                </div>
                <span style="font-size: 12px">Veillez nous contacter en cas d'oublie de mot de passe</span>
                <br>
                <br><!--Button -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Se connecter</button>
                </div>
                <?php echo form_close(); ?>
                <hr>
                <span style="color: dark">Si vous n'avez pas encore de compte</span>
                <!--Button -->
                <div class="form-group">
                    <a class="text-decoration-none" href="<?php echo base_url('index.php/Welcome/publier') ?>"><button type="submit" class="btn btn-secondary btn-block"> Créer un compte</button></a>
                </div>
            </article>
        </div> <!-- card.// -->
    </div>
    <!--container end.//-->
    <?php $this->load->view('footer'); ?>
</body>

</html>