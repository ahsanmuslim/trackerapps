<?php
use Teckindo\TrackerApps\Helper\Flasher;
?>
<div class="card mb-4">
    <div class="col-lg p-3">
        <div class="col-lg-12">
            <?php Flasher::flash(); ?>
        </div>
        <a href="<?= BASEURL ?>" class="btn btn-lg btn-warning btn-block">Kembali</a>
    </div>
</div>