<div class="container-fluid">
    <div class="chit-chat-layer1">
        <!-- Progress Bar -->
        <?php $this->load->view('progress_bar') ?>
        <!-- End Progress Bar -->
        <div class="row">
            <div class="col-md-3 chit-chat-layer1">
                <div class="panel-primary">
                    <div class="row" style="background-color:#337AB7; padding:15px; color: white">
                        <div style="width: 20%; float:left">
                            <i style="font-size: 55px;" class="fa fa-clock-o"></i>
                        </div>
                        <div style="width: 80%; float:right">
                            <?= $sk->departemen ?><br>
                            <label style="text-align: right; font-size:10px;"><?= $sk->nama ?></label>
                            <span style="text-align: right; font-size:15px"><br>
                                <?php   if (empty($dekan->tgl)){
                                        $now = date("Y-m-d");
                                        }
                                        else {
                                        $now = $dekan->tgl;
                                        }
                                        $tgl1 = new DateTime("$sk->tgl");
                                        $tgl2 = new DateTime("$now");
                                        $jarak = $tgl2->diff($tgl1)->days + 1; ?>
                                <span style="font-size:10px">
                                    Rentang waktu pengajuan <b style="font-size:12px"><?= $jarak ?>
                                        hari</b><br>sampai
                                    finish
                                    draft
                                </span>
                        </div>
                    </div>
                    <?php $this->load->view('catatan') ?>
                </div>
            </div>
            <div class="col-md-9 chit-chat-layer1">
                <div class="work-progres" style="background-color: #eef0fd">
                    <div class="row" style="margin-left: 5px; margin-right: 5px;">
                        <h2 style="text-align: center;">Review SK Dekan</h2>
                        <hr>
                        <label style="font-size: 20px">Departemen</label><br>
                        <input value="<?= $sk->departemen ?>" class="form-control" readonly="">
                        <hr>
                        <label style="font-size: 20px">Judul</label><br>
                        <textarea name="judul" type="text" placeholder="Write here..." class="form-control"
                            readonly=""><?= $sk->judul ?></textarea>
                        <hr>
                        <iframe
                            src="http://view.officeapps.live.com/op/view.aspx?src=<?= base_url('assets/file');?>/<?=$sk->file?>"
                            width='100%' height='650px' frameborder='0'>
                        </iframe>
                        <hr>
                        <?php if(empty($lamp)) { ?>
                        <!-- DO NOTHING -->
                        <?php } else { 
                            
                            foreach ($lamp as $l) {?>
                        <!-- Lampiran -->
                        <div class="accordion" id="accordion<?=$l->id?>">
                            <div class="card"
                                style="background-color:#f6f5f5; padding-left:1rem; padding-right:1rem; padding-bottom:1rem">
                                <div class="form-group row">
                                    <div class="col-12"><button class="btn btn-link btn-block text-left" type="button"
                                            data-toggle="collapse" data-target="#collapse<?=$l->id?>"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            <h2 class="text-left">> Revisi
                                                Lampiran Tgl
                                                <?php $date = date('d-m-Y', strtotime($l->tgl)); echo $date; ?>
                                                </span>
                                        </button>
                                    </div>
                                </div>
                                <div id="collapse<?=$l->id?>" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordion">
                                    <?php if (!empty($l->lamp1)) : ?>
                                    <div class="form-group">
                                        <label style="font-size: 20px">File Lampiran 1</label><br>
                                        <div class="form-group">
                                            <button method="post"
                                                onclick=" window.open('<?= base_url('assets/lampiran');?>/<?=$l->lamp1?>', '_blank'); return false;"
                                                class="btn btn-primary-outline"><img
                                                    src="<?= base_url('assets/attach.png');?>" alt="attach" width="50"
                                                    height="50" /></button>
                                        </div>
                                    </div><br>

                                    <?php else : ?>

                                    <?php endif; ?>

                                    <?php if (!empty($l->lamp2)) : ?>
                                    <div class="form-group">
                                        <label style="font-size: 20px">File Lampiran 2</label><br>
                                        <div class="form-group">
                                            <button method="post"
                                                onclick=" window.open('<?= base_url('assets/lampiran');?>/<?=$l->lamp2?>', '_blank'); return false;"
                                                class="btn btn-primary-outline"><img
                                                    src="<?= base_url('assets/attach.png');?>" alt="attach" width="50"
                                                    height="50" /></button>
                                        </div>
                                    </div><br>

                                    <?php else : ?>

                                    <?php endif; ?>

                                    <?php if (!empty($l->lamp3)) : ?>
                                    <div class="form-group">
                                        <label style="font-size: 20px">File Lampiran 3</label><br>
                                        <div class="form-group">
                                            <button method="post"
                                                onclick=" window.open('<?= base_url('assets/lampiran');?>/<?=$l->lamp3?>', '_blank'); return false;"
                                                class="btn btn-primary-outline"><img
                                                    src="<?= base_url('assets/attach.png');?>" alt="attach" width="50"
                                                    height="50" /></button>
                                        </div>
                                    </div><br>

                                    <?php else : ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <?php } } ?>

                        <!-- Lampiran -->
                        <div class="accordion" id="accordion0">
                            <div class="card"
                                style="background-color:#f6f5f5; padding-left:1rem; padding-right:1rem; padding-bottom:1rem">
                                <div class="form-group row">
                                    <div class="col-12"><button class="btn btn-link btn-block text-left" type="button"
                                            data-toggle="collapse" data-target="#collapse0" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            <h2 class="text-left">> Lampiran Tgl
                                                <?php $date = date('d-m-Y', strtotime($sk->tgl)); echo $date; ?>
                                            </h2>
                                        </button>
                                    </div>
                                </div>
                                <div id="collapse0" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordion">
                                    <div class="form-group">
                                        <label style="font-size: 20px">File Lampiran 1</label><br>
                                        <?php if (!empty($sk->lamp)) : ?>
                                        <div class="form-group">
                                            <button method="post"
                                                onclick=" window.open('<?= base_url('assets/lampiran');?>/<?=$sk->lamp?>', '_blank'); return false;"
                                                class="btn btn-primary-outline"><img
                                                    src="<?= base_url('assets/attach.png');?>" alt="attach" width="50"
                                                    height="50" /></button>
                                        </div>

                                        <?php else : ?>

                                        <?php endif; ?>
                                    </div><br>

                                    <div class="form-group">
                                        <label style="font-size: 20px">File Lampiran 2</label><br>
                                        <?php if (!empty($sk->lamp2)) : ?>
                                        <div class="form-group">
                                            <button method="post"
                                                onclick=" window.open('<?= base_url('assets/lampiran');?>/<?=$sk->lamp2?>', '_blank'); return false;"
                                                class="btn btn-primary-outline"><img
                                                    src="<?= base_url('assets/attach.png');?>" alt="attach" width="50"
                                                    height="50" /></button>
                                        </div>

                                        <?php else : ?>

                                        <?php endif; ?>
                                    </div><br>

                                    <div class="form-group">
                                        <label style="font-size: 20px">File Lampiran 3</label><br>
                                        <?php if (!empty($sk->lamp3)) : ?>
                                        <div class="form-group">
                                            <button method="post"
                                                onclick=" window.open('<?= base_url('assets/lampiran');?>/<?=$sk->lamp3?>', '_blank'); return false;"
                                                class="btn btn-primary-outline"><img
                                                    src="<?= base_url('assets/attach.png');?>" alt="attach" width="50"
                                                    height="50" /></button>
                                        </div>

                                        <?php else : ?>

                                        <?php endif; ?>
                                    </div><br>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-center">
                                <button type="button" data-toggle="modal" data-target=".reject" class="btn btn-danger">
                                    Tolak Draft
                                </button>
                                <button type="button" data-toggle="modal" data-target=".approval"
                                    class="btn btn-success">
                                    Setujui Draft
                                </button>
                            </div>
                        </div>
                        <!-- Modal Reject -->
                        <div class="modal fade reject" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="<?= base_url("$url_reject") ?>">
                                        <input type="hidden" name="id" value="<?= $sk->id ?>">
                                        <input type="hidden" name="status" id="stat">
                                        <input type="hidden" name="status" value="1">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div style="margin:20px">
                                                    <div class="form-group">
                                                        <h3>Catatan</h3>
                                                        <textarea class="form-control" placeholder="Write here..."
                                                            name="catatan"><?php if(!empty($catatan)){ ?> <?= $catatan ?> <?php } ?></textarea><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="status" value="<?=((int)$sk->status)-1?>"
                                                onclick="return confirm('Apakah Anda yakin dengan pilihan Anda?');"
                                                class="btn btn-warning">Kembalikan ke proses sebelumnya</button>
                                            <button type="submit" name="status" value="1"
                                                onclick="return confirm('Apakah Anda yakin dengan pilihan Anda?');"
                                                class="btn btn-danger">Kembalikan ke verifikator</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Catatan -->
                        <div class="modal fade my_modal" id="my_modal" tabindex="-1" role="dialog"
                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="<?= base_url('dekan/reject') ?>">
                                        <input type="hidden" name="id" value="<?= $sk->id ?>">
                                        <!-- <input type="hidden" name="status" id="stat"> -->
                                        <div class="modal-body">
                                            <div class="row">
                                                <div style="margin:20px">
                                                    <div class="form-group">
                                                        <h3>Catatan</h3>
                                                        <textarea class="form-control" placeholder="Write here..."
                                                            name="catatan"><?php if(!empty($dekan->catatan)){ ?> <?= $dekan->catatan ?> <?php } ?></textarea><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="status" value="<?=((int)$sk->status)-1?>"
                                                onclick="return confirm('Apakah Anda yakin dengan pilihan Anda?');"
                                                class="btn btn-success">Kembalikan ke proses sebelumnya</button>
                                            <button type="submit" name="status" value="1"
                                                onclick="return confirm('Apakah Anda yakin dengan pilihan Anda?');"
                                                class="btn btn-success">Kembalikan ke verifikator</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Approve -->
                        <div class="modal fade approval" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="<?= base_url("dekan/insert_review") ?>">
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?= $sk->id ?>">
                                            <div class="row">
                                                <div style="margin:20px">
                                                    <div class="form-group">
                                                        <h3>Catatan</h3>
                                                        <textarea class="form-control" placeholder="Write here..."
                                                            name="catatan"><?php if(!empty($dekan->catatan)){ ?> <?= $dekan->catatan ?> <?php } ?></textarea><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit"
                                                onclick="return confirm('Apakah Anda yakin dengan pilihan Anda?');"
                                                class="btn btn-success">Submit</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>

<!-- <script>
$(document).ready(function() {

    $('a[data-toggle=modal], button[data-toggle=modal]').click(function() {

        var data_id = '';

        if (typeof $(this).data('id') !== 'undefined') {

            data_id = $(this).data('id');
        }

        $('#stat').val(data_id);
    })
});
</script> -->