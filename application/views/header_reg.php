<?php
    foreach ($regions as $region ) {
        $nom_reg = $region->nomregion;
    }
?>
<!-- Entete-->
<header class="masthead" style="height: auto; min-height: auto; padding-top: 10rem">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end">
                <h1 class="text-uppercase text-white font-weight-bold">Liste des distibuteurs de masques dans la region de <br>
                <span style="color: #f4623a"><?php echo $nom_reg ?></span><br>
                </h1>
                <hr class="divider my-4"/>
            </div>
        </div>
    </div>
</header>