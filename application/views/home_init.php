<?php
if (!$this->session->userdata('logged_in')) {
    redirect('Welcome/connexion');
}
?>
<?php $this->load->view('head'); ?>

<body id="page-top">
    <!-- Navigation-->
    <?php $this->load->view('nav'); ?>
    <?php $this->load->view('header_admin'); ?>
    <div class="card bg-light">
        </br>
        <div class="container my_menu">
            <!-- <table class="container">
                <tbody>
                    <tr>
                        <th scope="row"></th>
                        <td colspan="2">
                            <div id="tab" class="card text-white bg-primary" style="margin: 10px;" type="button" data-toggle="modal" data-target="#exampleModalLong">
                                <div class="card-body text-center">
                                    <h4 class="container"> Ajouter des Images de Masques </h4>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>
                            
                        </td>
                        <td>
                            <div class="card text-white bg-primary " style="margin: 10px 5% ;" type="button" data-toggle="modal" data-target=".bd-example-modal-lg1">
                                <div class="card-body text-center myTableCards">
                                    <h4 class="container"> Mes Photos </h4>
                                </div>
                            </div>
                        </td>

                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>
                            <div class="card text-white bg-primary" style="margin: 10px 5% ;" type="button" data-toggle="modal" data-target="#exampleModalCenter">
                                <div class="card-body text-center myTableCards ">
                                    <h4 class="container"> Mon Stock </h4>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="card text-white bg-primary" style="margin: 10px 5% ;" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
                                <div class="card-body text-center myTableCards">
                                    <h4 class="container">Mes Commandes</h4>
                                </div>
                            </div>
                        </td>

                </tbody>
            </table> -->

            <div class="row ">
                <div class="col-lg-12 col-md-12 col-sm-12 mb-1">
                    <div id="tab" class="card text-white bg-primary" style="margin: 10px;" type="button" data-toggle="modal" data-target="#exampleModalLong">
                        <div class="card-body text-center">
                            <h4 class="container"> Ajouter des Images de Masques </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-1">
                    <div class="        card text-white bg-primary" style="margin: 10px 5% ;" type="button" data-toggle="modal" data-target="#exampleModal">
                        <div class="card-body text-center myTableCards">
                            <h4 class="container"> Mon Profil </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-1">
                    <div class="card text-white bg-primary" style="margin: 10px 5% ;" type="button" data-toggle="modal" data-target="#exampleModalCenter">
                        <div class="card-body text-center myTableCards ">
                            <h4 class="container"> Mon Stock </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-1">
                    <div class="card text-white bg-primary " style="margin: 10px 5% ;" type="button" data-toggle="modal" data-target=".bd-example-modal-lg1">
                        <div class="card-body text-center myTableCards">
                            <h4 class="container"> Mes Photos </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-1">
                    <div class="card text-white bg-primary" style="margin: 10px 5% ;" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
                        <div class="card-body text-center myTableCards">
                            <h4 class="container">Mes Commandes</h4>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        </br>

    </div>
    </br>
    <!--container end.//-->
    <?php $this->load->view('footer'); ?>
</body>
<?php
$this->load->view('commandes_init', $user_info);
?>
<?php
$this->load->view('profil_init', $user_info);
?>
<?php
$this->load->view('masques_init', $user_info);
?>
<?php
$this->load->view('stock_init', $user_info);
?>
<?php
$this->load->view('ajout_masques_init', $user_info);
?>

</html>