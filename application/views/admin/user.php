<div class="chit-chat-layer1">
    <div class="col-md-12 chit-chat-layer1">
        <div class="work-progres">
            <?php if($this->session->flashdata('info')){echo $this->session->flashdata('info');}?>
            <div class="table-responsive">
                <button class="btn btn-info" type="button" data-toggle="modal" data-target="#tambah"
                    style="color:white; font-weight:bold"><i class="mdi me-2 mdi-plus-circle-outline"
                        style="font-weight: bold;"></i>Tambah</button>
                <table id="dataTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="text-align:center">role</th>
                            <th style="text-align:center">Username</th>
                            <th style="text-align:center">Nama</th>
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
                              ?>
                        <tr>
                            <td>
                                <?php if(($v->role)==2){ ?>
                                Operator
                                <?php } elseif(($v->role)==3){ ?>
                                Ketua Departemen
                                <?php } elseif(($v->role)==4) {?>
                                Verifikator
                                <?php } elseif(($v->role)==5) {?>
                                Supervisor 1
                                <?php } elseif(($v->role)==6) {?>
                                Supervisor 2
                                <?php } elseif(($v->role)==7) {?>
                                Manager
                                <?php } elseif(($v->role)==8) {?>
                                Wadek 1
                                <?php } elseif(($v->role)==9) {?>
                                Wadek 2
                                <?php } elseif(($v->role)==10) {?>
                                Dekan
                                <?php } ?>
                            </td>
                            <td><?= $v->username ?></td>
                            <td><?= $v->nama ?></td>

                            <td><?php if(!empty($v->departemen)) {?>
                                <?= $v->departemen ?>
                                <?php } ?></td>
                            <td style="text-align:center; width:15%">
                                <form style="display:inline-block;" method="post"
                                    action="<?= base_url('verifikator/akun') ?>">
                                    <input type='hidden' name="username" value="<?= $v->username ?>">
                                    <button type="submit" class="btn btn-primary-outline" data-toggle="tooltip"
                                        data-placement="top" title="Ganti Password">
                                        <i class="fa fa-user" style="font-size: 20px; color: green"> </i>
                                    </button>
                                </form>
                                <?php if(($v->role)==2){ ?>
                                <form style="display:inline-block;" method="post"
                                    action="<?= base_url('verifikator/hapus_akun') ?>">
                                    <input type='hidden' name="username" value="<?= $v->username ?>">
                                    <button type="submit" class="btn btn-primary-outline" data-toggle="tooltip"
                                        data-placement="top" title="Hapus">
                                        <i class="fa fa-trash" style="font-size: 20px; color: red"> </i>
                                    </button>
                                </form>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <!-- Tambah Modal -->
                <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel" style="color: black; font-weight:bold">
                                    Tambah Data Alumni</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form role="form" method="post" action="<?= base_url('verifikator/tambah_user');?>"
                                enctype="multipart/form-data">
                                <div class="modal-body">
                                    <label style="font-weight: bold; color:black">Role</label><label
                                        style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <input class="form-control" value="Operator" disabled></input><br>
                                    <label style="font-weight: bold; color:black">Nama</label><label
                                        style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <textarea class="form-control" rows="2" name="nama" required=""></textarea><br>
                                    <label style="font-weight: bold; color:black">Username</label><label
                                        style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <input class="form-control" name="username" required=""></input><br>
                                    <label style="font-weight: bold; color:black">Departemen</label><label
                                        style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <select class="form-control" name="departemen" required="">
                                        <option value="">Please Select</option>
                                        <option value="0">Umum / Fakultas</option>
                                        <option value="1">Teknik Sipil</option>
                                        <option value="2">Teknik Arsitektur</option>
                                        <option value="3">Teknik Kimia</option>
                                        <option value="4">Perencanaan Wilayah dan Kota</option>
                                        <option value="5">Teknik Mesin</option>
                                        <option value="6">Teknik Elektro</option>
                                        <option value="7">Teknik Perkapalan</option>
                                        <option value="8">Teknik Industri</option>
                                        <option value="9">Teknik Lingkungan</option>
                                        <option value="10">Teknik Geologi</option>
                                        <option value="11">Teknik Geodesi</option>
                                        <option value="12">Teknik Komputer</option>
                                    </select><br>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-success" type="submit">Submit</button>
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>