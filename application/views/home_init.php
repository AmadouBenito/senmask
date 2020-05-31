<?php
if (!$this->session->userdata('logged_in')) {
    redirect('Welcome/connexion');
}
?>
<?php $this->load->view('head'); ?>

<body id="page-top">
    <!-- Navigation-->
    <?php $this->load->view('nav_admin'); ?>
    <?php $this->load->view('header_admin'); ?>
    <div class="card bg-light">
</br>
    <div class="card w-50 container table-responsive shadow-lg" >
    </br>        
    <table class="table container">
        <tbody>
            <tr>
                <th scope="row"></th>
                <td  colspan="2">
                <div id="tab" class="card text-white bg-success" style="margin: 0%,5% ;" type="button"  data-toggle="modal" data-target="#exampleModalLong">
                    <div class="card-body text-center">
                        <h4 class="container"> Ajouter des Images de Masques </h4>
                    </div>
                </div>
                </td>
            </tr>
            <tr>
            
            <th scope="row"></th>
            <td>
            <div class="card text-white bg-success" style="margin: 0%,5% ;" type="button" data-toggle="modal" data-target="#exampleModal">
                    <div class="card-body text-center myTableCards">
                        <h4 class="container"> Mon Profil </h4>
                    </div>
                </div>
            </td>
            <td>
                <div class="card text-white bg-warning " style="margin: 0%,5% ;" type="button" data-toggle="modal" data-target=".bd-example-modal-lg1">
                <div class="card-body text-center myTableCards">
                    <h4 class="container"> Mes Photos </h4>
                </div>
                </div>
            </td>
            
            </tr>
            <tr>
            <th scope="row"></th>
            <td>
                <div class="card text-white bg-warning" style="margin: 0%,5% ;" " type="button"  data-toggle="modal" data-target="#exampleModalCenter">
                    <div class="card-body text-center myTableCards ">
                        <h4 class="container"> Mon Stock </h4>
                    </div>
                </div>
            </td>
            
            <td>
                <div class="card text-white bg-danger" style="margin: 0%,5% ;" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
                    <div class="card-body text-center myTableCards">
                        <h4 class="container">Mes Commandes</h4>
                    </div>
                </div>
            </td>
            
        </tbody>
    </table>
</div>
</br>

</div>
</br>
    <!--container end.//-->
    <?php $this->load->view('footer'); ?>
</body>
<?php
    $this->load->view('commandes_init',$user_info);
?>
<?php
    $this->load->view('profil_init',$user_info);
?>
<?php
    $this->load->view('masques_init',$user_info);
?>
<?php
    $this->load->view('stock_init',$user_info);
?>
<?php
    $this->load->view('ajout_masques_init',$user_info);
?>

</html>