<!-- Catatan Operator -->
<button type="button" class="btn btn-primary-outline" data-toggle="modal" data-target=".bs-operator-modal-lg">
    <i class="fa fa-file-text" style="font-size: 18px; color: #808000">
    </i><br><span style="font-size:12px">Operator</span>
</button>
<div class="modal fade bs-operator-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Catatan Operator</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <?= $dep->catatan ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!-- Catatan Kadep -->
<?php if(!empty($kadep)) { ?>
<button type="button" class="btn btn-primary-outline" data-toggle="modal" data-target=".bs-kadep-modal-lg">
    <i class="fa fa-file-text" style="font-size: 18px; color: #7bc18d">
    </i><br><span style="font-size:12px">Kadep</span>
</button>
<div class="modal fade bs-kadep-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Catatan Kadep</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <?php foreach($kadep as $v) { 
                            $tgl = date('d-m-Y', strtotime($v->tgl));?>
                <label style="color:#641111"><?= $tgl ?></label><br>
                <label><?= $v->catatan ?></label>
                <hr>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<?php } ?>

<!-- Catatan Verifikator -->
<?php if(!empty($verifikator)) { ?>
<button type="button" class="btn btn-primary-outline" data-toggle="modal" data-target=".bs-verifikator-modal-lg">
    <i class="fa fa-file-text" style="font-size: 18px; color: #fc8213">
    </i><br><span style="font-size:12px">Verifikator</span>
</button>
<div class="modal fade bs-verifikator-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Catatan Verifikator</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <?php foreach($verifikator as $v) { 
                            $tgl = date('d-m-Y', strtotime($v->tgl));?>
                <label style="color:#641111"><?= $tgl ?></label><br>
                <label><?= $v->catatan ?></label>
                <hr>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<?php } ?>

<!-- Catatan Supervisor -->
<?php if(!empty($supervisor)) { ?>
<button type="button" class="btn btn-primary-outline" data-toggle="modal" data-target=".bs-supervisor-modal-lg">
    <i class="fa fa-file-text" style="font-size: 18px; color: #641111">
    </i><br><span style="font-size:12px">Supervisor</span>
</button>
<div class="modal fade bs-supervisor-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Catatan Supervisor</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <?php foreach($supervisor as $v) { 
                            $tgl = date('d-m-Y', strtotime($v->tgl));?>
                <label style="color:#641111"><?= $tgl ?></label><br>
                <label><?= $v->catatan ?></label>
                <hr>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<?php } ?>

<!-- Catatan Manager -->
<?php if(!empty($manager)) { ?>
<button type="button" class="btn btn-primary-outline" data-toggle="modal" data-target=".bs-manager-modal-lg">
    <i class="fa fa-file-text" style="font-size: 18px; color: #0CB8B8F6">
    </i><br><span style="font-size:12px">Manager</span>
</button>
<div class="modal fade bs-manager-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Catatan Manager</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <?php foreach($manager as $v) { 
                            $tgl = date('d-m-Y', strtotime($v->tgl));?>
                <label style="color:#641111"><?= $tgl ?></label><br>
                <label><?= $v->catatan ?></label>
                <hr>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<?php } ?>

<!-- Catatan Wadek -->
<?php if(!empty($wadek)) { ?>
<button type="button" class="btn btn-primary-outline" data-toggle="modal" data-target=".bs-wadek-modal-lg">
    <i class="fa fa-file-text" style="font-size: 18px; color: #0F52A0F6">
    </i><br><span style="font-size:12px">Wadek</span>
</button>
<div class="modal fade bs-wadek-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Catatan Wadek</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <?php foreach($wadek as $v) { 
                            $tgl = date('d-m-Y', strtotime($v->tgl));?>
                <label style="color:#641111"><?= $tgl ?></label><br>
                <label><?= $v->catatan ?></label>
                <hr>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<?php } ?>

<!-- Catatan Dekan -->
<?php if(!empty($dekan)) { ?>
<button type="button" class="btn btn-primary-outline" data-toggle="modal" data-target=".bs-dekan-modal-lg">
    <i class="fa fa-file-text" style="font-size: 18px; color: #0F52A0F6">
    </i><br><span style="font-size:12px">Dekan</span>
</button>
<div class="modal fade bs-dekan-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Catatan Dekan</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <?php foreach($dekan as $v) { 
                            $tgl = date('d-m-Y', strtotime($v->tgl));?>
                <label style="color:#641111"><?= $tgl ?></label><br>
                <label><?= $v->catatan ?></label>
                <hr>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<?php } ?>