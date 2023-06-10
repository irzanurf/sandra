<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Dashboard</h3>
                        <div class="d-flex align-items-center">
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <?php $this->load->view('chart') ?>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-12">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#home"
                                        role="tab">Daftar Alumni</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div>
                                                <form style="width: 100%;" method="GET" action="<?= base_url('Welcome');?>">
                                                    <div class="input-group">
                                                        <input type="text" name="q" class="border border-primary rounded-100 form-control bg-light small" placeholder="Pencarian" aria-label="Search" aria-describedby="basic-addon2">
                                                        <input type="hidden" name="page" value="1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" type="submit">
                                                                <i class="fas fa-search fa-sm"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <?= $hasil ?> hasil
                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Tanggal
                                                        </th>
                                                        <th>
                                                            Identitas
                                                        </th>
                                                        <th>
                                                            Pekerjaan
                                                        </th>
                                                        <th>
                                                            Alumni
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>

                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php foreach($search as $s){ 
                                                        $tgl = date('d-m-Y', strtotime($s->date));    
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?= $tgl ?>
                                                        </td>
                                                        <td>
                                                            <b>Nama</b><br>
                                                            <?php echo("$s->nama_depan $s->nama_belakang") ?><br><br>
                                                            <b>E-Mail</b><br>
                                                            <?= $s->email ?><br><br>
                                                            <b>No HP(WA)</b><br>
                                                            <?= $s->no_hp ?><br><br>
                                                            <b>Alamat</b><br>
                                                            <?php echo("$s->alamat $s->kode_pos") ?>
                                                        </td>
                                                        <td>
                                                            <b>Pekerjaan</b><br>
                                                            <?= $s->pekerjaan ?><br><br>
                                                            <b>Sektor</b><br>
                                                            <?= $s->sektor ?><br><br>
                                                            <b>Tempat</b><br>
                                                            <?= $s->tempat ?>
                                                        </td>
                                                        <td>
                                                            <b>Angkatan</b><br>
                                                            <?= $s->angkatan ?><br><br>
                                                            <b>Fakultas</b><br>
                                                            <?= $s->fakultas ?><br><br>
                                                            <b>Departemen</b><br>
                                                            <?= $s->departemen ?>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div style="text-align:center; width:100%; padding:0;">
                                                <?php if ($previous == 0): ?>

                                                <?php else: 
                                                    $previous = $page-1?>
                                                <form style="display:inline-block;" method="get" action="<?= base_url('welcome');?>">
                                                <input type='hidden' name="q" value="<?= $cari ?>">
                                                <input type='hidden' name="page" value="<?= $previous ?>">
                                                <button type="Submit" class="btn btn-primary">
                                                <i class="fa fa-arrow-left"></i>
                                                </button>
                                                </form>
                                                <?php endif; ?>
                                                <button class="btn btn-primary" style="background:none; border:none"><span style="color: black; font-weight:bold"><?=$page?></span></button>
                                                <?php if ($next == 0): ?>
                                                    
                                                <?php else: 
                                                    $next = $page+1?>
                                                <form style="display:inline-block;" method="get" action="<?= base_url('welcome');?>">
                                                <input type='hidden' name="q" value="<?= $cari ?>">
                                                <input type='hidden' name="page" value="<?= $next ?>">
                                                <button type="Submit" class="btn btn-primary">
                                                <i class="fa fa-arrow-right"></i>
                                                </button>
                                                </form>
                                                <?php endif; ?>
                                            </div>
                                        </div
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->

                
            </div>