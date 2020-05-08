<style>
    .galery {
        width: 100%
    }
</style>
<?php foreach ($promoteurs as $promoteur) { ?>
    <div class="modal fade bd-example-modal-lg" id="exampleModal<?php echo $promoteur->num_tel ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Galerie de <?php echo $promoteur->prom_init ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <?php if ($promoteur->photo) { ?>
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-md-8 col-sm-12">
                                <img class="galery" src="<?php echo base_url() ?>assets/img/album/<?php echo $promoteur->photo ?>" alt="">
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($promoteur->photo2) { ?>
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-md-8 col-sm-12">
                                <img class="galery" src="<?php echo base_url() ?>assets/img/album/<?php echo $promoteur->photo2 ?>" alt="">
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($promoteur->photo3) { ?>
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-md-8 col-sm-12">
                                <img class="galery" src="<?php echo base_url() ?>assets/img/album/<?php echo $promoteur->photo3 ?>" alt="">
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
