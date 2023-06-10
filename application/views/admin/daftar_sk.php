<div class="chit-chat-layer1">
    <div class="col-md-12 chit-chat-layer1">
        <div class="work-progres">
            <?php if($this->session->flashdata('info')){echo $this->session->flashdata('info');}?>
            <div class="table-responsive">
                <table id="dataTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="text-align:center">Tanggal</th>
                            <th style="text-align:center">Judul</th>
                            <th style="text-align:center">Departemen</th>
                            <th style="text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>

                        </tr>
                    </tfoot>
                    <tbody>
                        <?php 
                                   foreach($view as $v){
                                    $tgl = date('d-m-Y', strtotime($v->tgl));
                              ?>
                        <tr>
                            <td style="text-align:center; width:10%"><?= $tgl ?></td>
                            <td><?= $v->judul ?></td>
                            <td><?= $v->departemen ?></td>
                            <td style="text-align:center; width:20%">
                                <form style="display:inline-block;" method="post"
                                    action="<?= base_url('common/detail') ?>">
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <button type="submit" class="btn btn-primary-outline" data-toggle="tooltip"
                                        data-placement="top" title="Detail">
                                        <i class="fa fa-file-archive-o" style="font-size: 20px; color: blue"> </i>
                                    </button>
                                </form>
                                <form style="display:inline-block;" method="post"
                                    action="<?= base_url('admin/edit_sk') ?>">
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <button type="submit" class="btn btn-primary-outline" data-toggle="tooltip"
                                        data-placement="top" title="Edit">
                                        <i class="fa fa-pencil" style="font-size: 20px; color: #1d9d74"> </i>
                                    </button>
                                </form>
                                <?php if(($v->status)==8 && (!empty($v->no_sk))) { ?>
                                <form style="display:inline-block;" method="post"
                                    action="<?= base_url('common/download_sk') ?>">
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <button type="submit" class="btn btn-primary-outline" data-toggle="tooltip"
                                        data-placement="top" title="Download">
                                        <i class="fa fa-download" style="font-size: 20px; color: #337AB7"> </i>
                                    </button>
                                </form>
                                <?php } ?>
                                <form style="display:inline-block;" method="post"
                                    onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?');"
                                    action="<?= base_url('admin/delete_pengajuan');?>">
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <button type="submit" class="btn btn-primary-outline" data-toggle="tooltip"
                                        data-placement="top" title="Hapus">
                                        <i class="fa fa-trash" style="font-size: 20px; color: #dc143c"> </i>
                                    </button>
                                </form>
                                <!-- <?php if(($v->status)==0) { ?>
                                <form style="display:inline-block;" method="post"
                                    action="<?= base_url('departemen/edit_sk') ?>">
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <button type="submit" class="btn btn-primary-outline" data-toggle="tooltip"
                                        data-placement="top" title="Edit">
                                        <i class="fa fa-pencil" style="font-size: 20px; color: #1d9d74"> </i>
                                    </button>
                                </form>
                                <form style="display:inline-block;" method="post"
                                    onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?');"
                                    action="<?= base_url('departemen/delete_pengajuan');?>">
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <button type="submit" class="btn btn-primary-outline" data-toggle="tooltip"
                                        data-placement="top" title="Hapus">
                                        <i class="fa fa-trash" style="font-size: 20px; color: #dc143c"> </i>
                                    </button>
                                </form>
                                <?php } 
                                elseif(($v->status)==7) { ?>
                                <form style="display:inline-block;" method="post"
                                    action="<?= base_url('departemen/edit_sk') ?>">
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <button type="submit" class="btn btn-primary-outline" data-toggle="tooltip"
                                        data-placement="top" title="Edit">
                                        <i class="fa fa-pencil" style="font-size: 20px; color: #1d9d74"> </i>
                                    </button>
                                </form>
                                <form style="display:inline-block;" method="post"
                                    action="<?= base_url('common/download_sk') ?>">
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <button type="submit" class="btn btn-primary-outline" data-toggle="tooltip"
                                        data-placement="top" title="Download">
                                        <i class="fa fa-download" style="font-size: 20px; color: #337AB7"> </i>
                                    </button>
                                </form>
                                <button class="btn btn-primary-outline" data-toggle="tooltip" data-placement="top"
                                    title="Hapus">
                                    <i class="fa fa-trash" style="font-size: 20px; color: grey"> </i>
                                </button>
                                <?php }  
                                else { ?>
                                <button class="btn btn-primary-outline" data-toggle="tooltip" data-placement="top"
                                    title="Hapus">
                                    <i class="fa fa-pencil" style="font-size: 20px; color: grey"> </i>
                                </button>
                                <button class="btn btn-primary-outline" data-toggle="tooltip" data-placement="top"
                                    title="Hapus">
                                    <i class="fa fa-trash" style="font-size: 20px; color: grey"> </i>
                                </button>
                                <?php } ?> -->

                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>