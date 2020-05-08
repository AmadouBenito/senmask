<style>
    .galery {
        width: 100%
    }
</style>
<?php foreach ($prom_cert as $row) { ?>
    <div class="modal fade bd-example-modal-lg" id="exampleModal<?php echo $row->id_init ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Certificat de <?php echo $row->prom_init ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <?php if ($row->certificat) { ?>
                        <div class="row">
                            <div class="col-md-12">
                                <img class="galery" src="<?php echo base_url() ?>assets/img/album/<?php echo $row->certificat ?>" alt="">
                            </div>
                        </div>
                    <?php } ?>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
	
