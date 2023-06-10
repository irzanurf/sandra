<div class="">
    <div class="clearfix"></div>
    <form method="post" enctype="multipart/form-data" action="<?= base_url("departemen/update_pengajuan") ?>">
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
                            required><?=$surat->from?></textarea>
                        <br>
                        <label>To * :</label>
                        <textarea type="text" class="form-control" rows="2" name="to"
                            required><?=$surat->to?></textarea>
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
                            <?php } ?>
                            <input type="file" name="file"><br>
                            <label style="color:red; font-size:12px;">maks 10mb</label>
                        </div><br>
                        <div>
                            <label>Catatan Operator :</label>
                            <textarea type="text" class="form-control" rows="5" name="catatan"><?=$cat->catatan?></textarea>
                        </div>
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
                        <textarea type="text" class="form-control" rows="2" name="judul" required="required"><?=$surat->judul?></textarea>
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
            <button type="submit" name="status" class="btn btn-info">
                Simpan
            </button>
        </div>

    </form>

</div>

<!-- bootstrap-ckeditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>

<script>
var editor = document.querySelector('[id="isi"]');
ClassicEditor.create(editor).then(editor => {
        editor.editing.view.change(writer => {
            writer.setStyle('height', '300px', editor.editing.view.document.getRoot());
        });
    })
    .catch(error => {
        console.error(error);
    });
</script>