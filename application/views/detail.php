<div class="">
    <div class="clearfix"></div>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $surat->id ?>" />

        <?php if(!empty($surat->nomor)) { ?>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Nomor <small>Surat *</small></h2>
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
                        <textarea type="text" class="form-control" rows="2" name="nomor" required="required"
                            readonly><?=$surat->nomor?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

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
                        <textarea type="text" class="form-control" rows="2" name="to"
                            readonly><?=$surat->to?></textarea>
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

                                <?php } ?>
                                <?php if(!empty($surat->nomor)) { ?>

                                <button type="button" class="btn btn-primary-outline" data-toggle="modal"
                                    data-target=".bs-history-modal-lg">
                                    <i class="fa fa-history" style="font-size: 50px; color: green">
                                    </i>
                                </button>

                                <div class="modal fade bs-history-modal-lg" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Lampiran: History alur
                                                    persetujuan
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal"><span
                                                        aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Jabatan</th>
                                                            <th>Nama</th>
                                                            <th>Jenis</th>
                                                            <th>Tanggal Disetujui</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if(($surat->ttd)=="manager") {
                                                    $spv_tgl=date('d-m-Y', strtotime($spv[0]->tgl));
                                                    $manager_tgl=date('d-m-Y', strtotime($manager[0]->tgl));
                                                    ?>
                                                        <tr>
                                                            <th>1</th>
                                                            <td><?=$jabatan1?></td>
                                                            <td>Nama1</td>
                                                            <td><?=$jenis1?></td>
                                                            <td><?=$spv_tgl?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>2</th>
                                                            <td><?=$jabatan2?></td>
                                                            <td>Nama2</td>
                                                            <td><?=$jenis2?></td>
                                                            <td><?=$manager_tgl?></td>
                                                        </tr>
                                                        <?php } elseif(($surat->ttd)=="wadek") {
                                                    $spv_tgl=date('d-m-Y', strtotime($spv[0]->tgl));
                                                    $manager_tgl=date('d-m-Y', strtotime($manager[0]->tgl));
                                                    $wadek_tgl=date('d-m-Y', strtotime($wadek[0]->tgl));
                                                    ?>
                                                        <tr>
                                                            <th>1</th>
                                                            <td><?=$jabatan1?></td>
                                                            <td>Nama1</td>
                                                            <td><?=$jenis1?></td>
                                                            <td><?=$spv_tgl?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>2</th>
                                                            <td><?=$jabatan2?></td>
                                                            <td>Nama2</td>
                                                            <td><?=$jenis2?></td>
                                                            <td><?=$manager_tgl?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>3</th>
                                                            <td><?=$jabatan3?></td>
                                                            <td>Nama3</td>
                                                            <td><?=$jenis3?></td>
                                                            <td><?=$wadek_tgl?></td>
                                                        </tr>
                                                        <?php } elseif(($surat->ttd)=="dekan") {
                                                    $manager_tgl=date('d-m-Y', strtotime($manager[0]->tgl));
                                                    $wadek_tgl=date('d-m-Y', strtotime($wadek[0]->tgl));
                                                    $dekan_tgl=date('d-m-Y', strtotime($dekan[0]->tgl));
                                                    ?>
                                                        <tr>
                                                            <th>1</th>
                                                            <td><?=$jabatan1?></td>
                                                            <td>Nama1</td>
                                                            <td><?=$jenis1?></td>
                                                            <td><?=$manager_tgl?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>2</th>
                                                            <td><?=$jabatan2?></td>
                                                            <td>Nama2</td>
                                                            <td><?=$jenis2?></td>
                                                            <td><?=$wadek_tgl?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>3</th>
                                                            <td><?=$jabatan3?></td>
                                                            <td>Nama3</td>
                                                            <td><?=$jenis3?></td>
                                                            <td><?=$dekan_tgl?></td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                <br>
                                                <div style="text-align: right">
                                                    <span><?=$diajukan?></span>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>

                            <br>
                            <div>
                                <label>Catatan :</label><br>
                                <?php $this->load->view('catatan'); ?>

                            </div>
                        </div><br>
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
                        <textarea type="text" class="form-control" rows="5" name="isi"
                            id="isi"><?=$surat->body?></textarea>
                    </div>
                    <br />

                    <div class="ln_solid"></div>
                </div>
            </div>
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
            editor.isReadOnly = true;
        });
    })
    .catch(error => {
        console.error(error);
    });
</script>