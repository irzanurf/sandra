<div class="">
    <div class="clearfix"></div>
    <input type="hidden" name="id" value="<?= $surat->id ?>" />

    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form <small>Alamat Surat</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <!-- start form for validation -->
                    <label>From * :</label>
                    <textarea type="text" class="form-control" rows="2" name="from"
                        readonly><?=$surat->from?></textarea>
                    <br>
                    <label>To * :</label>
                    <textarea type="text" class="form-control" rows="2" name="to" readonly><?=$surat->to?></textarea>
                    <!-- end form for validations -->

                </div>
            </div>


        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form <small>Lampiran dan catatan</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div>
                        <label>Lampiran Surat :</label><br>
                        <?php if(!empty($surat->lamp)) { ?>
                        <div class="form-group">
                            <button method="post"
                                onclick=" window.open('<?= base_url('assets/lampiran');?>/<?=$surat->lamp?>', '_blank'); return false;"
                                class="btn btn-primary-outline"><img src="<?= base_url('assets/attach.png');?>"
                                    alt="attach" width="50" height="50" /></button>
                        </div>
                        <?php } ?><br>
                        <div>
                            <label>Catatan :</label><br>
                            <?php $this->load->view('catatan'); ?>

                        </div>
                    </div><br>
                    <!-- <div>
                            <label>Catatan Operator :</label>
                            <textarea type="text" class="form-control" rows="5"
                                name="catatan" readonly><?=$cat->catatan?></textarea>
                        </div> -->
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Judul <small>Surat *</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div>
                    <textarea type="text" class="form-control" rows="2" name="judul" required="required"
                        readonly><?=$surat->judul?></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Isi <small>Surat *</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div id="alerts"></div>
                <div>
                    <textarea type="text" class="form-control" rows="5" name="isi" id="isi"><?=$surat->body?></textarea>
                </div>
                <br />

                <div class="ln_solid"></div>
            </div>
        </div>
    </div>

    <div class="text-center">
        <button type="button" data-toggle="modal" data-target=".reject" class="btn btn-danger">
            Tolak Draft
        </button>
        <button type="button" data-toggle="modal" data-target=".approval" class="btn btn-success">
            Setujui Draft
        </button>
    </div>

    <div class="modal fade reject" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"></h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url("kadep/reject") ?>">
                    <input type="hidden" name="id" value="<?= $surat->id ?>">
                    <input type="hidden" name="status" id="stat">
                    <input type="hidden" name="status" value="1">
                    <div class="modal-body">
                        <div class="form-group">
                            <h3>Catatan</h3>
                            <textarea class="form-control" placeholder="Write here..." name="catatan"></textarea><br>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="status" value="<?=((int)$surat->status)-1?>"
                            onclick="return confirm('Apakah Anda yakin dengan pilihan Anda?');"
                            class="btn btn-success">Kembalikan ke operator departemen</button>

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade approval" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"></h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url("kadep/approve") ?>">
                    <input type="hidden" name="id" value="<?= $surat->id ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <h3>Catatan</h3>
                            <textarea class="form-control" placeholder="Write here..." name="catatan"></textarea><br>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" onclick="return confirm('Apakah Anda yakin dengan pilihan Anda?');"
                            class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<!-- bootstrap-ckeditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>

<script>
var editor = document.querySelector('[id="isi"]');
ClassicEditor.create(editor).then(editor => {
        editor.editing.view.change(writer => {
            writer.setStyle('height', '300px', editor.editing.view.document.getRoot());
            editor.isReadOnly = true;
        });
    })
    .catch(error => {
        console.error(error);
    });
</script>