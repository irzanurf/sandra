<!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex flex-wrap align-items-center">
                                            <div>
                                                <h3 class="card-title">Data Statistik Fakultas</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="chart" style="height: 300px;">
                                            <div class="chartist-tooltip"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Highlight </h3>
                                <h6 class="card-subtitle">Data alumni terakhir</h6>
                                
                            </div>
                            <div>
                                <hr class="mt-0 mb-0">
                            </div>
                            <div class="card-body text-center ">
                            <marquee direction="up" style="height: 220px; width: 100%; max-height: 220px; position: relative; padding: 0;"> 
                                    <?php foreach($highlight as $h){ ?>
                                    <div class="sl-item" style="margin-left: 0; margin-right: 0">
                                        <div class="sl-right" style="padding-left: 0; padding-right: 0">
                                            <div class="font-medium"><?php echo"$h->nama_depan $h->nama_belakang" ?>
                                            </div>
                                            <span class="sl-date"><?= $h->pekerjaan ?></span>
                                        </div>
                                    </div><br>
                                    <?php } ?>
                                    </marquee>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                